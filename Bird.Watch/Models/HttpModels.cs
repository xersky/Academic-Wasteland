using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Threading.Tasks;
using Bird.Watch.Services;

namespace Bird.Watch.Models
{
    public class Pagination
    {
        public int? limit { get; set; }
        public int? offset { get; set; }
        public int? count { get; set; }
        public int? total { get; set; }
    }
    public class Root<T> {
        public Pagination pagination { get; set; }
        public List<T> data { get; set; }
    }

    public record FilterQuery {
        public FlightStatus flight_status { get; set; } = FlightStatus.unknown;
        public DateTime? flight_date_start { get; set; }
        public DateTime? flight_date_end { get; set; }
        public string? departure { get; set; }
        public string? arrival { get; set; }
        public string? airline { get; set; }
        public string? flight { get; set; }
        public async Task<string> ToIcao(string? port) {
            if(port is null) return null;
            var service = new AviationService();
            var result  = await service.GetAirportData(port);
            return result?.icao ?? port;
        }
        public async Task<string> ToStringAsync(string key) => $"http://api.aviationstack.com/v1/flights?access_key={key}&limit=342160&arr_scheduled_time_arr={flight_date_start?.ToString("yyyy-MM-dd")}&arr_scheduled_time_dep={flight_date_end?.ToString("yyyy-MM-dd")}&airline_name={airline ?? ""}&flight_number={flight ?? ""}&dep_icao={await ToIcao(this.departure)}&arr_icao={await ToIcao(this.arrival)}";

    }

}

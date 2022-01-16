using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace Flights.Data
{
    public enum FlightStatus {
        scheduled, active, landed, cancelled, incident, diverted, unknown
    }
    
    public class Root<T> {
        public Pagination pagination { get; set; }
        public List<T> data { get; set; }
    }

    public class Response<T>
    {
        public T Content { get; set; }
        public string Raw { get; set; }
    }

    public record FilterQuery {
        public FlightStatus? flight_status { get; set; }
        public DateTime? flight_date_start { get; set; }
        public DateTime? flight_date_end { get; set; }
        public string? departure { get; set; }
        public string? arrival { get; set; }
        public string? airline { get; set; }
        public string? flight { get; set; }

        public async Task<string> ToIcao(string? port) {
            var service = new AviationStackService();
            var result  = await service.GetAirportData(port);
            return result.Content?.icao_code ?? port;
        }
        public async Task<string> ToStringAsync() => @$"http://api.aviationstack.com/v1/flights?access_key={{apikey}}&limit=342160&arr_scheduled_time_arr={flight_date_start?.ToString("yyyy-MM-dd")}&arr_scheduled_time_dep={flight_date_end?.ToString("yyyy-MM-dd")}&airline_name={airline}&flight_number={flight}&dep_icao={await ToIcao(this.departure)}&arr_icao={await ToIcao(this.arrival)}";

    }

}

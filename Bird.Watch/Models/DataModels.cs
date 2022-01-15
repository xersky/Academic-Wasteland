using System;
using System.CodeDom;
using System.Collections.Generic;
using System.Threading.Tasks;

namespace Bird.Watch.Models
{
    public record Schedule(String? Airport, DateTime? Time);
    public enum FlightStatus {
        scheduled, active, landed, cancelled, incident, diverted, unknown
    }
    struct ResultAirports {
        public Airport Departure;
        public Airport Arrival;
    }
    public class Airport
    {
        public string? code { get; set; }
        public string? lat { get; set; }
        public string? lon { get; set; }
        public string? name { get; set; }
        public string? city { get; set; }
        public string? state { get; set; }
        public string? country { get; set; }
        public string? woeid { get; set; }
        public string? tz { get; set; }
        public string? phone { get; set; }
        public string? type { get; set; }
        public string? email { get; set; }
        public string? url { get; set; }
        public string? runway_length { get; set; }
        public string? elev { get; set; }
        public string? icao { get; set; }
        public string? direct_flights { get; set; }
        public string? carriers { get; set; }
    }
    public class Departure
    {
        public string? airport { get; set; }
        public string? timezone { get; set; }
        public string? iata { get; set; }
        public string? icao { get; set; }
        public string? terminal { get; set; }
        public string? gate { get; set; }
        public int? delay { get; set; }
        public DateTime? scheduled { get; set; }
        public DateTime? estimated { get; set; }
        public DateTime? actual { get; set; }
        public DateTime? estimated_runway { get; set; }
        public DateTime? actual_runway { get; set; }
    }

    public class Arrival
    {
        public string? airport { get; set; }
        public string? timezone { get; set; }
        public string? iata { get; set; }
        public string? icao { get; set; }
        public string? terminal { get; set; }
        public string? gate { get; set; }
        public string? baggage { get; set; }
        public int? delay { get; set; }
        public DateTime? scheduled { get; set; }
        public DateTime? estimated { get; set; }
        public DateTime? actual { get; set; }
        public DateTime? estimated_runway { get; set; }
        public DateTime? actual_runway { get; set; }
    }

    public class Airline
    {
        public string? name { get; set; }
        public string? iata { get; set; }
        public string? icao { get; set; }
    }

    public class Flight
    {
        public string? number { get; set; }
        public string? iata { get; set; }
        public string? icao { get; set; }
        public object? codeshared { get; set; }
    }

    public class Aircraft
    {
        public string? registration { get; set; }
        public string? iata { get; set; }
        public string? icao { get; set; }
        public string? icao24 { get; set; }
    }

    public class Live
    {
        public DateTime? updated { get; set; }
        public double? latitude { get; set; }
        public double? longitude { get; set; }
        public double? altitude { get; set; }
        public double? direction { get; set; }
        public double? speed_horizontal { get; set; }
        public double? speed_vertical { get; set; }
        public bool? is_ground { get; set; }
    }

    public class Datum
    {
        public string? flight_date { get; set; }
        public string? flight_status { get; set; }
        public Departure? departure { get; set; }
        public Arrival? arrival { get; set; }
        public Airline? airline { get; set; }
        public Flight? flight { get; set; }
        public Aircraft? aircraft { get; set; }
        public Live? live { get; set; }

        // implicit convertion operator to Model 
        public static implicit operator Model(Datum d)
        {
            return new Model
            {
                Flight_Status = Enum.Parse<FlightStatus>(d.flight_status),
                Departure = new Schedule(d?.departure?.airport ,d?.departure?.scheduled),
                Arrival = new Schedule(d?.arrival?.airport ,d?.arrival?.scheduled),
                Airline = d?.airline?.name,
                Flight = d?.flight?.number,
            };
        }
    }

    public class Model
    {
        public FlightStatus Flight_Status { get; set; }
        public Schedule? Departure { get; set; }
        public Schedule? Arrival { get; set; }
        public String? Airline { get; set; }
        public String? Flight { get; set; }
        public static implicit operator FilterQuery(Model m)
        {
            return  m is null ? 
            new FilterQuery() : 
            new FilterQuery
            {
                flight_status = m.Flight_Status,
                departure = m?.Departure?.Airport,
                flight_date_start = m?.Departure?.Time,
                arrival = m?.Arrival?.Airport,
                flight_date_end = m?.Arrival?.Time, 
                airline = m.Airline, 
                flight = m.Flight ,
            };
        }
    }

}

using System;

namespace Flights.Data
{
    public class Airport
    {
        public string airport_name { get; set; }
        public string iata_code { get; set; }
        public string icao_code { get; set; }
        public string latitude { get; set; }
        public string longitude { get; set; }
        public string geoname_id { get; set; }
        public string timezone { get; set; }
        public string gmt { get; set; }
        public object phone_number { get; set; }
        public string country_name { get; set; }
        public string country_iso2 { get; set; }
        public string city_iata_code { get; set; }
    }

    public class Pagination
    {
        public int? limit { get; set; }
        public int? offset { get; set; }
        public int? count { get; set; }
        public int? total { get; set; }
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
    }
}

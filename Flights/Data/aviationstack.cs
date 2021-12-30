#define Local
using System;
using System.Text.Json;
using System.Linq;
using System.Threading.Tasks;
using System.Net.Http;

namespace Flights.Data
{
    public class AviationStackService
    {
        record stamp {
            public Root<Datum> Cache;
            public DateTime CacheTime;
        }
        private readonly string _accessKey;
        private static stamp? _cache = null;
        private readonly HttpClient client = new HttpClient();

        public async Task<Response<Root<Datum>>> GetFlightsData(FilterQuery filter)
        {
            if(_cache is null || _cache.CacheTime < DateTime.Now.AddMinutes(-10))
            {
#if Local
                var result = await client.GetAsync("http://api.aviationstack.com/v1/flights?access_key={{apikey}}&limit=342160");
#else
                var result = await client.GetAsync(await filter.ToStringAsync());
#endif
                var flightsresponse = await JsonSerializer.DeserializeAsync<Root<Datum>>(await result.Content.ReadAsStreamAsync());
                _cache = new stamp {
                    Cache = flightsresponse,
                    CacheTime = DateTime.Now
                };
            }

#if Local
            var results = ( from f in _cache.Cache.data 
                            where 
                                f.flight_status         == (filter?.flight_status?.ToString() ?? f.flight_status) &&
                                f.departure.scheduled?.ToString("yyyy-MM-dd")   == (filter?.flight_date_start?.ToString("yyyy-MM-dd") ?? f.departure.scheduled?.ToString("yyyy-MM-dd")) &&
                                f.arrival.scheduled?.ToString("yyyy-MM-dd")     == (filter?.flight_date_end?.ToString("yyyy-MM-dd") ?? f.arrival.scheduled?.ToString("yyyy-MM-dd") ) &&
                                f.departure.airport     == (filter?.departure ?? f.departure.airport) &&
                                f.arrival.airport       == (filter?.arrival ?? f.arrival.airport) &&
                                f.airline.name          == (filter?.airline ?? f.airline.name) &&
                                f.flight.number         == (filter?.flight  ?? f.flight.number)         
                            select f).ToList();
            return new Response<Root<Datum>> { 
                    Content = new Root<Datum> {
                        data = results
                    },
                    Raw = null };
#else
            return new Response<Root<Datum>> { 
                    Content = _cache.Cache,
                    Raw = null };
#endif
        }

        public async Task<Response<Airport>> GetAirportData(string airport_name)
        {
            if(airport_name == null)
                throw new ArgumentNullException(nameof(airport_name));
            var result = await client.GetAsync("http://api.aviationstack.com/v1/airports?access_key={{apikey}}&limit=6705");
            var airports = await JsonSerializer.DeserializeAsync<Root<Airport>>(await result.Content.ReadAsStreamAsync());
            return new Response<Airport> {
                Content = (from port in airports.data where port.airport_name == airport_name select port).FirstOrDefault(),
                Raw = await result.Content.ReadAsStringAsync()
            } ;
        }
    }
}

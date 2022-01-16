#define Local
using System;
using System.IO;
using System.Text; 
using System.Collections.Generic;
using System.Text.Json;
using System.Linq;
using System.Threading.Tasks;
using System.Net.Http;
using Bird.Watch.Models;
using System.Net.Http.Json;

namespace Bird.Watch.Services
{
    public class AviationService
    {
        record stamp {
            public List<Datum> Cache;
            public DateTime CacheTime;
        }
        private Airport[] _ports { get; set; } = null;
        private readonly string _accessKey = "{{API_KEY}}";
        private static stamp? _cache = null;
        private readonly HttpClient client = new HttpClient();

        public async Task<List<Model>> GetFlightsData(FilterQuery query = null)
        {
            System.Console.WriteLine($"Here Invoked {query}");
            if(_cache is null || _cache.CacheTime < DateTime.Now.AddMinutes(-10))
            {
#if Local
                var result = await client.GetAsync($"http://api.aviationstack.com/v1/flights?access_key={_accessKey}");
#else
                var result = await client.GetAsync(await query.ToStringAsync(_accessKey));
#endif
                var flightsresponse = await JsonSerializer.DeserializeAsync<Root<Datum>>(await result.Content.ReadAsStreamAsync());
                _cache = new stamp {
                    Cache = flightsresponse.data,
                    CacheTime = DateTime.Now
                };
            }

#if Local
            var results =   query is null ? _cache.Cache.Select(x => (Model)x) : 
                            from x in _cache.Cache
                            where 
                                (query?.flight is null                  ? true  :  x?.flight?.number?.Contains(query?.flight) ?? true) &&
                                (query?.airline is null                 ? true  :  x?.airline?.name?.Contains(query?.airline) ?? true) &&
                                (query?.departure is null               ? true  : x?.departure?.airport?.Contains(query?.departure) ?? true) &&
                                (query?.arrival is null                 ? true  : x?.arrival?.airport?.Contains(query?.arrival) ?? true) &&
                                (query?.flight_status == FlightStatus.unknown  || x.flight_status == query?.flight_status.ToString() )&&
                                (query?.flight_date_end?.Date is null   ? true  : x.arrival?.scheduled?.Date == query?.flight_date_end?.Date) &&
                                (query?.flight_date_start?.Date is null ? true  : x.departure?.scheduled?.Date == query?.flight_date_start?.Date)
                            select (Model)x;
            return  results.ToList();
#else
            return  _cache.Cache.Select(x => (Model)x).ToList();
#endif
        }

        public async Task<Airport> GetAirportData(string airport_name)
        {
            if(_ports is null){
                _ports = await client.GetFromJsonAsync<Airport[]>("http://localhost:5082/sample/airports.json");
            }
            if(airport_name == null)
                throw new ArgumentNullException(nameof(airport_name));
            return _ports.Where(x => x.name.Contains(airport_name)).FirstOrDefault() ;
        }
    }
}
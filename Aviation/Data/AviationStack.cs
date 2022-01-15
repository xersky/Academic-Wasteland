using System;
using System.Collections.Generic;
using System.Text.Json;
using System.Linq;
using System.Threading.Tasks;
using System.Net.Http;

namespace Aviation.Data
{
    public class AviationStackService
    {
        private readonly string _accessKey = "{{API_KEY}}";
        private readonly HttpClient client = new HttpClient();

        public async Task<List<Model>> GetFlightsData(Filter filter)
        {
            var result = await client.GetAsync($"http://api.aviationstack.com/v1/flights?access_key={_accessKey}");
            var flightsresponse = await JsonSerializer.DeserializeAsync<Response>(await result.Content.ReadAsStreamAsync());
            return flightsresponse.data.Select(status => new Model
                {
                    departure = status?.departure?.scheduled,
                    arrival = status?.arrival?.scheduled,
                    airline = status?.airline?.name,
                    flight = status?.flight?.number,
                    flight_status = status?.flight_status,
                    arrival_airport = status?.arrival?.airport,
                    departure_airport = status?.departure?.airport,
                }).ToList();
        }

    }
}

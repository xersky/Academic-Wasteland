using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace Aviation.Data
{
    
    public class Response {
        public Pagination pagination { get; set; }
        public List<Root> data { get; set; }
    }

    public record Filter {
        public FlightStatus flight_status { get; set; } = FlightStatus.unknown;
        public DateTime? flight_date_start { get; set; }
        public DateTime? flight_date_end { get; set; }
        public string? departure { get; set; }
        public string? arrival { get; set; }
        public string? airline { get; set; }
        public string? flight { get; set; }

    }

}

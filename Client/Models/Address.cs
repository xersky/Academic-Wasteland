using System;

namespace Client2.Models
{
    public class AddressT
    {
        public int id {get; set;}
        public string city {get; set;}
        public string street {get; set;}
        public string zip {get; set;}

        public string toString => $"{city},{street}, {zip}";
    }
}


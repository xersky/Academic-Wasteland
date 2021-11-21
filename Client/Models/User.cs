using System;

namespace Client2.Models
{
    public enum State {
        Renter, Rentee
    }
    public class UserT
    {
        public int id {get; set;}
        public string email {get; set;}
        public bool enabled {get; set;}
        public bool locked {get; set;}
        public string firstName {get; set;}
        public string lastName {get; set;}
        public string gender {get; set;}
        public string password {get; set;}
        public State role  {get; set;}
    }
}

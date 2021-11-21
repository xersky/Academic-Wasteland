using System;

namespace Client2.Models
{
    public class AnnouncementT
    {
        public int id {get; set;}
        public int idOwner {get; set;}
        public double price {get; set;}
        public string type {get; set;}
        public HouseT house {get; set;}
        public int AvgRating {get; set;}
    }
}


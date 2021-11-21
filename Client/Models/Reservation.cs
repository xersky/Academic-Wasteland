using System;

namespace Client2.Models
{
    public class ReservationT
    {
        public int id {get; set;}
        public UserT owner {get; set;}
        public UserT[] users {get; set;}
        public DateTime createdAt {get; set;}
        public DateTime startPeriod {get; set;}
        public DateTime endPeriod {get; set;}
        public int announcementId {get; set;}
    }
}
using System;

namespace Client2.Models
{
    public class HouseT
    {
        public int id {get; set;}
        public int bathroomsC {get; set;}
        public int bedroomsC {get; set;}
        public string description {get; set;}
        public int number {get; set;}
        public int roomC {get; set;}
        public float surface {get; set;}
        public RuleT[] rules {get; set;}
        public PictureT[] pictures {get; set;}
        public AddressT address {get; set;}
    }
}
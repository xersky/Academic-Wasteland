﻿using System;
using System.Collections.Generic;
using System.Text;

namespace ElectroMundos.Shared
{
    public class Region : IHasIdentity<int>
    {
        private int id = -1;
        public int ID { 
            get => id;
            set => id = value; 
        }

        public string Label { get; set; }
    }
}

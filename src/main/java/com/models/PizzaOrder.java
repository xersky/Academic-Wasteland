package com.models;
import java.lang.StringBuilder;
import java.util.ArrayList;

public class PizzaOrder {
    
    private int count;
    private PizzaSize size;
    private Drinks drinks;
    private Dippings dippings;
    private Toppings toppings;

    public PizzaOrder(PizzaSize s, Toppings t, Dippings d, Drinks j, int c) {
        size = s; toppings = t; dippings = d; drinks = j; count = c;
    }

    public int getCount() {
        return count;
    }

    public PizzaSize getSize() {
        return size;
    }

    public Drinks getDrinks() {
        return drinks;
    }

    public Toppings getTopping() {
        return toppings;
    }

    public Dippings getDipping() {
        return this.dippings;
    }
    
    public double Cost() {
        return (size.getPrice() + drinks.getPrice() + toppings.getPrice() + dippings.getPrice()) * count;
    }

    public String toString() {
        StringBuilder finalPrint = (new StringBuilder())
                                    .append("Pizza Receipt :\n")
                                    .append("Toppings : ").append(toppings.getName()).append(" ").append(toppings.getPrice()).append("\n")
                                    .append("Dippings : ").append(dippings.getName()).append(" ").append(dippings.getPrice()).append("\n")
                                    .append("Drinks   : ").append(  drinks.getName()).append(" ").append(  drinks.getPrice()).append("\n")
                                    .append("Size     : ").append(    size.getName()).append(" ").append(    size.getPrice()).append("\n")
                                    .append("Count    : ").append(count ).append(" ").append("\n")
                                    .append("Total    : ").append(Cost()).append(" ").append("\n");
        return finalPrint.toString();
    }
}


package com.models;


public enum Drinks {

    EnergyDrink("Energy",1.25),
    NaturalDrink("Juice",3.95),
    CarbonateDrink("Coke",2.25);

    private String name;
    private Double price;
    
    private Drinks(String name, Double price){
        this.name = name;
        this.price = price;
    }

    public void setName(String name) {
        this.name = name;
    }

    public void setPrice(Double price) {
        this.price = price;
    }

    public String getName() {
        return name;
    }

    public Double getPrice() {
        return price;
    }

    @Override
    public String toString() {
        return getName() + " @ $" + getPrice();
    }
    
}

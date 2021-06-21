package com.models;

public class OrderBuilder {
    private int count;
    private PizzaSize size;
    private Drinks drinks;
    private Dippings dippings;
    private Toppings toppings;

    public OrderBuilder(){}

    public OrderBuilder(PizzaSize pizzaSize, int pizzaNum) {
        this.size = pizzaSize;
        this.count = pizzaNum;
    }


    public OrderBuilder Topping(Toppings topping) {
        this.toppings = topping;
        return this;
    }

    public OrderBuilder Size(PizzaSize size) {
        this.size = size;
        return this;
    }

    public OrderBuilder Drink(Drinks drinks) {
        this.drinks = drinks;
        return this;
    }

    public OrderBuilder Count(int pizzaNum) {
        this.count = pizzaNum;
        return this;
    }

    public OrderBuilder Dipping(Dippings dipping) {
        this.dippings = dipping;
        return this;
    }

    public PizzaOrder Build() throws Exception{
        if(size == null || toppings == null|| dippings == null || drinks == null || count < 1)
           throw new Exception("order invalid");
        return new PizzaOrder(size
                             ,toppings
                             ,dippings
                             ,drinks
                             ,count);
    }
}

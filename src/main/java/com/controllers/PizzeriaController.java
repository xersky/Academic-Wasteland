package com.controllers;

import java.net.URL;
import java.util.ArrayList;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.CheckBox;
import javafx.scene.control.Menu;
import javafx.scene.control.RadioButton;
import javafx.scene.control.TextArea;
import javafx.scene.control.TextField;
import com.models.*;

public class PizzeriaController implements Initializable {

    @FXML
    private Menu close, clear, about;
    @FXML
    private RadioButton small, medium, large;
    @FXML
    private RadioButton cheese, pepperoni, mushrooms, olives, tomato, bacon, onion;
    @FXML
    private RadioButton energyDrink, carbonisedDrink, naturalDrink;
    @FXML
    private TextField pizzaNum;
    @FXML
    private RadioButton ranch, garlic, marinara, bbq, hot, chipotle;
    @FXML
    private Button confirm, cancel, exit;
    @FXML
    private TextArea receipt;

    OrderBuilder order = new OrderBuilder();

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        pizzaNum.textProperty().addListener((observable, oldValue, newValue) -> {
            onCountChanged();
        });
    }

    @FXML
    public void confirm(ActionEvent event) {
        String receiptText = "";
        try {
            PizzaOrder result = order.Build();
            receiptText = result.toString();
        } catch (Exception e) {
            receiptText = e.getMessage();
        }
        receipt.setText(receiptText);
    }

    @FXML
    public void cancel(ActionEvent event) {
        receipt.setText("");
        small.setSelected(false);
        medium.setSelected(false);
        large.setSelected(false);
        cheese.setSelected(false);
        pepperoni.setSelected(false);
        olives.setSelected(false);
        mushrooms.setSelected(false);
        tomato.setSelected(false);
        bacon.setSelected(false);
        onion.setSelected(false);
        carbonisedDrink.setSelected(false);
        energyDrink.setSelected(false);
        naturalDrink.setSelected(false);
        ranch.setSelected(false);
        garlic.setSelected(false);
        bbq.setSelected(false);
        hot.setSelected(false);
        chipotle.setSelected(false);
        pizzaNum.setText("1");
    }

    @FXML
    private void exit(ActionEvent event) {
        System.exit(0);
    }

    public void onSizeChanged(ActionEvent event) {
        if (small.isSelected()) {
            order.Size(PizzaSize.SMALL);
        }
        if (medium.isSelected()) {
            order.Size(PizzaSize.MEDIUM);
        }
        if (large.isSelected()) {
            order.Size(PizzaSize.LARGE);
        }
        System.out.println("size changed");
    }

    public void onCountChanged() {
        int number = -1;
        try {
            number = Integer.parseInt(pizzaNum.getText().trim());
            order.Count(number);
            System.out.println("count changed");
        } catch (Exception ex) {
            ex.getMessage();
            order.Count(0);
        }
    }

    public void onDrinksChanged(ActionEvent event) {
        if (naturalDrink.isSelected()) {
            order.Drink(Drinks.NaturalDrink);
        }
        if (carbonisedDrink.isSelected()) {
            order.Drink(Drinks.CarbonateDrink);
        }
        if (energyDrink.isSelected()) {
            order.Drink(Drinks.EnergyDrink);
        }
        System.out.println("drinks changed");
    }

    public void onToppingsChanged(ActionEvent event) {
        if (cheese.isSelected()) {
            order.Topping(Toppings.CHEESE);
        }
        if (pepperoni.isSelected()) {
            order.Topping(Toppings.PEPPERONI);
        }
        if (mushrooms.isSelected()) {
            order.Topping(Toppings.MUSHROOMS);
        }
        if (olives.isSelected()) {
            order.Topping(Toppings.OLIVES);
        }
        if (tomato.isSelected()) {
            order.Topping(Toppings.TOMATO);
        }
        if (bacon.isSelected()) {
            order.Topping(Toppings.BACON);
        }
        if (onion.isSelected()) {
            order.Topping(Toppings.ONION);
        }
        System.out.println("topping changed");
    }

    public void onDippingsChanged() {
        if (ranch.isSelected()) {
            order.Dipping(Dippings.RANCH);
        }
        if (garlic.isSelected()) {
            order.Dipping(Dippings.GARLIC);
        }
        if (marinara.isSelected()) {
            order.Dipping(Dippings.MARINARA);
        }
        if (bbq.isSelected()) {
            order.Dipping(Dippings.BBQ);
        }
        if (hot.isSelected()) {
            order.Dipping(Dippings.HOT);
        }
        if (chipotle.isSelected()) {
            order.Dipping(Dippings.CHIPOTLE);
        }
        System.out.println("dipping changed");
    }
}

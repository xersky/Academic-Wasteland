package com.store;

import java.io.IOException;

import javafx.application.Application;
import javafx.fxml.*;
import javafx.scene.Scene;
import javafx.scene.layout.Pane;
import javafx.scene.text.Font;
import javafx.stage.Stage;

import com.controllers.PizzeriaController;
/**
 * JavaFX App
 */
public class App extends Application {

    @Override
    public void start(Stage stage) throws IOException {
        
        Pane root = FXMLLoader.load(getClass().getResource("/views/pizzeria.fxml"));
        Font.loadFont("file:resources.Fonts/BebasNeue-Regular.ttf", 120);
        Font.loadFont("file:resources.Fonts/OpenSans-Regular-Regular.ttf", 120);
        Font.loadFont("file:resources.Fonts/OdibeeSans-Regular.ttf", 120);
        Font.loadFont("file:resources.Fonts/Abel-Regular.ttf", 120);
        Scene sceneX = new Scene(root, 830, 350);
        stage.setMaximized(true);
        stage.setScene(sceneX);
        stage.setTitle("Pizzeria");
        stage.show();
    }

    public static void main(String[] args) {
        launch();
    }

}
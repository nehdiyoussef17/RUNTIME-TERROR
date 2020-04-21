/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.Desktop.controller;

import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.layout.AnchorPane;

/**
 * FXML Controller class
 *
 * @author mehdibehira
 */
public class BackendController implements Initializable {
    @FXML
    private Button meeting;

    @FXML
    private AnchorPane BackendPane;
    @FXML
    private Button BacklogAction;
    
    @FXML
    private Button TeamAction;
    @FXML
    private AnchorPane ContentPane;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        
        // TODO
             
    }    


    
       @FXML
    void abonnementAction(ActionEvent event) throws IOException {
  AnchorPane pane = FXMLLoader.load(getClass().getResource("/com/Desktop/gui/AfficherAbonnement.fxml"));
        ContentPane.getChildren().setAll(pane);
    }

    @FXML
    void promotionAction(ActionEvent event) throws IOException {
  AnchorPane pane = FXMLLoader.load(getClass().getResource("/com/Desktop/gui/AfficherPromo.fxml"));
        ContentPane.getChildren().setAll(pane);
    }

}

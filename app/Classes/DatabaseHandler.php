<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DatabaseHandler
 *
 * @author Power
 */

namespace App\Classes;

use App\Classes\CustomerAccount;
use App\Classes\Config;
use Illuminate\Support\Facades\Hash;

class DatabaseHandler{
    private $config;

    function __construct() {
        $this->config = new Config();
    }

    public function addCustomerAccount($account) {
        if(empty($account->getFirstName()) ||
        empty($account->getLastName()) ||
        empty($account->getEmailAddress()) ||
        empty($account->getUsername()) ||
        empty($account->getPassword())){
        return array(
            "status" => "failed",
            "message" => "Incomplete Fields"
            );
        }

        if(!$account->passwordMatches()){
            return array(
                "status" => "failed",
                "message" => "Passwords do not match"
            );
        }

        $query = "CALL checkUsername('".$account->getUsername()."')" or die(mysqli_error($this->config->getLink()));
        $result = mysqli_query($this->config->getLink(), $query);
        
        if(mysqli_num_rows($result) == 0){
            
            mysqli_next_result($this->config->getLink());

            $query = "CALL checkCustomerEmailAddress('".$account->getEmailAddress()."')" or die(mysqli_error($this->config->getLink()));
            $result = mysqli_query($this->config->getLink(), $query);
            
            if(mysqli_num_rows($result) == 0){

            mysqli_next_result($this->config->getLink());

            $query = "CALL addCustomerProfile('".$account->getFirstName()."', '".$account->getLastName()."', '".$account->getEmailAddress()."')" or die(mysqli_error($this->config->getLink()));

            $result = mysqli_query($this->config->getLink(), $query);

            if($result){
                $id = mysqli_fetch_assoc($result)['LAST_INSERT_ID()'];
                mysqli_next_result($this->config->getLink());

                $query = "CALL addCustomerAccount('".$account->getUsername()."', '".Hash::make($account->getPassword())."', '".$id."')" or die(mysqli_error($this->config->getLink()));
                $result = mysqli_query($this->config->getLink(), $query);

                if($result){
                    return array(
                        "status" => "success"
                    );
                } else {
                    return array(
                        "status" => "failed",
                        "message" => "Error creating account"
                    );
                }
            } else {
                return array(
                    "status" => "failed",
                    "message" => "Error creating account"
                );
            }
            } else {
                return array(
                    "status" => "failed",
                    "message" => "Email Address is already taken"
                );
            }
        } else {
            return array(
                    "status" => "failed",
                    "message" => "Username is already taken"
                );
        }
    }
}


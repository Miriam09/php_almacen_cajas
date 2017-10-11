<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users
 *
 * @author Miriam
 */
class Users {
    private $user;
    private $pass;
    private $admin = "NO";
    function __construct($user, $pass, $admin) {
        $this->user = $user;
        $this->admin= $admin;
        $this->pass = $pass;
    }
    
    function getUser() {
        return $this->user;
    }

    function getPass() {
        return $this->pass;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }
    function getAdmin() {
        return $this->admin;
    }

    function setAdmin($admin) {
        $this->admin = $admin;
    }



    
}

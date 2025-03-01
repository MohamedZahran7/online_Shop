<?php 

class Request {
    public function get($key){
        return ((isset($_GET[$key])))? $_GET[$key] :false;
    }

    public function post($key){
        return ((isset($_POST[$key])))? $_POST[$key] :false;
    }
    public function has($key) {
        return isset($_POST[$key]) || isset($_GET[$key]);
    }
    public function file($key){
        return ((isset($_FILES[$key])))? $_FILES[$key] :false;
    }

    public function hasRequest($key){
        return ((isset($key)))? true :false;
    }

    public function redirect($path){
        header ('location:'.$path);
    }
}
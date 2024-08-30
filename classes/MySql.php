<?php 

Class MySql{
    private $host = "localhost", $UserName = "root" , $Password = "",$db_Name ="online_shop";

    protected $Connection;

    public function __construct()
    {
       $this->Connection = mysqli_connect($this->host,$this->UserName,$this->Password,$this->db_Name);
    }
};



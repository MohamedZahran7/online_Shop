<?php 

require_once "MySql.php";

Class Product extends MySql{

    public function getAll(){

        $query = "SELECT * FROM products";
    
        $result = mysqli_query($this -> Connection, $query);

        $products = [];
        if(!empty($result)){
            $products = mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
        return $products;
    }

    public function getOne($id){

        $query = "SELECT * FROM products WHERE `id` = $id";
        $result = mysqli_query($this -> Connection ,$query);

        $products = [];

        if(!empty($result)){
            $products = mysqli_fetch_assoc($result);
        }

        return $products;
    }

    public function addProduct($name , $Description,$price,$img){
        $query  = "INSERT INTO products (`name`, `Description`, `price`, `img`) VALUES ('$name', '$Description', $price, '$img')";

        $result = mysqli_query($this->Connection,$query);

        if($result){
            return true;
        }
        return false;
    }


    public function updateProduct($name,$Description,$price,$img,$id){
        $query  = "UPDATE products SET `name` = '$name' , `Description` = '$Description' , `price` = '$price' , `img` = '$img' WHERE `id` = $id ";
        
        $result = mysqli_query($this->Connection ,$query);

        if($result){
            return true;
        }
        return false;
    }


    public function deleteProduct($id){
        $query  = "DELETE FROM products WHERE `id` = $id";
        $result = mysqli_query($this->Connection,$query);

        if($result){
            return true;
        }
        return false;
    }
}




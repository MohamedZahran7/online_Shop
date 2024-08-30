<?php
require_once '../App.php';
require_once '../classes/Product.php';

$product = new Product();

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    
    $result = $product->deleteProduct($id);
    
    if ($result) {
   
        $request->redirect("../index.php");
    } else {
        $request->redirect("../index.php?error=delete_failed");
    }
} else {
    $request->redirect("../index.php");
}

<?php 
require_once '../App.php';
require_once "../classes/Product.php";

$product = new Product();

$id = $request->get('id');

if ($request->hasRequest($request->post('submit'))) {

    $name = $request->post('name');
    $Description = $request->post('desc');
    $price = $request->post('price');
    
    if (isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {
        $img = new Img($_FILES['img']);
        $imageName = $img->new_name;
        $img->upload();
    } else {
    
        $existingProduct = $product->getOne($id);
        $imageName = $existingProduct['img'];
    }

    $result = $product->updateProduct($name, $Description, $price, $imageName, $id);

    if ($result) {
     
        $request->redirect("../index.php");
    } else {
    
        $request->redirect("../edit.php?id=$id&error=update_failed");
    }
} else {

    $request->redirect("../edit.php?id=$id");
}
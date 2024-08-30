<?php 
require_once '../App.php';


if ($request -> hasRequest($request ->post('submit'))){
    $name = $request ->post('name');
    $Description = $request ->post('desc');
    $price = $request ->post('price');
    $img = $request ->file('img');
    $img = new Img($img);
    $imageName = $img->new_name;

    $result = $product->addProduct($name,$Description,$price,$imageName);

    if ($result){
        $img -> upload();
        $request -> redirect("../index.php");
    }


}else{
    $request ->redirect("../index.php");
}
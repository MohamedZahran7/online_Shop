<?php 
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
include 'inc/header.php'; ?>


<?php require_once './App.php';

// $id = $_GET['id'];
$id = $request ->get("id");

$product = $product ->getOne($id);
?>




<div class="container my-5">

    <div class="row">

 
    <div class="col-lg-6">
            <img src="images/<?= $product['img'] ?>" class="card-img-top">
            </div>
            <div class="col-lg-6">
            <h5 ><?=$product['name']?></h5>
            <p class="text-muted">Price:<?=$product['price']?> EGP</p>
            <p><?=$product['Description']?></p>
            <a href="index.php" class="btn btn-primary">Back</a>
            <a href="edit.php?id=<?=$product['id']?>" class="btn btn-info">Edit</a>
            <a href="" class="btn btn-danger">Delete</a>
        </div>
        
    </div>
</div>



<?php include 'inc/footer.php'; ?>
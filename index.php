<?php 
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

include 'inc/header.php'; ?>

<?php require_once './App.php'; ?>

<?php 
$products = $product -> getAll();
?>

<div class="container my-5">

    <div class="row">
        


<?php foreach($products as $product){ ?>
    <div class="col-lg-4 mb-3">



            <div class="card">
            <img src="images/<?= $product['img']?>" class="card-img-top">
            <div class="card-body">
            <h5 class="card-title"><?= $product['name']?></h5>
            <p class="text-muted"><?= $product['price']?> EGP</p>
            <p class="card-text"><?= Str::limit($product['Description'])?></p>
            <a href="show.php?id=<?= $product['id']?>" class="btn btn-primary">Show</a>

            <a href="edit.php?id=<?=$product['id']?>" class="btn btn-info">Edit</a>
            <form action="handlers/handleDelete.php" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">
                <button type="submit" class="btn btn-danger" name="delete">Delete</button>
            </form>
            </div>
        </div>
        
    </div>

        <?php } ?>

            
    
    </div>

</div>



<?php include 'inc/footer.php'; ?>
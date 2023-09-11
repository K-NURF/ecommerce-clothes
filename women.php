<?php

require("connect.php");
// Get the 4 most recently added products
$stmt = $conn->prepare('SELECT * FROM `products` WHERE `category` = Women');
$stmt->execute();
// $recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->store_result();

?>

<?=template_header('Home')?>

<div class="featured">
    <h2>Women Fashion</h2>
    <p>Attires for Royals</p>
</div>
<div class="recentlyadded content-wrapper">
    <h2>Recently Added Products</h2>
    <div class="products">
        <?php foreach ($stmt as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <img src="imgs/<?=$product['image']?>" width="200" height="200" alt="<?=$product['name']?>">
            <span class="name"><?=$product['name']?></span>
            <span class="price">
                &dollar;<?=$product['price']?>
                
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<?=template_footer()?>
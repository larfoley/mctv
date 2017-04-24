<?php
session_start();
$pageTitle = "Products";

include_once $_SERVER["DOCUMENT_ROOT"] . '/../inc/header.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/../connection.php';
$product_type = $_GET["type"];

if ($product_type != "tv" && $product_type != "media_player" && $product_type != "accessory") {
  $product_type = "tv";
}

$sqlQuery = $conn->query("SELECT * FROM inventory WHERE type = \"{$product_type}\"");
$products = $sqlQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="page-header white padding-vertical x2 black-text">
  <div class="container">
    <h2 class="margin-none big-title">Products</h2>
  </div>
</div>
<nav class="prodoucts-nav">
  <div class="container">
    <ul>
      <li>
        <a <?php if($product_type == "tv") {echo 'class="active"';}; ?> href="/products.php?type=tv">
          Televisions
        </a>
      </li>
      <li>
        <a <?php if($product_type == "media_player") {echo 'class="active"';}; ?> href="/products.php?type=media_player">
          Media Players
        </a>
      </li>
      <li>
        <a <?php if($product_type == "accessory") {echo 'class="active"';}; ?> href="/products.php?type=accessory">
          Accessories
        </a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
  <div class="section">

    <div class="prodoucts">
      <?php

      if (count($products) > 0) {
        foreach ($products as $p) {

          ?><div class="prodouct" data-id="<?php echo $p["id"] ?>">
            <img class="prodouct__img" src="<?php echo $p["img_url"]; ?>" alt="">
            <h2 class="prodouct__name"><?php echo $p["name"]; ?></h2>
            <h4 class="prodouct__model"><?php echo $p["model"]; ?></h4>
            <br>
            <div class="prodouct__price">
              &euro;
              <?php echo + $p["retail_price"]; ?>
            </div>
            <br>
            <a href="/prodouct.php?id=<?php echo $p["id"] ?>" class="btn-primary">Find Out More</a>
          </div><?php }

        } else {
          echo "<h2>No products found.</h2>";
        }
       ?>
     </div>
  </div>
</div>

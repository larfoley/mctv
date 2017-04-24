<!DOCTYPE html>
<html>
  <head>
    <title>MCTV | <?php echo $pageTitle; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="description">
    <meta name="author" content="laurence foley">
    <link rel="stylesheet" href="https://cdn.rawgit.com/balzss/luxbar/ae5835e2/build/luxbar.min.css">
    <script src="https://use.fontawesome.com/e175f0cc50.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body>
    <script type="text/javascript">
      // Set initial state
      if (localStorage.getItem("shoppingCart") === null) {
        localStorage.setItem("shoppingCart", '[]');
      }

      if (localStorage.getItem("orderTotal") === null) {
        localStorage.setItem("orderTotal", '0');
      }

    </script>
    <div class="black">
      <div class="container u-text-right  white-text">
        <a class="cart white-text" href="/checkout.php">
          Shopping Cart
          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
          <span class="shopping-cart">0</span>
        </a>
      </div>
      <script type="text/javascript">
        (function() {
          var shoppingCart = document.querySelector('.shopping-cart');
          shoppingCart.innerHTML = JSON.parse(localStorage.getItem('shoppingCart')).length;
        }())
      </script>
      <style media="screen">
          .luxbar-brand img {
            position: relative;
            top: 2px;
            height: 50px;
            left: -25px;
          }
      </style>
    </div>
    <div class="luxbar luxbar-default">
      <input type="checkbox" id="luxbar-checkbox" class="luxbar-checkbox">
      <div class="luxbar-menu luxbar-menu-right">
        <div class="container">
          <ul class="luxbar-navigation">
            <li class="luxbar-header">
              <a class="luxbar-brand" href="/"><img src="https://raw.githubusercontent.com/SABGroupB/Software-Applications-for-Business-Group-B-Software-Solutions/master/Sprint%205/Logo/Final%20Logo%2060%20pixels.png" alt=""></a>
              <label class="luxbar-hamburger luxbar-hamburger-doublespin"
              for="luxbar-checkbox"> <span></span> </label>
            </li>
            <li class="luxbar-item dropdown"><a href="/products.php">Products</a>
              <ul>
                <li class="luxbar-item" ><a href="/products.php?type=tv">Televisions</a></li>
                <li class="luxbar-item" ><a href="/products.php?type=media_player">Media Players</a></li>
                <li class="luxbar-item" ><a href="/products.php?type=accessory">Accessories</a></li>
              </ul>
            </li>
            <li class="luxbar-item"><a href="/about.php">About</a></li>
            <li class="luxbar-item"><a href="/contact.php">Contact</a></li>
            <li class="luxbar-item"><a href="/faq.php">Faq's</a></li>
          </ul>
        </div>
      </div>
    </div>

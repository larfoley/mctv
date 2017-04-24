<?php include_once $_SERVER["DOCUMENT_ROOT"] . '/../inc/header.php'; ?>

  <div class="container">
    <div class="order white padding margin-vertical u-hidden">
      <h4>Order Total: &euro;<span class="order-total"></span></h4>
      <button class="" type="button" name="button">
        Proceed to Checkout
      </button>
    </div>
    <!-- <h2>Shopping Cart</h2> -->
    <ul class="checkout">
    </ul>
    <script src="/js/shopping-cart.js" charset="utf-8"></script>
    <script type="text/javascript">
    
      shoppingCart.renderCheckout();

    </script>
  </div>

var shoppingCart = (function() {
  
  var shoppingCartEl = document.querySelector('.shopping-cart');
  var checkoutEl = document.querySelector('.checkout');
  var orderTotalEl = document.querySelector('.order-total');

  function getShoppingCart() {
    return JSON.parse(localStorage.getItem("shoppingCart"));
  }

  function updateShoppingCart(cart) {
    localStorage.setItem("shoppingCart", JSON.stringify(cart))
  }

  function getOrderTotal() {
    return parseInt(JSON.parse(localStorage.getItem("orderTotal")));
  }

  function updateOrderTotal(order) {
    console.log("UPDATING ORDER", JSON.stringify(order));
    localStorage.setItem("orderTotal", JSON.stringify(order))
  }

  function deleteItem(id) {
    var cart = getShoppingCart();
    var productPrice = 0;

    cart.forEach(function(item, i) {
      if (item["id"] === id) {
        productPrice += item.price;
        cart.splice(i, 1)
      }
    })

    updateShoppingCart(cart);
    updateOrderTotal(getOrderTotal() - productPrice);
    renderCheckout();
    renderShoppingCart(cart.length);
  }

  function renderCheckout() {

    if (checkoutEl) {
      checkoutEl.innerHTML = "";
      var basket = getShoppingCart();

      if (orderTotalEl) {
        if (basket.length !== 0) {
          document.querySelector('.order').classList.remove('u-hidden');
        } else {
          document.querySelector('.order').classList.add('u-hidden');
        }
        orderTotalEl.innerHTML = getOrderTotal();
      }

      if (basket.length === 0) {
        checkoutEl.innerHTML = "<p>You have no items in your cart</p>";
        return;
      }
      basket.forEach(function(item) {
        var el = checkoutItem(item);
        el.onclick = function() {
          deleteItem(item.id)
        }
        checkoutEl.appendChild(el)
      })

    }

  }

  function renderShoppingCart(n) {
    shoppingCartEl.innerHTML = n;
  }

  var api = {

    addToCart: function(product) {
      console.log("adding item to shopping cart");
      var cart = getShoppingCart();

      // Check if item was already added to cart
      var itemAlreadyAdded = !!cart.filter(function(item) {
        if (item["id"] === product["id"]) {
          item["quantity"] = parseInt(item["quantity"]) + 1
          return item;
        }
      }).length

      if (!itemAlreadyAdded) {
        product.quantity = 1;
        cart.push(product);
      }

      console.log(getOrderTotal());
      updateOrderTotal(getOrderTotal() + parseInt(product.price))
      updateShoppingCart(cart);

      if (shoppingCartEl) {
        renderShoppingCart(cart.length);
        alert("Item has been added to your shopping cart")
      }
      if (checkoutEl) {
        renderCheckout();
      }
    },

    getCart: function() {
      return  getShoppingCart();
    },

    renderCheckout: renderCheckout,

  }

  function checkoutItem(item) {
    var div = document.createElement("div");
    div.className = "checkout-item";
    div.innerHTML = '' +
      '<div class="grid">' +
        '<div class="grid__col grid__col--1-of-5 ">' +
          '<img width="" src="' + item.img + '"/>' +
        '</div>' +
        '<div class="grid__col grid__col--4-of-5">' +
          '<h3 class="black-text" style="margin-top: 40px;">' + item.name + '</h3>' +
          '<div><span class=" u-bold">Price:</span> &euro;' + item.price + '</div><br>' +
          '<div><span class=" u-bold">Qunatity:</span> ' + item.quantity + '</div><br>' +
          '<div class="u-clearfix">' +
          '<button style="margin-bottom: 2em; float: right">Remove From Cart</button></div>' +
        '</div>' +
      '</div>';
    return div;
  }

  return api;

}())

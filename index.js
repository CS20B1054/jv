let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
function addToCart(itemName, itemPrice) {
  // Get the existing cart data from session storage
  var cart = JSON.parse(sessionStorage.getItem('cart')) || [];

  // Check if the item is already in the cart
  var itemIndex = -1;
  for (var i = 0; i < cart.length; i++) {
      if (cart[i].name === itemName) {
          itemIndex = i;
          break;
      }
  }

  // If the item is already in the cart, update its quantity and total price
  if (itemIndex >= 0) {
      cart[itemIndex].quantity++;
      cart[itemIndex].totalPrice = cart[itemIndex].quantity * itemPrice;
  }
  // Otherwise, add a new item to the cart
  else {
      var item = {
          name: itemName,
          price: itemPrice,
          quantity: 1,
          totalPrice: itemPrice
      };
      cart.push(item);
  }

  // Save the updated cart data to session storage
  sessionStorage.setItem('cart', JSON.stringify(cart));

  // Refresh the cart display
  updateCartDisplay();
}

// Function to remove an item from the cart
function removeFromCart(itemName) {
  // Get the existing cart data from session storage
  var cart = JSON.parse(sessionStorage.getItem('cart')) || [];

  // Loop through the cart and remove the item with the matching name
  for (var i = 0; i < cart.length; i++) {
      if (cart[i].name === itemName) {
          cart.splice(i, 1);
          break;
      }
  }

  // Save the updated cart data to session storage
  sessionStorage.setItem('cart', JSON.stringify(cart));

  // Refresh the cart display
  updateCartDisplay();
}

// Function to update the cart display
function updateCartDisplay() {
  // Get the cart data from session storage
  var cart = JSON.parse(sessionStorage.getItem('cart')) || [];

  // Update the cart display HTML
  var cartDisplay = document.getElementById('cart-display');
  cartDisplay.innerHTML = '';

  for (var i = 0; i < cart.length; i++) {
      var item = cart[i];

      // Create a new cart item element
      var cartItem = document.createElement('div');
      cartItem.className = 'cart-item';

      // Add the item name, quantity, and total price to the cart item element
      var nameSpan = document.createElement('span');
      nameSpan.className = 'name';
      nameSpan.innerHTML = item.name;
      cartItem.appendChild(nameSpan);

      var quantitySpan = document.createElement('span');
      quantitySpan.className = 'quantity';
      quantitySpan.innerHTML = item.quantity;
      cartItem.appendChild(quantitySpan);

      var priceSpan = document.createElement('span');
      priceSpan.className = 'price';
      priceSpan.innerHTML = '$' + item.totalPrice.toFixed(2);
      cartItem.appendChild(priceSpan);

      // Add a remove button to the cart item element
      var removeButton = document.createElement('button');
      removeButton.innerHTML = 'Remove';
      removeButton.onclick = (function(itemName) {
          return function() {
              removeFromCart(itemName);
          };
      })(item.name);
      cartItem.appendChild(removeButton);

      // Add the cart item element to the cart display
      cartDisplay.appendChild(cartItem);
    }

    // If the cart is empty, display a message
    if (cart.length === 0) {
        var emptyMessage = document.createElement('div');
        emptyMessage.className = 'empty-message';
        emptyMessage.innerHTML = 'Your cart is empty.';
        cartDisplay.appendChild(emptyMessage);
    }
}

// Function to clear the cart
function clearCart() {
    // Clear the cart data from session storage
    sessionStorage.removeItem('cart');

    // Refresh the cart display
    updateCartDisplay();
}

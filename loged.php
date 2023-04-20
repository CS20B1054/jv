<!DOCTYPE html>
<html>
    <head>
        <title>JV cycles</title>
        <link rel="icon" href="jv.png">
        

<style>
    * {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  
border-radius:50px;
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}
</style>    
</head>
<body>
  <?php
  session_start();
  $_SESSION["username"]==NULL?$_SESSION["username"]="buddy":$_SESSION["username"]
  ?>
  <nav style="display: flex;justify-content: space-between;background-color:darkslategrey;align-items: center;border-radius: 30px;overflow: hidden;">
            <a href="index.php"><img src="jv.png" alt="logo" style="height: 80px;width:160px;padding: 10px;"></a>
            
            <ul style="display: flex;justify-content:space-between;list-style: none;">
                <li> <a href=shop.php style="padding: 10px ;display: inline-block;color: orangered;font-size: 25px;text-decoration: none;font-family:verdana">Shop</a></li>
                <li> <a href=cart.html style="padding: 10px 40px;display: inline-block;color: orangered;font-size: 25px;text-decoration: none;font-family:verdana">Cart</a></li>
                <li> <a href=index.php style="padding: 10px ;display: inline-block;color: orangered;font-size: 25px;text-decoration: none;font-family:verdana">About</a></li>
            </ul><div style="display:flex;">
            </div>
          </nav>
    <!-- <nav style="display: flex;justify-content: space-between;background-color:darkslategrey;align-items: center;border-radius: 30px;overflow: hidden;">
    <a href="index.php"><img src="jv.png" alt="logo" style="height: 60px;width:120px;padding: 10px;"></a>        <ul style="display: flex;justify-content:space-between;list-style: none;">
            <li> <a href=shop.php style="padding: 10px ;display: inline-block;color: orangered;font-size: 25px;text-decoration: none;font-family:verdana">Shop</a></li>
            <li> <a href=cart.html style="padding: 10px 40px;display: inline-block;color: orangered;font-size: 25px;text-decoration: none;font-family:verdana">Cart</a></li>
            <li> <a href=index.php style="padding: 10px ;display: inline-block;color: orangered;font-size: 25px;text-decoration: none;font-family:verdana">About</a></li>
        </ul><div style="display:flex;">
        <a style="padding: 10px 20px;" href="signup.html"><button style="width: 100px;height: 40px;display: inline-block;border: none;border-radius: 20px;background-color:orangered;color: wheat;font-size: 18px;font-family:verdana" onclick="singup.html">singup</button></a>
        <p>|</p>
        <a style="padding: 10px 20px;" href="login.html"><button style="width: 100px;height: 40px;display: inline-block;border: none;border-radius: 20px;background-color:orangered;color: wheat;font-size: 18px;font-family:verdana" onclick="login.html">login</button></a>
</div>
      </nav> -->
    <h1 style="padding: 10px ;display: inline-block;color: orangered;font-size: 25px;text-decoration: none;font-family:verdana">hi,<?php
    echo $_SESSION['username'];
    ?>!!!</h1>
    <!-- Slideshow container -->
<div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">

      <img src="ban3.jpg" style="width:1000px;height:500px;border-radius:50px;">
    </div>
  
    <div class="mySlides fade">
      <img src="ban2.jpg" style="width:1000px;height:500px;border-radius:50px;">
    </div>
  
    <div class="mySlides fade">
      <img src="ban1.jpg" style="width:1000px;height:500px;border-radius:50px;" >
    </div>
  
    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>
  
  <!-- The dots/circles -->
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div>

  <h2 style="margin:2px;padding: 10px ;display: inline-block;color: black;font-size: 25px;text-decoration: none;font-family:verdana">Featured</h2>
  <p style="color:orangered;padding-left:10px;display:block;">___</p>
  <div style="display:block;">
  <?php
$db_host = "localhost:3307"; // database host name
$db_user = "root"; // database user name
$db_pass = ""; // database password
$db_name = "jv"; // database name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT name, image, price, size FROM featured";
$result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // output data of each row
//     while($result->fetch_assoc()) {
//         $row
//     }
// } else {
//     echo "0 results";
// }


if ($result->num_rows > 0) {
    // Loop through the products array and generate product tiles
    while ($product =$result->fetch_assoc()) {
        // Output the product tile HTML
        echo'<div style="display:inline-block;padding: 10px 10px;background-color: darkcyan;margin: 20px;border-radius:20px">';
        echo'<div style="background-color: cadetblue;display:flex;flex-direction: column;align-items: center;border-radius:20px; overflow:hidden">';
            echo'<img src='.$product["image"].' alt="image" style="height:100px;width: 200px;">';
            echo'<p style="display: inline;margin:2px;color: white;font-size: 25px;text-decoration: none;font-family:verdana">'.$product["name"].'</p>';
            echo'<p style="display: inline;margin:2px;color: white;font-size: 15px;text-decoration: none;font-family:verdana"> $'.$product["price"].'</p>';
            echo '<button style="margin:10px;width: 150px;height: 40px;display: inline-block;border: none;border-radius: 20px;background-color:orangered;color: wheat;font-size: 18px;font-family:verdana" onclick="addToCart(\''.$product["name"].'\', '.$product["price"].')">add to cart</button>';

        echo'</div>';
echo'</div>';
    }
} else {
    // Handle the case where $products is not an array
    echo 'No products to display.';
}
?>
</div>
  
  
  
  <footer style=" display: flex;justify-content: space-between;background-color:darkslategrey;align-items: center;border-radius: 30px;overflow: hidden;flex-direction: column;">
        <p>&copy; 2023 all rights reserved </p>
    </footer>
    <script src="index.js"></script>
    <script >function addToCart(itemName, itemPrice) {
  // Get the existing cart data from session storage
  alert("added it to cart you can order it from cart");
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
  
}
</script>
  
  </body>

</html>

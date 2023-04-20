<!DOCTYPE html>
<html>
    <body>
    <nav style="display: flex;justify-content: space-between;background-color:darkslategrey;align-items: center;border-radius: 30px;overflow: hidden;">
        <a href="index.php"><img src="jv.png" alt="logo" style="height: 60px;width:120px;padding: 10px;"></a>
        <ul style="display: flex;justify-content:space-between;list-style: none;">
            <li> <a href=shop.php style="padding: 10px ;display: inline-block;color: orangered;font-size: 25px;text-decoration: none;font-family:verdana">Shop</a></li>
            <li> <a href=cart.html style="padding: 10px 40px;display: inline-block;color: orangered;font-size: 25px;text-decoration: none;font-family:verdana">Cart</a></li>
            <li> <a href=index.php style="padding: 10px ;display: inline-block;color: orangered;font-size: 25px;text-decoration: none;font-family:verdana">About</a></li>
        </ul><div style="display:flex;">
        <a style="padding: 10px 20px;" href="signup.html"><button style="width: 100px;height: 40px;display: inline-block;border: none;border-radius: 20px;background-color:orangered;color: wheat;font-size: 18px;font-family:verdana" onclick="singup.html">signup</button></a>
        <p>|</p>
        <a style="padding: 10px 20px;" href="login.html"><button style="width: 100px;height: 40px;display: inline-block;border: none;border-radius: 20px;background-color:orangered;color: wheat;font-size: 18px;font-family:verdana" onclick="login.html">login</button></a>
</div>
      </nav>


        <?php
$db_host = "localhost:3307"; // database host name
$db_user = "root"; // database user name
$db_pass = ""; // database password
$db_name = "jv"; // database name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT name, image, price, size ,type FROM product";
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


        <footer style=" display: flex;justify-content: space-between;background-color:darkslategrey;align-items: center;border-radius: 30px;overflow: hidden;flex-direction: column;">
            <p>&copy; 2023 all rights reserved </p>
        </footer>
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
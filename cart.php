<?php
session_start();

include('include-files/header.php');


// Check if the cart array is not initialized, initialize it
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}

// add an item to the cart
function addToCart($id, $title, $price)
{
  $item = array('id' => $id, 'title' => $title, 'price' => $price, 'quantity' => 1); // Set quantity to 1
  $_SESSION['cart'][] = $item;
}

// Remove an item from the cart
function removeFromCart($id)
{
  foreach ($_SESSION['cart'] as $key => $item) {
    if ($item['id'] == $id) {
      unset($_SESSION['cart'][$key]);
      break;
    }
  }
}

// Update quantity
function updateQuantity($id, $quantity)
{
  foreach ($_SESSION['cart'] as &$item) {
    if ($item['id'] == $id) {
      $item['quantity'] = $quantity;
      break;
    }
  }
}

function calculateTotal()
{
  $total = 0;
  foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
  }
  return $total;
}

if (isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_POST['id'])) {
  removeFromCart($_POST['id']);
} elseif (isset($_POST['action']) && $_POST['action'] == 'update' && isset($_POST['id']) && isset($_POST['quantity'])) {
  updateQuantity($_POST['id'], $_POST['quantity']);
} elseif (isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['id']) && isset($_GET['title']) && isset($_GET['price'])) {
  addToCart($_GET['id'], $_GET['title'], $_GET['price']);
}

// Set session variable for total amount
if (!empty($_SESSION['cart'])) {
  $_SESSION['total_amount'] = calculateTotal();
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
<script>
    document.addEventListener('DOMContentLoaded', function () {
      
      var removeButtons = document.querySelectorAll('.btn-remove');
      removeButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
          
          var confirmRemove = confirm('Are you sure you want to remove this item?');
          if (confirmRemove) {
            
            var form = button.parentElement;
            form.submit();
          } else {
            
            event.preventDefault();
          }
        });
      });
    });
  </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
  <style>
    * {
      margin: 0 0;
      padding: 0 0;
      font-family: "Poppins", sans-serif;
      text-decoration: none;
      list-style: none;
    }

  

    h2 {
      color: #333;
    }

    table {
      width: 900px;
      border-collapse: collapse;
      margin-top: 20px;
      margin-bottom: 1.3rem;
      background-color: #ddd;
    }

    .cart{

  margin-top: 2rem;
      width: 100%;
      display: flex;
      justify-content: center;
      flex-direction: column;
      align-items: center;
      margin-bottom: 10rem;

    }

    

    th,
    td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
      font-size: 1rem;
    }

    th {
      background-color: #f2f2f2;
    }

    .cart-actions {
      margin-top: 10px;
    }

    .btn-a {
      background-color: #4CAF50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 1rem;
      font-weight:600;
    }

    .btn-remove {
      background-color: #f44336;
    }
   
    .total{
      margin-bottom: 1.5rem;
      font-size: 1.5rem;
      font-weight:600;
    }
    a:hover {
    color: black;
  }
  </style>
</head>

<body>

  <?php
  // Display items in the cart
  if (!empty($_SESSION['cart'])) {
  ?>
  <div class="cart">
  <h2>Shopping Cart</h2>
    <table>
      <thead>
        <tr>
          <th>Item</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($_SESSION['cart'] as $item) {
        ?>
          <tr>
            <td><?php echo $item['title']; ?></td>
            <td>Rs.<?php echo $item['price']; ?></td>
            <td>
              <form method="post" action="cart.php">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1">
                <button style="background-color: #333; color:whitesmoke; font-weight:600; margin:0 0 0 1rem; border-radius:5px; padding:8px 12px;"  type="submit">Update Qty</button>
              </form>
            </td>
            <td>Rs.<?php echo $item['price'] * $item['quantity']; ?></td>
            <td class="cart-actions">
              <form method="post" action="cart.php?action=remove">
                <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                <button type="submit" class="btn-a btn-remove">Remove</button>
              </form>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <p class="total">Total: Rs.<?php echo calculateTotal(); ?></p>
    <form method="post" action="checkout.php">
      <a class="btn-a"  href="<?php echo URL; ?>food-order.php" >Proceed to Checkout</a>
      
    </form>
    </div>
   

  <?php
  } else {
    echo '<p style="display:flex;justify-content:center;text-align:center; color:red;padding:1rem;font-size:2rem;margin-top:2rem; width:100%">Your cart is empty.</p>';
  }
  ?>

</body>
<?php
include('include-files/footer.php');
?>

</html>




<?php
require_once 'config_crud.php';
$sql = "SELECT * FROM tblcard WHERE Type='offer'";

$allproduct = $con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/offer.css">
  <title>Offer</title>
</head>

<body>
  <header>

    <div class="navbar">

      <div class="dropdown">
        <button class="dropbtn"><a href="home2.php"
            style="font-size: 18px; font-weight: bold; background-color: white; color: gray;">HOME</a>
          <i class="fa fa-caret-down"></i>
        </button>
      </div>

      <div class="dropdown">
        <button class="dropbtn"><a href=""
            style="font-size: 18px; font-weight: bold; background-color: white; color: gray;">Product</a>
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="catProduct.php">Cat product</a>
          <a href="dogProduct.php">Dog product</a>
          <a href="rabbitProduct.php">Rabbit product</a>
        </div>
      </div>

      <div class="dropdown">
        <button class="dropbtn"><a href=""
            style="font-size: 18px; font-weight: bold; background-color: white; color: gray;">Adoption</a>
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="catAdopt.php">Cat adoption</a>
          <a href="dogAdopt.php">Dog adoption</a>
          <a href="rabbitAdopt.php">Rabbit adoption</a>
        </div>
      </div>

      <div class="dropdown">
        <button class="dropbtn"><a href=""
            style="font-size: 18px; font-weight: bold; background-color: white; color: gray;">More</a>
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="petsitters.php">Pet Sitter</a>
          <a href="offer.php">Offer Section</a>
        </div>
      </div>

      <div class="mm">
        <img src="images/logo.jpg">
        <h2>PET-CORNER</h2>
      </div>

    </div>
  </header>


  <!--section 1-->


  <!--section3-->
  <section class="section3" style="z-index: 9999; margin-bottom: 0;">

    <h1 style="margin-left: 600px;">Items with Discount</h1>
    <br>


    <div class="product" style="margin-left: 150px; background-color: rgb(202, 198, 135);">

      <?php
      while ($row = mysqli_fetch_assoc($allproduct)) {
        ?>
        <form action="managecart.php" method="POST">
          <div class="productBox">
            <?php echo "<img src='" . $row['Image'] . "'>"; ?>

            <p>
              <?php echo $row["Name"]; ?>
            </p>
            <p><span> <?php echo $row["Previous_Price"]; ?></span>  <?php echo $row["Price"]; ?></p>
            <a href="comment_<?php echo $row["Name"]; ?>.php" style="text-decoration: none; color: magenta; font-weight: bold;">Reviews</a>
            <br>
            <button type="submit" name="addtocart" class="btn btn-info">Add To Cart</button>
            <input type="hidden" name="Item_name" value="<?php echo $row["Name"]; ?>">

            <input type="hidden" name="Price" value="<?php echo $row["Price"]; ?>">

          </div>
        </form>

        <?php
      }
      ?>
    </div>
  </section>

  <!--footer sec-->

  <footer>
    <div class="foot">
      <p>If you have any question, please contact us at</p>
      <h4 style="color: orange; font-size: 16px; font-weight: lighter;">petcorner@gmail.com</h4>
      <div class="iconArea">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
      </div>
    </div>
    <div class="foot">
      <ul>
        <li style="font-weight: bold; font-size: larger;">Corporate</li>
        <li>Careers</li>
        <li>About Us</li>
        <li>Contact Us</li>
        <li>FAQs</li>
        <li>Vendors</li>
        <li>Affiliate Program</li>
      </ul>
    </div>
    <div class="foot">
      <ul>
        <li style="font-weight: bold; font-size: larger;">Information</li>
        <li>Online Store</li>
        <li>Privacy Policy</li>
        <li>Refund Policy</li>
        <li>Shipping Policy</li>
        <li>Terms of Services</li>
        <li>Track Order</li>
      </ul>
    </div>
    <div class="foot">
      <ul>
        <li style="font-weight: bold; font-size: larger;">Services</li>
        <li>Grooming</li>
        <li>Positive Dog Training</li>
        <li>Veterinary Services</li>
        <li>Pecto Insurance</li>
        <li>Pet Adoption</li>
        <li>Resource Center</li>
      </ul>
    </div>
  </footer>
</body>

</html>
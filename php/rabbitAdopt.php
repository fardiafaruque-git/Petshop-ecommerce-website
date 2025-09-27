<?php
session_start();

require_once 'config_crud.php';
$sql = "SELECT * FROM tblcard WHERE Type='rabbitadopt'";

$allproduct = $con->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/rabbitAdopt.css">
    <title>rabbit Adoption</title>
    <style>
        a {
            color: black;
            /* Link text color */
            text-decoration: none;
            /* Remove underline */
        }

        a:hover {
            text-decoration: underline;
            /* Add underline on hover */
        }
    </style>
</head>

<body>
<header>

<div class="navbar">		
    
    <div class="dropdown">
      <button class="dropbtn"><a  href="home2.php" style="font-size: 18px; font-weight: bold; background-color: white; color: gray;">HOME</a>
        <i class="fa fa-caret-down"></i>
      </button>
    </div>

    <div class="dropdown">
      <button class="dropbtn"><a  href="" style="font-size: 18px; font-weight: bold; background-color: white; color: gray;">Product</a>
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">			
        <a href="catProduct.php">Cat product</a>	
        <a href="dogProduct.php">Dog product</a>
        <a href="rabbitProduct.php">Rabbit product</a>
      </div>
    </div>

    <div class="dropdown">
      <button class="dropbtn"><a  href="" style="font-size: 18px; font-weight: bold; background-color: white; color: gray;">Adoption</a>
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">			
      <a href="catAdopt.php">Cat adoption</a>
        <a href="dogAdopt.php" >Dog adoption</a>
        <a href="rabbitAdopt.php" >Rabbit adoption</a>
      </div>
    </div>

    <div class="dropdown">
      <button class="dropbtn"><a  href="" style="font-size: 18px; font-weight: bold; background-color: white; color: gray;">More</a>
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">			
      <a href="petsitters.php">Pet Sitter</a>
      <a href="offer.php" >Offer Section</a>
      </div>
    </div>

    <div class="mm">
        <img src="images/logo.jpg">
        <h2>PET-CORNER</h2>
    </div>      

</div>        
</header>
    <section class="section1">

        <div class="aboutBox">
            <h1>Rabbit & Bunnies</h1>
            <h4>Rabbits make wonderful companions for individuals and families alike.
                They are intelligent, social animals that can form strong bonds with their human caregivers.
                With their adorable floppy ears and playful personalities, rabbits bring joy and love into our lives.
                We are dedicated to finding loving and forever homes for rabbits in need. Our mission is to promote
                rabbit welfare,
                educate the public about responsible rabbit ownership, and facilitate successful adoptions.</h4>
        </div>
        <div class="aboutBox">
            <img src="img/rabbitAdopt.jpg" alt="">
        </div>
    </section>

    <section class="section2">
        <div class="text2">
            <h1>Available Rabbit & Bunnies</h1>
        </div>

        <div class="product">
        <?php
      while ($row = mysqli_fetch_assoc($allproduct)) {
        ?>
            <form action="managecart.php" method="POST">
                <div class="container">
                    <div class="card"><?php echo "<img src='" . $row['Image'] . "'>"; ?>
                        <div class="overlay">
                            <div class="items head">
                                <p><?php echo $row["Name"]; ?></p>
                                <hr>
                            </div>
                            <div class="items price">
                                <p>Age: 5 months to 1 Year<br><br><br>Size:
                                    Medium<br><br><br>Vaccinated,Neutered<br><br><br>Adoption Fee:<?php echo $row["Price"]; ?> Tk
                                </p>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="addtocart" class="btn btn-info">Add To Cart</button>
            <input type="hidden" name="Item_name" value="<?php echo $row["Name"]; ?>">

            <input type="hidden" name="Price" value="<?php echo $row["Price"]; ?>">
                </div>
            </form>
            <?php
      }
      ?>
      

        </div>
        <div class="footer">
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
                <li style="font-weight: bold; font-size: larger;"
                >Services</li>
                <li>Grooming</li>
                <li>Positive Dog Training</li>
                <li>Veterinary Services</li>
                <li>Pecto Insurance</li>
                <li>Pet Adoption</li>
                <li>Resource Center</li>
            </ul>
        </div>
    </div>
    </section>

</html>
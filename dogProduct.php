<?php
session_start();

require_once 'config_crud.php';
$sql1 = "SELECT * FROM tblcard WHERE Type='dogfood'";
$sql2 = "SELECT * FROM tblcard WHERE Type='dogtoy'";
$allproduct1 = $con->query($sql1);
$allproduct2 = $con->query($sql2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/page2.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="js/page2.js" defer></script>
    <title>Dog_section</title>
</head>
<body>
    <!--header-->
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

    <!--section one-->
    <section class="wow flipInX section1">
        <div class="image">
            <img src="images/d.jpg" width="600px" height="500px">
        </div>
        <div class="para">
            <ul>
                <li>Clearance sale </li>
                <li>Dog Food </li>
                <li>Dog Toys</li>
                <li>Dog Care & Health</li>
            </ul>
            <br>
            <p>With the latest dog supplies and accessories, including beds, bowls, and litter boxes, Pet-Corner makes shopping simple. From puppy to adult dogs, you’ll find everything your
                 pet needs.</p>
        </div>
        
    </section>



    
      


    <!--second section-->
    <section class=" section2">
        <div class="text2">
            <h2 id="df"><span>Dog </span>Food</h2>            
        </div>
        <div class="product">
        <?php
            while ($row = mysqli_fetch_assoc($allproduct1)) {
                ?>
            <form action="managecart.php" method="POST">
                <div class="productBox">
                <?php echo "<img src='" . $row['Image'] . "'>"; ?>
                    <p><?php echo $row["Name"]; ?></p>
                    <a href=""  style="text-decoration: none; "> <?php echo $row["Price"]; ?> Tk</a>
                    <br>
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


     <!--third section-->
     <section class=" section3" >
        <div class="text3">
            <h2 id="dt"><span>Dog </span>Toys</h2>             
        </div>

        <div class="product">
        <?php
            while ($row = mysqli_fetch_assoc($allproduct2)) {
                ?>
            <form action="managecart.php" method="POST">
                <div class="productBox">
                <?php echo "<img src='" . $row['Image'] . "'>"; ?>
                    <p><?php echo $row["Name"]; ?></p>
                    <a href=""  style="text-decoration: none; "> <?php echo $row["Price"]; ?> Tk</a>
                    <br>
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
    <!--third sec end-->



    <section class="section4">
        <div class="text4"> 
            <h2 id="dch"><span>Dog Care</span> & Health</h2>          
         </div>

        <div class="ban" style="background-image: url('images/blue\ \(1\).jpg'); width: 100%; height: 600px; padding-bottom: 0px;">
            <div class="wow bounceInDown dv1">
                
                <p><span><img src="images/mini/Icons-04.webp" alt=""></span> <span>Dog Care Tips For Pet Parents:</span><br>
                 </p>

                 <ul>
                    <li>Monitor food consumption.</li>
                    <li>Provide sufficient water throughout the day.</li>
                    <li>Regularly groom your dog.</li>
                    <li>Schedule annual check-ups with your vet.</li>
                    <li>Maintain proper vaccinations.</li>
                    <li>Look for solutions for flea, tick and heartworm prevention.</li>
                 </ul>
            </div >
            <div class="wow bounceInRight dv2">
                <img src="images/d_bann.jpg">
            </div>
        </div>
    </section>

    <!--footer sec-->

    <footer>
        <div class="foot">
            <p>If you have any question, please contact us at</p>
            <h4 style="color: orange; font-size: 16px; font-weight: lighter;">petcorner@gmail.com</h4>
            <div class="iconArea" style="padding-left: 25px;">
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
    </footer>

    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
<?php
session_start();

require_once 'config_crud.php';
$sql1 = "SELECT * FROM tblcard WHERE Type='rabbitfood'";
$sql2 = "SELECT * FROM tblcard WHERE Type='rabbittoy'";
$allproduct1 = $con->query($sql1);
$allproduct2 = $con->query($sql2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/page3.css">
    <title>Rabbit section</title>
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
    <section class=" section1"  >
        <div class="wow slideInRight para">
            <ul>
                <li>Clearance sale </li>
                <li>Rabbit Food </li>
                <li>Rabbit Toys</li>                
                <li>Rabbit Care & Health</li>
            </ul>
            <br>
            <p>With the latest rabbitt supplies and accessories, including beds, bowls, and litter boxes, Pet-Corner makes shopping simple. From bunnies to adult rabbit, you’ll find everything your
                 pet needs.</p>
        </div>
        <div class="img">
            <div class="img1">
                <img src="images/mini/rb.jpg" style="width: 300px; height: 300px;">
            </div>
            <div class="img2">
                <img src="images/mini/rb1.jpg" style="width: 300px; height: 300px;">
                <br><br><br>
                <img src="images/mini/rb2.jpg" style="width: 300px; height: 300px;">
            </div>           
            
        </div>
    </section>


    <!--section2-->
    <section class="section2">

       
      

        <!-- div2 -->
        <div class="naam">
            <div class="food">
                <div class="text2">                    
                    
                    <h2 id="rf"><span>Rabbit</span> Food</h2> 
                </div>
                
                <div class="product">
            <?php
            while ($row = mysqli_fetch_assoc($allproduct1)) {
                ?>
                <form action="managecart.php" method="POST">
                    <div class="productBox">
                        <?php echo "<img src='" . $row['Image'] . "'>"; ?>
                        <p>
                            <?php echo $row["Name"]; ?>
                        </p>
                        <a href="" style="text-decoration: none;">
                            <?php echo $row["Price"]; ?> Tk
                        </a>
                        <br>
                        <a href="comment_<?php echo $row["Name"]; ?>.php"
                            style="text-decoration: none; color: magenta; font-weight: bold;">Reviews</a>
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
                                         
            </div>

            <!--div2 er part2-->

            <div class="toy">
                <div class="text2">
                    
                    <h2 id="rt"><span>Rabbit</span> Toys</h2> 
                </div>
        
                <div class="product">
        <?php
            while ($row = mysqli_fetch_assoc($allproduct2)) {
                ?>
            <form action="managecart.php" method="POST">
                <div class="productBox">
                <?php echo "<img src='" . $row['Image'] . "'>"; ?>
                    <p><?php echo $row["Name"]; ?></p>
                    <a href="" style="text-decoration: none; "> <?php echo $row["Price"]; ?> Tk</a>
                    <br>
                    <a href="comment_<?php echo $row["Name"]; ?>.php"
                        style="text-decoration: none; color: magenta; font-weight: bold;">Reviews</a>
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
            </div>
        </div>        
    </section>


    <!--section_3-->
    <section class="section3">
        <div class="text3">            
           <h2 id="rch"><span>Rabbit Care</span> & Health</h2> 
        </div>

        <div class="main">
            <div class="cls1">
                <div class="col1">
                    <p><span>Rabbit Health Guide:</span><br>
                     Rabbits can make wonderful companions when kept correctly. Rabbits are often a greatly misunderstood animal. They require significant time and investment to keep correctly. However, watching healthy, happy rabbits playing and having fun is a delight.</p>
                </div>
    
                <div class="col2">    
                    <div class="image" style="background-image: url('images/mini/rc3.jpg');" ></div>
                    <div class="content">
                        <img src="images/mini/Icons_Rabbit.webp" alt="Housing" >
                        <h4 class="text-white">Housing</h4>
                        <span class="dots"></span>
                        <p>Your rabbits need lots of room in their housing to eat, sleep and, of course, play.</p>
                    </div>
                
                </div>
            </div>


            <div class="cls2">
                <div class="co1">
                    <div class="image" style="background-image: url('images/mini/rc.jpg') "; ></div>
                    <div class="content">
                        <img src="images/mini/Icons-04.webp" alt="Health" >
                        <h4 class="text-white">Health</h4>
                        <span class="dots"></span>
                        <p>It's important to know what to look out for when it comes to your rabbit's health.</p>
                    </div>
                </div>
    
                <div class="co2">    
                    <div class="image" style="background-image: url('images/mini/rt1.jpg'); " ></div>
                    <div class="content">
                        <img src="images/mini/Icons-05.webp" alt="Behaviour" >
                        <h4 class="text-white">Behaviour</h4>
                        <span class="dots"></span>
                        <p>Understanding your rabbits' behaviours can help you have a long, happy life together.</p>
                    </div>
                
                </div>

                <div class="co3">    
                    <div class="image" style="background-image: url('images/mini/rb\ \(1\).jpg'); " ></div>
                    <div class="content">
                        <img src="images/mini/Icons-03.webp" alt="Rabbit Companionship" >
                        <h4 class="text-white">Rabbit Companionship</h4>
                        <span class="dots"></span>
                        <p>Rabbits need to be be kept in pairs or groups to help keep them happy!</p>
                    </div>
                
                </div>
            </div>
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
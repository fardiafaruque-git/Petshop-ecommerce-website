<?php
session_start();

require_once 'config_crud.php';
$sql1 = "SELECT * FROM tblcard WHERE Type='catfood'";
$sql2 = "SELECT * FROM tblcard WHERE Type='cattoy'";
$allproduct1 = $con->query($sql1);
$allproduct2 = $con->query($sql2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/page1.css">
    <title>cat_section</title>
</head>

<body>

    <!--header-->
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
    <!--section one-->
    <section class="section1" data-wow-duration="2s">
        <div class="wow bounceInDown  para">
            <ul>
                <li>Clearance sale </li>
                <li>Cat Food </li>
                <li>Cat Toys</li>
                <li>Cat Care & Health</li>
            </ul>
            <br><br><br>
            <p>With the latest cat supplies and accessories, including beds, bowls, and litter boxes, Pet-Corner makes
                shopping simple. From kittens to adult cats, you’ll find everything your
                pet needs.</p>
        </div>
        <div class="wow bounceInRight img">
            <img src="images/cwall.jpg">

        </div>
    </section>




    <!--second section-->
    <section class=" section2">
        <div class="text2">
            <h2><span>Cat</span> Food</h2>

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
    </section>



    <!--third section-->
    <section class="section3">
        <div class="text3">
            <h2 id="ct"><span>Cat</span> Toys</h2>
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
    </section>
    <!--third sec end-->


    <section class="section4">
        <div class="text4">
            <h2 id="cch"><span>Cat Care</span> & Health</h2>

        </div>

        <div class="ban" style="background-image: url('images/cta-bg.jpg'); width: 100%; height: 500px; ">
            <div class="dv1">
                <img src="images/cta-banner.png">
            </div>

            <div class="dv2">
                <p><span><img src="images/mini/Icons-04.webp" alt=""></span> <span>Cat Care Tips For Pet
                        Parents:</span><br>
                </p>

                <ul>
                    <li>Groom your cat regularly.</li>
                    <li>Provide fresh water 24/7.</li>
                    <li>Make sure your cat always has a place to potty.</li>
                    <li>Keep the litter box clean ·</li>
                    <li>Maintain proper vaccinations.</li>
                    <li>Train your cat to use a scratching post.</li>
                </ul>
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

    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
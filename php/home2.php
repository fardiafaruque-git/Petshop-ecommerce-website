<?php
session_start();

require_once 'config_crud.php';
$sql = "SELECT * FROM tblcard WHERE Type='imported'";

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

    <link rel="stylesheet" href="css/home.css">
    <title>IP_project</title>
</head>

<body>
    <!--Header Start-->
    <header>
        <div class="logo">
            <img src="images/logo.jpg" alt="Petshop">
            <a href="#" style="color: rgb(219, 63, 16);">PET-CORNER</a>
        </div>
        <div class="nav">
            <ul>
                <li><a href="#" style="color: #7f97ff;">Home</a></li>
                <li><a href="About_Us.php">About</a></li>
                <li><a href="comment.php">Reviews</a></li>
                <li><a href="Contact_Us.php">Contact</a></li>
                <li><a href="login.php">
                        <?php echo "" . $_SESSION['username'] ?>
                    </a></li>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="adminPanal.php">Admin</a></li>
                <li><a href="mycart.php">My Cart</a></li>

            </ul>
        </div>
        <div>

        </div>
    </header>
    <!--Header End-->

    <!--First section-->
    <section class="section1" style="background-image: url('images/fbanner.jpg'); 
        background-size:cover;    padding-top:100px;">

        <div class="text1">
            <h3>HIGH QUALITY</h3>
            <h1>PET ACCESSORIES</h1>
           
        </div>

    </section>

    <!--Second section-->
    <section class="section2">
        <div class="text2">
            <h1>Top categories</h1>
        </div>

        <div class="img">
            <div class="column">
                <figure>
                    <img src="images/mini/category-1.jpg">
                </figure>
                <h3><button onclick="goToLink1()">
                        <h3>Cat Food</h3>
                    </button></h3>
            </div>
            <div class="column">
                <figure>
                    <img src="images/mini/category-2.jpg">
                </figure>
                <h3><button onclick="goToLink1()">
                        <h3>Cat Toys</h3>
                    </button></h3>
            </div>
            <div class="column">
                <figure>
                    <img src="images/mini/category-3.jpg">
                </figure>
                <h3><button onclick="goToLink2()">
                        <h3>Dog Food</h3>
                    </button></h3>
            </div>
            <div class="column">
                <figure>
                    <img src="images/mini/category-4.jpg">
                </figure>
                <h3><button onclick="goToLink2()">
                        <h3>Dog Toys</h3>
                    </button></h3>
            </div>
            <div class="column">
                <figure>
                    <img src="images/mini/category-5.jpg">
                </figure>
                <h3><button onclick="goToLink3()">
                        <h3>Rabbit Food</h3>
                    </button></h3>
            </div>
        </div>
    </section>

    <br>

    <!--third section-->
    <section class="section3">
        <div class="text3">
            <h1>Pet Adoption</h1>
        </div>

        <div class="pic">
            <h3>Dog and Puppies</h3>
            <p style="color: blue;"> There are more than 13000 dogs and puppies that are ready for adoption in our
                website. Find your perfect pet here by visiting the dogs and puppies that are for sale.</p>
            <a href="dogAdopt.php"><img src="images/mini/rsz_pt1.jpg"></a>
        </div>

        <div class="pic">
            <h3>Cat and Kitten</h3>
            <p style="color: blue;">Looking for an adorbale cat to adopt in Bangladesh? You can find lovable cats or
                baby kittens for adoption here. Our platform makes buying kittens online super easy and refreshing. </p>
            <a href="catAdopt.php"><img src="images/mini/rsz_cat-551554_1280.jpg"></a>
        </div>

        <div class="pic">
            <h3>Rabbit and Bunnies</h3>
            <p style="color: blue;">Our rabbits and bunnies are bred in loving conditions and handled from birth. They
                are of between the ages of 7 to 10 weeks. You are invited to collect your preferred one.</p>
            <a href="rabbitAdopt.php"><img src="images/mini/rsz_rt.jpg"></a>
        </div>
    </section>

    <br>

    <!--fourth section-->
    <section class="section4">
        <div class="text4">
            <h1>Offer Section</h1>
        </div>

        <div class="offer" style="background-image: url('images/offer-banner-1.jpg');">
            <p>SELECTED ITEMS. ONLINE ONLY.</p>
            <h3>Hot Summer
                Deals</h3>
            <input type="button" value="Read More"  onclick="goToLink6()">
        </div>
        </div>
        <div class="offer" style="background-image: url('images/offer-banner-2.jpg');">
            <p>TREATS & GROOMING</p>
            <h3>Spoil your
                lovely pet</h3>
            <input type="button" value="Read More"  onclick="goToLink6()">
        </div>
        <div class="offer" style="background-image: url('images/offer-banner-3.jpg');">
            <p>OUR BRAND YOU WILL LOVE</p>
            <h3>New in this
                year</h3>
            <input type="button" value="Read More"  onclick="goToLink6()">
        </div>
    </section>

    <!--fifth section-->
    <section class="section5">
        <div class="text5">
            <h1>Imported Products</h1>
        </div>

        <div class="product">
            <?php
            while ($row = mysqli_fetch_assoc($allproduct)) {
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


    <!--sixth section-->
    <section class="section6">

        <div class="aboutBox" style="background-color: azure;">
            <h1>Pet Sitter, Pet care</h1>
            <h4>We provide in-home pet sitting with the check-ins you need. Our animal-loving sitter will give your pet
                food, water, and lots of attention! </h4>
            <input type="button" value="Available pet sitters" onclick="goToLink4()">
            <input type="button" value="Apply as a pet sitter" onclick="goToLink5()">

        </div>
        <div class="aboutBox">
            <img src="images/Costs-of-starting-a-business-summary.png" alt="">
        </div>
    </section>

    <!--Seventh section-->
    <section class="section7">
        <div class="imgg">
            <img src="images/service-image.png">
        </div>

        <div class="s2">
            <h3 style="font-size: 38px;">Ensure your pet's happiness, anytime with us.</h3>
        </div>


        <div class="picture">
            <div>
                <img src="images/service-icon-1.png">
                <p>Fast Delivery</p>
            </div>
            <div>
                <img src="images/service-icon-2.png">
                <p>30 Day Return</p>
            </div>
            <div>
                <img src="images/service-icon-3.png">
                <p>Security payment</p>
            </div>
            <div>
                <img src="images/service-icon-4.png">
                <p>24/7 Support</p>
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
    <script>
        function goToLink1() {
            window.location.href = "catProduct.php";
        }
        function goToLink2() {
            window.location.href = "dogProduct.php";
        }
        function goToLink3() {
            window.location.href = "rabbitProduct.php";
        }
        function goToLink4() {
            window.location.href = "petsitters.php";
        }
        function goToLink5() {
            window.location.href = "petsitterApplication.php";
        }
        function goToLink6() {
            window.location.href = "offer.php";
        }
    </script>
</body>

</html>
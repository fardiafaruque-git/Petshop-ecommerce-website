<?php
	session_start();
  
	include 'config_comment.php';

	if (isset($_POST['post_comment'])) {

		$name = $_POST['name'];
		$message = $_POST['message'];
		
		$sql = "INSERT INTO chickenbarley (name, message)
		VALUES ('$name', '$message')";

		if ($conn->query($sql) === TRUE) {
		  echo "";
		} 
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/comment.css">
	<title></title>
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
        <a href="" >Offer Section</a>
      </div>
    </div>

    <div class="mm">
        <img src="images/logo.jpg">
        <h2>PET-CORNER</h2>
    </div>      

</div>        
</header>

<div style="padding-top:140px;">
    <h1>Chicken & Barley</h1>
    <br>
    <pre><img src="images/mini/d4.jpg" alt=""></pre>
</div>
	<section class="section1">
		<div class="wrapper">
			<form action="" method="post" class="form">
      <input type="text" class="name" name="name" placeholder="Name" value="<?php echo "" . $_SESSION['username'] ?>" readonly>
				<br>
				<textarea name="message" cols="30" rows="10" class="message" placeholder="Message"></textarea>
				<br>
				<button type="submit" class="btn" name="post_comment">Post Comment</button>
			</form>
		</div>

		<div class="content">
            <?php

            $sql = "SELECT * FROM chickenbarley";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
           
            ?>
            <h3><?php echo $row['name']; ?></h3>
            <p><?php echo $row['message']; ?></p>

             <?php } } ?>
			
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
</body>
</html>

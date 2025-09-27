<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}

$con = mysqli_connect("localhost", "root", "", "petsitter");
if (mysqli_connect_error()) {
    echo "<script>
            alert('Cannot connect to database');
            window.location.href='home2.php';
            </script>";
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $servicearea = $_POST['servicearea'];
        $district = $_POST['district'];

        // Prepare the SQL statement with placeholders
        $query = "INSERT INTO `petsitters`(`name`, `phone`,`gender`,`age`,`service_area`,`district`) VALUES (?,?,?,?,?,?)";

        // Prepare the statement
        $stmt = mysqli_prepare($con, $query);

        // Bind the parameters to the statement
        mysqli_stmt_bind_param($stmt, "ssssss", $name, $phone, $gender, $age, $servicearea, $district);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
              alert('Form Submitted');
              window.location.href='petsitterAdmin.php';
              </script>";
        } else {
            echo "<script>
              alert('SQL Error: " . mysqli_error($con) . "');
              window.location.href='petsitterAdmin.php';
              </script>";
        }

        // Close the statement and the database connection
        mysqli_stmt_close($stmt);
        mysqli_close($con);

    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title></title>
    <style>
        header{
	position: fixed;
	top: 0;
	z-index: 9999;
	box-shadow: 0 3px 6px rgba(0,0,0,0.23);
}
.navbar {
	width: 2000px;
	overflow: auto;
	background-color:white;
	
  }

  .navbar div{
    
    float: left;
}
.navbar .mm{
	width: 70%;
}

.navbar .mm img{
	margin-left: 700px;
}

.navbar .mm h2{
	margin-top: -30px;
    margin-left: 750px;
    font-size: 25px;
	color: rgb(219, 63, 16);
	position: fixed;
  }
  
  .navbar a {
	float: left;
	margin-left:10px ;
	font-size: 16px;
	color: white;
	text-align: center;
	padding: 14px 16px;
	text-decoration: none;
  }
  
  .dropdown {
	float: left;
	overflow: auto;	
  }
  
  .dropdown .dropbtn {
	font-size: 20px;  
	border: none;
	outline: none;
	
	background-color: white;
	padding: 14px 16px;
	font-family: inherit;
	margin: 0;
  }

  .navbar a:hover, .dropdown:hover .dropbtn {
	background-color: white;
	color: #7f97ff;
  }
  
  .dropdown-content {
	float: left;
	display: none;
	position: absolute;
	background-color: #f9f9f9;
	width: 130px;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 1;
  }
  
  .dropdown-content a {
	float: none;
	color: black;
	font-size: 14px;
	padding: 10px 10px;
	text-decoration: none;
	width: 80px;
	display: block;
	text-align: left;
  }
  
  .dropdown-content a:hover {
	background-color: #ddd;
	padding: 10px 10px;
  }
  
  .dropdown:hover .dropdown-content {
	display: block; 
  }
        body {
            background-color: #fff;
            /* Replace this with your desired color */
        }

        .section1 {
            background-color: antiquewhite;
            display: flex;
            width: 100%;
            margin-top: 70px ;
            justify-content: space-around;
            align-items: center;
            padding: 30px;
            margin-bottom: 68px !important;
        }

        .section1 .aboutBox {
            width: 45%;
            font-family: "Myriad Pro", Myriad, "Liberation Sans", "Nimbus Sans L", "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        .section1 .aboutBox img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 20px;
        }

        .section1 .aboutBox h1 {
            color: rgb(96, 92, 0);
            font-weight: bold;
            font-size: 44px;
            margin: 0px;
        }

        .section1 .aboutBox h4 {
            color: #850a0a;
            font-weight: 400;
            font-size: 25px;
            margin-top: 10px;
            margin-bottom: 10px;
            text-align: justify;
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
            <img src="img/petsitter.jpg" alt="">
        </div>
        <div class="aboutBox">
            <h1>We ensure proper care for pets</h1>
            <h4>Our pet sitters provide professional care and attention to pets when their owners are away or unable to
                tend to them.
                Pet sitters can offer their services for various types of pets, including dogs, cats, birds and more.
                They may work
                independently or be part of a pet-sitting business, and their services can be customized based on
                the specific needs of each pet and owner. </h4>
        </div>

    </section>
    <section class="section2">
        <div class="text2 text-center" style="padding:50px;">
            <h1>Available Pet Sitters</h1>
            <br>
            <div class="text-left">
                <h5>We are putting our available pet sitter contact number and little details below. You can look for
                    their service area and based on that you
                    can contact them and ask for the service you want from them. Their fees will be required according
                    to the service they provide.
                </h5>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 ">
                <table class="table text-center table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Age</th>
                            <th scope="col">Service Area</th>
                            <th scope="col">District</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM `petsitters`";
                        $user_result = mysqli_query($con, $query);
                        while ($user_fetch = mysqli_fetch_assoc($user_result)) {
                            echo "
                <tr>
                <td>$user_fetch[name]</td>
                <td>$user_fetch[phone]</td>
                <td>$user_fetch[gender]</td>
                <td>$user_fetch[age]</td>
                <td>$user_fetch[service_area]</td>
                <td>$user_fetch[district]</td>
             </tr>
            ";
                        }
                        ?>

                    </tbody>
                </table>

            </div>
        </div>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>
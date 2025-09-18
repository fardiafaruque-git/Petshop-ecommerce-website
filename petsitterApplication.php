<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "petsitter");
if (mysqli_connect_error()) {
    echo "<script>
            alert('Cannot connect to database');
            window.location.href='petsitterApplication.php';
            </script>";
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $cv = $_POST['cv'];
        
        // Prepare the SQL statement with placeholders
        $query = "INSERT INTO `applicants`(`name`, `cv`) VALUES (?, ?)";
        
        // Prepare the statement
        $stmt = mysqli_prepare($con, $query);
        
        // Bind the parameters to the statement
        mysqli_stmt_bind_param($stmt, "ss", $name, $cv);
        
        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
                alert('Form Submitted');
                window.location.href='home2.php';
                </script>";
        } else {
            echo "<script>
                alert('SQL Error: " . mysqli_error($con) . "');
                window.location.href='petsitterApplication.php';
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
            background-color: #b5e4ff;
            /* Replace this with your desired color */
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

    <section class="section2">
        <br>
        <div class="text text-center">
            <h1>Submit Your Name and Application/CV Below</h1>
        </div>
        <br>
        <form action="" method="POST">
            <div class="form-group rounded p-4">
                <label><b>Full Name</b></label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group  rounded p-4">
                <label><b>Application/CV</b></label>
                <textarea name="cv" rows="8" cols="100" class="form-control" required></textarea>
            </div>
            <br>

            <button class="btn btn-primary btn-block" name="submit">Submit</button>
        </form>
    </section>

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
<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("location: adminLogin.php");
}

$con = mysqli_connect("localhost", "root", "", "petsitter");
if (mysqli_connect_error()) {
  echo "<script>
            alert('Cannot connect to database');
            window.location.href='petsitterAdmin.php';
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
      mysqli_stmt_bind_param($stmt, "ssssss", $name, $phone,$gender,$age,$servicearea,$district);
      
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title></title>
    <style>
    body {
      background-color: #b5e4ff; /* Replace this with your desired color */
    }


        form {
          width: 100%;
            height: 100%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            
            flex-wrap: wrap;
            justify-content: space-between;
        }

        label {
            
            margin-bottom: 5px;
            color: #fff;
        }

        input[type="text"],
        input[type="number"],
        input[type="tel"],
        select {
            flex-basis: calc(50% - 10px);
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 16px;
            color: #333;
        }

        

        button {
            flex-basis: 100%;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }
        .custom-div {
      background-color: rgb(36, 36, 67); /* Replace with your desired background color */
    }
  

        
  </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="adminPanal.php">Admin Panal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="home2.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Add New Product or Pet</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="petsitterAdmin.php">Pet Sitter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminReg.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="adminLogin.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>



      </ul>

      <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png">
              <?php echo "Welcome " . $_SESSION['username'] ?>
            </a>
          </li>
        </ul>
      </div>


    </div>
  </nav>

<div class="container mt-5">
<h3>New Applicants:</h3>
    <div class="row">
      <div class="col-lg-12 " >
        <table class="table mt-3 text-left table-dark">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Application/CV</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "SELECT * FROM `applicants`";
            $user_result = mysqli_query($con, $query);
            while ($user_fetch = mysqli_fetch_assoc($user_result)) {
              echo "
                <tr>
                <td>$user_fetch[name]</td>
                <td>
                <a href=\"CV.php\" style=\"color:white;\">See Application/CV</a>
              </td>

             </tr>
            ";
            }
            ?>

          </tbody>
        </table>

      </div>
    </div>

  </div>


  <div class="container mt-5 ">
        <h3>Add A New Pet Sitter:</h3>
        <br>
        
        <form action="" method="post" class="custom-div">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>
        </div>
        <div>
            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender" required>
        </div>
        <div>
            <label for="age">Age:  </label>
            <input type="number" id="age" name="age" required>
        </div>
        <div>
            <label for="service_area">Service Area:</label>
            <input type="text" id="servicearea" name="servicearea" required>
        </div>
        <div>
            <label for="district">District:</label>
            <input type="text" id="district" name="district" required>
        </div>
        <br>
        <div>
        <button name="submit">Submit</button>
        </div>
    </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
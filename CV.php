<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("location: adminLogin.php");
}

$con = mysqli_connect("localhost", "root", "", "petsitter");
if (mysqli_connect_error()) {
  echo "<script>
            alert('Cannot connect to database');
            window.location.href='mycart.php';
            </script>";
  exit();
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
        <li class="nav-item active">
          <a class="nav-link" href="offer.php">Add Offer <span class="sr-only">(current)</span></a>
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
<h3>Application/CV:</h3>
    <div class="row">
      <div class="col-lg-12" >
        
            <?php
            $query = "SELECT * FROM `applicants`";
            $user_result = mysqli_query($con, $query);
            while ($user_fetch = mysqli_fetch_assoc($user_result)) {
              echo "
              <h4>$user_fetch[name]</h4>
              <table class=\"table mt-3 text-left table-dark\">
          <tbody>
                <tr>
                <td><pre style=\"color:white;\">$user_fetch[cv]</pre></td>
             </tr>
             </tbody>
             </table>
            ";
            }
            ?>

         

      </div>
    </div>

  </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
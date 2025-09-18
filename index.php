<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

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
            color: #000;
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
      background-color: #7aa5b2; /* Replace with your desired background color */
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
  <div class="container mt-5 ">
        <h3>Add New Product or Pet:</h3>
        <br>
    
      <form action="insert.php" method="POST" enctype="multipart/form-data" class="custom-div">
        <label for="">Name:</label>
        <input type="text" name="name"><br>
        <label for="">Price :</label>
        <input type="text" name="price" id=""><br>
        <label for="">Previous_Price :</label>
        <input type="text" name="previous_price" id=""><br>
        <label for="">Type :</label>
        <input type="text" name="type" id=""><br>
        <label for="">Image:</label>
        <input type="file" name="image" id=""><br><br>
        <button type="submit" name="upload">Upload</button>

      </form>
   
  </div>

  <!-- fetch data -->

  <div class="container">
    <br>
    <br>
   <h3>Products:</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Previous_Price</th>
          <th scope="col">Type</th>
          <th scope="col">Image</th>
          <th scope="col">Delete</th>
          <th scope="col">Update</th>






        </tr>
      </thead>
      <tbody>

        <?php
        include 'config_crud.php';
        $pic = mysqli_query($con, "SELECT * FROM `tblcard`");
        while ($row = mysqli_fetch_array($pic)) {
          echo "
            <tr>
                <td>$row[Id]</td>
                <td>$row[Name]</td>
                <td>$row[Price]</td>
                <td>$row[Previous_Price]</td>
                <td>$row[Type]</td>
                <td><img src='$row[Image]'  width = '200px'  height = '70px'></td>
                <td><a href='delete.php? Id= $row[Id]' class = 'btn btn-danger'>Delete</a></td>
                <td><a href='update.php? Id= $row[Id]' class = 'btn btn-danger'>Update</a></td>
                <td></td>
                
                
                
            </tr>
            ";
        }

        ?>


      </tbody>
    </table>
  </div>
</body>

</html>
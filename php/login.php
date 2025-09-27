<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['email']))
{
    header("location: home2.php");
    exit;
}
require_once "config.php";

$email = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['email'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter email + password";
    }
    else{
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $username=trim($_POST['username']);
    }
if(empty($err))
{
    $sql = "SELECT id, username, email, password FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_email);
    $param_email = $email;
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: home2.php");
                            
                        }
                        else
                    {
                        // Wrong password entered
                        echo '<script>alert("Wrong email or password. Please try again.");window.location = "login.php";</script>';
                    }
                    }

                }
                else
            {
                // Wrong email entered
                echo '<script>alert("Wrong email or password. Please try again.");window.location = "login.php";</script>';
            }

    }
}    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="css/loginform.css">
    <style>
    .email.lowercase {
      text-transform: lowercase;
    }
    </style>

</head>
<body>
  <div class="container">
    <div class="left-side">
      <!-- Content for the left side -->
    </div>
    <div class="right-side">
      <!-- Content for the right side -->
      <form action="" method="post">
    <div class="form">
        <h1 class="heading">login</h1>
        <input type="email" pattern="^[a-zA-Z0-9]+@[a-zA-Z]+\.com$" name="email" placeholder="email" autocomplete="off" class="email lowercase" required>
        <input type="password" name="password"  placeholder="password" autocomplete="off" class="password" required>
        <button class="submit-btn">log in</button>
        <a href="register.php" class="link">don't have an account? Register one</a>
    </div>

    <script src="js/form.js"></script>
</form>
    </div>
  </div>
</body>
</html>

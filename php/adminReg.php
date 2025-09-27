<?php
require_once "configAdmin.php";

$username = $password = $email = "";
$username_err = $password_err = $email_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $username_err = "Email cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set the value of param username
            $param_email = trim($_POST['email']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $email_err = "This email is already taken"; 
                }
                else{
                    $email = trim($_POST['email']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);

// Check for name
if(empty(trim($_POST['username']))){
    $username_err = "Name cannot be blank";
}
else{
    $username = trim($_POST['username']);
}

// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($email_err))
{
    $sql = "INSERT INTO users (username, email,password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "sss", $param_username,$param_email, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: adminLogin.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <link rel="stylesheet" href="css/adminReg.css">
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
<form action="" method="post">
    <div class="form">
        <h1 class="heading">Admin Register</h1>
        <input type="text" name="username" placeholder="name" autocomplete="off" class="name" required>
        <span><b><?php echo str_repeat('&nbsp;', 10).$username_err; ?></b></span>
        <br>
        <input type="email" pattern="^[a-zA-Z0-9]+@[a-zA-Z]+\.com$" name="email" placeholder="email" autocomplete="off" class="email lowercase"  required>
        <span><b><?php echo str_repeat('&nbsp;', 10).$email_err; ?></b></span>
        <br>
        <input type="password" name="password" placeholder="password" autocomplete="off" class="password" required>
        <span><b><?php echo str_repeat('&nbsp;', 10).$password_err; ?></b></span>
        <br>
        <button class="submit-btn">register</button>
        <a href="adminLogin.php" class="link">already have an account ? log in here</a>
    </div>
    <script src="js/form.js"></script>
</form>
    </div>
</div>

</body>
</html>
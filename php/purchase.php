<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "order");
if(mysqli_connect_error())
{
    echo "<script>
            alert('Cannot connect to database');
            window.location.href='mycart.php';
            </script>";
            exit();
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['purchase']))
    {
        $query1="INSERT INTO `order_manager`(`name`, `phone`, `address`) VALUES ('$_POST[name]','$_POST[phone]','$_POST[address]')";
        if(mysqli_query($con,$query1))
        {
            $order_id=mysqli_insert_id($con);
            $query2="INSERT INTO `user_order`(`order_id`, `item_name`, `price`, `quantity`) VALUES (?,?,?,?)";
            $stmt=mysqli_prepare($con,$query2);
            if($stmt)
            {
                mysqli_stmt_bind_param($stmt,"isii",$order_id,$item_name,$price,$quantity);
                foreach($_SESSION['cart'] as $key => $values)
                {
                    $item_name=$values['Item_name'];
                    $price=$values['Price'];
                    $quantity=$values['Quantity'];
                    mysqli_stmt_execute($stmt);
                    
                }
                unset($_SESSION['cart']);
                echo "<script>
                alert('Order Placed');
                window.location.href='home2.php';
                </script>";

            }   
            else
            {
                echo "<script>
                alert('SQL Prepare Query Error');
                window.location.href='mycart.php';
                </script>";
            }
        }
        else
        {
            echo "<script>
            alert('SQL Error');
            window.location.href='mycart.php';
            </script>";
        }
    }
  
}
?>
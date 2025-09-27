<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
        body{
            background-color:#9ce0df;
        }
        h1 {
      background-color: #344083; 
      color: #fff;
      padding: 0;
      }
      
    .custom-div {
      background-color: #8e97e5; /* Replace with your desired background color */
    }
  
        </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h1 background-color: #81caf2 >MY CART</h1>
            </div>
            <div class="col-lg-9 ">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Item Code/Name</th>
                            <th scope="col">Item Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $sr = $key + 1;
                                echo "
                            <tr>
                            <td>$sr</td>
                            <td>$value[Item_name]</td>
                            <td>$value[Price]<input type='hidden' class='iprice' value=$value[Price]></td>
                            <td>
                            <form action='managecart.php' method='POST'>
                            <input class='text-center iquantity' name='mod_quantity' onchange='this.form.submit()' type='number' value='$value[Quantity]' min='1' max='10'>
                            <input type='hidden' name='Item_name' value=$value[Item_name]>
                            </form>
                            </form></td>
                            <td class='itotal'></td>
                            <td>
                            <form action='managecart.php' method='POST'>
                            <button name='removeitem' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                            <input type='hidden' name='Item_name' value=$value[Item_name]>
                            </form>
                            </td>
                        
                            </tr>
                            ";
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <div class="col-lg-3 text-center border rounded  my-5 custom-div">
                <div class=" rounded p-4 custom-div">
                    <h4>Total:</h4>
                    <h5 class="text-right" id="gtotal"></h5>
                    <br>
                    <?php
                    if(isset($_SESSION['cart'])&&count($_SESSION['cart'])>0)
                    {
                    ?>
                    <form action="purchase.php" method="POST">
                        <div class="form-group">
                            <label><b>Full Name</b></label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label><b>Phone Number</b></label>
                            <input type="number" name="phone" class="form-control" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label><b>Address</b></label>
                            <input type="text" name="address" class="form-control"required>
                        </div>
                        <br>
                        
                        <button class="btn btn-primary btn-block" name="purchase">Make Purchase</button>
                    </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        var gt = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        var gtotal = document.getElementById('gtotal');

        function subTotal() {
            for (i = 0; i < iprice.length; i++) {
                itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);
                gt = gt + (iprice[i].value) * (iquantity[i].value);
            }
            gtotal.innerText = gt;
        }
        subTotal();
    </script>
</body>

</html>
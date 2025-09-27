

<?php
// include db connection
include 'config_crud.php';

if(isset($_POST['upload'])){
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $PREVIOUS_PRICE = $_POST['previous_price'];
    $TYPE = $_POST['type'];
    $IMAGE = $_FILES['image'];
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_des = "uploadImage/".$img_name;
    move_uploaded_file($img_loc,'uploadImage/'.$img_name);

    // insert data

    mysqli_query($con,"INSERT INTO `tblcard`( `Name`, `Price`, `Previous_Price`,`Type`,`Image`) VALUES ('$NAME','$PRICE', '$PREVIOUS_PRICE','$TYPE','$img_des')");
    header("location:index.php");

}

?>

<?php
$con = mysqli_connect("localhost","root","","fitnes_mullagaleev");

        $sql_query = "select id_user,surname,name,patromymic,photo,phone,awards from users where role=3";

        $result = mysqli_query($con,$sql_query);
if (!empty($_FILES["photo"]["tmp_name"] ) ) {
      $name = "image/" .$_FILES["photo"] ["name"];
   $tmp_name = $_FILES["photo"] ["tmp_name"];
   move_uploaded_file($tmp_name,$name);
}
?>
<?php
 $con = mysqli_connect("localhost","root","","fitnes_mullagaleev");
 $sql_query = "select surname,name,patromymic,photo,phone,awards from users where role=3";
if(!empty($_POST)){
$surname = $_POST["surname"];
$name = $_POST["name"];
$patromymic = !empty($_POST["patromymic"]) ? $_POST["patromymic"] : "null";
$birthday = $_POST["birthday"];
$phone = $_POST["phone"];
$gender = $_POST["gender"];
$photo = $_FILES["photo"] ["name"];
$pass = $_POST["password"];
$awards = !empty($_POST["awards"]) ? $_POST["awards"] : "-";
$created_at = date("Y-m-d H:i:s");
$trener_id=$_POST["trener_id"];
$query = "update users set surname = '$surname', name = '$name', patromymic = '$patromymic', phone = '$phone', password = '$pass',birthday = '$birthday', photo= '$photo', gender = '$gender', awards = '$awards', role = '3' where id_user=$trener_id";
 $result = mysqli_query($con,$query);
 if($result){
 	echo "<script>alert('Запись успешно добавлена!!');location.href='/editTrener.php';</script>";
 }
 else{
 	echo "<script>alert('Ошибка добавления. Попробуйте снова!!')</script>";
 	echo mysqli_error($con);
    echo $query;
 }
}
?>


<?php
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
$query = "insert into users (id_user,surname, name, patromymic, phone, password, birthday, photo, gender, created_at, awards, role) values(null, '$surname', '$name', '$patronymic', '$phone', '$pass', '$birthday', '$photo', '$gender', '$created_at', '$awards', '3')";
 $result = mysqli_query($con,$query);
 if($result){
 	echo "<script>alert('Запись успешно добавлена!!');location.href='/';</script>";
 }
 else{
 	echo "<script>alert('Ошибка добавления. Попробуйте снова!!')</script>";
 	echo mysqli_error($con);
 }
}
?>

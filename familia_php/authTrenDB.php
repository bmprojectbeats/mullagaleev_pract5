<?php
if (!empty($_FILES["photo"]["tmp_name"] ) ) {
      $name = "image/" .$_FILES["photo"] ["name"];
   $tmp_name = $_FILES["photo"] ["tmp_name"];
   move_uploaded_file($tmp_name,$name);
}
?>
<?php
session_start();
 $con = mysqli_connect("localhost","root","","fitnes_mullagaleev");
 $sql_query = "select phone, password from users where role = 3";
 $result = mysqli_query($con,$sql_query);
if(!empty($_POST)){
$phone = $_POST["phone"];
$pass = $_POST["password"];
}
while($user = mysqli_fetch_array($result)){
if($phone == $user['phone'] && $pass == $user['password']){
$_SESSION['trener'] = "trener";
echo "<script>alert('Авторизация прошла успешно!!');location.href='/';</script>";
}
}
?>


<?php
	@include("header.php");
?>
	<?php
        $con = mysqli_connect("localhost","root","","fitnes_mullagaleev");

        $sql_query = "select id_user,surname,name,patromymic,photo from users where role=3";

        $result = mysqli_query($con,$sql_query);
        // $treners = mysqli_fetch_all($result);
        // print_r($treners);
        $trener_id = !empty($_GET["trener"])?$_GET["trener"]:mysqli_fetch_array(mysqli_query($con,"select id_user from users where role=3 limit 1"))["id_user"];
        $trener_info = mysqli_fetch_array(mysqli_query($con, "select * from users where id_user=$trener_id"));
        ?>
	<div class="container flex-column-center">
		<h2>Добавление тренера</h2>
		<form action="/addTrenerDB.php" method="POST" enctype="multipart/form-data">
		<div class="input-group"><label for="surname">Введите фамилию</label><input required id="surname" name = "surname" type="text" value="<?=$trener_info["surname"]?>"></div>
		<div class="input-group"><label for="name">Введите имя</label><input required id="name" name = "name" type="text"></div>
		<div class="input-group"><label for="patromymic">Введите отчество</label><input id="patronymic" name = "patronymic" type="text"></div>
		<div class="input-group"><label for="birthday">Введите дату рождения</label><input required id="birthday" name = "birthday" type="date"></div>
		<div class="input-group"><label for="phone">Введите номер телефона</label><input required id="phone" name = "phone" type="text"></div>
		<div class="input-group"><label for="photo">Выберите фото</label><input id="photo" name = "photo" type="file"></div>
		<div class="input-group-gender">
			<label for="g-m">М</label><input id="g-m" name = "gender" type="radio" value="M" checked><br>
			<label for="g-m">Ж</label><input id="g-m" name="gender" type="radio" value="W">
		</div>
		<div class="input-group"><label for="password">Введите пароль</label><input required id="password" name = "password" type="password"></div>
		<div class="input-group"><label for="awards">Введите достижения</label><input id="awards" name = "awards" type="text"></div>
		<div class="input-group"><input type="submit" value="Добавить"></div>
		</form>
	</div>
</body>
</html>
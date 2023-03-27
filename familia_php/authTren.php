
	<?php
	@include("header.php");
?>
	<?php
        $con = mysqli_connect("localhost","root","","fitnes_mullagaleev");

        $sql_query = "select id_user,surname,name,patromymic,photo,phone from users";

        $result = mysqli_query($con,$sql_query);
        // $treners = mysqli_fetch_all($result);
        // print_r($treners);
        ?>
	<div class="container flex-column-center">
		<h2>Авторизация</h2>
		<form action="/authTrenDB.php" method="POST" enctype="multipart/form-data" id="form_auth">
		<div class="input-group"><label for="surname">Введите номер телефона</label><input required id="phone" name = "phone" type="text"></div>
		<div class="input-group"><label for="password">Введите пароль</label><input required id="password" name = "password" type="password"></div>
		<div class="input-group"><label for="password_conf">Введите пароль</label><input required id="password_conf" name="password_conf" type="password"><span class="error_form" id ="error_pass"></span></div>
		<div class="input-group"><input type="submit" value="Отправить"></div>

		</form>

<script>

    let pass = document.getElementById("password");
    let confirm_pass = document.getElementById("password_conf");
    let form = document.getElementById("form_auth");
    form.addEventListener("submit",function(event){
        if(confirm_pass.value!==pass.value){
            event.preventDefault();
            document.getElementById("error_pass").innerText = "Пароли не совпадают!";
        }
    })

</script>
	</div>
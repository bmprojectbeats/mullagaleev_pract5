	<?php
        $con = mysqli_connect("localhost","root","","fitnes_mullagaleev");

        $sql_query = "select id_user,surname,name,patromymic,photo from users where role=3";

        $result = mysqli_query($con,$sql_query);
        // $treners = mysqli_fetch_all($result);
        // print_r($treners);
        $trener_id = !empty($_GET["trener"])?$_GET["trener"]:mysqli_fetch_array(mysqli_query($con,"select id_user from users where role=3 limit 1"))["id_user"];
        $trener_info = mysqli_fetch_array(mysqli_query($con, "select * from users where id_user=$trener_id"));
        	@include("header.php");
        ?>
        <div class="container">
        	<div class="list-trener">
        		<?php
        while($trener = mysqli_fetch_array($result)){
            ?>
            
                <div class="trener-item">
                    <p><?=$trener['surname']." ".$trener['name']." ".$trener['patromymic'];?></p>
                   <a href="?trener=<?=$trener['id_user'];?>"><button class="">Редактировать</button></a>
                    <a href="?del_id=<?=$trener['id_user'];?>"><button class="">Удалить</button></a>
                </div>
                <?php
        }
        ?>
        	<?php
  if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
    //удаляем строку из таблицы
    $sql = mysqli_query($con, "delete from users where id_user={$_GET['del_id']}");
    if ($sql) {
      echo "<p>Пользователь удален.</p>";
    } else {
      echo '<p>Произошла ошибка: ' . mysqli_error($con) . '</p>';
    }
  }
?>
        	</div>
        	<div class="form-edit">
        		<div class="container flex-column-center">
		<h2>Добавление тренера</h2>


		<form action="/editTrenerDB.php" method="POST" enctype="multipart/form-data">
      <div>
                    <img src="/image/<?=$trener_info['photo'];?>" alt="<?=$trener['name'];?>">
    </div>
			<input type="text" name="trener_id" value="<?=$trener_id;?>" style="display:none;">
		<div class="input-group"><label for="surname">Введите фамилию</label><input required id="surname" name = "surname" type="text" value="<?=$trener_info["surname"]?>"></div>
		<div class="input-group"><label for="name">Введите имя</label><input required id="name" name = "name" type="text" value="<?=$trener_info["name"]?>"></div>
		<div class="input-group"><label for="patronymic">Введите отчество</label><input id="patronymic" name = "patronymic" type="text" value="<?=$trener_info["patromymic"]?>"></div>
		<div class="input-group"><label for="birthday">Введите дату рождения</label><input required id="birthday" name = "birthday" type="date" value="<?=$trener_info["birthday"]?>"></div>
		<div class="input-group"><label for="phone">Введите номер телефона</label><input required id="phone" name = "phone" type="text" value="<?=$trener_info["phone"]?>"></div>
		<div class="input-group"><label for="photo">Выберите фото</label><input id="photo" name = "photo" type="file" value="<?=$trener_info["photo"]?>"></div>
		<div class="input-group-gender">

			<label for="g-m">М</label><input id="g-m" name = "gender" type="radio" value="M" <?=($trener_info["gender"] == "М")?"checked":""?>><br>
			<label for="g-m">Ж</label><input id="g-m" name="gender" type="radio" value="W" <?=($trener_info["gender"] == "Ж")?"checked":""?>>

		</div>
		<div class="input-group"><label for="password">Введите пароль</label><input required id="password" name = "password" type="password" value="<?=$trener_info["password"]?>"></div>
		<div class="input-group"><label for="awards">Введите достижения</label><input id="awards" name = "awards" type="text" value="<?=$trener_info["awards"]?>"></div>
		<button type="submit">fgyt</button>
		</form>
	</div>
	</div>
        </div>
</body>
</html>

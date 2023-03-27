<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<style>
        .cards{
            display: flex;
            justify-content: space-between;
        }
        .card{
            width: 20%;
        }
        .card img{
            width: 100%;
        }
</style>
<body>
    <header>
        <div class="logo">
            <h1>ФИТНЕС UBH</h1>
        </div>
        <nav>
            <a href="/index.php">Главная</a>
            <a href="">Наша команда</a>
            <a href="/addTrener.php">Добавить тренера</a>
            <a href="/editTrener.php">Управление тренерами</a>
            <a href="/reg.php">Регистрация</a>
            <a href="/auth.php">Авторизация</a>
                        <a href="/authTren.php">Для тренеров</a>
            <a href="/authAdmin.php">Админ</a>
            <?php 
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
            session_start();
            if($_SESSION['trener']){
?>
<a href="/auth.php">Новая</a>
<?php 
}
                ?>
        </nav>
    </header>
    </body>
    </html>
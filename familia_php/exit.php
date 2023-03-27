<?php
session_start();
session_destroy();
echo "<script>alert('Вы вышли из учетной записи');location.href='/index.php';</script>";
?>
<?php
unset($_SESSION['message_login']);
unset($_SESSION['dataUser']);
unset($_SESSION['dataEmail']);
header("location:./login.php");
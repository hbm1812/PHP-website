<?php
unset($_SESSION['login']);
unset($_SESSION['dataUser']);
unset($_SESSION['dataEmail']);
unset($_SESSION['authority_id']);
header("location:./index.php");
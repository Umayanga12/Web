<?php
session_start();
unset($_SESSION['iduser']);
header ('location: ../login.html')
?>
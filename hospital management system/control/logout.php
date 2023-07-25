<?php
session_start();
unset($_SESSION['iduser']);
session_destroy($_SESSION['iduser']);
?>

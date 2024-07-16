<?php
unset($_SESSION['regNum']);
session_abort();
echo "<script>";
echo "window.location.href = 'index.php';";
echo "</script>";
?>
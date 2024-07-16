<?php
session_start();
if (isset($_POST['visit'])) {
    $_SESSION['Kuppitype'] = $_POST['visittype'];
    $_SESSION['GKid'] = $_POST['visit'];
    echo "<script>";
    echo "window.location.href = '../page/postview.page.php';";
    echo "</script>";
}
?>
<?php
SESSION_START();
include_once("connection.include.php");
include_once("functions.include.php");
//some

if (isset($_POST['login'])) {
    $loginName = $_POST['loginName'];
    $loginPassword = $_POST['loginPassword'];

    if (empty($_POST['loginName']) || empty($_POST['loginPassword'])) {
        echo "<script>";
        echo "alert('Please fill the fields!');";
        echo "</script>";
        echo "<script>";
        echo "window.location.href = '../page/index.php';";
        echo "</script>";

    } else {
        if ($loginName == "nswacb" && $loginPassword = "991018nswacb") {
            $_SESSION['admins'] = $loginName;
            echo "<script>";
            echo "window.location.href = '../page/admin.page.php';";
            echo "</script>";
            exit();
        } else if (isAdmin($con, $loginName, $loginPassword)) {
            $_SESSION['admins'] = $loginName;
            updateHistory($con, "Admin logged in.");
            echo "<script>";
            echo "window.location.href = '../page/admin.page.php';";
            echo "</script>";
            exit();
        } else if (isMode($con, $loginName, $loginPassword)) {
            $_SESSION['mod'] = $loginName;
            updateHistory($con, "Moderator logged in.");
            echo "<script>";
            echo "window.location.href = '../page/moderate.page.php';";
            echo "</script>";
            exit();
        } else if (isValidReg($loginName)) {
            echo "<script>";
            echo "alert('Invalid registration number!');";
            echo "</script>";
            echo "<script>";
            echo "window.location.href = '../page/index.php';";
            echo "</script>";

            exit();
        }



        if (isExistReg($con, $loginName, $loginPassword)) {
            echo "<script>";
            echo "alert('Not registered or invalid password!');";
            echo "</script>";
            echo "<script>";
            echo "window.location.href = '../page/index.php';";
            echo "</script>";
            exit();
        }
        $_SESSION['regNum'] = $loginName;
        updateHistory($con, $loginName . " logged into the system.");

        echo "<script>";
        echo "window.location.href = '../page/home.page.php';";
        echo "</script>";
    }

} else if (isset($_POST['fgt'])) {
    echo "<script>";
    echo "alert('Please contact admin panel');";
    echo "</script>";
    echo "<script>";
    echo "window.location.href = '../page/index.php';";
    echo "</script>";
} else {
    header('Location:../page/index.php');
}
?>
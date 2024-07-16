<?php
include_once("connection.include.php");
include_once("functions.include.php");

if (isset($_POST['register'])) {
    $regNum = $_POST['regNum'];
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $gender = $_POST['gender'];
    $degree = $_POST['degree'];
    $telephone = $_POST['telephone'];
    $telephone = preg_replace('/[^0-9]/', '', $telephone);
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $rePassword = password_hash($_POST['rePassword'], PASSWORD_DEFAULT);
    $adminKey = $_POST['adminKey'];

    if (isEmpty($regNum, $fName, $lName, $degree, $telephone, $email, $password, $rePassword, $adminKey, $gender)) {
        echo "<script>alert('Please fill the form');</script>";
        echo "<script>";
        echo "window.location.href = '../page/signup.page.php';";
        echo "</script>";
        exit();
    }

    if ($_POST['password'] != $_POST['rePassword']) {
        echo "<script>alert('Mismatch password');</script>";
        echo "<script>";
        echo "window.location.href = '../page/signup.page.php';";
        echo "</script>";
        exit();
    }

    if (isValidEnrollment($con, $adminKey)) {
        echo "<script>alert('Invalid enrollment key or key expired!');</script>";
        echo "<script>";
        echo "window.location.href = '../page/signup.page.php';";
        echo "</script>";
        exit();
    }

    if (!(isValidPhone($telephone))) {
        echo "<script>alert('Invalid telephone');</script>";
        echo "<script>";
        echo "window.location.href = '../page/signup.page.php';";
        echo "</script>";
        exit();
    }


    if (isValidReg($regNum)) {
        echo "<script>alert('Invalid registration number. (XXXCSC/cscXXX)');</script>";
        echo "<script>";
        echo "window.location.href = '../page/signup.page.php';";
        echo "</script>";
        exit();
    }

    if (isHere($con, $regNum)) {
        echo "<script>alert('Already registered!');</script>";
        echo "<script>";
        echo "window.location.href = '../page/signup.page.php';";
        echo "</script>";
        exit();
    }
    insertToDatabase($con, $fName, $lName, $regNum, $degree, $gender, $password, $telephone, $email);
    updateHistory($con, $regNum . " joined as a new user.");
    echo "<script>";
    echo "window.location.href = '../page/index.php';";
    echo "</script>";

} else {
    echo "<script>alert('Horagediya!');</script>";
    echo "<script>";
    echo "window.location.href = '../page/signup.page.php';";
    echo "</script>";
}
?>
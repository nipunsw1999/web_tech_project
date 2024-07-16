<?php
session_start();
session_destroy();
include_once("../style/index.style.php"); ?>


<title>Login</title>

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<div id="form-div">
    <div id="form-img"><img class="imgg" src="../media/kuppi logo.png" alt=""></div>
    <form action="../include/login.include.php" method="post">
        <div id="form-div-div">
            <input type="text" name="loginName" placeholder="Registration number">
            <i class='bx bxs-user'></i>
        </div>
        <div id="form-div-div"><input type="password" name="loginPassword" placeholder="Password"><i
                class='bx bxs-lock-alt'></i></div>
        <div id="form-div-div"><button type="submit" name="login">Login</button></div>
        <div class="for"><button type="submit" name="fgt">Forget password?</button></div>
        <div id="form-div-div">
            <p>Don't have an account? <br><a href="signup.page.php">Sign up</a> here!</p>
        </div>
    </form>
</div>

<style>
.for button {
    background: none;
    color: #fff;
    border: none;
    cursor: pointer;
}
</style>
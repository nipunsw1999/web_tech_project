<?php
session_start();
include_once("../include/connection.include.php");
if (isset($_SESSION['mod'])) { ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<div class="container">
    <form action="moderate.page.php" method="post" class="fm">
        <div class="hd">Welcome moderator</div>
        <div><button name="hm" type="submit">Home</button></div>
        <div><button name="cp" type="submit">Change password</button></div>
        <div><button name="lo" type="submit">Log out</button></div>
    </form>
</div>

<?php
}
if (isset($_POST['hm'])) {
    echo "<script>";
    echo "window.location.href = 'home.page.php';";
    echo "</script>";
}
if (isset($_POST['cp'])) {
    echo "<script>";
    echo "window.location.href = 'changepwd.page.php';";
    echo "</script>";
}
if (isset($_POST['lo'])) {
    session_destroy();
    updateHistory($con, "Moderator logged out.");
    echo "<script>";
    echo "window.location.href = 'index.php';";
    echo "</script>";
}


?>


<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

.container {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: rgb(0, 74, 87);
}

.container div {
    margin: 15px;
}

.hd {
    width: 80%;
    height: 20%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 40px;
    color: rgb(255, 255, 255);
    font-weight: bolder;
    border-bottom: 5px solid rgb(255, 255, 255);
}

.fm {
    width: 500px;
    height: 500px;
    border: 5px solid rgb(255, 255, 255);
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background: rgb(0, 74, 87);
}

.fm button {
    width: 300px;
    height: 50px;
    border: 5px solid rgb(255, 255, 255);
    background: rgb(255, 255, 255);
    color: rgb(0, 74, 87);
    font-weight: bold;
    font-size: 20px;
    transition: 0.2s;
    cursor: pointer;
}

.fm button:hover {
    background: rgb(0, 74, 87);
    color: rgb(255, 255, 255);
}

@media only screen and (max-width: 768px) {
    .fm {
        width: 360px;
    }
}
</style>
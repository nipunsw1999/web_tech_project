<?php
session_start();
include_once("../include/connection.include.php");
include_once("../style/kuppi.style.php");
if (isset($_SESSION['regNum'])) {
    ?>


<title>Give kuppi</title>

<div class="kuppi-div">
    <form action="givekuppi.page.php" method="post" class="kuppi">
        <div class="dd">Select course level</div>
        <div class="dd">
            <select name="list-sub" id="list-sub">
                <option value="Level 1S">Level 1S</option>
                <option value="Level 1G">Level 1G</option>
                <option value="Level 2S">Level 2S</option>
                <option value="Level 2G">Level 2G</option>
                <option value="Level 3S">Level 3S</option>
                <option value="Level 3G">Level 3G</option>
                <option value="Level 3M">Level 3M</option>
                <option value="Level 4S">Level 4S</option>
                <option value="Level 4M">Level 4M</option>
                <option value="Level 4X">Level 4X</option>
            </select>
        </div>
        <div class="dd"><button type="submit" name="selectlevel">Confirm level</button></div>
        <div class="dd"><button type="submit" name="back">Back</button></div>
    </form>
</div>

<?php
    if (isset($_POST['back'])) {
        echo "<script>";
        echo "window.location.href = 'profile.page.php';";
        echo "</script>";
    }
    if (isset($_POST['selectlevel'])) {
        $klevel = $_POST['list-sub'];
        $_SESSION['gklevel'] = $klevel;
        echo "<script>";
        echo "window.location.href = 'givekuppi0.page.php';";
        echo "</script>";
    }
} else {
    session_destroy();
    header("Location:index.php");
}
?>
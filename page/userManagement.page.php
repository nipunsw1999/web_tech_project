<?php
session_start();
include_once("../include/connection.include.php");
include_once("../style/userManagement.style.php");

if (isset($_SESSION['admins'])) {
    ?>


<title>User managemnt</title>

<div class="umpanel">
    <form action="userManagement.page.php" method="post" class="umpanel">

        <div class="umpanel-div">
            <div><input type="text" name="gt-user" placeholder="Registration number"></div>
            <div><button type="submit" name="gt-user-btn">Get user details</button></div>
        </div>
        <div class="umpanel-div">

            <div><input type="text" name="gt-user-all" placeholder="Registration start with"></div>
            <div><button type="submit" name="gt-user-all-btn">Get all user details</button></div>
        </div>

        <div class="umpanel-div">
            <div><input type="text" name="rm-user" placeholder="Registration number"></div>
            <div><button type="submit" name="rm-user-btn">Remove user</button></div>
        </div>

        <div class="umpanel-div">
            <div><input type="text" name="rm-user-all" placeholder="Registration start with..."></div>
            <div><button type="submit" name="rm-user-all-btn">Remove all</button></div>
        </div>
        <div class="goBack">
            <div><button name="goback">Go back</button></div>
        </div>
    </form>
</div>
<?php

    if (isset($_POST['goback'])) {
        echo "<script>";
        echo "window.location.href = 'admin.page.php';";
        echo "</script>";
    }

    if (isset($_POST['gt-user-btn'])) {
        $reg = $_POST["gt-user"];
        $sql = "SELECT regNum,fName,lName,degree,gender,telephone,email FROM user_details WHERE regNum = '$reg'";
        $result = mysqli_query($con, $sql);
        if ($result && mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);
            ?>
<div class="user-detail">
    <div class="udclose">
        <form action="userManagement.page.php" method="post">
            <div><button name="udclose" type="submit">Close</button></div>
        </form>
    </div>
    <div class="h1">
        <h1>Student details</h1>
    </div>
    <div class="ud1">
        <div class="udf">
            <p>Resistration number </p>
        </div>
        <div class="udb">
            <?php echo "<p>: " . $row['regNum'] . "</p>"; ?>
        </div>
    </div>
    <div class="ud2">
        <div class="udf">
            <p>Name </p>
        </div>
        <div class="udb">
            <?php echo "<p>: " . $row['fName'] . " " . $row['lName'] . "</p>"; ?>
        </div>
    </div>
    <div class="ud1">
        <div class="udf">
            <p>Gender </p>
        </div>
        <div class="udb">
            <?php echo "<p>: " . $row['gender'] . "</p>"; ?>
        </div>
    </div>
    <div class="ud2">
        <div class="udf">
            <p>Degree </p>
        </div>
        <div class="udb">
            <?php echo "<p>: " . $row['degree'] . "</p>"; ?>
        </div>
    </div>
    <div class="ud1">
        <div class="udf">
            <p>Mobile </p>
        </div>
        <div class="udb">
            <?php echo "<p>: " . $row['telephone'] . "</p>"; ?>
        </div>
    </div>
    <div class="ud2">
        <div class="udf">
            <p>E-mail </p>
        </div>
        <div class="udb">
            <?php echo "<p>: " . $row['email'] . "</p>"; ?>
        </div>
    </div>
</div>
<?php
        } else {
            ?>
<script>
alert('User does not exist!');
</script>
<?php
        }
    }
    if (isset($_POST['udclose'])) {
        $_POST['gt-user-btn'] = null;
    }

    if (isset($_POST['gt-user-all-btn'])) {
        $reg = $_POST['gt-user-all'];
        if (empty($_POST['gt-user-all'])) {
            ?>
<script>
alert('Please enter the year');
</script>
<?php
        } else {
            $sql = "SELECT regNum,fName,lName,degree,gender,telephone,email FROM user_details WHERE regNum LIKE '$reg%'";
            $result = mysqli_query($con, $sql);
            ?>
<div class="user-detail-all">
    <div class="udclose closeall">
        <form action="userManagement.page.php" method="post">
            <div><button name="udaclose" type="submit">Close</button></div>
        </form>
    </div>
    <div class="h2">
        <h2>
            <?php echo $_POST['gt-user-all']; ?> Student details
        </h2>
    </div>
    <div class="udahead">
        <div class="uadef ua1 10">Registration number</div>
        <div class="uadef ua2 20">Name</div>
        <div class="uadef ua3 30">Degree</div>
        <div class="uadef ua4 40">Gender</div>
        <div class="uadef ua5 50">Mobile</div>
        <div class="uadef ua6 60">E-mail</div>
    </div>
    <?php
                while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="udarow">
        <div class="uadefa ua1">
            <?php echo "<p>" . $row['regNum'] . "</p>"; ?>
        </div>
        <div class="uadefa ua2">
            <?php echo "<p>" . $row['fName'] . " " . $row['lName'] . "</p>"; ?>
        </div>
        <div class="uadefa ua3">
            <?php echo "<p>" . $row['degree'] . "</p>"; ?>
        </div>
        <div class="uadefa ua4">
            <?php echo "<p>" . $row['gender'] . "</p>"; ?>
        </div>
        <div class="uadefa ua5">
            <?php echo "<p>" . $row['telephone'] . "</p>"; ?>
        </div>
        <div class="uadefa ua6">
            <?php echo "<p>" . $row['email'] . "</p>"; ?>
        </div>
    </div>
    <?php
                }
        }
    }
    ?>
</div>
<?php

    /*   remove user  */
    if (isset($_POST['rm-user-btn'])) {
        $reg = $_POST['rm-user'];
        if (empty($_POST['rm-user'])) {
            ?>
<script>
alert('Please enter a user!');
</script>
<?php
        } else {
            $sql = "DELETE FROM user_details WHERE regNum LIKE '$reg'";
            mysqli_query($con, $sql);
            $sql0 = "DELETE FROM get_kuppi_details WHERE regNum='$reg';";
            mysqli_query($con, $sql0);
            $sql1 = "DELETE FROM give_kuppi_details WHERE regNum='$reg';";
            mysqli_query($con, $sql1);
            updateHistory($con, "Admin removed " . $reg . " user");
        }
    }

    if (isset($_POST['rm-user-all-btn'])) {
        $id = $_POST['rm-user-all'];
        if (empty($_POST['rm-user-all'])) {
            ?>
<script>
alert('Please enter the batch(2XXX)');
</script>
<?php
        } else {
            $sql = "DELETE FROM user_details WHERE regNum LIKE '$id%'";
            mysqli_query($con, $sql);
            $sql2 = "DELETE FROM get_kuppi_details WHERE regNum='$id%';";
            mysqli_query($con, $sql2);
            $sql3 = "DELETE FROM give_kuppi_details WHERE regNum='$id%';";
            mysqli_query($con, $sql3);
            updateHistory($con, "Admin removed " . $id . " batch");
        }
    }

} else {
    session_destroy();
}
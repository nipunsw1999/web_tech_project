<?php
session_start();
include_once("../include/connection.include.php");
include_once("../style/admin.style.php");
if (isset($_SESSION['admins'])) { ?>


<title>Admin profile</title>

<div class="upper">
    <!-- <div class="upper-inside">
        <div class="upper-p-inside">
            <div class="upper-p">
                <p><i class='bx bx-shield-quarter bx-burst'></i></i></i><span id="auto"></span></p>
            </div>
            <script>
            var typed = new Typed('#auto', {
                strings: ['You logged as the Administrator.', 'Have a nice day!'],
                typeSpeed: 150,
                backSpeed: 50,
                loop: true
            });
            </script>
        </div>
        <div class="upper-e">
            <div>Change Enrollment key</div>
            <div class="enrollKey">
                <form action="../include/admin.include.php" method="post">
                    <input type="text" name="KEY" placeholder="Enrollment key">
                    <button type="submit" name="setKey">Set key</button>
                </form>
            </div>
        </div>
    </div> -->
    <div class="upper-1">
        <div>
            <p><i class='bx bx-shield-quarter bx-burst'></i></i></i><span id="auto"></span></p>
        </div>
        <script>
        var typed = new Typed('#auto', {
            strings: ['You logged as the Administrator.', 'Have a nice day!'],
            typeSpeed: 150,
            backSpeed: 50,
            loop: true
        });
        </script>
    </div>

    <div class="upper-2">
        <div>
            <form class="en" action="admin.page.php" method="post">
                <input type="text" name="KEY" placeholder="Set enrollment key">
                <button type="submit" name="setKey">Set key</button>
            </form>

        </div>

    </div>
    <?php

        if (isset($_POST['setKey']) && !empty($_POST['KEY'])) {
            $key = $_POST['KEY'];
            // if(empty($key)){
            //     $key = "Kupp!DcsPr099";
            // }
            $sql = "UPDATE admin_base SET enrollkey = '" . $key . "' WHERE Aid = 1;";
            mysqli_query($con, $sql);
            $sql = "SELECT enrollkey FROM admin_base WHERE Aid=1;";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>
    <div class="en">
        <?php
                echo "New enroll key : " . $row['enrollkey'];
                updateHistory($con, "Admin set new enrollment key " . $row['enrollkey']);
                ?>
    </div>
    <?php } ?>
</div>
<div class="intro">
    <form action="admin.page.php" method="POST">
        <div class="image"><img src="../media/kuppi logoW.png" alt=""></div>
        <div class="form-div"><i class='bx bx-home'></i><button name="home" type="submit"
                class="admin-btn">Home</button></div>
        <div class="form-div"><i class='bx bx-book-open'></i><button name="m-sub" type="submit"
                class="admin-btn">Subject Management</button></div>
        <div class="form-div"><i class='bx bxs-user-detail'></i><button name="us-mn" type="submit"
                class="admin-btn">User managemnt</button></div>
        <div class="form-div"><i class='bx bx-history'></i><button name="us-hs" type="submit"
                class="admin-btn">History</button></div>
        <div class="form-div"><i class='bx bx-lock-open'></i><button name="c-pwd" type="submit" class="admin-btn">Change
                password</button></div>
        <div class="form-div"><i class='exit bx bx-log-out'></i><button name="l-out" type="submit" class="admin-btn">Log
                out</button></div>
    </form>

</div>



<?php
    if (isset($_POST['us-hs'])) {
        echo "<script>";
        echo "window.location.href = 'history.page.php';";
        echo "</script>";
    }
    if (isset($_POST['l-out'])) {
        session_destroy();
        updateHistory($con, "Admin logged out.");
        echo "<script>";
        echo "window.location.href = 'index.php';";
        echo "</script>";

    }
    if (isset($_POST['home'])) {
        echo "<script>";
        echo "window.location.href = 'home.page.php';";
        echo "</script>";

    }
    if (isset($_POST['c-pwd'])) {
        echo "<script>";
        echo "window.location.href = 'changepwd.page.php';";
        echo "</script>";
    }

    if (isset($_POST['us-mn'])) {
        echo "<script>";
        echo "window.location.href = 'userManagement.page.php';";
        echo "</script>";
    }
    if (isset($_POST['m-sub'])) {
        echo "<script>";
        echo "window.location.href = 'subjectManagement.page.php';";
        echo "</script>";
    }


    ?>
<style>
.en {
    color: #fff;
    border: none;
}

.en:hover {
    color: #fff;
    border: 0 solid black;
}
</style>
<?php

} else {
    echo "<script>";
    echo "window.location.href = 'index.php';";
    echo "</script>";
}
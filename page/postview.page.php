<?php
session_start();
include_once("../include/connection.include.php");
include_once("../style/postview.style.php");
?>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<title>More details</title>

<?php
if (isset($_SESSION['regNum']) || isset($_SESSION['admins']) || isset($_SESSION['mod'])) {

    $id = $_SESSION['GKid'];
    if ($_SESSION['Kuppitype'] == "give") {
        $sql = "SELECT regNum FROM give_kuppi_details WHERE GKid='$id';";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $id = $row['regNum'];
    } else {
        $sql = "SELECT regNum FROM get_kuppi_details WHERE GKid='$id';";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $id = $row['regNum'];
    }
    $sql = "SELECT * FROM user_details WHERE regNum = '$id';";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    $name = $row['fName'] . " " . $row['lName'];
    $degree = $row['degree'];
    if ($degree == "dcs") {
        $degree = "Direct Computer Science";
    } else {
        $degree = "Physical Computer Science";
    }
    $gender = $row['gender'];
    if ($gender == "male") {
        $gender = "<i class='bx bx-male'></i>";
    } else {
        $gender = "<i class='bx bx-female'></i>";
    }

    $mobile = $row['telephone'];
    $email = $row['email'];
    ?>

<div class="profile-head">
    <div class="profile-head-left">
        <?php
            if ($row['img'] != null) {
                ?>
        <img src="../picture/<?php echo $row['img']; ?>" alt=""><?php
            } else {
                ?>
        <img src="../media/profile_default.png" alt="">
        <?php
            } ?>
    </div>
    <div class="profile-head-right">
        <div class="profile-head-rows-s">

            <div style="display:flex">
                <p>
                    <?php echo $name; ?>
                </p>
                <p>
                    <?php echo $gender; ?>
                </p>
            </div>




        </div>
        <div class="profile-head-rows-s">

            <p>
                <?php echo $degree; ?>
            </p>

        </div>
        <div class="profile-head-rows-s">

            <p>
                <?php echo $mobile; ?>
            </p>

        </div>
        <div class="profile-head-rows-s">

            <p>
                <?php echo $email; ?>
            </p>

        </div>
    </div>
</div>
<div class="dwn">
    <div class="ctrl-main">
        <?php
            $type = $_SESSION['Kuppitype'];
            $GKid = $_SESSION['GKid'];
            if ($type == "give") {
                $sql = "SELECT * FROM give_kuppi_details WHERE GKid='$GKid';";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
                $check = $row['regNum'];
            } else {
                $sql = "SELECT * FROM get_kuppi_details WHERE GKid='$GKid';";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
                $check = $row['regNum'];
            }
            if ((isset($_SESSION['regNum']) && $_SESSION['regNum'] == $check) || isset($_SESSION['admins']) || isset($_SESSION['mod'])) {
                ?>
        <form action="postview.page.php" class="ctrl" method="post">
            <div class="ctrl-btn"><button type="submit" name="rm"><i
                        class='bx bx-message-alt-x bx-fade-left'></i>Remove</button></div>
        </form>
        <?php
            }
            if (isset($_POST['back'])) {
                echo "<script>";
                echo "window.location.href = 'home.page.php';";
                echo "</script>";
            }
            if (isset($_POST['rm'])) {
                if ($type == "get") {
                    $sql = "DELETE FROM get_kuppi_details WHERE GKid='$GKid';";
                    $result = mysqli_query($con, $sql);
                    echo "<script>";
                    echo "window.location.href = 'profile.page.php';";
                    echo "</script>";
                    if (isset($_SESSION['regNum'])) {
                        updateHistory($con, $_SESSION['regNum'] . " removed a get kuppi post.");
                    } else if (isset($_SESSION['admins'])) {
                        updateHistory($con, "Admin removed a get kuppi post.");
                    } else if (isset($_SESSION['mod'])) {
                        updateHistory($con, "Moderator removed a get kuppi post.");
                    } else {
                        updateHistory($con, "Unknown person removed a get kuppi post.");
                    }

                } else if ($type == "give") {
                    $sql = "DELETE FROM give_kuppi_details WHERE GKid='$GKid';";
                    $result = mysqli_query($con, $sql);
                    echo "<script>";
                    echo "window.location.href = 'profile.page.php';";
                    echo "</script>";
                    if (isset($_SESSION['regNum'])) {
                        updateHistory($con, $_SESSION['regNum'] . " removed a give kuppi post.");
                    } else if (isset($_SESSION['admins'])) {
                        updateHistory($con, "Admin removed a give kuppi post.");
                    } else if (isset($_SESSION['mod'])) {
                        updateHistory($con, "Moderator removed a give kuppi post.");
                    } else {
                        updateHistory($con, "Unknown person removed a give kuppi post.");
                    }
                }
            }
            ?>
        <form action="postview.page.php" class="ctrl" method="post">
            <div class="ctrl-btn"><button type="submit" name="back"><i
                        class='bx bx-arrow-back bx-fade-left'></i>Back</button></div>
        </form>
    </div>


    <?php

        if ($type == "give") {
            $sql = "SELECT * FROM give_kuppi_details WHERE GKid='$GKid';";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>
    <div class="meme">
        <div class="meme-content">
            <div>
                <?php echo $row['kuppititle']; ?>
            </div>
            <div>
                <?php echo $row['kuppicoz']; ?>
            </div>
            <div class="dd">
                <p> <span style="font-weight:bold;color:red;">More:-</span></span>
                    <?php echo $row['kuppidesc'] ?>
            </div>
        </div>
    </div>
</div>
</div>
<?php
        } else {
            $sql = "SELECT * FROM get_kuppi_details WHERE GKid='$GKid';";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>
<div class="meme">
    <div class="meme-content">
        <div>
            <?php echo $row['gettitle']; ?>
        </div>
        <div>
            <?php echo $row['getcoz']; ?>
        </div>
        <div class="dd">
            <p> <span style="font-weight:bold;color:red;">More:-</span></span>
                <?php echo $row['getdesc'] ?>
            </p>
        </div>
    </div>
</div>
</div>
<?php
        }

?>
<?php
} else {
    session_destroy();
    header("Location:index.php");
}
?>
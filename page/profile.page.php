<?php
session_start();
include_once("../include/connection.include.php");
include_once("../style/profile.style.php");
include_once("../style/postview.style.php");
include_once("../style/home.style.php");
?>


<title>Profile</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<?php
if (isset($_SESSION['regNum'])) {
    $id = $_SESSION['regNum'];
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




<heade>
    <div class="dropdown">
        <button class="dropbtn">
            <i class='bx bx-menu bx-tada-hover'></i>
        </button>
        <div class="dropdown-content">
            <a href="home.page.php">Home</a>
            <a href="changeProfile.page.php">Edit profile</a>
            <a value="<?php ?>" href="logout.php">Logout</a>
        </div>
    </div>
</heade>

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

            <p>
                <?php echo $name; ?>
            </p>


            <p>
                <?php echo $gender; ?>
            </p>

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


<?php
    if (isset($_POST['logout'])) {
        session_destroy();
        echo "<script>";
        echo "window.location.href = 'index.php';";
        echo "</script>";
    }
    ?>
<div class="dwnnew">
    <div class="ka">
        <div class="kadiv"><a href="getkuppi.page.php"><i class='bx bxs-chevrons-down bx-fade-down'></i>Request a
                kuppi</a>
        </div>
        <div class="kadiv"><a href="givekuppi.page.php">Provide a kuppi<i class='bx bxs-chevrons-up bx-fade-up'></i></a>
        </div>
    </div>
    <div class="share">
        <div class="share-up">
            <form action="profile.page.php" method="post" class="share-up-right-fm">
                <div class="rht" style="margin-left:-80%;">
                    <div class="share-up-right-fm-div-get"><button type="submit" name="get">Requested</button></div>
                    <div class="share-up-right-fm-div-give"><button type="submit" name="give">Provided</button></div>
                </div>
            </form>
        </div>
        <div class="share-down">
            <?php
                if (isset($_POST['give'])) {
                    $id = $_SESSION['regNum'];
                    $_POST['get'] = "";
                    $sql = "SELECT
                    user_details.regNum,
                    user_details.fName,
                    user_details.lName,
                    user_details.degree,
                    user_details.telephone,
                    user_details.email,
                    user_details.gender,
                    give_kuppi_details.GKid,
                    user_details.img,
                    give_kuppi_details.kuppicoz,
                    give_kuppi_details.kuppititle,
                    give_kuppi_details.kuppidesc
                FROM
                    user_details
                INNER JOIN
                    give_kuppi_details
                ON
                    user_details.regNum = give_kuppi_details.regNum
                WHERE
                    give_kuppi_details.regNum = '$id';
                ";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
            <div class="meme">
                <?php
                            $gender = $row['gender'];
                            if ($gender == "male") {
                                $gender = "<i class='bx bx-male'></i>";
                            } else {
                                $gender = "<i class='bx bx-female'></i>";
                            }

                            ?>
                <style>
                .share-up-right-fm-div-give button {
                    background: rgb(0, 74, 87);
                    color: #fff;
                    font-weight: bold;
                    border: none;
                }
                </style>
                <div class="meme-left">
                    <div>
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
                </div>
                <div class="meme-right">
                    <div class="meme-right-title">
                        <?php echo $row['kuppititle']; ?>
                    </div>
                    <div class="meme-right-coz">
                        <?php echo $row['kuppicoz']; ?>
                    </div>

                    <div class="meme-right-btn">
                        <div class="meme-right-name">
                            <?php echo $row['fName'] . $gender; ?>
                        </div>
                        <form action="home.page.php" method="post">
                            <div><button class="btnn" value="<?php $_SESSION['Kuppitype'] = "give";
                                        echo $row['GKid']; ?>" type="submit" name="visit">More details</button></div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
                    }
                } else if (isset($_POST['get'])) {
                    $sql = "SELECT
                    user_details.regNum,
                    user_details.fName,
                    user_details.lName,
                    user_details.degree,
                    user_details.telephone,
                    user_details.email,
                    user_details.gender,
                    user_details.img,
                    get_kuppi_details.GKid,
                    get_kuppi_details.getcoz,
                    get_kuppi_details.gettitle,
                    get_kuppi_details.getdesc
                FROM
                    user_details
                INNER JOIN
                    get_kuppi_details
                ON
                    user_details.regNum = get_kuppi_details.regNum
                WHERE
                    get_kuppi_details.regNum = '$id';
                ";
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
            <div class="meme">
                <?php
                                $gender = $row['gender'];
                                if ($gender == "male") {
                                    $gender = "<i class='bx bx-male'></i>";
                                } else {
                                    $gender = "<i class='bx bx-female'></i>";
                                }

                                ?>
                <style>
                .share-up-right-fm-div-get button {
                    background: rgb(0, 74, 87);
                    color: #fff;
                    font-weight: bold;
                }
                </style>
                <div class="meme-left">
                    <div>
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
                </div>
                <div class="meme-right">
                    <div class="meme-right-title">
                        <?php echo $row['gettitle']; ?>
                    </div>
                    <div class="meme-right-coz">
                        <?php echo $row['getcoz']; ?>
                    </div>

                    <div class="meme-right-btn">
                        <div class="meme-right-name">
                            <?php echo $row['fName'] . $gender; ?>
                        </div>
                        <form action="home.page.php" method="post">
                            <div><button class="btnn" value="<?php $_SESSION['Kuppitype'] = "get";
                                            echo $row['GKid']; ?>" type="submit" name="visit">More details</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
                    }
                }

                if (isset($_POST['visit'])) {
                    $_SESSION['GKid'] = $_POST['visit'];
                    echo "<script>";
                    echo "window.location.href = 'postview.page.php';";
                    echo "</script>";
                }
                ?>
        </div>
    </div>
</div>

<?php
} else if (isset($_SESSION['admins'])) {
    echo "<script>";
    echo "window.location.href = 'admin.page.php';";
    echo "</script>";
} else if (isset($_SESSION['mod'])) {
    echo "<script>";
    echo "window.location.href = 'moderate.page.php';";
    echo "</script>";
} else {
    echo "<script>";
    echo "window.location.href = 'index.php';";
    echo "</script>";
}
?>
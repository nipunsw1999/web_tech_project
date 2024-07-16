<?php
session_start();
include_once("../include/connection.include.php");
include_once("../style/home.style.php");
if (isset($_SESSION['regNum']) || isset($_SESSION['admins']) || isset($_SESSION['mod'])) {
    ?>


    <title>Home</title>

    <div class="upper">
        <div class="theme">
            <img src="../media/kuppi logo.png" alt="">
        </div>
        <div class="nav">
            <div>
                <a href="profile.page.php">Profile</a>
            </div>
            <div>
                <a href="analysis.page.php">Analysis</a>
            </div>
            <div class="hdimg">
                <?php
                if (!isset($_SESSION['admins']) && !isset($_SESSION['mod'])) {
                    $id = $_SESSION['regNum'];
                    $sql0 = "SELECT * FROM user_details WHERE regNum = '$id';";
                    $result = mysqli_query($con, $sql0);
                    $row = mysqli_fetch_assoc($result);
                    if ($row['img'] != null) {
                        ?>
                        <img src="../picture/<?php echo $row['img']; ?>" alt="">
                        <?php
                    } else {
                        ?>
                        <img src="../media/profile_default.png" alt="">
                        <?php
                    }
                } else {
                    ?><img src="../media/profile_default.png" alt="">
                    <?php
                } ?>
            </div>
        </div>
    </div>

    <!-- This is publish unit -->
    <div class="share">
        <div class="share-up">
            <form action="home.page.php" class="share-up-left" method="post">
                <div>
                    <select name="type">
                        <option value="get">Requested</option>
                        <option value="give">Provided</option>
                    </select>
                </div>
                <div class="src"><input class="find" type="text" placeholder="Search here" name="search-input"></div>
                <!--<i class='bx bx-search-alt bx-tada'>-->
                <div>
                    <button class="find0" type="submit" name="search"><i
                            class='bx bx-search-alt bx-tada-hover'></i></button>
                </div>
            </form>
            <form action="home.page.php" method="post" class="share-up-right-fm">
                <div class="rht">
                    <div class="share-up-right-fm-div-get"><button type="submit" name="get">Requested</button></div>
                    <div class="share-up-right-fm-div-give"><button type="submit" name="give">Provided</button></div>
                </div>
            </form>
        </div>
        <div class="share-down">
            <?php
            if (isset($_POST['give'])) {
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
gender,
give_kuppi_details.kuppicoz,
gender,
give_kuppi_details.kuppititle,
gender,
give_kuppi_details.kuppidesc,
coz_details.cozid,
coz_details.cozname,
coz_details.cozlevel
FROM
    user_details
INNER JOIN
    give_kuppi_details
ON
    user_details.regNum = give_kuppi_details.regNum
INNER JOIN
    coz_details
ON
    give_kuppi_details.kuppicoz = coz_details.cozid";

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
                                    <img src="../picture/<?php echo $row['img']; ?>" alt="">
                                    <?php
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
                                <?php echo $row['kuppicoz'] . "<br>" . $row['cozname']; ?>
                            </div>

                            <div class="meme-right-btn">
                                <div class="meme-right-name">
                                    <?php echo $row['fName'] . $gender; ?>
                                </div>
                                <form action="home.page.php" method="post">
                                    <div><button class="btn" value="<?php $_SESSION['Kuppitype'] = "give";
                                    echo $row['GKid']; ?>" type="submit" name="visit">More details</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else if (isset($_POST['search'])) {
                if ($_POST['type'] == "give") {
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
                    gender,
                    give_kuppi_details.kuppicoz,
                    gender,
                    give_kuppi_details.kuppititle,
                    gender,give_kuppi_details.getkey,
                    give_kuppi_details.kuppidesc,
                    coz_details.cozid,
                    coz_details.cozname,
                    coz_details.cozlevel
                    FROM
                        user_details
                    INNER JOIN
                        give_kuppi_details
                    ON
                        user_details.regNum = give_kuppi_details.regNum
                    INNER JOIN
                        coz_details
                    ON
                        give_kuppi_details.kuppicoz = coz_details.cozid";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $array = explode(',', strtolower(trim($row['getkey'])));
                        $find = strtolower(trim($_POST['search-input']));
                        if (in_array($find, $array) || ($find == ($row['kuppicoz']))) { ?>
                                <div class="meme">
                                    <?php
                                    $gender = $row['gender'];
                                    if ($gender == "male") {
                                        $gender = "<i class='bx bx-male'></i>";
                                    } else {
                                        $gender = "<i class='bx bx-female'></i>";
                                    }

                                    ?>
                                    <div class="meme-left">
                                        <div>
                                            <?php
                                            if ($row['img'] != null) {
                                                ?>
                                                <img src="../picture/<?php echo $row['img']; ?>" alt="">
                                            <?php
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
                                        <?php echo $row['kuppicoz'] . "<br>" . $row['cozname']; ?>
                                        </div>

                                        <div class="meme-right-btn">
                                            <div class="meme-right-name">
                                            <?php echo $row['fName'] . $gender; ?>
                                            </div>
                                            <form action="home.page.php" method="post">
                                                <div><button class="btn" value="<?php echo $row['GKid']; ?>" type="submit" name="visit">More
                                                        details</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    }
                } else if ($_POST['type'] == "get") {
                    $sql = "SELECT user_details.regNum, user_details.fName, user_details.lName, user_details.degree, user_details.telephone, user_details.email, user_details.gender,user_details.img,get_kuppi_details.GKid,get_kuppi_details.getkey, gender,           coz_details.cozid,
                    coz_details.cozname,
                    coz_details.cozlevel,get_kuppi_details.getcoz, gender,get_kuppi_details.gettitle, gender,get_kuppi_details.getdesc FROM user_details INNER JOIN get_kuppi_details ON user_details.regNum=get_kuppi_details.regNum             INNER JOIN
                    coz_details
                ON
                    get_kuppi_details.getcoz = coz_details.cozid;";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $array = explode(',', strtolower(trim($row['getkey'])));
                        $find = strtolower(trim($_POST['search-input']));
                        if (in_array($find, $array) || ($find == ($row['getcoz']))) { ?>
                                    <div class="meme">
                                    <?php
                                    $gender = $row['gender'];
                                    if ($gender == "male") {
                                        $gender = "<i class='bx bx-male'></i>";
                                    } else {
                                        $gender = "<i class='bx bx-female'></i>";
                                    }

                                    ?>
                                        <div class="meme-left">
                                            <div>
                                            <?php
                                            if ($row['img'] != null) {
                                                ?>
                                                    <img src="../picture/<?php echo $row['img']; ?>" alt="">
                                            <?php
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
                                        <?php echo $row['getcoz'] . "<br>" . $row['cozname']; ?>
                                            </div>

                                            <div class="meme-right-btn">
                                                <div class="meme-right-name">
                                            <?php echo $row['fName'] . $gender; ?>
                                                </div>
                                                <form action="home.page.php" method="post">
                                                    <div><button class="btn" value="<?php echo $row['GKid']; ?>" type="submit" name="visit">More
                                                            details</button></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                        }
                    }
                }
            } else if (isset($_POST['get'])) {

                $sql = "SELECT user_details.regNum, user_details.fName, user_details.lName, user_details.degree, user_details.telephone, user_details.email, user_details.gender,user_details.img,get_kuppi_details.GKid,get_kuppi_details.getkey, gender,           coz_details.cozid,
                coz_details.cozname,
                coz_details.cozlevel,get_kuppi_details.getcoz, gender,get_kuppi_details.gettitle, gender,get_kuppi_details.getdesc FROM user_details INNER JOIN get_kuppi_details ON user_details.regNum=get_kuppi_details.regNum             INNER JOIN
                coz_details
            ON
                get_kuppi_details.getcoz = coz_details.cozid;";
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
                                            <img src="../picture/<?php echo $row['img']; ?>" alt="">
                                    <?php
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
                                <?php echo $row['getcoz'] . "<br>" . $row['cozname']; ?>
                                    </div>

                                    <div class="meme-right-btn">
                                        <div class="meme-right-name">
                                    <?php echo $row['fName'] . $gender; ?>
                                        </div>
                                        <form action="home.page.php" method="post">
                                            <div><button class="btn" value="<?php $_SESSION['Kuppitype'] = "get";
                                            echo $row['GKid']; ?>" type="submit" name="visit">More details</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    <?php
                }
            } else {
                ?>
                        <div style="margin-top:50px;color:#fff;font-size:20px;">Click Requested or Provided</div>
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


<style>

</style>
<?php
session_start();
include_once("../include/connection.include.php");
include_once("../style/kuppi.style.php");
if ($_SESSION['regNum']) {
    ?>


    <title>Get kuppi</title>

    <style>
        .kuppi-div {
            padding-top: 10px;
            padding: 10px;
        }

        .kuppi {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 40%;
            height: 100%;
            border: 5px solid rgb(247, 247, 247);
            border-radius: 20px;
        }

        @media only screen and (max-width: 768px) {
            .kuppi-div {
                padding-top: 10px;
                padding: 10px;
            }

            .kuppi {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                width: 80%;
                height: 80%;
                border: 5px solid rgb(255, 255, 255);
                border-radius: 20px;
            }
        }
    </style>
    <div class="kuppi-div">
        <form action="getkuppi0.page.php" method="post" class="kuppi">
            <div class="dd">Select course</div>
            <div class="dd">
                <?php
                $klevel = $_SESSION['gklevel'];
                $sql = "SELECT * FROM coz_details WHERE cozlevel='$klevel';";
                $result = mysqli_query($con, $sql);
                ?>
                <select name="kuppicoz" id="kuppicoz">
                    <option>None</option>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <option value="<?php echo $row['cozid']; ?>"><?php echo $row['cozid'] . ": " . $row['cozname']; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="dd"><input type="text" name="kuppititle" placeholder="Title"></div>
            <div class="dd"><textarea name="kuppidesc" id="" cols="30" rows="5"
                    placeholder="Describe your request"></textarea></div>
            <div class="dd"><textarea name="kuppikey" id="" cols="30" rows="5" placeholder="Key words"></textarea></div>
            <div class="dd"><button type="submit" name="kuppiback">Go back</button></div>
            <div class="dd"><button type="submit" name="kuppishare">Confirm and publish</button></div>
        </form>
    </div>
    <?php
    if (isset($_POST['kuppiback'])) {
        echo "<script>";
        echo "window.location.href = 'getkuppi.page.php';";
        echo "</script>";
        exit();
    }
    if (isset($_POST['kuppishare'])) {
        $reg = $_SESSION['regNum'];
        $kcode = $_POST['kuppicoz'];
        $ktitle = $_POST['kuppititle'];
        $kdesc = $_POST['kuppidesc'];
        $kkey = $_POST['kuppikey'];

        if (empty($ktitle) || empty($kdesc) || empty($kcode)) {
            echo "<script>alert('Please fill in all fields');</script>";
        } else {

            $sql = "INSERT INTO get_kuppi_details (regNum, getcoz, gettitle, getdesc, getkey) VALUES (?, ?, ?, ?, ?)";


            $stmt = mysqli_stmt_init($con);

            if (mysqli_stmt_prepare($stmt, $sql)) {

                mysqli_stmt_bind_param($stmt, "sssss", $reg, $kcode, $ktitle, $kdesc, $kkey);


                if (mysqli_stmt_execute($stmt)) {
                    echo "<script>alert('Congratulations! Your request post has been published. Thank you!');</script>";
                    updateHistory($con, $reg . " published a get kuppi post.");
                    $_POST['kuppishare'] = null;
                } else {
                    echo "<script>alert('Request not published, please try again later.');</script>";
                }


                mysqli_stmt_close($stmt);
            } else {
                echo "<script>alert('Error preparing statement');</script>";
            }
        }
        echo "<script>window.location.href = 'profile.page.php';</script>";
    }

} else {
    session_destroy();
    header("Location:index.php");
}
?>
<?php
session_start();
include_once("../include/connection.include.php");
include_once("../style/subjectManagement.style.php");
if (isset($_SESSION['admins'])) { ?>
    <div class="hm">
        <a href="home.page.php">Home</a>
    </div>


    <title>Course managemnt</title>

    <div class="s-man0">
        <form action="subjectManagement.page.php" method="post" class="s-man">
            <div class="def-coz v-coz">
                <div>View courses</div>
                <div>Select level</div>
                <div>
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
                <div><button type="submit" name="v-coz" class="s-man-btn">View courses</button></div>
            </div>
            <div class="def-coz a-coz">
                <div>Add a new course</div>
                <div><input type="text" name="acozid" placeholder="Course code"></div>
                <div><input type="text" name="acozname" placeholder="Course title"></div>
                <div><button type="submit" name="a-coz" class="s-man-btn">Add course</button></div>
            </div>
            <div class="def-coz d-coz">
                <div>Delete a course</div>
                <div><input type="text" name="dcozid" placeholder="Course code"></div>
                <div><button type="submit" name="d-coz" class="s-man-btn">Delete course</button></div>
            </div>

        </form>

    </div>
    <?php
    if (isset($_POST['v-coz'])) {
        $vlevel = $_POST['list-sub'];
        $sql = "SELECT * FROM coz_details WHERE cozlevel = '$vlevel';";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result); ?>

        <div class="l-coz">
            <div class="l-coz-head">
                <div class="l-coz-head-1">
                    <div>
                        <?php echo $vlevel; ?>
                    </div>
                    <div class="udclose"><a href="subjectManagement.page.php" name="udclose">Close</a></div>
                </div>
                <div class="l-coz-head-2">
                    <div style="width: 200px;">Course code</div>
                    <div style="width: 400px;">Course title</div>
                </div>
            </div>
            <div class="l-coz-body">
                <div class="l-coz-body-c">
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <div class="l-coz-body-c-in">
                            <div style="width: 200px;">
                                <?php echo $row['cozid']; ?>
                            </div>
                            <div>
                                <?php echo $row['cozname']; ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <?php
    }

    if (isset($_POST['a-coz'])) {
        $acozid = $_POST['acozid'];
        $acozname = $_POST['acozname'];
        $alevel = "Level " . $acozid[3] . $acozid[strlen($acozid) - 2];

        if (empty($acozid) || empty($acozname)) {
            echo "<script>
alert('Please fill in all fields');
</script>";
        } else {
            if (preg_match('/CSC\d{3}[A-Z]?\d/', $acozid)) {
                $sql = "SELECT * FROM coz_details WHERE cozid='$acozid';";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
                if ($row['cozid'] == $acozid) {
                    echo "<script>
alert('Course already exists');
</script>";
                } else {
                    $sql = "INSERT INTO coz_details (cozid,cozname,cozlevel) VALUES ('$acozid','$acozname','$alevel');";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        echo "<script>
alert('Course added');
</script>";
                        updateHistory($con, "Admin added new course " . $acozname . " : " . $acozid);
                    } else {
                        echo "<script>
alert('Course not added');
</script>";
                    }
                }
            } else {
                echo "<script>
alert('Invalid course code');
</script>";
            }

        }
        echo "<script>
";
        echo "window.location.href = 'subjectManagement.page.php';";
        echo "
</script>";
    }

    if (isset($_POST['d-coz'])) {
        $dcozid = $_POST['dcozid'];
        $sql = "SELECT * FROM coz_details WHERE cozid='$dcozid';";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        if (empty($dcozid)) {
            echo "<script>
alert('lease fill in the field');
</script>";
        } else {
            if ((preg_match('/CSC\d{3}[A-Z]?\d/', $dcozid))) {
                if ($row['cozid'] == $dcozid) {
                    $sql = "DELETE FROM coz_details WHERE cozid='$dcozid';";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        echo "<script>
alert('Course deleted');
</script>";
                        updateHistory($con, "Admin deleted a course " . $acozname . " : " . $acozid);
                    } else {
                        echo "<script>
alert('Course not deleted');
</script>";
                    }
                } else {
                    echo "<script>
alert('Course does not exist');
</script>";
                }
            } else {
                echo "<script>
alert('Invalid course code');
</script>";
            }
        }
        echo "<script>
";
        echo "window.location.href = 'subjectManagement.page.php';";
        echo "
</script>";
    }
} else {
    session_destroy();
    header("Location:index.php");
    exit();
}
?>
<?php
session_start();
include_once("../include/connection.include.php");
if (isset($_SESSION['regNum'])) {
    ?>


    <title>Edit profile</title>

    <div>
        <a href="profile.page.php">Back</a>

        <form action="changeProfile.page.php" method="post" enctype="multipart/form-data">
            <div>
                <div><input type="text" name="fname" placeholder="First name"></div>
                <div><input type="text" name="lname" placeholder="Last name"></div>
                <div>
                    <button type="submit" name="submit1">Update name</button>
                </div>
            </div>
            <div id="form-contact">
                <div><input type="text" placeholder="Phone" name="phone"></div>
                <div><input type="email" placeholder="Email" name="email"></div>
                <div>
                    <button type="submit" name="submit2">Update contact details</button>
                </div>
            </div>
            <div id="form-pwd">
                <div><input type="password" placeholder="Current password" name="curpassword"></div>
                <div><input type="password" placeholder="Password" name="password"></div>
                <div><input type="password" placeholder="Re-type" name="repassword"></div>
                <div>
                    <button type="submit" name="submit3">Update password</button>
                </div>
            </div>
            <div id="form-dp">
                <div>
                    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value="">
                </div>
                <div>
                    <button type="submit" name="submit4">Update profile picture</button>
                </div>
            </div>
        </form>

    </div>
    <?php
    $id = $_SESSION['regNum'];
    if (isset($_POST['submit1'])) {
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $pattern = '/^[a-zA-Z]+$/';
        if (!(empty($_POST['fname']) || empty($_POST['lname']))) {
            if (preg_match($pattern, $fname) && preg_match($pattern, $lname)) {
                $sql = "UPDATE user_details SET fName = '$fname', lName = '$lname' WHERE regNum = '$id';";
                mysqli_query($con, $sql);
                updateHistory($con, $id . " changed name to " . $fname . " " . $lname);
                echo "<script>alert('Name updated!');</script>";
            } else {
                echo "<script>alert('Please enter a valid name');</script>";
            }
        } else {
            echo "<script>alert('Please fill the fields!');</script>";
        }

    }
    if (isset($_POST['submit2'])) {
        $phone = trim($_POST['phone']);
        $email = ($_POST['email']);
        $pattern = '/^[0-9]+$/';
        if (!(empty($_POST['phone']) || empty($_POST['email']))) {
            if (preg_match($pattern, $phone)) {
                $sql = "UPDATE user_details SET telephone = '$phone', email = '$email' WHERE regNum = '$id';";
                mysqli_query($con, $sql);
                updateHistory($con, $id . " updated contact details to " . $phone . " " . $email);
                echo "<script>alert('Contact details updated!');</script>";
            } else {
                echo "<script>alert('Please enter a valid phone number or email');</script>";
            }
        } else {
            echo "<script>alert('Please fill the fields!');</script>";
        }
    }
    if (isset($_POST['submit3'])) {
        $cp = password_hash($_POST['curpassword'], PASSWORD_DEFAULT);
        $p = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $rp = password_hash($_POST['repassword'], PASSWORD_DEFAULT);

        if (!(empty($cp) || empty($p) || empty($rp))) {
            $sql = "SELECT * FROM user_details WHERE regNum='$id';";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            if (password_verify($_POST['curpassword'], $row['password'])) {
                if ($_POST['password'] == $_POST['repassword']) {
                    $sql = "UPDATE user_details SET password = '$p' WHERE regNum = '$id';";
                    mysqli_query($con, $sql);
                    updateHistory($con, $id . " updated password.");
                    echo "<script>alert('Password updated!');</script>";
                } else {
                    echo "<script>alert('Passwords do not match!');</script>";
                }
            } else {
                echo "<script>alert('Current password is incorrect!');</script>";
            }
        } else {
            echo "<script>alert('Please fill the fields!');</script>";
        }

    }
    if (isset($_POST['submit4'])) {
        if ($_FILES["image"]["error"] === 4) {
            echo "<script>alert('Please upload a picture');</script>";
        } else {
            $name = $_FILES["image"]["name"];
            $size = $_FILES["image"]["size"];
            $tmp = $_FILES["image"]["tmp_name"];
            $ext = ['jpg', 'jpeg', 'png'];
            $imgExt = explode('.', $name);
            $imgExt = strtolower(end($imgExt));
            if (!(in_array($imgExt, $ext))) {
                echo "<script>alert('Invalid image type');</script>";
            } else if ($size > 10000000) {
                echo "<script>alert('Image too large');</script>";
            } else {
                $newName = uniqid();
                $newName .= '.' . $imgExt;

                move_uploaded_file($tmp, '../picture/' . $newName);
                $sql = "UPDATE user_details SET img = '$newName' WHERE regNum = '$id';";
                mysqli_query($con, $sql);
                updateHistory($con, $id . " updated profile picture.");
                echo "<script>alert('Profile picture updated!');</script>";
            }
        }
    }
}
?>
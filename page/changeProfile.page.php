<?php
session_start();
include_once("../include/connection.include.php");
if (isset($_SESSION['regNum'])) {
    ?>


<title>Edit profile</title>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 50px;
    /* background: url(../media/pexels-pixabay-533424.jpg);
                            background-size: covers;
                            background-repeat: no-repeat; */
}

.fm {
    margin-top: 60px;
    margin-bottom: 60px;
    width: 500px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.fm div {
    margin: 3px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.fm div:hover {
    display: visible;
}

.upr {
    width: 500px;
    display: flex;
    flex-direction: row;
    justify-content: center;
    margin-bottom: 5px;
}

.upr a {
    text-decoration: none;
    color: rgb(255, 255, 255);
    background: rgb(0, 74, 87);
    padding: 10px 30px 10px 30px;
    border: 5px solid rgb(0, 74, 87);
    transition: 0.2s;
    font-weight: bold;
    border-radius: 10px;
}

.upr a:hover {
    text-decoration: none;
    color: rgb(0, 74, 87);
    background: rgb(255, 255, 255);
    padding: 10px 30px 10px 30px;
    border: 5px solid rgb(0, 74, 87);

}

.upr p {
    font-size: 30px;
    color: rgb(0, 74, 87);
    margin-left: auto;
    margin-right: auto;
}

.form-name {}

.fm div input {
    width: 300px;
    height: 40px;
    background: #fff;
    border: 3px solid rgb(0, 74, 87);
    border-radius: 10px;
    color: rgb(0, 74, 87);
    transition: 0.2s;
}

.fm div input::placeholder {
    padding-left: 7px;
    color: rgb(0, 74, 87);
    transition: 0.5s;
}

.fm div input:hover {
    width: 300px;
    height: 40px;
    background: #fff;
    border: 3px solid rgb(0, 74, 87);
    border-radius: 10px;
    scale: 105%;
}

.fm div input:hover::placeholder {

    padding-left: 15px;
    color: rgb(255, 255, 255);
}


.fm div button {
    cursor: pointer;
    width: 180px;
    height: 40px;
    background: rgb(0, 74, 87);
    border: 3px solid rgb(0, 74, 87);
    border-radius: 10px;
    color: rgb(255, 255, 255);
    font-weight: bold;
    transition: 0.2s;
}

.fm div button:hover {
    cursor: pointer;
    width: 180px;
    height: 40px;
    background: rgb(255, 255, 255);
    border: 3px solid rgb(0, 74, 87);
    border-radius: 10px;
    color: rgb(0, 74, 87);
    font-weight: bold;
    scale: 110%;
}

.fm input[type=file]::file-selector-button {
    background: rgb(0, 74, 87);
    height: 100%;
    color: #fff;
    font-weight: bold;
    border: none;
    transition: 0.2s;
}

.fm input[type=file]:hover::file-selector-button {
    background: #fff;
    height: 100%;
    color: rgb(0, 74, 87);
    font-weight: bold;
    border: none;
}

.formm {
    box-shadow: 0 0 2px black;
    padding: 10px;
    margin-bottom: 20%;
}

@media only screen and (max-width: 768px) {
    .formm {}
}
</style>

<div>
    <div class="upr">
        <div><a href="profile.page.php"><i class='bx bx-chevrons-left bx-fade-left'></i>Back</a></div>
    </div>
    <form class="fm" action="changeProfile.page.php" method="post" enctype="multipart/form-data">
        <div class="upr">
            <div>
                <p>Edit user profile</p>
            </div>

        </div>
        <div class="formm">

            <div><input type="text" name="fname" placeholder="First name"></div>
            <div><input type="text" name="lname" placeholder="Last name"></div>
            <div>
                <button type="submit" name="submit1">Update name</button>
            </div>
        </div>
        <div class="formm">
            <div><input type="text" placeholder="Phone" name="phone"></div>
            <div><input type="email" placeholder="Email" name="email"></div>
            <div>
                <button type="submit" name="submit2">Update contact details</button>
            </div>
        </div>
        <div class="formm">
            <div><input type="password" placeholder="Current password" name="curpassword"></div>
            <div><input type="password" placeholder="Password" name="password"></div>
            <div><input type="password" placeholder="Re-type" name="repassword"></div>
            <div>
                <button type="submit" name="submit3">Update password</button>
            </div>
        </div>
        <div class="formm">
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

                $sql = "UPDATE user_details SET fName = '$fname', lName = '$lname' WHERE regNum = '$id'";
                mysqli_query($con, $sql);
                updateHistory($con, $id . " changed name to " . $fname . " " . $lname);
            } else {
                echo "<script>alert('Please enter a valid name');</script>";
            }
        } else {
            echo "<script>alert('Please fill the fields!');</script>";
        }
    }

    if (isset($_POST['submit2'])) {
        $phone = ($_POST['phone']);
        $email = ($_POST['email']);

        if (!(empty($_POST['phone']) || empty($_POST['email']))) {

            $sql = "UPDATE user_details SET telephone = '$phone', email = '$email' WHERE regNum = '$id'";
            $result = mysqli_query($con, $sql);
            if($result){
                updateHistory($con, $id . " updated contact details to " . $phone . " " . $email);
                echo "<script>alert('Contact details updated!');</script>";
            }else{
                echo "<script>alert('Contact details update incomplete!');</script>";
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
            $imgExt = pathinfo($name, PATHINFO_EXTENSION);
            $imgExt = strtolower($imgExt);

            if (!in_array($imgExt, $ext)) {
                echo "<script>alert('Invalid image type');</script>";
            } elseif ($size > 5000000) {
                echo "<script>alert('Image too large');</script>";
            } else {
                $newName = uniqid() . '.' . $imgExt;
                $uploadDirectory = '../picture/' . $newName;

                if (move_uploaded_file($tmp, $uploadDirectory)) {

                    $sql = "UPDATE user_details SET img = ? WHERE regNum = ?";


                    $stmt = mysqli_stmt_init($con);

                    if (mysqli_stmt_prepare($stmt, $sql)) {

                        mysqli_stmt_bind_param($stmt, "ss", $newName, $id);


                        if (mysqli_stmt_execute($stmt)) {
                            updateHistory($con, $id . " updated profile picture.");
                            echo "<script>alert('Profile picture updated!');</script>";
                        } else {
                            echo "<script>alert('Error updating profile picture');</script>";
                        }

                        mysqli_stmt_close($stmt);
                    } else {
                        echo "<script>alert('Error preparing statement');</script>";
                    }
                } else {
                    echo "<script>alert('Error uploading image');</script>";
                }
            }
        }
    }

}
?>
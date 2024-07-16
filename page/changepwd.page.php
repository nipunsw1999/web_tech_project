<?php
session_start();
include_once("../include/connection.include.php");
?>


<title>Password update</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
if (isset($_SESSION['admins'])) {
    ?>
<div class="container">

    <form action="changepwd.page.php" method="post" class="fm">
        <div>
            <h1>Change Admin password</h1>
        </div>
        <div><input type="password" placeholder="Current password" name="currPwd"></div>
        <div><input type="password" placeholder="New password" name="newPwd"></div>
        <div><input type="password" placeholder="Confirm password" name="newConPwd"></div>
        <div><button type="submit" name="cPwd">Change password</button></div>
        <div><button type="submit" name="goback">Go back</button></div>
    </form>
</div>
<div class="container">

    <form action="changepwd.page.php" method="post" class="fm">
        <div>
            <h1>Change user's password</h1>
        </div>
        <div><input type="text" placeholder="Registration number" name="regNum"></div>
        <div><input type="password" placeholder="New password" name="newPwd"></div>
        <div><input type="password" placeholder="Confirm password" name="newConPwd"></div>
        <div><button type="submit" name="cupwd">Change password</button></div>
        <div><button type="submit" name="goback">Go back</button></div>
    </form>
</div>
<?php
    if (isset($_POST['goback'])) {
        echo "<script>";
        echo "window.location.href = 'admin.page.php';";
        echo "</script>";
    }
    if (isset($_POST['cupwd'])) {
        $id = $_POST['regNum'];
        $pwd = $_POST['newPwd'];
        $newPwd = $_POST['newConPwd'];
        if (!(empty($pwd) || empty($newConPwd))) {
            if ($pwd == $newPwd) {
                $sql = "SELECT * FROM user_details WHERE regNum = '$id';";
                $result = mysqli_query($con, $result);
                if (mysqli_fetch_row($result) > 0) {
                    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
                    $sql = "UPDATE user_details SET password = '$newPwd' WHERE regNum = '$id';";
                    mysqli_query($con, $sql);
                    updateHistory($con, $id . " recover password by getting help from admin.");
                    echo "<script>";
                    echo "alert('Password recovered!');";
                    echo "</script>";
                } else {
                    echo "<script>";
                    echo "alert('Something went wrong!');";
                    echo "</script>";
                }
            } else {
                echo "<script>";
                echo "alert('Mismatch password');";
                echo "</script>";
            }
        } else {
            echo "<script>";
            echo "alert('Please enter a password');";
            echo "</script>";
        }
    }
    if (isset($_POST['cPwd'])) {
        $curr = $_POST['currPwd'];
        $adm = $_SESSION['admins'];
        $sql = "SELECT adminpwd FROM admin_base WHERE admins = '$adm';";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        if (password_verify($curr, $row['adminpwd'])) {
            $newPwd = password_hash($_POST['newPwd'], PASSWORD_DEFAULT);
            $newConPwd = password_hash($_POST['newConPwd'], PASSWORD_DEFAULT);
            if ($_POST['newPwd'] == $_POST['newConPwd']) {
                $sql = "UPDATE admin_base SET adminpwd = '$newPwd' WHERE admins = '$adm';";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    $_SESSION['admins'] = $adm;
                    echo "<script>alert('Password changed successfully');window.location.href='admin.page.php';</script>";
                    updateHistory($con, "Admin changed admin password.");
                    // echo "<a href="admin.page.php"></a>";
                } else {
                    echo "<script>alert('Something went wrong');window.location.href='changepwd.page.php';</script>";
                }
            } else {
                echo "<script>alert('Passwords do not match');window.location.href='changepwd.page.php';</script>";
            }
        } else {
            echo "<script>alert('Invalid password');window.location.href='changepwd.page.php';</script>";
        }


    }

} else if (isset($_SESSION['mod'])) {
    ?>
<div class="container">
    <form action="changepwd.page.php" method="post" class="fm">
        <div>
            <h1>Change password</h1>
        </div>
        <div><input type="password" placeholder="Current password" name="currPwd"></div><br>
        <div><input type="password" placeholder="New password" name="newPwd"></div>
        <div><input type="password" placeholder="Confirm password" name="newConPwd"></div>
        <div><button type="submit" name="cPwd">Change password</button></div>
        <div><button type="submit" name="goback">Go back</button></div>
    </form>
</div>
<?php
        if (isset($_POST['goback'])) {
            echo "<script>";
            echo "window.location.href = 'moderate.page.php';";
            echo "</script>";
        }

        if (isset($_POST['cPwd'])) {
            $curr = $_POST['currPwd'];
            $adm = $_SESSION['mod'];
            $sql = "SELECT adminpwd FROM admin_base WHERE admins = '$adm';";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            if (password_verify($curr, $row['adminpwd'])) {
                $newPwd = password_hash($_POST['newPwd'], PASSWORD_DEFAULT);
                $newConPwd = password_hash($_POST['newConPwd'], PASSWORD_DEFAULT);
                if ($_POST['newPwd'] == $_POST['newConPwd']) {
                    $sql = "UPDATE admin_base SET adminpwd = '$newPwd' WHERE admins = '$adm';";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        $_SESSION['mod'] = $adm;
                        echo "<script>alert('Password changed successfully');window.location.href='moderate.page.php';</script>";
                        updateHistory($con, "MOderator changed admin password.");
                        // echo "<a href="admin.page.php"></a>";
                    } else {
                        echo "<script>alert('Something went wrong');window.location.href='changepwd.page.php';</script>";
                    }
                } else {
                    echo "<script>alert('Passwords do not match');window.location.href='changepwd.page.php';</script>";
                }
            } else {
                echo "<script>alert('Invalid password');window.location.href='changepwd.page.php';</script>";
            }

html table
        }
} else if (isset($_SESSION['regNum'])) {
    if (isset($_POST['cPwd'])) {
        $curr = $_POST['currPwd'];
        $adm = $_SESSION['regNum'];
        $sql = "SELECT password FROM user_details WHERE regNum = '$adm';";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        if (password_verify($curr, $row['adminpwd'])) {
            $newPwd = password_hash($_POST['newPwd'], PASSWORD_DEFAULT);
            $newConPwd = password_hash($_POST['newConPwd'], PASSWORD_DEFAULT);
            if ($_POST['newPwd'] == $_POST['newConPwd']) {
                $sql = "UPDATE user_details SET password = '$newPwd' WHERE regNum = '$adm';";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    $_SESSION['regNum'] = $adm;
                    echo "<script>alert('Password changed successfully');window.location.href='okay.html';</script>";
                    updateHistory($con, $adm . " changed password.");
                } else {
                    echo "<script>alert('Something went wrong');window.location.href='changepwd.page.php';</script>";
                }
            } else {
                echo "<script>alert('Passwords do not match');window.location.href='changepwd.page.php';</script>";
            }
        } else {
            echo "<script>alert('Invalid password');window.location.href='changepwd.page.php';</script>";
        }


    }
} else {
    session_destroy();
    header("location:index.php");
}
?>

<style>
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

body {
    display: flex;
}

.container {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: rgb(0, 74, 87);
}

.fm {
    width: 500px;
    height: 500px;
    border: 5px solid #fff;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.fm div {
    margin: 5px;
}

.fm input {
    width: 200px;
    height: 40px;
    background: rgb(0, 74, 87);
    border: 2px solid #fff;
    transition: 0.2s;

}

.fm h1 {
    color: #fff;

    height: 50px;
}

.fm input:hover {
    scale: 105%;
}

.fm input::placeholder {
    padding-left: 10px;
    color: #fff;
    transition: 0.5s;
}

.fm input:hover::placeholder {
    padding-left: 20px;
    color: rgb(0, 74, 87);
}

.fm button {
    width: 200px;
    height: 40px;
    border: none;
    background: rgb(0, 0, 0);
    color: #fff;
    transition: 0.2s;
    cursor: pointer;
}

.fm button:hover {
    background: #fff;
    color: black;
}

@media only screen and (max-width: 768px) {
    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .fm h1 {
        font-size: 20px;
    }

    .fm {
        width: 350px;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
}
</style>
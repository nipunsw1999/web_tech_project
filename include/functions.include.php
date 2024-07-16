<?php
include_once("connection.include.php");

function isEmpty($regNum, $fName, $lName, $degree, $telephone, $email, $password, $rePassword, $adminKey, $gender)
{
    if (empty($gender) || empty($regNum) || empty($fName) || empty($lName) || empty($degree) || empty($telephone) || empty($email) || empty($password) || empty($rePassword) || empty($adminKey)) {
        return true;
    } else {
        return false;
    }
}

// function isMatch($password,$rePassword){
//     if($password === $rePassword){
//         return false;
//     }
//     else{
//         return true;
//     }
// }

function isValidEnrollment($con, $adminKey)
{

    $sql = "SELECT enrollkey FROM admin_base WHERE Aid=1;";


    $stmt = mysqli_stmt_init($con);

    if (mysqli_stmt_prepare($stmt, $sql)) {

        if (mysqli_stmt_execute($stmt)) {

            mysqli_stmt_bind_result($stmt, $enrollkey);

            if (mysqli_stmt_fetch($stmt)) {

                if ($adminKey === $enrollkey) {

                    mysqli_stmt_close($stmt);
                    return false;
                }
            }
        }
    }


    mysqli_stmt_close($stmt);
    return true;
}



function isValidPhone($telephone)
{
    $pattern = '/^[0-9]{10}$/';
    return preg_match($pattern, $telephone);
}

// function isValidEmail($email){
//     $pattern = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
//     return preg_match($pattern,$email);
// }

function isValidNames($fName, $lName)
{
    $fName = trim($fName);
    $lName = trim($lName);
    $pattern = '/^[a-zA-Z]+$/';
    return preg_match($pattern, $fName) && preg_match($pattern, $lName);
}

function isValidReg($regNum)
{
    $pattern = '/^\d{4}(?:[cC][sS][cC]|[sS][pP])\d{3}$/';


    if (preg_match($pattern, $regNum)) {
        return false;
    } else {
        return true;
    }

}

function insertToDatabase($con, $fName, $lName, $regNum, $degree, $gender, $password, $telephone, $email)
{
    $sql = "INSERT INTO user_details (regNum, fName, lName, degree, gender, password, telephone, email) VALUES ('$regNum', '$fName', '$lName', '$degree', '$gender', '$password', '$telephone', '$email')";
    mysqli_query($con, $sql);
}

function isHere($con, $regNum)
{
    $sql = "SELECT * FROM user_details WHERE regNum='$regNum';";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }

}
function isExistReg($con, $loginName, $loginPassword)
{

    $sql = "SELECT password FROM user_details WHERE regNum=?";


    $stmt = mysqli_stmt_init($con);

    if (mysqli_stmt_prepare($stmt, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $loginName);


        if (mysqli_stmt_execute($stmt)) {

            mysqli_stmt_bind_result($stmt, $hashedPassword);

            if (mysqli_stmt_fetch($stmt)) {

                if (password_verify($loginPassword, $hashedPassword)) {

                    mysqli_stmt_close($stmt);
                    return false;
                } else {

                    mysqli_stmt_close($stmt);
                    return true;
                }
            } else {

                mysqli_stmt_close($stmt);
                return true;
            }
        } else {

            mysqli_stmt_close($stmt);
            return true;
        }
    } else {

        return true;
    }
}


function isAdmin($con, $loginName, $loginPassword)
{

    $sql = "SELECT admins, adminpwd FROM admin_base WHERE Aid=1;";


    $stmt = mysqli_stmt_init($con);

    if (mysqli_stmt_prepare($stmt, $sql)) {

        if (mysqli_stmt_execute($stmt)) {

            mysqli_stmt_bind_result($stmt, $admins, $adminpwd);

            if (mysqli_stmt_fetch($stmt)) {

                if ($loginName == $admins && password_verify($loginPassword, $adminpwd)) {

                    mysqli_stmt_close($stmt);
                    return true;
                }
            }
        }
    }


    mysqli_stmt_close($stmt);
    return false;
}



function isMode($con, $loginName, $loginPassword)
{

    $sql = "SELECT admins, adminpwd FROM admin_base WHERE admins=? AND Aid = 4;";


    $stmt = mysqli_stmt_init($con);

    if (mysqli_stmt_prepare($stmt, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $loginName);


        if (mysqli_stmt_execute($stmt)) {

            mysqli_stmt_bind_result($stmt, $admins, $adminpwd);

            if (mysqli_stmt_fetch($stmt)) {

                if ($loginName == $admins && password_verify($loginPassword, $adminpwd)) {

                    mysqli_stmt_close($stmt);
                    return true;
                }
            }
        }
    }


    mysqli_stmt_close($stmt);
    return false;
}
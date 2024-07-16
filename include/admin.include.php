<?php
include_once("connection.include.php");

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
    echo "New enroll key : " . $row['enrollkey'];
    ?><br><a href="../page/admin.page.php">Go back</a>
<?php
} else {
    $sql = "SELECT enrollkey FROM admin_base WHERE Aid=1;";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    header("location:../page/admin.page.php");
}
?>
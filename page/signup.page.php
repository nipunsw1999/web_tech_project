<?php include_once("../style/sign.style.php"); ?>


<title>Sign up</title>

<div id="form-div">
    <div id="form-img"><img src="../media/kuppi logo.png" alt=""></div>
    <form action="../include/signup.include.php" method="post">
        <div id="form-div-div"><input type="text" name="regNum" placeholder="Registration number"></div>
        <div id="form-div-div"><input type="text" name="fName" placeholder="First name"></div>
        <div id="form-div-div"><input type="text" name="lName" placeholder="Last name"></div>
        <div id="form-div-div">
            <label for="">Gender: </label>
            <select class="slt" name="gender" id="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div id="form-div-div">
            <label for="">Degree select: </label>
            <select class="slt" name="degree" id="degree">
                <option value="dcs">Direct CS</option>
                <option value="pcs">Physical CS</option>
            </select>
        </div>
        <div id="form-div-div"><input type="text" name="telephone" placeholder="Mobile number"></div>
        <div id="form-div-div"><input type="email" name="email" placeholder="E-mail"></div>
        <div id="form-div-div"><input type="password" name="password" placeholder="Password"></div>
        <div id="form-div-div"><input type="password" name="rePassword" placeholder="Re-password"></div>
        <div id="form-div-div"><input type="text" name="adminKey" placeholder="Enrollment key"></div>
        <div id="form-div-div"><button type="submit" name="register">Register</button></div>
        <div id="form-div-div">
            <p>Already have an account? <a href="index.php">Login </a>here!</p>
        </div>
    </form>
</div>
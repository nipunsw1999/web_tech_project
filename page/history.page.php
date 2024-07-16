<?php
session_start();
include_once("../include/connection.include.php");
if (isset($_SESSION['admins'])) {
    ?>


    <title>History</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <div class="container">
        <div class="up">
            <div>
                <form action="history.page.php" method="post">
                    <button class="fm" type="submit" name="back"><i
                            class='bx bx-chevrons-left bx-fade-left'></i>Back</button>
                </form>
            </div>
            <div class="his">
                History
            </div>
            <div>
                <form action="history.page.php" method="post">
                    <button class="fm" type="submit" name="clr"><i class='bx bx-trash bx-tada-hover'></i>Clear all</button>
                </form>
            </div>
        </div>
        <div class="down">
            <div class="one">
                <div class="act">Activity</div>
                <div class="dt">Date</div>
                <div class="tm">Time</div>
            </div>
            <?php
            if (isset($_POST['clr'])) {
                $sql = "DELETE FROM history;";
                mysqli_query($con, $sql);
                updateHistory($con, "Admin cleaned the history.");
            }
            if (isset($_POST['back'])) {
                echo "<script>";
                echo "window.location.href = 'admin.page.php';";
                echo "</script>";
            }
            $sql = "SELECT * FROM history;";
            $result = mysqli_query($con, $sql);
            $count = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="two">
                    <div class="act">
                        <?php echo $count . ". " . $row['descr']; ?>
                    </div>
                    <div class="dt">
                        <?php echo $row['dt']; ?>
                    </div>
                    <div class="tm">
                        <?php echo $row['tm'];
                        $count++; ?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <?php
}
?>





<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    .container {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        background: #ccc;
        padding-bottom: 10px;
    }

    .up {
        margin-left: auto;
        margin-right: auto;
        width: 80%;
        height: 15%;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-around;
        margin-top: 10px;
        background: rgb(0, 74, 87);
        box-shadow: 0 0 2px black;
    }

    .his {
        font-size: 40px;
        color: #fff;
    }

    .fm {
        height: 40px;
        width: 100px;
        cursor: pointer;
        background: #fff;
        border: none;
        font-size: 15px;
        color: rgb(0, 74, 87);
        border: 2px solid rgb(0, 74, 87);
        transition: 0.2s;
    }

    .fm:hover {
        border: 2px solid rgb(255, 255, 255);
        background: rgb(0, 74, 87);
        color: #fff;

    }

    .down {
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto;
        width: 80%;
        display: flex;
        flex-direction: column;
        height: 100%;
        overflow: scroll;
        overflow-x: hidden;

    }

    .one {
        width: 100%;
        display: flex;
        flex-direction: row;
        height: 10%;
        background: rgb(0, 74, 87);
        color: #fff;
        font-weight: bold;
    }

    .two {
        margin-top: 10px;
        width: 100%;
        display: flex;
        flex-direction: row;
        height: 8%;
        background: rgb(0, 74, 87);
        color: #fff;
        font-weight: bold;
    }

    .two div {
        font-weight: lighter;
        padding-left: 10px;
        display: flex;
        align-items: center;
        font-size: 14px;
    }

    .one div {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .act {
        width: 65%;
    }

    .dt {
        width: 20%;
        background: black;
    }

    .tm {
        width: 15%;
    }
</style>
<?php
include_once("../include/connection.include.php");
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<div class="bck">
    <a href="home.page.php">Home</a>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
alert("Swipe to right if details are not visible.");
</script>
<style>
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

.bck {
    margin-top: 20px;
    width: 100%;
    height: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.bck a {
    background: rgb(0, 74, 87);
    padding: 10px;
    border: 5px solid rgb(0, 74, 87);
    color: #fff;
    text-decoration: none;
    transition: 0.2s;
    border-radius: 10px;
}

.bck a:hover {
    background: #fff;
    color: rgb(0, 74, 87);
    scale: 105%;

}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding: 20px;
    margin: 20px;
    box-shadow: 0 0 5px black;
    overflow-x: scroll;
}

.container h1 {
    color: rgb(0, 74, 87);
    font-size: 60px;
    border-bottom: 5px solid rgb(0, 74, 87);

}

.container div {
    margin: 10px;
    padding: 10px;

}

.l1 {
    margin-top: 100px;
    font-weight: bold;
    background: rgb(243, 214, 235);
    width: 600px;
    text-align: center;
}

.l2 {
    margin-top: 100px;
    font-weight: bold;
    background: rgb(214, 240, 243);
    width: 600px;
    text-align: center;
}

.ll1 {
    background: rgb(243, 214, 235);
}

.ll2 {
    background: rgb(214, 240, 243);
}

@media only screen and (max-width: 768px) {
    .bck {
        margin-bottom: 20px;
    }

    .container {
        margin: 5px;
    }

    .container h1 {
        font-size: 15px;
    }

    .container div {
        margin: 10px;
    }
}
</style>
<div class="container">
    <h1>Student Course Interaction Analysis</h1>
    <span class="l1">Level 1</span>
    <div class="ll1">

        <canvas id="myChart" style="width:600px;max-width:600px;"></canvas>

        <script>
        var xValues = [];
        var yValues = [];
        var barColors = [];

        <?php
            $array = array();
            $sql = "SELECT give_kuppi_details.*, coz_details.cozname, coz_details.cozlevel FROM give_kuppi_details INNER JOIN coz_details ON give_kuppi_details.kuppicoz = coz_details.cozid WHERE coz_details.cozlevel='Level 1S';";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                if (array_key_exists($row['cozname'], $array)) {
                    $array[$row['cozname']] += 1;
                } else {
                    $array[$row['cozname']] = 1;
                }
            }
            foreach ($array as $key => $value) {
                echo "xValues.push('$key');\n";
                echo "yValues.push('$value');\n";
                echo "barColors.push('#" . substr(md5(rand()), 0, 6) . "');\n";
            }
            ?>
        </script>

        <script>
        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Student provided these Level 1 subjects"
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true, // Start the y-axis at 0
                        }
                    }]
                }
            }
        });
        </script>
    </div>

    <div class="ll1">

        <canvas id="myChart2" style="width:600px;max-width:600px;"></canvas>

        <script>
        var xValues = [];
        var yValues = [];
        var barColors = [];

        <?php
            $array = array();
            $sql = "SELECT get_kuppi_details.*, coz_details.cozname, coz_details.cozlevel FROM get_kuppi_details INNER JOIN coz_details ON get_kuppi_details.getcoz = coz_details.cozid WHERE coz_details.cozlevel='Level 1S';";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                if (array_key_exists($row['cozname'], $array)) {
                    $array[$row['cozname']] += 1;
                } else {
                    $array[$row['cozname']] = 1;
                }
            }
            foreach ($array as $key => $value) {
                echo "xValues.push('$key');\n";
                echo "yValues.push('$value');\n";
                echo "barColors.push('#" . substr(md5(rand()), 0, 6) . "');\n";
            }
            ?>
        </script>

        <script>
        new Chart("myChart2", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Student requested these Level 1 subjects"
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true, // Start the y-axis at 0
                        }
                    }]
                }
            }
        });
        </script>
    </div>
    <span class="l2">Level 2</span>
    <div class="ll2">

        <canvas id="myChart3" style="width:600px;max-width:600px;"></canvas>

        <script>
        var xValues = [];
        var yValues = [];
        var barColors = [];

        <?php
            $array = array();
            $sql = "SELECT give_kuppi_details.*, coz_details.cozname, coz_details.cozlevel FROM give_kuppi_details INNER JOIN coz_details ON give_kuppi_details.kuppicoz = coz_details.cozid WHERE coz_details.cozlevel='Level 2S';";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                if (array_key_exists($row['cozname'], $array)) {
                    $array[$row['cozname']] += 1;
                } else {
                    $array[$row['cozname']] = 1;
                }
            }
            foreach ($array as $key => $value) {
                echo "xValues.push('$key');\n";
                echo "yValues.push('$value');\n";
                echo "barColors.push('#" . substr(md5(rand()), 0, 6) . "');\n";
            }
            ?>
        </script>

        <script>
        new Chart("myChart3", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Student provided these Level 2 subjects"
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true, // Start the y-axis at 0
                        }
                    }]
                }
            }
        });
        </script>
    </div>

    <div class="ll2">

        <canvas id="myChart4" style="width:600px;max-width:600px;"></canvas>

        <script>
        var xValues = [];
        var yValues = [];
        var barColors = [];

        <?php
            $array = array();
            $sql = "SELECT get_kuppi_details.*, coz_details.cozname, coz_details.cozlevel FROM get_kuppi_details INNER JOIN coz_details ON get_kuppi_details.getcoz = coz_details.cozid WHERE coz_details.cozlevel='Level 2S';";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                if (array_key_exists($row['cozname'], $array)) {
                    $array[$row['cozname']] += 1;
                } else {
                    $array[$row['cozname']] = 1;
                }
            }
            foreach ($array as $key => $value) {
                echo "xValues.push('$key');\n";
                echo "yValues.push('$value');\n";
                echo "barColors.push('#" . substr(md5(rand()), 0, 6) . "');\n";
            }
            ?>
        </script>

        <script>
        new Chart("myChart4", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Student requested these Level 2 subjects"
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true, // Start the y-axis at 0
                        }
                    }]
                }
            }
        });
        </script>
    </div>
</div>
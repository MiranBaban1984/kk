<?php
include("connection.php");

$sqlchart = "SELECT c.CheckerName, c.Department, COALESCE(COUNT(DISTINCT j.DOI), 0) AS 'Total Research' 
FROM checkerinfo c
LEFT JOIN teacher t ON c.CheckerID = t.CheckerID
LEFT JOIN journals j ON j.Teacher_ID = t.Teacher_ID AND c.CheckerID = j.CheckerID
GROUP BY c.CheckerName, c.Department
ORDER BY c.Department;";
$result_journal = mysqli_query($conn, $sqlchart) or die(mysqli_error($conn));
$rowchart = mysqli_fetch_all($result_journal, MYSQLI_ASSOC);

// Constructing the dataPoints array
$dataPoints = array();
foreach ($rowchart as $row) {
    $dataPoints[] = array("label" => $row['Department'], "y" => $row['Total Research']);
}
?>








<!DOCTYPE HTML>
<html>
<head>


        <style>

body {
            text-align: center;
        }



        .chart-container-a {
            display: inline-block;
            width: 80%; /* Adjust the width according to your preference */
        }
    </style>
</head>
<body>

<div class="chart-container-a">
    <div id="chartContainerA"></div>


    <div align="center"><p><h1>Total Research Number for each department</h1></p></div>
    <?php
    $a11 = 0;
    foreach ($rowchart as $row) {
    ?>
        <div align="center"><p>
            <h2>
                <?php
                echo $row['Department'] . " : " . $row['Total Research'];
                $a11 = $a11 + $row['Total Research'];
                ?>
            </h2>
        </p>
        </div>
    <?php
    }
    ?>

    <div align="center"><p><h2>---------------------------</h2></p></div>

    <div align="center"><p><h2>Total Number of Reasearch in College
            <?php
            echo " is  " . $a11;
            ?>
        </h2></p></div>
</div>

<script>
(function() {
    var chart = new CanvasJS.Chart("chartContainerA", {
        animationEnabled: true,
        theme: "light2",
        width: 1200,
        height: 500,
        title: {
            text: "College Department Number of Researches"
        },
        axisY: {
            title: "Number of Researches"
        },
        data: [{
            type: "column",
            showInLegend: true,
            legendMarkerColor: "grey",
            legendText: "Number of Researches",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });

    // Add data labels to display numbers on top of each bar
    chart.options.data[0].indexLabel = "{y}";
    chartContainerA.style.height = '500px';
    chartContainerA.style.width = '70%';
    chart.render();
})();
</script>
</body>
</html>

<?php
include("connection.php");

$sqlchart1 = "SELECT c.CheckerName, c.Department, COALESCE(sum(j.Impactfactor),0) AS 'Total Research' 
FROM checkerinfo c
LEFT JOIN teacher t ON c.CheckerID = t.CheckerID
LEFT JOIN journals j ON j.Teacher_ID = t.Teacher_ID AND c.CheckerID = j.CheckerID
GROUP BY c.CheckerName, c.Department
ORDER BY c.Department;";
$result_journal1 = mysqli_query($conn, $sqlchart1) or die(mysqli_error($conn));
$rowchart1 = mysqli_fetch_all($result_journal1, MYSQLI_ASSOC);

// Constructing the dataPoints array
$dataPoints1 = array();
foreach ($rowchart1 as $row1) {
    $dataPoints1[] = array("label" => $row1['Department'], "y" => $row1['Total Research']);
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <style>
        body {
            text-align: center;
        }

        .chart-container-b {
            display: inline-block;
            width: 80%; /* Adjust the width according to your preference */
        }
    </style>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</head>
<body>
    <div class="chart-container-b">
        <div id="chartContainerB"></div>

        <div><p><h1>Total Impactfactor for each department</h1></p></div>
        <?php
        $a111 = 0;
        foreach ($rowchart1 as $row1) {
        ?>
            <div><p>
                <h2>
                    <?php
                    echo $row1['Department'] . " : " . $row1['Total Research'];
                    $a111 = $a111 + $row1['Total Research'];
                    ?>
                </h2>
            </p>
            </div>
        <?php
        }
        ?>
        <div><p><h2>---------------------------</h2></p></div>
        <div><p><h2>Total Impactfactor in College
                <?php
                echo " is  " . $a111;
                ?>
            </h2></p></div>
    </div>

    <script>
        window.addEventListener('load', function () {
            var chart = new CanvasJS.Chart("chartContainerB", {
                animationEnabled: true,
                theme: "light2",
                width: 1200,
                height: 500,
                title: {
                    text: "College Department Total Number of Researches with Impact Factor"
                },
                axisY: {
                    title: "Number of Researches"
                },
                data: [{
                    type: "column",
                    showInLegend: true,
                    dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
                }]
            });

            chart.options.data[0].indexLabel = "{y}";
            chartContainerB.style.height = '500px';
            chartContainerB.style.width = '70%';

            chart.render();
        });
    </script>
</body>
</html>

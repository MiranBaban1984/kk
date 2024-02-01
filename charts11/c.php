<?php
include("connection.php");

$sql1 = "
    SELECT
        c.CheckerName,
        c.Department,
        COUNT(CASE WHEN j.indexing = 'Clarivate' THEN 1 END) AS 'Clarivate',
        COUNT(CASE WHEN j.indexing = 'Scopus' THEN 1 END) AS 'Scopus',
        COUNT(CASE WHEN j.indexing = 'None Scopus' THEN 1 END) AS 'None Scopus'
    FROM checkerinfo c
    LEFT JOIN teacher t ON c.CheckerID = t.CheckerID
    LEFT JOIN inters j ON j.Teacher_ID = t.Teacher_ID AND c.CheckerID = j.CheckerID
    GROUP BY c.Department
    ORDER BY c.Department;
";

$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    $dataPointsClarivate = array();
    $dataPointsScopus = array();
    $dataPointsNonScopus = array();

    while ($row = $result1->fetch_assoc()) {
        $dataPointsClarivate[] = array(
            'label' => $row['Department'],
            'y' => $row['Clarivate']
        );

        $dataPointsScopus[] = array(
            'label' => $row['Department'],
            'y' => $row['Scopus']
        );

        $dataPointsNonScopus[] = array(
            'label' => $row['Department'],
            'y' => $row['None Scopus']
        );
    }
    ?>
<?php
} else {
    echo "No data found.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            text-align: center;
        }

        .chart-container-c {
            display: inline-block;
            width: 80%; /* Adjust the width according to your preference */
        }
    </style>
    
</head>


<body>
    <div class="chart-container-c">
        <div id="chartContainerC"></div>
        <div>
            <p>
                <h1>Total Indexing for each department</h1>
            </p>
        </div>
        <?php
        $clarivateTotal = 0;
        $scopusTotal = 0;
        $noneScopusTotal = 0;

        foreach ($result1 as $row) {
            $clarivateTotal += $row['Clarivate'];
            $scopusTotal += $row['Scopus'];
            $noneScopusTotal += $row['None Scopus'];
        ?>
            <div>
                <p>
                    <h2>
                        <?php
                        echo $row['Department'] . " : Clarivate: " . $row['Clarivate'] . ", Scopus: " . $row['Scopus'] . ", None Scopus: " . $row['None Scopus'];
                        ?>
                    </h2>
                </p>
            </div>
        <?php
        }
        ?>
        <div>
            <p>
                <h2>---------------------------</h2>
            </p>
        </div>
        <div>
            <p>
                <h2>Total Indexing in College: Clarivate: <?php echo $clarivateTotal; ?>, Scopus: <?php echo $scopusTotal; ?>, None Scopus: <?php echo $noneScopusTotal; ?></h2>
            </p>
        </div>
    </div>

    <script>
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainerC", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Publication Indexing/Department"
                },
                axisY: {
                    title: "Number of Indexing"
                },
                toolTip: {
                    shared: true
                },
 
                data: [
                    {
                        type: "column",
                        name: "Clarivate",
                        showInLegend: true,
                        yValueFormatString: "#,##0.# Units",
                        dataPoints: <?php echo json_encode($dataPointsClarivate, JSON_NUMERIC_CHECK); ?>
                    },
                    {
                        type: "column",
                        name: "Scopus",
                        showInLegend: true,
                        yValueFormatString: "#,##0.# Units",
                        dataPoints: <?php echo json_encode($dataPointsScopus, JSON_NUMERIC_CHECK); ?>
                    },
                    {
                        type: "column",
                        name: "None Scopus",
                        showInLegend: true,
                        yValueFormatString: "#,##0.# Units",
                        dataPoints: <?php echo json_encode($dataPointsNonScopus, JSON_NUMERIC_CHECK); ?>
                    }
                ]
            });

            // Set the size of the chart container
            chartContainerC.style.height = '500px';
            chartContainerC.style.width = '70%';
            chart.render();
        }
    </script>



</body>
</html>

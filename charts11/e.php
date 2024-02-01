<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Citations by Department</title>

    <!-- Include CanvasJS library -->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body>
    <?php
    include("connection.php"); 
    
    include 'a1/simple_html_dom.php';

    // Function to get citations from Google Scholar
    function getCitations($profileUrl) {
        $html = file_get_html($profileUrl);

        if ($html) {
            $citationElement = $html->find('td.gsc_rsb_std', 0);

            if ($citationElement) {
                return trim($citationElement->plaintext);
            } else {
                return 0; // Return 0 if no citation count element is found
            }
        } else {
            return -1; // Return -1 if there is an error fetching the page
        }
    }

    // Connect to MySQL database


    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch Google Scholar links and department information from the "teacher" table
    $sql = "SELECT GoogleScholar, Department FROM teacher";
    $result = $conn->query($sql);

    // Create an array to store the total citations for each department
    $totalCitationsByDepartment = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $profileUrl = $row['GoogleScholar'];
            $department = $row['Department'];

            // Get citations for the current Google Scholar link
            $citations = getCitations($profileUrl);

            if ($citations >= 0) {
                // Add citations to the total for the department
                if (!isset($totalCitationsByDepartment[$department])) {
                    $totalCitationsByDepartment[$department] = 0;
                }
                $totalCitationsByDepartment[$department] += $citations;
            } else {
                echo "Error fetching Google Scholar citations for $profileUrl.<br>";
            }
        }

        // Close the database connection
        $conn->close();
    } else {
        echo "No records found in the 'teacher' table.";
        // Close the database connection
        $conn->close();
        exit; // Exit the script if there are no records
    }

    // Calculate total citations from all departments
    $totalCollegeCitations = array_sum($totalCitationsByDepartment);

    // Display the chart container after data fetching
    echo '<div id="chartContainerD" style="height: 500px; width: 70%; margin: auto;"></div>';

    // JavaScript code to generate and animate the chart
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            var chart = new CanvasJS.Chart("chartContainerD", {
                animationEnabled: true,
                theme: "light2",
                width: 1200,
                height: 500,
                title: {
                    text: "Total Citations by Department"
                },
                axisY: {
                    title: "Number of Citations"
                },
                data: [{
                    type: "column",
                    showInLegend: true,
                    legendMarkerColor: "grey",
                    legendText: "Number of Citations",
                    dataPoints: ' . json_encode(array_map(function($dept, $citations) {
                        return array("label" => $dept, "y" => $citations);
                    }, array_keys($totalCitationsByDepartment), $totalCitationsByDepartment), JSON_NUMERIC_CHECK) . '
                }]
            });

            // Add data labels to display numbers on top of each bar
            chart.options.data[0].indexLabel = "{y}";
            chart.render();
        });
    </script>';

    // Display total citations for each department with <h2> tags
    echo '<br/><br/><h2>Total Citations by Department</h2>';
    foreach ($totalCitationsByDepartment as $department => $totalCitations) {
        echo "<h2>Department: $department, Total Citations: $totalCitations</h2>";
    }
echo "<h2>---------------------------</h2>";
    // Display total citations from all departments
    echo "<h2>Total College Citations: $totalCollegeCitations</h2>";
    ?>

<br/>
<br/>

</body>


</html>

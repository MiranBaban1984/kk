<?php
include '../a1/simple_html_dom.php';

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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scientificcommunity";

$conn = new mysqli($servername, $username, $password, $dbname);

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

    // Display total citations for each department
    foreach ($totalCitationsByDepartment as $department => $totalCitations) {
        echo "Department: $department, Total Citations: $totalCitations<br>";
    }
} else {
    echo "No records found in the 'teacher' table.";
}

// Close the database connection
$conn->close();
?>

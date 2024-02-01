<?php
include '../a1/simple_html_dom.php';

function getCitations($profileUrl) {
    // Make a request to the Google Scholar profile page
    $html = file_get_html($profileUrl);

    // Check if the page was fetched successfully
    if ($html) {
        // Find the element containing the citation count
        $citationElement = $html->find('td.gsc_rsb_std', 0);

        // Check if the citation count element is found
        if ($citationElement) {
            // Extract the citation count
            $citationCount = trim($citationElement->plaintext);

            // Print the citation count
            echo "Citation Count: $citationCount<br>";
        } else {
            echo "No citation count element found on the page.";
        }
    } else {
        echo "Error fetching Google Scholar profile page.";
    }
}

// Replace 'YOUR_GOOGLE_SCHOLAR_PROFILE_URL' with the target profile URL
$profileUrl = 'https://scholar.google.com/citations?hl=en&user=bks6jxMAAAAJ';

// Call the function to get citations
getCitations($profileUrl);
?>



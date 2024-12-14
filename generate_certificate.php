<?php
// Set headers for Word document download
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=Relieving_Certificate.doc");

// Retrieve data from POST request
$faculty_name = htmlspecialchars($_POST['faculty_name'], ENT_QUOTES);
$acted_as = htmlspecialchars($_POST['acted_as'], ENT_QUOTES);
$from_date = htmlspecialchars($_POST['from_date'], ENT_QUOTES);
$to_date = htmlspecialchars($_POST['to_date'], ENT_QUOTES);

// Generate the Word-compatible HTML content
echo "
<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'>
<head>
    <meta charset='UTF-8'>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            color: #333;
        }
        .certificate-container {
            text-align: center;
            padding: 50px;
            border: 2px solid #000;
            margin: 50px auto;
            max-width: 600px;
        }
        h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class='certificate-container'>
        <h1>Relieving Certificate</h1>
        <p>This is to certify that <strong>$faculty_name</strong></p>
        <p>has successfully acted as <strong>$acted_as</strong></p>
        <p>from <strong>$from_date</strong> to <strong>$to_date</strong>.</p>
        <p>We appreciate their contribution and professionalism.</p>
        <br>
        <p><strong>BVC Engineering College</strong></p>
        <p><em>Authorized Signatory</em></p>
    </div>
</body>
</html>
";
?>

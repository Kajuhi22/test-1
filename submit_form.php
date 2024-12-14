<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bvc_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$faculty_name = $_POST['faculty_name'];
$degree = $_POST['degree'];
$gender = $_POST['gender'];
$designation = $_POST['designation'];
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];
$department_name = $_POST['department_name'];
$department_college = $_POST['department_college'];
$acted_as = $_POST['acted_as'];
$subject_name = $_POST['subject_name'];
$bank_account = $_POST['bank_account'];
$ifsc_code = $_POST['ifsc_code'];
$bank_address = $_POST['bank_address'];

// Insert data into the database
$sql = "INSERT INTO faculty_form (faculty_name, degree, gender, designation, from_date, to_date, department_name, department_college, acted_as, subject_name, bank_account, ifsc_code, bank_address)
VALUES ('$faculty_name', '$degree', '$gender', '$designation', '$from_date', '$to_date', '$department_name', '$department_college', '$acted_as', '$subject_name', '$bank_account', '$ifsc_code', '$bank_address')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>Form submitted successfully!</h2>";

    // Generate a button to download the certificate
    echo "
    <form action='generate_certificate.php' method='POST' target='_blank'>
        <input type='hidden' name='faculty_name' value='$faculty_name'>
        <input type='hidden' name='acted_as' value='$acted_as'>
        <input type='hidden' name='from_date' value='$from_date'>
        <input type='hidden' name='to_date' value='$to_date'>
        <button type='submit' style='padding:10px 20px; background-color:#28a745; color:white; font-size:16px; border:none; cursor:pointer;'>
            Download Certificate
        </button>
    </form>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

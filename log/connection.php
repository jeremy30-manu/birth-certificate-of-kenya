
<?php 
// Database configuration
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "birthcertificate_db";

// Create a connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// Birth_in_the	District_in_the	Entry_no	where_born	Name	Date_of_birth	Sex	Name_and_Surnam_of_Father	Name_and_Description_of_Informant	Name_of_Registering_Officer	Date_of_Registration	District_Assistance	Registrar	Date	user_id	
// Get form data
//$Birth = $_POST['Birth in the'];
// $District = $_POST['District in the'];
// $entry = $_POST['Entry no'];
// $where = $_POST['Where Born'];
// $yourname = $_POST['Name'];
// $DOB = $_POST['Date of Birth'];
// $gender = $_POST['Sex'];
// $nameoffather = $_POST['Name_and_Surname_ofFather'];
// $nameofmother = $_POST['Name and Maiden Name of Mother'];
// $informant = $_POST['Name and Description of Informant'];
// $officer = $_POST['Name of registering officer'];
// $registration = $_POST['Date of registration'];
// $DisAs= $_POST['District/Assistance'];
// $Regfor = $_POST['Register for'];
// $submit = $_POST['submit'];


// Insert form data into the database
// $sql = "INSERT INTO birthcertificate_information (Birth in the, District in the) VALUES ('$name', '$email')";

// if ($conn->query($sql) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// Close the connection
// $conn->close();

// if get request to file redirect to index
require "config.php.";


// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
$db_conn = mysqli_connect("localhost", "root", "", "birthcertificate_db");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
// $stmt = $conn->prepare

// $stmt->bind_param("ssssssssssssssi", $Birth_in_the, $District_in_the, $Entry_no, $where_born, $Name, $Date_of_birth, $Sex, $Name_and_Surname_of_Father, $Name_and_Description_of_Informant, $Name_of_Registering_Officer, $Date_of_Registration, $District_Assistance, $Registrar, $Date, $user_id);

// Set parameters and execute
$Birth_in_the = $_POST['Birth_in_the'];
$Birth_in_the = $_POST['Name_of_the_filler'];
$District_in_the = $_POST['District_in_the'];
$Entry_no = $_POST['Entry_no'];
$where_born = $_POST['where_born'];
$Name = $_POST['Name'];
$Date_of_birth = $_POST['Date_of_birth'];
$sex = $_POST['sex'];
$Name_and_Surname_of_Father = $_POST['Name_and_Surname_of_Father'];
$Name_and_Maiden_Name_of_Mother = $_POST['Name_and_Maiden_Name_of_Mother'];
$Name_and_Description_of_Informant = $_POST['Name_and_Description_of_Informant'];
$Name_of_Registering_Officer = $_POST['Name_of_Registering_Officer'];
$Date_of_Registration = $_POST['Date_of_Registration'];
$District_Assistance = $_POST['District_Assistance'];
$Registrar = $_POST['Registrar'];
$Date = $_POST['Date'];
$user_id = $_POST['user_id'];

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$sql=("INSERT INTO birthcertificate_information (Birth_in_the, District_in_the, Name_of_the_filler, Entry_no, where_born, Date_of_birth, sex, Name_and_Maiden_Name_of_Mother, Name_and_Surname_of_Father, Name_and_Description_of_Informant, Name_of_Registering_Officer, Date_of_Registration, District_Assistance, Registrar, user_id) VALUES ($Birth_in_the, $District_in_the, $Name_of_the_filler $Entry_no, $where_born, $Name, $Date_of_birth, $sex, $Name_and_Surname_of_Father, $Name_and_Maiden_Name_of_Mother, $Name_and_Description_of_Informant, $Name_of_Registering_Officer, $Date_of_Registration, $District_Assistance, $Registrar, $Date, $user_id)");


    // Code to save $userInput to the database goes here
    // You'll need to use database-specific code or a database abstraction layer like PDO or MySQLi

    // Remember to handle any necessary validations, sanitizations, and error checking before saving to the database


$stmt->close();
$conn->close();


?>

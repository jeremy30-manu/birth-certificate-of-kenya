<?php
// Start output buffering at the very beginning to capture any unintentional output
ob_start();

set_include_path(get_include_path() . PATH_SEPARATOR . 'path/to/config/directory');
require './log/config.php';

// Start session to use session variables
session_start();

// if get request to file redirect to index
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Location: fill.php');
    exit();  // Use exit() to ensure no further code is executed
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate input data
    $Birth_in_the = filter_input(INPUT_POST, 'Birth_in_the', FILTER_SANITIZE_SPECIAL_CHARS);
    $Name_of_the_filler = filter_input(INPUT_POST, 'Name_of_the_filler', FILTER_SANITIZE_SPECIAL_CHARS);
    $District_in_the = filter_input(INPUT_POST, 'District_in_the', FILTER_SANITIZE_SPECIAL_CHARS);
    $Entry_no = filter_input(INPUT_POST, 'Entry_no', FILTER_SANITIZE_SPECIAL_CHARS);
    $where_born = filter_input(INPUT_POST, 'where_born', FILTER_SANITIZE_SPECIAL_CHARS);
    $Name = filter_input(INPUT_POST, 'Name', FILTER_SANITIZE_SPECIAL_CHARS);
    $Date_of_birth = filter_input(INPUT_POST, 'Date_of_birth', FILTER_SANITIZE_SPECIAL_CHARS);
    $sex = filter_input(INPUT_POST, 'sex', FILTER_SANITIZE_SPECIAL_CHARS);
    $Name_and_Surname_of_Father = filter_input(INPUT_POST, 'Name_and_Surname_of_Father', FILTER_SANITIZE_SPECIAL_CHARS);
    $Name_and_Maiden_Name_of_Mother = filter_input(INPUT_POST, 'Name_and_Maiden_Name_of_Mother', FILTER_SANITIZE_SPECIAL_CHARS);
    $Name_and_Description_of_Informant = filter_input(INPUT_POST, 'Name_and_Description_of_Informant', FILTER_SANITIZE_SPECIAL_CHARS);
    $Name_of_Registering_Officer = filter_input(INPUT_POST, 'Name_of_Registering_Officer', FILTER_SANITIZE_SPECIAL_CHARS);
    $Date_of_Registration = filter_input(INPUT_POST, 'Date_of_Registration', FILTER_SANITIZE_SPECIAL_CHARS);
    $District_Assistance = filter_input(INPUT_POST, 'District_Assistance', FILTER_SANITIZE_SPECIAL_CHARS);
    $Registrar = filter_input(INPUT_POST, 'Registrar', FILTER_SANITIZE_SPECIAL_CHARS);
    $Date = filter_input(INPUT_POST, 'Date', FILTER_SANITIZE_SPECIAL_CHARS);
    $user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT);

    // Additional validation if necessary
    // Example: Validate date format
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $Date_of_Registration)) {
        $_SESSION['error'] = 'Invalid date format for Date of Registration.';
        header('Location: form_page.php');
        exit();
    }


    // Update data in the database
    $sql = "UPDATE birthcertificate_information SET
                Birth_in_the = :Birth_in_the,
                District_in_the = :District_in_the,
                where_born = :where_born,
                Name = :Name,
                Date_of_birth = :Date_of_birth,
                sex = :sex,
                Name_and_Surname_of_Father = :Name_and_Surname_of_Father,
                Name_and_Maiden_Name_of_Mother = :Name_and_Maiden_Name_of_Mother,
                Name_and_Description_of_Informant = :Name_and_Description_of_Informant,
                Name_of_Registering_Officer = :Name_of_Registering_Officer,
                Date_of_Registration = :Date_of_Registration,
                District_Assistance = :District_Assistance,
                Registrar = :Registrar,
                Date = :Date,
                user_id = :user_id
            WHERE Entry_no = :Entry_no";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':Birth_in_the' => $Birth_in_the,
        ':District_in_the' => $District_in_the,
        ':where_born' => $where_born,
        ':Name' => $Name,
        ':Date_of_birth' => $Date_of_birth,
        ':sex' => $sex,
        ':Name_and_Surname_of_Father' => $Name_and_Surname_of_Father,
        ':Name_and_Maiden_Name_of_Mother' => $Name_and_Maiden_Name_of_Mother,
        ':Name_and_Description_of_Informant' => $Name_and_Description_of_Informant,
        ':Name_of_Registering_Officer' => $Name_of_Registering_Officer,
        ':Date_of_Registration' => $Date_of_Registration,
        ':District_Assistance' => $District_Assistance,
        ':Registrar' => $Registrar,
        ':Date' => $Date,
        ':user_id' => $user_id,
        ':Entry_no' => $Entry_no // Ensure the correct Entry_no is used for the WHERE clause
    ]);
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':Birth_in_the' => $Birth_in_the,
        ':District_in_the' => $District_in_the,
        ':Entry_no' => $Entry_no,
        ':where_born' => $where_born,
        ':Name' => $Name,
        ':Date_of_birth' => $Date_of_birth,
        ':sex' => $sex,
        ':Name_and_Surname_of_Father' => $Name_and_Surname_of_Father,
        ':Name_and_Maiden_Name_of_Mother' => $Name_and_Maiden_Name_of_Mother,
        ':Name_and_Description_of_Informant' => $Name_and_Description_of_Informant,
        ':Name_of_Registering_Officer' => $Name_of_Registering_Officer,
        ':Date_of_Registration' => $Date_of_Registration,
        ':District_Assistance' => $District_Assistance,
        ':Registrar' => $Registrar,
        ':Date' => $Date,
        ':user_id' => $user_id
    ]);

    $_SESSION['success'] = "Record updated successfully!";
    header('Location: correction_form.php');
    exit();
} else {
    $_SESSION['error'] = "Invalid request method.";
    header('Location: correction_form.php');
    exit();
}
?>

<?php 

require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertNewApplicantBtn'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $gender = trim($_POST['gender']);
    $birthdate = trim($_POST['birth_date']);
    $phone_num = trim($_POST['phone_num']);
    $email = trim($_POST['email']);
    $operating_system = trim($_POST['operating_system']);
    $programming_language = trim($_POST['programming_language']);
    $employment_status = trim($_POST['employment_status']);


    if (!empty($firstName) && !empty($lastName) && !empty($gender) && !empty($birthdate) && !empty($phone_num) && !empty($email) && !empty($operating_system) && !empty($programming_language) && !empty($employment_status)) {
        
        $query = insertIntoApplicantRecords($pdo, $firstName, $lastName, $gender, $birthdate, $phone_num, $email, $operating_system, $programming_language, $employment_status);

        if ($query) {
            header("Location: ../index.php");
        }

        else {
            echo "Insertion failed";
        }
    }
    else{
        echo "Make sure that no fields are empty.";
    }
}


if (isset($_POST['editApplicantBtn'])) {
    $applicant_id = $_GET['applicant_id'];
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $gender = trim($_POST['gender']);
    $birthdate = trim($_POST['birth_date']);
    $phone_num = trim($_POST['phone_num']);
    $email = trim($_POST['email']);
    $operating_system = trim($_POST['operating_system']);
    $programming_language = trim($_POST['programming_language']);
    $employment_status = trim($_POST['employment_status']);

    if (!empty($applicant_id) && !empty($firstName) && !empty($lastName) && !empty($gender) && !empty($birthdate) && !empty($phone_num) && !empty($email) && !empty($operating_system) && !empty($programming_language) && !empty($employment_status)) {
       
        $query = updatedApplicantInfo($pdo, $applicant_id, $firstName, $lastName, $gender, $birthdate, $phone_num, $email, $operating_system, $programming_language, $employment_status);

        if ($query) {
            header('Location: ../index.php'); // Redirect to index
        } else {
            echo "Error updating record.";
        }
    }
    else{
        echo "Make sure that no fields are empty.";
    }
}
	

if (isset($_POST['deleteApplicantBtn'])) {
    $query = deleteApplicantInfo($pdo, $_GET['applicant_id']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Deletion failed";
	}
}
?>


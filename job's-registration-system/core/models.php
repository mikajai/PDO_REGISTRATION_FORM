<?php 

require_once 'dbConfig.php';


function insertIntoApplicantRecords($pdo, $first_name, $last_name, $gender, $birth_date, $phone_num, $email, $operating_system, $programming_language, $employment_status) {
    $sql = "INSERT INTO applicant_records (first_name, last_name, gender, birth_date, phone_num, email, operating_system, programming_language, employment_status)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $pdo->prepare($sql);
    
    $executeQuery = $stmt->execute([$first_name, $last_name, $gender, $birth_date, $phone_num, $email, $operating_system, $programming_language, $employment_status]);

    if ($executeQuery) {
        return true;    
    }
}

function seeAllApplicantRecords($pdo) {
	$sql = "SELECT * FROM applicant_records";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getApplicantByID($pdo, $applicant_id) {
	$sql = "SELECT * FROM applicant_records WHERE applicant_id = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$applicant_id])) {
		return $stmt->fetch();
	}
}

function updatedApplicantInfo($pdo, $applicant_id, $first_name, $last_name, $gender, $birth_date, $phone_num, $email, $operating_system, $programming_language, $employment_status) {

	$sql = "UPDATE applicant_records 
				SET first_name = ?, 
					last_name = ?, 
					gender = ?, 
					birth_date = ?, 
					phone_num = ?, 
                    email = ?,
					operating_system = ?, 
					programming_language = ?,
                    employment_status = ? 
			WHERE applicant_id = ?";
	
    $stmt = $pdo->prepare($sql);
	
	$executeQuery = $stmt->execute([$first_name, $last_name, $gender, $birth_date, $phone_num, $email, $operating_system, $programming_language, $employment_status, $applicant_id]);

	if ($executeQuery) {
		return true;
	}
}

function deleteApplicantInfo($pdo, $applicant_id) {

	$sql = "DELETE FROM applicant_records WHERE applicant_id = ?";
	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$applicant_id]);

	if ($executeQuery) {
		return true;
	}

}
?>

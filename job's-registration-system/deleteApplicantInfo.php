<?php

require_once 'core/dbConfig.php';
require_once 'core/models.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Deletion</title>
	<style>

        h1{
            text-align: center;
            margin-top: 50px;
        }
		body {
			font-family: "Times New Roman";
		}
		input {
			font-size: 1em;
			height: 30px;
			width: 100px;
		}
		table, th, td {
		  border: 1px solid black;
		}

        .applicantContainer {
			background-color: #fff;
			border-radius: 8px;
			padding: 20px;
			margin: 0 auto;
			width: 80%;
			max-width: 600px;
        }

	</style>

</head>
<body>
	<h1>Are you sure you want to delete this applicant?</h1>
    <div class="applicantContainer" style="border-style: solid; font-family: 'Times New Roman';">
        <?php $getApplicantByID = getApplicantByID($pdo, $_GET['applicant_id']); ?>
        <form action="core/handleForm.php?applicant_id=<?php echo $_GET['applicant_id']; ?>" method="POST">

                <p>First Name: <?php echo $getApplicantByID['first_name']; ?></p>
                <p>Last Name: <?php echo $getApplicantByID['last_name']; ?></p>
                <p>Gender: <?php echo $getApplicantByID['gender']; ?></p>
                <p>Birthdate: <?php echo $getApplicantByID['birth_date']; ?></p>
                <p>Phone Number: <?php echo $getApplicantByID['phone_num']; ?></p>
                <p>Email: <?php echo $getApplicantByID['email']; ?></p>
                <p>Operating System: <?php echo $getApplicantByID['operating_system']; ?></p>
                <p>Programming Language: <?php echo $getApplicantByID['programming_language']; ?></p>
                <p>Employment Status: <?php echo $getApplicantByID['employment_status']; ?></p>
                <input type="submit" name="deleteApplicantBtn" value="Delete">
                <input type="button" value="Cancel" onclick="window.location.href='index.php';">
        </form>
    </div>
</body>
</html>
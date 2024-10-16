<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Page</title>
	<style>
		body {  
            font-family: "Times New Roman";
        }

        h2{
            text-align: center;
            color: brown;
        }

        input, select {
            font-size: 1em;
            height: 25px;
            margin: 5px 0;
        }

        table, th, td {
          border: 1px solid black;
          table-layout: auto;
        }

        input[type="submit"] {
        margin-left: 10px;
        height: 25px;
        width: 100px;
        }

        form {
            margin-bottom: 20px;
        }
	</style>

</head>
<body>
	<?php $getApplicantByID = getApplicantByID($pdo, $_GET['applicant_id']); ?>
	<form action="core/handleForm.php?applicant_id=<?php echo $_GET['applicant_id']; ?>" method="POST">
		<p>
			<label for="firstName">First Name: </label> 
			<input type="text" name="firstName" id="firstName" value="<?php echo $getApplicantByID['first_name']; ?>">
		</p>
		<p>
			<label for="lastName">Last Name: </label> 
			<input type="text" name="lastName" value="<?php echo $getApplicantByID['last_name']; ?>">
		</p>
		<p>
			<label for="gender">Gender: </label>
            <select name="gender">
            <option value="Male"> <?php if ($getApplicantByID['gender'] == 'Male') echo '(selected)'; ?> Male </option>
            <option value="Female"> <?php if ($getApplicantByID['gender'] == 'Female') echo '(selected)'; ?> Female </option>
            <option value="Other"> <?php if ($getApplicantByID['gender'] == 'Other') echo '(selected)'; ?> Other</option></select>
		</p>
		<p>
			<label for="birth_date">Birthdate: </label>
			<input type="date" name="birth_date" value="<?php echo $getApplicantByID['birth_date']; ?>">
		</p>
		<p>
			<label for="phone_num">Phone Number: </label>
			<input type="tel" name="phone_num" value="<?php echo $getApplicantByID['phone_num']; ?>">
		</p>
		<p>
			<label for="email">Email: </label>
			<input type="email" name="email" value="<?php echo $getApplicantByID['email']; ?>">
        </p>
        <p>
			<label for="operating_system">Operating System: </label>
			<input type="text" name="operating_system" value="<?php echo $getApplicantByID['operating_system']; ?>">
        </p>
        <p>
			<label for="programming_language">Programming Language: </label>
			<input type="text" name="programming_language" value="<?php echo $getApplicantByID['programming_language']; ?>">
        </p>
		<p>
			<label for="employment_status">Employment Status: </label>
			<input type="text" name="employment_status" value="<?php echo $getApplicantByID['employment_status']; ?>">
            <input type="submit" name="editApplicantBtn" value="Update">
		</p>
	</form>
</body>
</html>

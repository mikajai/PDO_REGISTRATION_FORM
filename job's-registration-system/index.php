<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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
    <h2> ~ ~ ~ Welcome to the Web Developer Registration Form ~ ~ ~ </h2>
    <p>Fill the fields below to register: </p>
    <form action="core/handleForm.php" method="POST">
        <p> <label for="firstName"> First Name: </label> <input name="firstName" required>
            <label for="lastName"> Last Name: </label> <input type="text" name="lastName"></p>
        <p><label for="gender"> Gender: </label> 
            <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
            </select>
            <label for="birth_date"> Birthdate: </label> <input type="date" name="birth_date" required>
            <label for="phone_num"> Phone Number: </label> <input type="tel" name="phone_num" required></p>
        <p><label for="email"> Email: </label> <input type="email" name="email" required>
            <label for="operating_system"> Operating System: </label> <input type="text" name="operating_system">
            <label for="programming_language"> Programming Language: </label> <input type="text" name="programming_language"></p>
        <p>
        <label for="employment_status">Employment Status:</label> <input type="text" id="employment_status" name="employment_status">
        <input type="submit" name="insertNewApplicantBtn" value="Register"">
        </p>
    </form>

    <table style="width:100%; margin-top: 50px;">
      <tr>
        <th>Applicant ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Birthdate</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Operating System</th>
        <th>Programming Language</th>
        <th>Employment Status</th>
      </tr>

      <?php $seeAllApplicantRecords = seeAllApplicantRecords($pdo); ?>
	  <?php foreach ($seeAllApplicantRecords as $row) { ?>
        <tr>
            <td><?php echo $row['applicant_id']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['birth_date']; ?></td>
            <td><?php echo $row['phone_num']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['operating_system']; ?></td>
            <td><?php echo $row['programming_language']; ?></td>
            <td><?php echo $row['employment_status']; ?></td>
            <td>
                <a href="editApplicantInfo.php?applicant_id=<?php echo $row['applicant_id'];?>">Edit</a>
                <a href="deleteApplicantInfo.php?applicant_id=<?php echo $row['applicant_id'];?>">Delete</a>
            </td>
	    </tr>
      <?php } ?>
    </table>
</body>
</html>

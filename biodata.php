<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.html"); // Redirect to login if not logged in
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Biodata</title>
</head>
<body>

    <h1>Welcome, <?php echo $_SESSION['fullname']; ?>!</h1>
    <h2>Your Biodata</h2>

    <p><strong>Full Name:</strong> <?php echo $_SESSION['fullname']; ?></p>
    <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
    <p><strong>Phone Number:</strong> <?php echo $_SESSION['phone']; ?></p>
    <p><strong>Date of Birth:</strong> <?php echo $_SESSION['dob']; ?></p>
    <p><strong>Nationality:</strong> <?php echo $_SESSION['nationality']; ?></p>
    <p><strong>Marital Status:</strong> <?php echo $_SESSION['marital_status']; ?></p>
    <p><strong>Degree:</strong> <?php echo $_SESSION['degree']; ?></p>
    <p><strong>Institution:</strong> <?php echo $_SESSION['institution']; ?></p>
    <p><strong>Soft Skills:</strong> <?php echo $_SESSION['soft_skills']; ?></p>
    <p><strong>Languages Known:</strong> <?php echo $_SESSION['languages_known']; ?></p>
    <p><strong>Hobbies:</strong> <?php echo $_SESSION['hobbies']; ?></p>

</body>
</html>

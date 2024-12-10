<?php
session_start();
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Set session variables upon successful login
            $_SESSION['username'] = $username;
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['dob'] = $row['dob'];
            $_SESSION['nationality'] = $row['nationality'];
            $_SESSION['marital_status'] = $row['marital_status'];
            $_SESSION['degree'] = $row['degree'];
            $_SESSION['institution'] = $row['institution'];
            $_SESSION['soft_skills'] = $row['soft_skills'];
            $_SESSION['languages_known'] = $row['languages_known'];
            $_SESSION['hobbies'] = $row['hobbies'];

            header("Location: biodata.php");
        } else {
            echo "Invalid password. <a href='index.html'>Try Again</a>";
        }
    } else {
        echo "No user found. <a href='register.php'>Register Here</a>";
    }
}
$conn->close();
?>

<!-- HTML Form for login -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Simple styling for the login page */
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f9; }
        .container { width: 80%; max-width: 600px; margin: 50px auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); }
        h1 { color: #4CAF50; text-align: center; }
        form { display: flex; flex-direction: column; }
        input { padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>

    <div class="container">
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>

</body>
</html>

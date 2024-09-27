<?php
session_start();
global $conn;
include '../connection.php'; 

$message = []; // Initialize the message array

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Check if username exists
        $check_user_query = "SELECT * FROM user WHERE username='$username'";
        $result_user = $conn->query($check_user_query);

        if ($result_user->num_rows > 0) {
            $user = $result_user->fetch_assoc();
            // Verify the password
            if ($password == $user['password']) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $message['success'] = "Login successful. Redirecting to the dashboard...";
                // Redirect to dashboard or home page
                header("Location: index.php");
                exit();
            } else {
                $message['error'] = "Invalid password. Please try again.";
            }
        } else {
            $message['error'] = "Username does not exist. Please register.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="../Css/styles.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url(../Images/background.jpg);
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }
        main {
            background: rgba(93, 110, 130, 0.6);
            padding-top: 20px;
            padding-bottom: 20px;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 300px;
            text-align: center;
            max-height: 400px;
        }
        
        #loginForm h2{
            margin-bottom: 10px;
        }
        #loginForm label {
            text-align: center;
            display: block;
            margin-right: 120px;
            margin-top: 10px;
            font-size: 14px;
        }
        #loginForm input {
            padding: 8px;
            margin: 5px 0 15px;
            border: none;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 14px;
        }
        #loginForm button {
            
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #0F1644;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }
        #loginForm button:hover {
            background: #0F0044;
        }
        .toggle-page {
            display: flex;
            justify-content: center;
            background: #2A448C;
            border-radius: 30px;
            position: relative;
            bottom: 20px;
            
            
        }
        .toggle-page a {
            flex: 1;
            padding: 8px;
            margin-right: 10px;
            text-decoration: none;
            color: white;
            border-radius: 20px;
            font-weight: bold;
            transition: background 0.3s, color 0.3s;
            text-align: center;
        }
        .toggle-page a:hover {
            background: #0F0044;
        }
        .toggle-page .active {
            background: #251C55;
            color: white;
        }

        a {
            color: white;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .error {
            margin-bottom: 10px;
            color: red;
        }

        .success {
            color: green;
        }
    </style>
</head>
<body>
<main>
    <section id="loginSection">
        <div class="toggle-page">
            <a href="login.php" class="active">SIGN IN</a>
            <a href="register.php">SIGN UP</a>
        </div>
        <form id="loginForm" action="#" method="POST" onsubmit="return validateLoginForm()">
            <h2>Login</h2>
            <?php
            if(isset($message)) {
                if(isset($message['error'])) {
                    echo '<div class="error">' . $message['error'] . '</div>';
                }
                if(isset($message['success'])) {
                    echo '<div class="success">' . $message['success'] . '</div>';
                }
            }
            ?>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            <button type="submit" name="login">Login</button>
            <a href="index.php" style="font-size: 15px; display: block; margin-top: 20px; color: white;">Go back</a>
        </form>
    </section>
</main>

<script>
function validateLoginForm() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    if (username === '' || password === '') {
        alert('Please fill in all fields for login.');
        return false;
    }

    return true;
}
</script>
</body>
</html>

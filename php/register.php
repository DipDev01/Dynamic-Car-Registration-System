<?php
global $conn;
include '../connection.php'; // Assuming this file establishes a database connection

$message = []; // Initialize the message array

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $check_username_query = "SELECT * FROM user WHERE username='$username'";
        $result_username = $conn->query($check_username_query);

        $check_email_query = "SELECT * FROM user WHERE email='$email'";
        $result_email = $conn->query($check_email_query);

        $check_phone_query = "SELECT * FROM user WHERE phone_number='$phone'";
        $result_phone = $conn->query($check_phone_query);

        if ($result_username->num_rows > 0) {
            $message['error'] = "Username already exists. <br> Please choose a different one.";
        } elseif ($result_email->num_rows > 0) {
            $message['error'] = "Email already exists. <br> Please use a different one.";
        } elseif ($result_phone->num_rows > 0) {
            $message['error'] = "Phone number already exists. <br> Please use a different one.";
        } else {
            $sql = "INSERT INTO user (name, address, phone_number, email, username, password) VALUES ('$name', '$address', '$phone', '$email', '$username', '$password')";

            if ($conn->query($sql) === TRUE) {
                $message['success'] = "New record created successfully";
            } else {
                $message['error'] = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <style type="text/css">
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

        .register-container {
        	background: rgba(93, 110, 130, 0.6);
            margin-top: 50px;
            height: auto;
            justify-content: center;
            align-items: center;
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 400px;
            padding-bottom: 40px;
            border-radius: 20px;

        }

        #registrationForm input {
            padding: 12px;
            margin-bottom: 10px;
            border: none;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }
        #registrationForm button {
            margin-left: 40px;
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

        #registrationForm button:hover {
            background: #0F0044;
        }

        .error {
            margin-bottom: 10px;
            color: red;
        }

        .success {
            color: green;
        }

        .button {
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

        .button:hover {
            background: #0F0044;
        }

        .toggle-page {
            display: flex;
            justify-content: center;
            background: #2A448C;
            border-radius: 30px;
            margin-bottom: 20px;
            width: 100%;
        }

        .toggle-page a {
            flex: 1;
            padding: 8px;
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
    </style>
    <link rel="stylesheet" type="text/css" href="../Css/styles.css">
</head>
<body>

    <div class="register-container">
        <div class="toggle-page">
            <a href="login.php" id="signInButton">SIGN IN</a>
            <a href="register.php" class="active" id="signUpButton">SIGN UP</a>
        </div>
        <form id="registrationForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h2>Register</h2><br>
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
            <label for="name">Name:</label><br>
            <input class="color_changer" type="text" id="name" name="name" required>
            <br>
            <label for="address">Address:</label><br>
            <input class="color_changer" type="text" id="address" name="address" required>
            <br>
            <label for="phone">Phone Number:</label><br>
            <input class="color_changer" type="tel" id="phone" name="phone" required>
            <br>
            <label for="email">Email Address:</label><br>
            <input class="color_changer" type="email" id="email" name="email" required>
            <br>
            <label for="username">Username:</label><br>
            <input class="color_changer" type="text" id="username" name="username" required pattern="[a-zA-Z]+" title="Username should only contain alphabets">
            <br>
            <label for="password">Password:</label><br>
            <input class="color_changer" type="password" id="password" name="password" required minlength="6" maxlength="10" pattern="^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@#$?]).{6,10}$" title="Password must be 6-10 characters long and contain at least one letter, one number, and one of the following special characters: @, #, $, ?">
            <br>
            <button type="submit" class="button" name="submit">Register</button>
            <br>
            <a href="index.php" style="font-size: 15px; display: block; margin-top: 20px; color: white;">Go back</a>
        </form>
    </div>

</body>
</html>

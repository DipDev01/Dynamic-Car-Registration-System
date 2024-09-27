<?php
session_start();
global $conn;

// Include database connection file
require_once "../connection.php";

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit;
}

// Initialize empty message array
$messages = [];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind parameters to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO cars (make, model, year, mileage, location, price) VALUES (?, ?, ?, ?, ?, ?)");
    
    // Check if the statement was prepared successfully
    if ($stmt === false) {
        // Handle error by setting a message or logging the error
        $messages['error'] = "Error preparing the SQL statement: " . $conn->error;
    } else {
        $stmt->bind_param("ssiisi", $make, $model, $year, $mileage, $location, $price);

        // Set parameters from the form data
        $make = $_POST['make'];
        $model = $_POST['model'];
        $year = $_POST['year'];
        $mileage = $_POST['mileage'];
        $location = $_POST['location'];
        $price = $_POST['price'];

        // Execute the statement
        if ($stmt->execute()) {
            // Add success message to the array
            $messages['success'] = "Car added successfully!";
        } else {
            // Add error message to the array
            $messages['error'] = "Error adding car: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../Css/styles.css">
    <style>
        /* Modern CSS for Add Car form */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f1f1f1;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }

        form {
            display: grid;
            gap: 20px;
        }
        .container{
        input[type="text"],
        input[type="number"] {
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s ease, background-color 0.3s ease;
            font-size: 16px;
            background-color: white;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #007bff;
            background-color: yellow;
        }

        input[type="submit"] {
            padding: 15px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
            <div class="logo">
                <img src="../Images/logo/logo.png" alt="Company Logo">
            </div>
            <li><a href="index.php">Home</a></li>
            <li><a href="seller.php" class="active">Seller</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="about.php">About</a></li>
            <div class="user">
                <?php
                    if(isset($_SESSION['username'])) {
                        $username = $_SESSION['username'];
                        
                        echo '<div class="user-icon">' . strtoupper($username) . '</div>';
                        echo '<form action="" method="post">';
                        echo '<input type="submit" name="logout" value="Logout">';
                        echo '</form>';
                        
                        if(isset($_POST['logout'])) {
                            unset($_SESSION['username']);
                            // Redirect to the same page or any other page after logout
                            header('Location: '.$_SERVER['PHP_SELF']);
                            exit;
                        }
                    } else {
                        echo '<a href="login.php"><i class="fas fa-user"></i></a>';
                    }
                ?>
            </div>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h2>Add Car</h2>

        <?php
            if(isset($messages)) {
                if(isset($messages['error'])) {
                    echo '<div class="error">' . $messages['error'] . '</div>';
                }
                if(isset($messages['success'])) {
                    echo '<div class="success">' . $messages['success'] . '</div>';
                }
            }
        ?>
        <form action="" method="POST">
            <input type="text" name="make" placeholder="Make" required>
            <input type="text" name="model" placeholder="Model" required>
            <input type="number" name="year" placeholder="Year" required>
            <input type="number" name="mileage" placeholder="Mileage" required>
            <input type="text" name="location" placeholder="Location" required>
            <input type="number" name="price" placeholder="Price" required>
            <input type="submit" value="Add Car">
        </form>
    </div>

    <script>
        // Change input background color on focus and blur
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                input.style.backgroundColor = 'yellow';
            });
            input.addEventListener('blur', () => {
                input.style.backgroundColor = 'white';
            });
        });

        // Change button background color on hover
        const submitButton = document.querySelector('input[type="submit"]');
        submitButton.addEventListener('mouseover', () => {
            submitButton.style.backgroundColor = 'lightblue';
        });
        submitButton.addEventListener('mouseout', () => {
            submitButton.style.backgroundColor = '#007bff';
        });
    </script>
</body>
</html>
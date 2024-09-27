<?php 
global $conn;
include '../connection.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../Css/styles.css">
    <style type="text/css">
        .container h1 {
            text-align: center;
            margin-top: 10px;
        }
        #searchForm {
            text-align: center;
            margin-bottom: 20px;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 16px;
            margin: 16px;
            text-align: left;
            max-width: 300px;
            display: inline-block;
            vertical-align: top;
        }
        .card h3 {
            margin-top: 0;
        }
        .card p {
            margin: 4px 0;
        }
        #searchResults {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
    </style>
</head>
<body>
<div class="container">
    <nav>
        <ul>
            <div class="logo">
                <img src="../Images/logo/logo.png" alt="Company Logo">
            </div>
            <li><a href="index.php">Home</a></li>
            <li><a href="seller.php">Seller</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="about.php">About</a></li>
            <div class="user">
                <?php
                session_start();
                global $conn;
                
                // Include database connection file
                require_once "../connection.php";
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
    <h1>Search Cars</h1>
    <form id="searchForm" method="post" action="search.php">
        <label for="model">Model:</label>
        <input type="text" id="model" name="model">
        <label for="location">Location:</label>
        <input type="text" id="location" name="location">
        <button type="submit" class="button">Search</button>
    </form>

    <div id="searchResults">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $model = trim($_POST['model']);
            $location = trim($_POST['location']);

            $sql = "SELECT make, model, year, mileage, location, price FROM cars WHERE model LIKE ? AND location LIKE ?";
            $stmt = $conn->prepare($sql);
            $searchModel = "%$model%";
            $searchLocation = "%$location%";
            $stmt->bind_param("ss", $searchModel, $searchLocation);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<h2>Search Results</h2>";
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='card'>";
                    echo "<h3>" . htmlspecialchars($row['make']) . " " . htmlspecialchars($row['model']) . "</h3>";
                    echo "<p>Year: " . htmlspecialchars($row['year']) . "</p>";
                    echo "<p>Mileage: " . htmlspecialchars($row['mileage']) . " km</p>";
                    echo "<p>Location: " . htmlspecialchars($row['location']) . "</p>";
                    echo "<p>Price: $" . htmlspecialchars($row['price']) . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<h2>No results found</h2>";
            }

            $stmt->close();
        }
        ?>
    </div>

    <footer>
        <div class="footer-container">
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
            <p>1/55 Carrington Avenue, Hurstville - Sydney 2220 - Australia</p>
            <div class="call-mail">
                <a href=""><p><i class="fas fa-phone"></i> +61 0451 868 703</p></a>
                <a href=""><p><i class="fas fa-envelope"></i> devkotapallabidev2020@gmail.com</p></a>
            </div>
            <div class="circle-container">
                <div class="footer-circle"></div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>

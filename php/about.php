<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us - Car Sales Company</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/styles.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        main {
            padding: 40px;
            display: flex;
            flex-direction: column;
            gap: 40px;
            max-width: 1000px;
            margin: auto;
        }

        h1, h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        section {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);
        }

        .team-member {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .team-member h3 {
            margin: 10px 0;
        }


        .team-image img{
            width:350px;
            height: 200px;
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
            <li><a href="seller.php">seller</a></li>
            <li><a href="search.php">search</a></li>
            <li><a href="about.php">about</a></li>
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

    <h1>About Us</h1>

    <main>
        <section id="company-history">
            <h2>Our Story</h2>
            <p>
                Founded in 2005, Car Sales Company has become a leader in providing quality vehicles and exceptional customer service. Our mission is to make the car buying experience seamless and enjoyable for all our customers. Over the years, we have helped thousands of people find their perfect car.
            </p>
        </section>

        <section id="company-values">
            <h2>Our Values</h2>
            <p>
                At Car Sales Company, we believe in honesty, transparency, and customer satisfaction. We strive to build long-lasting relationships with our customers by offering quality vehicles at fair prices and providing excellent after-sales support.
            </p>
        </section>

        <section id="company-team">
            <h2>Meet Our Team</h2>
            <div class="team-member">
                <div class="team-image">
                    <img src="../Images/johnsmith.jpg">
                </div>
                <h3>John Smith - CEO</h3>
                <p>
                    John is the founder and CEO of Car Sales Company. With over 20 years of experience in the automotive industry, he leads our team with passion and dedication.
                </p>
            </div>
            <div class="team-member">
                <div class="team-image">
                    <img src="../Images/Janedoe.webp">
                </div>
                <h3>Jane Doe - Sales Manager</h3>
                    Jane is our Sales Manager with a talent for matching customers with their dream cars. Her expertise ensures that each customer has a positive experience.
                </p>
            </div>
        </section>

        <section id="company-services">
            <h2>Our Services</h2>
            <p>
                We offer a wide range of services, including car sales, financing, and trade-ins. Whether you're looking for a new or pre-owned vehicle, our team is here to help you find the perfect fit.
            </p>
        </section>
    </main>

<footer>
        <div class = footer-container>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
            <p>1/55 carrington avenue, hurstville-2220,Sydney</p>
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

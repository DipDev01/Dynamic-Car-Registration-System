<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="refresh" content="">
	<title>Cars</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../Css/styles.css">
	<style type="text/css">
		
		
	</style>
</head>
<body>

<div class="container">
	<nav>
	    <ul>
	    	<div class="logo">
	    		<img src="../Images/logo/logo.png" alt="Company Logo">
	    	</div>
	        <li><a href="index.php" class="active">Home</a></li>
	        <li><a href="seller.php">seller</a></li>
	        <li><a href="search.php">search</a></li>
	        <li><a href="about.php">about</a></li>
	        <div class="user">
			    <?php
				    session_start();
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

	<header>
        
        <div class="poster">
			<img src="../Images/ferrari.png">
			<h1>Welcome to Online Car Sale</h1>
        	<p>A platform for buying and selling cars </p>
		</div>
    </header>

	<h2 style="margin: 10px; text-align: center;">Popular categories</h2>
	<div id="filter_bttn">
		<button class="filter_bttn" car_category="electric">Electric</button>
		<button class="filter_bttn" car_category="luxury">Luxury</button>
		<button class="filter_bttn" car_category="suv">SUV</button>
		<button class="filter_bttn" car_category="crossover">Crossover</button>
		<button class="filter_bttn" car_category="hybrid">Hybrid</button>
	</div>
	<div class="product-wrapper">
		<div class="section">
		<div class="box" car_category="electric">
		<div class="card">
			<img src="../Images/Category/electric/tesla_model_3.webp">

			<div class="description">
				<p>Tesla Model 3 </p>
				<p>price: <span>$94,500</span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="electric">
		<div class="card">
			<img src="../Images/Category/electric/tesla_model_s.webp">

			<div class="description">
				<p>Tesla Model S </p>
				<p>price: <span>$94,500</span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="electric">
		<div class="card">
			<img src="../Images/Category/electric/nisan_leaf.webp">
			<div class="description">
				<p>Nissan Leaf </p>
				<p>price: <span>$32,200</span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="electric">
		<div class="card">
			<img src="../Images/Category/electric/tesla_model_y.webp">
			<div class="description">
				<p>Tesla Model Y </p>
				<p>price: <span>$58,300</span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="electric">
		<div class="card">
			<img src="../Images/Category/electric/ford_mustang_e.webp">
			<div class="description">
				<p>Ford Mustang Mach-E </p>
				<p>price: <span>$51,400</span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="electric">
		<div class="card">
			<img src="../Images/Category/electric/mustang_f.webp">
			<div class="description">
				<p>Ford F-150 Lighting </p>
				<p>price: <span>$69,800</span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="electric">
		<div class="card">
			<img src="../Images/Category/electric/bmw_i3.webp">
			<div class="description">
				<p>BMW i3 </p>
				<p>price: <span>$45,100</span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="electric">
		<div class="card">
			<img src="../Images/Category/electric/porshe.webp">
			<div class="description">
				<p>porshe taycon </p>
				<p>price: <span>$109,900 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		</div>

		<div class="section">
		<div class="box" car_category="luxury">
		<div class="card">
			<img src="../Images/Category/luxury/1.webp">

			<div class="description">
				<p>BMW X5 </p>
				<p>price: <span>$45,800 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="luxury">
		<div class="card">
			<img src="../Images/Category/luxury/2.webp">

			<div class="description">
				<p>BMW X5 </p>
				<p>price: <span>$68,700</span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="luxury">
		<div class="card">
			<img src="../Images/Category/luxury/3.webp">
			<div class="description">
				<p>BMW X5 </p>
				<p>price: <span>$68,700 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="luxury">
		<div class="card">
			<img src="../Images/Category/luxury/4.webp">
			<div class="description">
				<p>Porsche Cayenne </p>
				<p>price: <span>$76,900 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="luxury">
		<div class="card">
			<img src="../Images/Category/luxury/5.webp">
			<div class="description">
				<p>Ford Mustang Mach-E </p>
				<p>price: <span>$52,100 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="luxury">
		<div class="card">
			<img src="../Images/Category/luxury/6.webp">
			<div class="description">
				<p>Ford F-150 Lighting </p>
				<p>price: <span>$72,600 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="luxury">
		<div class="card">
			<img src="../Images/Category/luxury/7.webp">
			<div class="description">
				<p>BMW X3 </p>
				<p>price: <span>$54,200 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="luxury">
		<div class="card">
			<img src="../Images/Category/luxury/8.webp">
			<div class="description">
				<p>Mercedes-Benz C-Class </p>
				<p>price: <span>$43,500 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>


		<div class="section">
		<div class="box" car_category="suv">
		<div class="card">
			<img src="../Images/Category/SUV/1.webp">

			<div class="description">
				<p>Jeep Grand Cherokee </p>
				<p>price: <span>$42,100 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="suv">
		<div class="card">
			<img src="../Images/Category/SUV/9.webp">

			<div class="description">
				<p>Jeep Wrangler </p>
				<p>price: <span>$38,400 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="suv">
		<div class="card">
			<img src="../Images/Category/SUV/3.webp">
			<div class="description">
				<p>Nissan Leaf </p>
				<p>price: <span>$44,200 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="suv">
		<div class="card">
			<img src="../Images/Category/SUV/4.webp">
			<div class="description">
				<p>Jeep Wrangler </p>
				<p>price: <span>$31,700 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="suv">
		<div class="card">
			<img src="../Images/Category/SUV/5.webp">
			<div class="description">
				<p>Ford Bronco </p>
				<p>price: <span>$28,900 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="suv">
		<div class="card">
			<img src="../Images/Category/SUV/6.webp">
			<div class="description">
				<p>Ford F-150 Lighting </p>
				<p>price: <span>$45,800 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="suv">
		<div class="card">
			<img src="../Images/Category/SUV/7.webp">
			<div class="description">
				<p>BMW i3 </p>
				<p>price: <span>$40,600 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="suv">
		<div class="card">
			<img src="../Images/Category/SUV/8.webp">
			<div class="description">
				<p>porshe taycon </p>
				<p>price: <span>$27,500 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>

		<div class="section">
		<div class="box" car_category="crossover">
		<div class="card">
			<img src="../Images/Category/Crossover/1.webp">

			<div class="description">
				<p>Honda CRV </p>
				<p>price: <span> $39,300
 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="crossover">
		<div class="card">
			<img src="../Images/Category/Crossover/2.webp">

			<div class="description">
				<p>Toyota RAV4 </p>
				<p>price: <span>$45,800 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="crossover">
		<div class="card">
			<img src="../Images/Category/Crossover/3.webp">
			<div class="description">
				<p>Toyota Highlander </p>
				<p>price: <span>$45,800 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="crossover">
		<div class="card">
			<img src="../Images/Category/Crossover/4.webp">
			<div class="description">
				<p>Ford Escape </p>
				<p>price: <span> $39,300</span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="crossover">
		<div class="card">
			<img src="../Images/Category/Crossover/5.webp">
			<div class="description">
				<p>Honda Pilt </p>
				<p>price: <span>$45,800 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="crossover">
		<div class="card">
			<img src="../Images/Category/Crossover/6.webp">
			<div class="description">
				<p>Nissan Rogue </p>
				<p>price: <span>$45,800 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="crossover">
		<div class="card">
			<img src="../Images/Category/Crossover/7.webp">
			<div class="description">
				<p>Mazda CX-5 </p>
				<p>price: <span>$36,700 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="crossover">
		<div class="card">
			<img src="../Images/Category/Crossover/8.webp">
			<div class="description">
				<p>porshe taycon </p>
				<p>price: <span>$45,800 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>


		<div class="section">
		<div class="box" car_category="hybrid">
		<div class="card">
			<img src="../Images/Category/Hybrid/1.webp">

			<div class="description">
				<p>Toyota RAV4 Hybrid </p>
				<p>price: <span>$45,800 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="hybrid">
		<div class="card">
			<img src="../Images/Category/Hybrid/2.webp">

			<div class="description">
				<p>Toyota Highlander Hybrid </p>
				<p>price: <span>$36,700 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="hybrid">
		<div class="card">
			<img src="../Images/Category/Hybrid/3.webp">
			<div class="description">
				<p>Toyota Highlander Hybrid </p>
				<p>price: <span>$36,700 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="hybrid">
		<div class="card">
			<img src="../Images/Category/Hybrid/4.webp">
			<div class="description">
				<p>Toyota Highlander Hybrid </p>
				<p>price: <span>$34,200 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="hybrid">
		<div class="card">
			<img src="../Images/Category/Hybrid/5.webp">
			<div class="description">
				<p>Toyota Sienna </p>
				<p>price: <span>$36,700 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="hybrid">
		<div class="card">
			<img src="../Images/Category/Hybrid/6.webp">
			<div class="description">
				<p>Honda CR-V Hybrid </p>
				<p>price: <span>$34,200 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="hybrid">
		<div class="card">
			<img src="../Images/Category/Hybrid/7.webp">
			<div class="description">
				<p>BMW i3 </p>
				<p>price: <span>$34,200 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
		<div class="box" car_category="hybrid">
		<div class="card">
			<img src="../Images/Category/Hybrid/8.webp">
			<div class="description">
				<p>porshe taycon </p>
				<p>price: <span>$111,000 </span></p>
				<button class="button">Buy Now</button>
			</div>
		</div>
		</div>
	</div>
	</div>
	</div>
</div>
</div>
</div>





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




<script type="text/javascript">
const bttn=document.querySelectorAll('.button') //buy button

	// Get all category filter buttons and car items
const filterButtons = document.querySelectorAll('.filter_bttn');
const carItems = document.querySelectorAll('.box');

// Initialize with the 'electric' category active
filterButtons.forEach(button => {
    const category = button.getAttribute('car_category');
    if (category === 'electric') {
        button.classList.add('active'); // Set the initial active button
        filterCars(category); // Show electric cars by default
    }
    
    // Add click event to toggle active background color and filter items
    button.addEventListener('click', () => {
        // Remove 'active' class from all buttons
        filterButtons.forEach(btn => {
            btn.classList.remove('active');
        });
        
        // Add 'active' class to the clicked button
        button.classList.add('active');

        // Filter cars based on the selected category
        filterCars(category);
    });
});

function filterCars(category) {
    carItems.forEach(item => {
        const itemCategory = item.getAttribute('car_category');
        if (category === 'all' || category === itemCategory) {
            item.style.display = 'block'; // Show items matching the category
        } else {
            item.style.display = 'none'; // Hide other categories
        }
    });
}

bttn.addEventListener('click',()=> {
	alert('Item bought successfully');
});
</script>
<script type="text/javascript" src="script.js"></script>
</body>
</html>
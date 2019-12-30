
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="author" content="Mark Blashki">
		<meta name="description" content="Millie's Garden">
		<link rel="stylesheet" href="css/style.css">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Kanit:100,100i,300" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="./js/javascript.js"></script>
		<title>Millie's Garden</title>
	</head>
	<body>
		<div class="overlay"></div>
		<div class="container">
			<header class="shadow">
				<div class="logoSect">
					<a href="index.php" class="title"><img src="img/img1.png" alt="Logo"></a>
				</div>
				<nav class="TopNav">
					<ul>
						<li><a href=""><h3>Gallery</h3></a></li>
						<li><a href=""><h3>Order</h3></a></li>
						<li><a href=""><h3>Contact</h3></a></li>
					</ul>
				</nav>
			</header>
			<div class="heroTint"></div>
			<div class="background"></div>
			<!-- <img src="img/back.jpg" class="background" alt="background"> -->
			<main>
				<section class="top">
					<figure>
						<img src="img/img1.png" alt="Logo">
					</figure>
					<article>
						<h1>Welcome to <span>Millie's Garden</span></h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
					</article>
				</section>
				<nav id="FrontNav"><ul>
						<li><a href="">Gallery</a></li>
						<li><a href="">Order</a></li>
						<li><a href="">Contact</a></li>
					</ul>
				</nav>
				<section class="gallerySect">
					<div class="tris">
						<div class="triSect" id="triSect1">
							<h1>Indoor Plants</h1>
							<div class="tint"></div>
						</div>
						<div class="triSect" id="triSect2">
							<h1>Specials</h1>
							<div class="tint"></div>
						</div>
						<div class="triSect" id="triSect3">
							<h1>Outdoor Plants</h1>
							<div class="tint"></div>
						</div>
					</div>
				</section>
				<section class="gallery">
					<div class="galleryHeading">
						<h2 class="sectSub">Gallery</h2>
					</div>
					<div id="sliderContainer">
						<div id="slider">
							<div id="indoorPlants" class="plants">
								<div class="grid">
									<?php
										$IndoorPlantFiles = scandir('img/Indoor/');
										foreach($IndoorPlantFiles as $photo) {
											if($photo !== "." && $photo !== "..") {
												echo '<div class="galleryImage"><img src="./img/Indoor/'.$photo.'" /></div>';
											}
										}
										?>
								</div>
							</div>
							<div id="Specials" class="plants">
								<div class="grid">
									<?php
									$CurrentSpecial = "Christmas"; // Christmas, General, Macrame, Mothersday
									$IndoorPlantFiles = scandir('img/Specials/');
									foreach($IndoorPlantFiles as $photo) {
										if($photo !== "." && $photo !== "..") {
											echo '<div class="galleryImage"><img src="./img/Specials/'.$photo.'" /></div>';
										}
									}
									?>
								</div>
							</div>
							<div id="outdoorPlants" class="plants">
								<div class="grid">
									<?php
									$IndoorPlantFiles = scandir('img/Outdoor/');
									foreach($IndoorPlantFiles as $photo) {
										if($photo !== "." && $photo !== "..") {
											echo '<div class="galleryImage"><img src="./img/Outdoor/'.$photo.'" /></div>';
										}
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="order">
					<h1>Purchase</h1>
					<div class="plantSizes">
						<div class="orderPlantSize shadow" id="plantSizeSmall"><img src="img/Small.png" alt="Small"></div>
						<div class="orderPlantSize shadow" id="plantSizeMedium"><img src="img/Medium.png" alt="Medium"></div>
						<div class="orderPlantSize shadow" id="plantSizeLarge"><img src="img/Large.png" alt="Large"></div>
					</div>
					<div class="howItWorks">
						<h2>How it Works:</h2>
						<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia voluptas nihil at eos? Cupiditate amet eveniet modi, ipsam delectus expedita voluptatum nemo soluta aliquid dolore quo quibusdam obcaecati libero minima!</p>
					</div>
					<div class="orderGridContainer">
						<div class="orderGrid">
						</div>
					</div>
					<div class="plantDetails lightShadow">
						
					</div>
					<div class="plantDetailsOverlay"></div>
				</section>
				<section class="checkout">
					<div class="checkoutFormContainer shadow">
						<h1>Checkout</h1>
						<form class="checkoutForm" action="checkout.php" method="post">
							<h3>You</h3>
							<div class="fieldGroup" id="emailField">
								<span>Email:</span><input type="text" placeholder="john.doe@email.com">
							</div>
							<div class="fieldGroup" id="nameField">
								<span>Name:</span>
								<input type="text" placeholder="John Doe">
							</div>
							<div class="fieldGroup" id="phoneField">
								<span>Phone:</span><input type="text" placeholder="0490 123 456">
							</div>
							
							<h3>Your Address</h3>
							<div class="fieldGroup addressField" id="countryField">
								<span>Country:</span><input type="text" placeholder="Australia">
							</div>
							<div class="fieldGroup addressField" id="postcodeField">
								<span>Postcode:</span><input type="text" placeholder="3000">
							</div>
							<div class="fieldGroup addressField" id="stateField">
								<span>State:</span><input type="text" placeholder="Victoria">
							</div>
							<div class="fieldGroup addressField" id="cityField">
								<span>City / Town:</span><input type="text" placeholder="Melbourne">
							</div>
							<div class="fieldGroup addressField" id="streetField">
								<span>Street Address:</span><input type="text" placeholder="1 Succulent Lane">
							</div>
							<div class="fieldGroup addressField" id="extraInfoField">
								<span>Extra Address Information:</span><input type="text" placeholder="">
							</div>
							
							<h3>Your New Plant</h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur ducimus totam eius.</p>
							<div class="fieldGroup" id="orderNotesField">
								<span>Notes:</span><input type="text" placeholder="">
							</div>
							<div id="disclaimer">
								*Disclaimer*
							</div>
						</form>
						<br>
					</div>
				</section>
			</main>
			<footer>
				<img src="img/img1.png" alt="Logo">
				<ul>
					<hr>
					<li><a href=""><h3>Home</h3></a></li>
					<li><a href=""><h3>Gallery</h3></a></li>
					<li><a href=""><h3>Order</h3></a></li>
					<hr>
				</ul>
			</footer>
		</div>
	</body>
</html>




<!-- 	TODO: make gallerySect text turn green with the selected tab for gallery feedback
			TODO: add a scroll feedback when user clicks on gallerySect
			TODO: change cursor for gallerySect Text to "pointer"
 -->

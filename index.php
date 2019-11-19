
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
							<a href="#gallerySect" class="gallery lightShadow">View Gallery</a>
						</article>
				</section>
				<nav id="FrontNav"><ul>
							<li><a href="">Gallery</a></li>
							<li><a href="">Order</a></li>
							<li><a href="">Contact</a></li>
						</ul></nav>
				<section class="gallerySect">
					<h1 class="lightShadow">Gallery</h1>
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
				<div class="headings">
					<h1 id="HeadingIndoor">Indoor Plants</h1>
					<h1 id="HeadingSpecials">Specials</h1>
					<h1 id="HeadingOutdoor">Outdoor Plants</h1>
				</div>
				<div id="slider">
					<div id="indoorPlants" class="plants">
						<div class="GalleryDesc">
							<p>indoorPlantsLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						</div>
						<div class="grid">
							<?php
									$IndoorPlantFiles = scandir('img/Indoor/');
									foreach($IndoorPlantFiles as $photo) {
											if($photo !== "." && $photo !== "..") {
													echo '<img class="galleryImage" src="./img/Indoor/'.$photo.'" />';
											}
									}
							?>
						</div>
					</div>
					<div id="Specials" class="plants">
						<div class="GalleryDesc">
							<p>SpecialsLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						</div>
						<div class="grid">
							<?php
									$CurrentSpecial = "Christmas"; // Christmas, General, Macrame, Mothersday
									$IndoorPlantFiles = scandir('img/Specials/');
									foreach($IndoorPlantFiles as $photo) {
											if($photo !== "." && $photo !== "..") {
													echo '<img class="galleryImage" src="./img/Specials/'.$photo.'" />';
											}
									}
							?>
						</div>
					</div>
					<div id="outdoorPlants" class="plants">
						<div class="GalleryDesc">
							<p>outdoorPlantsLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						</div>
						<div class="grid">
							<?php
									$IndoorPlantFiles = scandir('img/Outdoor/');
									foreach($IndoorPlantFiles as $photo) {
											if($photo !== "." && $photo !== "..") {
													echo '<img class="galleryImage" src="./img/Outdoor/'.$photo.'" />';
											}
									}
							?>
						</div>
					</div>
				</div>
				<div class="order">
					
				</div>
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

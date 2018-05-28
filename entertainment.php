<?php
include('util.php');

?>
<html lang="en">
<head>
	<title>Fall News</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script>

		function extend(obj) {
			obj.parentElement.parentElement.style.height = '0px';
			obj.parentElement.parentElement.parentElement.children[0].style.maxHeight = '4000px';
		}

	</script>
</head>
<body>
	<header>
		<div class="centrify">
			<section>
				<h1>Fall News</h1>
			</section>
			<nav>
				<ul>
					<a href="/fallnews/"><li>Home</li></a>
					<a href="technology.php"><li>Technology</li></a>
					<a href="gaming.php"><li>Gaming</li></a>
					<a href="entertainment.php"><li class="selected">Entertainment</li></a>
				</ul>
			</nav>
		</div>
	</header>
	<main class="centrify" id="main">
		<aside>
			<section>
				<h4>Related Articles</h4>
				<ul>
					<li>
						Conspiracy Theories concerning the Racial Dispositions of Disney Princesses
					</li>
					<li>
						Horrible Oscar Winning Speeches
					</li>
				</div>
			</section>
		</aside>
		<section class="articleholder">
			<h2>
				Entertainment News
			</h2>
			<?php
				echo(getNewsHtml(getNewsByType('entertainment')));
			?>
			<!--
			<article class="article">
				<h3>Overwatch has battle royale</h3>
				<div class="artpic">
					<img src="images/ktw.jpg">
				</div>
				<div>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</div>
				<a href="https://www.polygon.com/">
					<div class="source">
						<img width="30px" src="images/polygon.com.png">
						<div>
							Polygon.com
						</div>
					</div>
				</a>
			</article>
			<article>
				<h3>Music is outlawed in Gunjivia</h3>
				<div class="artpic">
					<video src="videos/bugatti.mp4" controls>
					</video>
				</div>
				<div>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</div>
			</article>
			<article>
				<h3>Studies show rats look good in diamonds</h3>
				<div class="artpic">
					<img src="images/futurecar.jpg">
				</div>
				<div>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</div>
			</article>-->
		</section>

	</main>
	<footer class="foot">
		<section class="centrify">
			Bling is not allowed in the other holidays
			<div class="footnav">
				<ul>
					<li>Recreation</li>
					<li>Onions</li>
					<li>Dreaded</li>
					<li>Rabbits</li>
					<li>Blur</li>
				</ul>
			</div>
		</section>
	</footer>
</body>
</html>

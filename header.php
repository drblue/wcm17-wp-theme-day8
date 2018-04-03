<!doctype html>
<html lang="en">
  <head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php wp_head(); ?>

	<title>Hello, world!</title>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
		<div class="container">
			<a class="navbar-brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('title'); ?></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<!-- start primary_menu -->
			<?php
				wp_nav_menu([
					'menu' => 'primary_menu',
					'container_class' => 'collapse navbar-collapse', // wrapping div class
					'container_id' => 'navbarNav', // wrapping div id
					'menu_class' => 'navbar-nav', // ul class
					'walker' => new bs4Navwalker(),
				]);
			?>
			<!-- end primary_menu -->

		</div>
	</nav>
	<!-- end site header -->

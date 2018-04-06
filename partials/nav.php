<nav class="navbar navbar-expand-lg navbar-light mb-4">
	<div class="container">
		<a class="navbar-brand" href="<?php bloginfo('url'); ?>">
			<?php mbt_site_logo(); ?>
		</a>
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

	<div class="collapse navbar-collapse" id="navbarLogin">
		<ul class="navbar-nav ml-auto">
		<li class="nav-item active">
			<?php if (is_user_logged_in()) { ?>
				<a class="nav-link" href="/wp-logout.php">You are logged in, logout?</a>
			<?php } else { ?>
				<a class="nav-link" href="/wp-login.php">Login</a>
			<?php } ?>
		</li>
		</ul>
	</div>
</nav>
<!-- end site header -->

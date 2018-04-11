<?php
get_header(); // header.php
?>

<div class="container">
	<div class="row">
		<div class="col-md-9">
			<?php if (have_posts()) { ?>
				<!-- nu vet vi att det finns en eller flera poster -->
				<?php while(have_posts()) { the_post(); ?>
					<?php
						get_template_part('partials/content', 'excerpt'); // partials/content-excerpt.php
					?>
				<?php } ?>

				<div class="d-flex justify-content-between">
					<div class="nav-previous alignleft"><?php next_posts_link('&laquo; Äldre inlägg'); ?></div>
	
					<div class="nav-next alignright"><?php previous_posts_link('Nyare inlägg &raquo;'); ?></div>
				</div>
  
			<?php } else { ?>
				<!-- nu har vi konstaterat att det INTE finns någon post att hämta på denna sida -->
				Ledsen, det finns inget innehåll på den här sidan.
			<?php } ?>
		</div>
		<div class="col-md-3">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php
get_footer();
?>

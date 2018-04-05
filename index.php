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

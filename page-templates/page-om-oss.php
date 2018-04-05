<?php
/* Template Name: Om oss */
get_header(); // header.php
?>

<div class="container">
	<div class="row">
		<?php if (have_posts()) { ?>
			<div class="col-md-9">
				<!-- nu vet vi att det finns en eller flera poster -->
				<?php while(have_posts()) { the_post(); ?>
					<!-- nu är vi inne på en enskild post -->
					<h3><?php the_title(); ?></h3>
					<?php the_content(); ?>
				<?php } ?>
			</div>
			<div class="col-md-3">
				Here be address and map and stuff
			</div>
		<?php } else { ?>
			<!-- nu har vi konstaterat att det INTE finns någon post att hämta på denna sida -->
			Ledsen, det finns inget innehåll på den här sidan.
		<?php } ?>
	</div>
</div>

<?php
get_footer();
?>

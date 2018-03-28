<?php
get_header(); // header.php
?>

<div class="container">
	<?php if (have_posts()) { ?>
		<!-- nu vet vi att det finns en eller flera poster -->
		<?php while(have_posts()) { the_post(); ?>
			<!-- nu är vi inne på en enskild post -->
			<h3><?php the_title(); ?></h3>
			<?php the_content(); ?>
		<?php } ?>
	<?php } else { ?>
		<!-- nu har vi konstaterat att det INTE finns någon post att hämta på denna sida -->
		Ledsen, det finns inget innehåll på den här sidan.
	<?php } ?>
</div>

<?php
get_footer();
?>

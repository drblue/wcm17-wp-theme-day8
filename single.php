<?php
get_header(); // header.php
?>

<?php if (have_posts()) { ?>
	<!-- nu vet vi att det finns en eller flera poster -->
	<?php while(have_posts()) { the_post(); ?>
		<?php get_template_part('partials/content', 'single'); // partials/content-single.php ?>
	<?php } ?>
<?php } else { ?>
	<!-- nu har vi konstaterat att det INTE finns någon post att hämta på denna sida -->
	<?php get_template_part('partials/content', 'none'); ?>
<?php } ?>

<?php
get_footer();
?>

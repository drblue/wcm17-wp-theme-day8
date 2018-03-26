<?php
get_header(); // header.php
?>

<div class="container">
	<?php if (have_posts()) { ?>
		<!-- nu vet vi att det finns en eller flera poster -->
		<?php while(have_posts()) { the_post(); ?>
			<!-- nu är vi inne på en enskild post -->
			<hr>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php the_excerpt(); ?>
			<p>Författare: <?php the_author(); ?></p>
			<p>Kategorier: <?php the_category(); ?></p>
		<?php } ?>
	<?php } else { ?>
		<!-- nu har vi konstaterat att det INTE finns någon post att hämta på denna sida -->
		Ledsen, det finns inget innehåll på den här sidan.
	<?php } ?>
</div>

<?php
get_footer();
?>

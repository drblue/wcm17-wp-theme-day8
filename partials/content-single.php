<?php
	if (has_post_thumbnail()) {
		?>
			<div class="featured-image-wrapper">
				<!-- show post featured image -->
				<?php the_post_thumbnail('post-featured-image'); ?>
			</div>
		<?php
	}
?>

<div class="container">
	<div class="row">
		<div class="col-md-9">
			<!-- nu är vi inne på en enskild post -->
			<h3><?php the_title(); ?></h3>
			<?php the_content(); ?>
			<hr>
			<div class="post-footer text-muted small">
				<div class="post-meta">
					Skriven <?php the_date(); ?> av <?php the_author_posts_link(); ?> i <?php the_category(', '); ?>.
				</div>
				<div class="post-navigation d-flex justify-content-between">
					<div class="nav-next alignright"><?php previous_post_link('%link', '&laquo; Föregående inlägg'); ?></div>

					<div class="nav-previous alignleft"><?php next_post_link('%link', 'Nästa inlägg &raquo;'); ?></div>
				</div>
			</div>
			<?php
				get_template_part('partials/content', 'related'); // partials/content-related.php
			?>
		</div>
		<div class="col-md-3">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

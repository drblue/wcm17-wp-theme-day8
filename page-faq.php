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

			<h4>Vanliga frågor</h4>
			<?php
				// vilken sida är vi på?
				$paged = get_query_var('paged'); // hämta ut vilken sida vi är på

				// hämta ut alla blogginlägg från kategorin FAQ
				$faqs = new WP_Query([
					'cat' => 1,					// hämta bara inlägg ifrån kategori med ID 6
					'order_by' => 'post_title',	// sortera efter inläggets titel
					'order' => 'ASC',			// sortera i bokstavsordning (A-Z)
					'posts_per_page' => 5,		// hur många inlägg per sida vill vi visa
					'paged' => $paged,			// vilken sida vi är på
				]);

				if ($faqs->have_posts()) :
					?>
						<div id="accordion">
							<?php while ($faqs->have_posts()) : ?>
								<?php $faqs->the_post(); ?>
								<div class="card">
									<div class="card-header clickable">
										<h5 class="mb-0">
											<button class="btn btn-link" aria-expanded="false">
												<?php the_title(); ?>
											</button>
										</h5>
									</div>

									<div class="collapse" data-parent="#accordion">
										<div class="card-body">
											<?php the_content(); ?>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						</div>

						<div class="d-flex justify-content-between mt-2">
							<div class="nav-previous"><?php previous_posts_link('&laquo; Föregående sida'); ?></div>
							<div class="nav-next"><?php next_posts_link('Nästa sida &raquo;', $faqs->max_num_pages); ?></div>
						</div>
					<?php
				endif;
			?>
		<?php } ?>
	<?php } else { ?>
		<!-- nu har vi konstaterat att det INTE finns någon post att hämta på denna sida -->
		Ledsen, det finns inget innehåll på den här sidan.
	<?php } ?>
</div>

<?php
get_footer();
?>

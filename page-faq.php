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
			<div id="accordion">
				<?php
					// hämta ut alla blogginlägg från kategorin FAQ
					// på något sätt
					$faqs = get_posts([
						'category' => 6,
						'order_by' => 'post_title',
						'order' => 'ASC',
						'posts_per_page' => -1,
					]);
					foreach ($faqs as $faq) {
						?>
							<div class="card">
								<div class="card-header clickable">
								<h5 class="mb-0">
									<button class="btn btn-link" aria-expanded="false">
									<?php echo $faq->post_title; ?>
									</button>
								</h5>
								</div>

								<div class="collapse" data-parent="#accordion">
								<div class="card-body">
									<?php echo $faq->post_content; ?>
								</div>
								</div>
							</div>
						<?php
					}
				?>
			</div>
		<?php } ?>
	<?php } else { ?>
		<!-- nu har vi konstaterat att det INTE finns någon post att hämta på denna sida -->
		Ledsen, det finns inget innehåll på den här sidan.
	<?php } ?>
</div>

<?php
get_footer();
?>

<!-- related posts -->
<?php
	// get current post id
	$current_post_id = get_the_ID();

	// fetch current posts categories
	$categories = get_the_category();
	$category_ids = [];
	foreach ($categories as $category) {
		array_push($category_ids, $category->cat_ID);
	}

	// fetch related posts
	$related_posts = new WP_Query([
		'category__in' => $category_ids,
		'order_by' => 'post_title',
		'order' => 'DESC',
		'posts_per_page' => 3,
		'post__not_in' => [$current_post_id],
	]);

	if ($related_posts->have_posts()) {
		?>

		<div class="container mt-4">
			<div class="card-deck">

				<?php 
					while($related_posts->have_posts()) {
						$related_posts->the_post();
						?>
							<!-- related post -->
							<div class="card">
								<!-- <img class="card-img-top" src=".../100px200/" alt="Card image cap"> -->
								<div class="card-body">
									<h5 class="card-title">
										<a href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>
									</h5>
									<p class="card-text"><?php the_excerpt(); ?></p>
									<!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
								</div>
							</div>
						<?php
					}
				?>
				<!-- end related post -->
			</div>
		</div>
		<!-- end related posts -->

		<?php
	}
?>

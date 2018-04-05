<!-- nu är vi inne på en enskild post -->
<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
<?php the_excerpt(); ?>
<p>Författare: <?php the_author_posts_link(); ?></p>
<p>Kategorier: <?php the_category(); ?></p>
<hr>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<article class="question">
		<h5 class="toggle-question"><button><?php the_title(); ?></button></h5>
		<div class="answer">
			<?php the_content(); ?>
		</div>
	</article>
<?php endwhile; endif; ?>

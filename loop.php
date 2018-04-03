<div class="posts">

	<?php
		// query_posts('showposts=1');
		if (have_posts()): while (have_posts()) : the_post(); ?>
		<article class="post">

			<div class="left">
				<h3><?php the_title(); ?></h3>
				<p><small>Have something to say about your own experience at Bar Church? We would love to hear it!</small></p>
				<p><a class="toggle-modal-experience" href="/"><small>Submit Experience</small></a></p>
				<!-- <p>
					<?php $categories = get_the_category(); ?>
					<a href="<?php echo site_url( '/category/' . $categories[0]->slug, 'http' ); ?>"><?php echo esc_html( $categories[0]->name ); ?></a>
				</p> -->
			</div>

			<div class="right">
				<div class="main">
					<p><small><?php echo get_the_date(); ?></small></p>
					<?php echo get_field("sum"); ?>
				</div>
				<div class="sub">
					<?php echo get_field("description"); ?>
				</div>
				<div class="footer">
					<p><a href="<?php echo site_url( '/category/' . $categories[0]->slug, 'http' ); ?>" class="button"><?php echo esc_html( $categories[0]->name ); ?></a></p>
				</div>
				<p><span class="rule"></span></p>
			</div>

		</article>
	<?php endwhile; endif; ?>

</div>

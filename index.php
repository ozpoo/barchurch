<?php get_header(); ?>

	<main role="main">

		<div class="title-fade show">
			<h1>Journal</h1>
		</div>

		<section class="content">
			<div class="top">
				<p><a class="button active" href="<?php echo site_url( '/journal/', 'http' ); ?>">All</a><a class="button" href="<?php echo site_url( '/category/learn/', 'http' ); ?>">Learn</a><a class="button" href="<?php echo site_url( '/category/do/', 'http' ); ?>">Do</a></p>
			</div>
			<?php get_template_part('loop'); ?>
		</section>

		<!-- <section class="pagination">
			<?php
				if(get_adjacent_post(false, '', true )){
						$nextPost = get_adjacent_post(false, '', true );
						$nextPost = get_the_permalink( $nextPost->ID );
				} else {
						$nextPost = new WP_Query('posts_per_page=1&order=ASC&orderby=menu_order');
						$nextPost->the_post();
						$nextPost = get_the_permalink( $nextPost->ID );
						wp_reset_query();
				}
				if(get_adjacent_post(false, '', false )){
						$prevPost = get_adjacent_post(false, '', false );
						$prevPost = get_the_permalink( $prevPost->ID );
				} else {
					$prevPost = new WP_Query('posts_per_page=1&order=DESC&orderby=menu_order');
					$prevPost->the_post();
					$prevPost = get_the_permalink( $prevPost->ID );
					wp_reset_query();
				}
			?>

			<ul>
				<li><a href="<?php echo $nextPost; ?>">Next Post <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
				<li><a href="<?php echo $prevPost; ?>">Previous Post <i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></li>
			</ul>
		</section> -->

	</main>

	<script>

		(function ($, root, undefined) {

			$(function () {

				var offsetLeft, offsetTop, lastX, lastY, pos;

				$(window).load(function(){
					init();
					animate();
				});

				$(window).resize (function() {
					size();
				});

				var init = function() {
					$("iframe").each(function(){
						$(this).attr("data-ratio", $(this).attr("height")/$(this).attr("width"));
						$(this).removeAttr("height");
						$(this).removeAttr("width");
					});
					setTimeout(function(){
						$(".title-fade").removeClass("show");
					}, 1220);
					size();
				}

				function size() {
					$("iframe").each(function(){
						$(this).height($(this).width()*$(this).attr("data-ratio"));
					});
				}

				var animate = function(time) {
					requestAnimationFrame(animate);
				}

				var requestAnimationFrame = (function(){
				 return  window.requestAnimationFrame       ||
								 window.webkitRequestAnimationFrame ||
								 window.mozRequestAnimationFrame    ||
								 window.oRequestAnimationFrame      ||
								 window.msRequestAnimationFrame     ||
								 function(callback, element){
										 window.setTimeout(callback, 1000 / 60);
								 };
				 })();

			});

		})(jQuery, this);

	</script>

<?php get_footer(); ?>

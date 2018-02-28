<?php get_header(); ?>

	<main role="main">

		<div class="title-fade show">
			<h1><?php single_cat_title(); ?></h1>
		</div>

		<section class="content">
			<div class="top">
				<p><a class="button" href="<?php echo site_url( '/journal/', 'http' ); ?>">All</a><a class="button<?php if(is_category( 'Learn' )){ echo ' active'; } ?>" href="<?php echo site_url( '/category/learn/', 'http' ); ?>">Learn</a><a class="button<?php if(is_category( 'Do' )){ echo ' active'; } ?>" href="<?php echo site_url( '/category/do/', 'http' ); ?>">Do</a></p>
			</div>
			<?php get_template_part('loop'); ?>
		</section>

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

				});

				var init = function() {

					setTimeout(function(){
						$(".title-fade").removeClass("show");
					}, 1220);

				}

				var animate = function(time) {

					requestAnimationFrame( animate );

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

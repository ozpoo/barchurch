<?php get_header(); ?>

	<main role="main">

		<div class="title-fade show">
				<h1>Questions</h1>
		</div>

		<section class="content">
			<div class="left">
				<h3><?php echo get_field('call_to_action', 12); ?></h3>
				<p><a class="button toggle-modal-question" href="/">Ask a Question</a></p>
			</div>
			<div class="right">
				<?php get_template_part('loop-questions'); ?>
			</div>
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

					$(".toggle-question button").on("click", function(){
						$(this).closest(".question").find(".answer").slideToggle();
						$(this).toggleClass("open");
					});

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

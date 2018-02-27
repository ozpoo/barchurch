<?php get_header(); ?>

	<main role="main">

		<div class="title-fade show">
				<h1>Questions</h1>
		</div>

		<section class="content">
			<div class="left">
				<h3>Lorem ipsum dolor sit amet sed diam nonummy nibh.</h3>
				<p><a class="button" href="/">Submit Questions</a></p>
			</div>
			<div class="right">

				<?php
					if( have_rows('questions') ):
			    while ( have_rows('questions') ) : the_row();
				?>
					<article class="question">
						<h5 class="toggle-question"><button><?php the_sub_field('question'); ?></button></h5>
						<div class="answer">
							<?php the_sub_field('answer'); ?>
						</div>
					</article>
				<?php endwhile; endif; ?>

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

					$("body").mousemove(onMouseMove);

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

					// mouseChase($(".collage .text"), .01, .02);
					// scrollParallax($(".collage .text"), -.1);
					// scrollScale($(".slide.is-selected img"), .0001);

				}

				var mouseChase = function(el, dx, dy) {

					var x = lastX - ($(window).width()/2);
					var y = lastY - ($(window).height()/2);

					var offset = $(el).offset();
					var width = $(el).width();
					var height = $(el).height();
					var centerX = offset.left + width / 2 - ($(window).width()/2);
					var centerY = offset.top + height / 2 - ($(window).height()/2);

					var deltaX = centerX - x;
					var deltaY = centerY - y;
					deltaX = -deltaX * dx;
					deltaY = deltaY * dy;

					$(el).css("margin-left", deltaX + "px");
					$(el).css("margin-top", deltaY + "px");

				}

				var scrollParallax = function(el, dy) {
					var scrollTop = $(document).scrollTop();
					var offset = $(el).offset();
					var offsetY = offset.top;
					var deltaY = (scrollTop - offsetY) * dy;
					$(el).css("transform", "translate3d(0, " + deltaY + "px, 0)");
				}

				var scrollScale = function(el, dy) {
					var scrollTop = $(document).scrollTop();
					var offset = $(el).offset();
					var offsetY = offset.top;
					var deltaY = (offsetY + scrollTop) * dy;
					console.log(deltaY);
					$(el).css("transform", "scale(" + deltaY + ")");
				}

				var onMouseMove = function(e) {
	        pos = getCursorPosition(e);
	        lastX = pos.x;
	        lastY = pos.y;
		    }

				var getCursorPosition = function(e) {
	        if(offsetLeft == undefined) {
            offsetLeft = 0;
            for(var node=$("body")[0]; node; node = node.offsetParent) {
              offsetLeft += node.offsetLeft;
            }
	        }
	        if(offsetTop == undefined) {
            offsetTop = 0;
            for(var node=$("body")[0]; node; node = node.offsetParent) {
              offsetTop += node.offsetTop;
            }
	        }

	        var x = e.clientX - offsetLeft;
	        var y = e.clientY - offsetTop;

	        return { x: x, y: y };
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

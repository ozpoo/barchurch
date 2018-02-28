<?php get_header(); ?>

	<main role="main">

		<div class="title-fade show">
				<h1>Get Involved</h1>
		</div>

		<section class="content">

			<div class="left">
				<h3>Ask a Question</h3>
			</div>
			<div class="right">
				<div class="main">
					<p>Lorem ipsum dolor sit amet, ex sea commune deserunt, nullam mentitum cu sed. Meis mundi alterum vel et. Mel atqui phaedrum posidonium et, id quo mollis admodum. Essent laoreet ei cum, ex molestie dignissim sit, vel prodesset similique ne.</p>
				</div>
				<p><a class="button toggle-modal-question" href="/">Submit Question</a></p>
			</div>

			<div class="left">
				<h3>Share Your Experience</h3>
			</div>
			<div class="right">
				<div class="main">
					<p>Lorem ipsum dolor sit amet, ex sea commune deserunt, nullam mentitum cu sed. Meis mundi alterum vel et. Mel atqui phaedrum posidonium et, id quo mollis admodum. Essent laoreet ei cum, ex molestie dignissim sit, vel prodesset similique ne.</p>
				</div>
				<p><a class="button toggle-modal-experience" href="/">Submit Experience</a></p>
			</div>

			<div class="left">
				<h3>Submit Event Ideas</h3>
			</div>
			<div class="right">
				<div class="main">
					<p>Lorem ipsum dolor sit amet, ex sea commune deserunt, nullam mentitum cu sed. Meis mundi alterum vel et. Mel atqui phaedrum posidonium et, id quo mollis admodum. Essent laoreet ei cum, ex molestie dignissim sit, vel prodesset similique ne.</p>
				</div>
				<p><a class="button toggle-modal-idea" href="/">Submit Idea</a></p>
			</div>

			<div class="left">
				<h3>Donate</h3>
			</div>
			<div class="right">
				<div class="main">
					<p>Lorem ipsum dolor sit amet, ex sea commune deserunt, nullam mentitum cu sed. Meis mundi alterum vel et. Mel atqui phaedrum posidonium et, id quo mollis admodum. Essent laoreet ei cum, ex molestie dignissim sit, vel prodesset similique ne.</p>
				</div>
				<p><a class="button" href="https://barchurch.churchcenter.com/giving?open-in-church-center-modal=true">Donate Now</a></p>
			</div>

			<div class="left">
				<h3>Join the Community</h3>
			</div>
			<div class="right">
				<div class="main">
					<p>Lorem ipsum dolor sit amet, ex sea commune deserunt, nullam mentitum cu sed. Meis mundi alterum vel et. Mel atqui phaedrum posidonium et, id quo mollis admodum. Essent laoreet ei cum, ex molestie dignissim sit, vel prodesset similique ne.</p>
				</div>
				<p><a class="button toggle-modal-newsletter" href="/">Newsletter Registration</a></p>
			</div>

		</section>

	</main>

	<script>

		(function ($, root, undefined) {

			$(function () {

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

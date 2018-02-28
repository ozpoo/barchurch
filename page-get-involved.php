<?php get_header(); ?>

	<main role="main">

		<div class="title-fade show">
				<h1>Get Involved</h1>
		</div>

		<section class="content">

			<?php $group = get_field('question'); ?>
			<div class="left">
				<h3><?php echo $group['title']; ?></h3>
			</div>
			<div class="right">
				<div class="main">
					<p><?php echo $group['description']; ?></p>
				</div>
				<p><a class="button toggle-modal-question" href="/">Submit Question</a></p>
			</div>

			<?php $group = get_field('experience'); ?>
			<div class="left">
				<h3><?php echo $group['title']; ?></h3>
			</div>
			<div class="right">
				<div class="main">
					<p><?php echo $group['description']; ?></p>
				</div>
				<p><a class="button toggle-modal-experience" href="/">Submit Experience</a></p>
			</div>

			<?php $group = get_field('ideas'); ?>
			<div class="left">
				<h3><?php echo $group['title']; ?></h3>
			</div>
			<div class="right">
				<div class="main">
					<p><?php echo $group['description']; ?></p>
				</div>
				<p><a class="button toggle-modal-idea" href="/">Submit Idea</a></p>
			</div>

			<?php $group = get_field('donate'); ?>
			<div class="left">
				<h3><?php echo $group['title']; ?></h3>
			</div>
			<div class="right">
				<div class="main">
					<p><?php echo $group['description']; ?></p>
				</div>
				<p><a class="button" href="https://barchurch.churchcenter.com/giving?open-in-church-center-modal=true">Donate Now</a></p>
			</div>

			<?php $group = get_field('newsletter'); ?>
			<div class="left">
				<h3><?php echo $group['title']; ?></h3>
			</div>
			<div class="right">
				<div class="main">
					<p><?php echo $group['description']; ?></p>
				</div>
				<p><a class="button toggle-modal-newsletter" href="/">Sign Up</a></p>
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

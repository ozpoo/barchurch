(function ($, root, undefined) {

	$(function () {

		'use strict';

		$(window).load (function() {

			init();
			animate();

		});

		var lastScrollTop, scrollTop;

		function init() {

			$("body").addClass("show");

			$(".connect-toggle button").on("mouseenter", function(){
				$(".connect-menu").addClass("show");
			});
			$(".menu-connect").on("mouseleave", function(){
				$(".connect-menu").removeClass("show");
			});

			$(".toggle-modal-events").on("click", function(ev){
				ev.preventDefault();
				$(".events-modal").toggleClass("show");
			});

			$(".menu-main").data("transform", 0);
			lastScrollTop = scrollTop = $(document).scrollTop();

		}

		function animate() {
			requestAnimationFrame( animate );
			scrollTop = $(document).scrollTop();

			switch (getDirection()) {

				case "up":
					// console.log("up");
					setMenuTransform();
					break;

				case "down":
					// console.log("down");
					setMenuTransform();
					break;

				default:
					break;

			}

			lastScrollTop = scrollTop;

		}

		function setMenuTransform() {

			var maxHeight = $(".menu-main").height() + 3;
			var change = lastScrollTop - scrollTop;
			var currTransform = $(".menu-main").data("transform");
			var newTransform = currTransform + change;
			if (newTransform > 0) {
				newTransform = 0;
			} else if (newTransform < -maxHeight) {
				newTransform = -maxHeight;
			}
			$(".menu-main").data("transform", newTransform);
			$(".menu-main").css("transform", "translate3d(0,"+newTransform+"px,0)");
			// console.log(newTransform);

		}

		function getDirection() {

			var direction;

			if(lastScrollTop < scrollTop){
				direction = "down";
			} else if(lastScrollTop > scrollTop) {
				direction = "up";
			} else {
				direction = null;
			}

			return direction;

		}

		var requestAnimationFrame = ( function (){
		return  window.requestAnimationFrame       ||
				 		window.webkitRequestAnimationFrame ||
				 		window.mozRequestAnimationFrame    ||
				 		window.oRequestAnimationFrame      ||
				 		window.msRequestAnimationFrame     ||
				 		function(callback, element){
						 	window.setTimeout(callback, 1000 / 60);
				 		};
		} )();

	});

})(jQuery, this);

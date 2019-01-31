		<?php if(!is_page("splash")): ?>
			<section class="share-modal modal">
				<div class="close">
					<p>
						<button class="toggle-modal-share">
							<span class="group">
								<span class="one"></span>
								<span class="two"></span>
							</span>
						</button>
					</p>
				</div>
			</section>

			<section class="contact-modal modal">
				<div class="close">
					<p>
						<button class="toggle-modal-contact">
							<span class="group">
								<span class="one"></span>
								<span class="two"></span>
							</span>
						</button>
					</p>
				</div>
				<div class="title"><p>Contact Bar Church</p></div>
				<div class="form">
					<?php echo do_shortcode('[contact-form-7 id="38" title="Contact"]'); ?>
				</div>
			</section>

			<section class="question-modal modal">
				<div class="title"><p>Ask Bar Church a Question</p></div>
				<div class="close">
					<p>
						<button class="toggle-modal-question">
							<span class="group">
								<span class="one"></span>
								<span class="two"></span>
							</span>
						</button>
					</p>
				</div>
				<div class="form">
					<?php echo do_shortcode('[contact-form-7 id="39" title="Question"]'); ?>
				</div>
			</section>

			<section class="experience-modal modal">
				<div class="close">
					<p>
						<button class="toggle-modal-experience">
							<span class="group">
								<span class="one"></span>
								<span class="two"></span>
							</span>
						</button>
					</p>
				</div>
				<div class="title"><p>Tell Us Your Bar Church Experience</p></div>
				<div class="form">
					<?php echo do_shortcode('[contact-form-7 id="40" title="Experience"]'); ?>
				</div>
			</section>

			<section class="idea-modal modal">
				<div class="close">
					<p>
						<button class="toggle-modal-idea">
							<span class="group">
								<span class="one"></span>
								<span class="two"></span>
							</span>
						</button>
					</p>
				</div>
				<div class="title"><p>Send Bar Church an Event Idea</p></div>
				<div class="form">
					<?php echo do_shortcode('[contact-form-7 id="41" title="Idea"]'); ?>
				</div>
			</section>

			<section class="newsletter-modal modal">
				<div class="close">
					<p>
						<button class="toggle-modal-newsletter">
							<span class="group">
								<span class="one"></span>
								<span class="two"></span>
							</span>
						</button>
					</p>
				</div>
				<div class="title"><p>Sign up For the Bar Church Newsletter</p></div>
				<div class="form">
					<div id="mc_embed_signup">
						<form action="https://barchurch.us1.list-manage.com/subscribe/post?u=ddf5c4d0d967b40813f05a1e1&amp;id=50672d5967" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
							<p>
								<label for="mce-EMAIL">Your Email</label>
								<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
							</p>
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
							<div style="position: absolute; left: -5000px;" aria-hidden="true">
								<input type="text" name="b_ddf5c4d0d967b40813f05a1e1_50672d5967" tabindex="-1" value="">
							</div>
							<p>
								<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
							</p>
						</form>
					</div>
				</div>
			</section>

			<section class="events-modal modal">
				<div class="close">
					<p>
						<button class="toggle-modal-events">
							<span class="group">
								<span class="one"></span>
								<span class="two"></span>
							</span>
						</button>
					</p>
				</div>
				<div class="title"><p>Bar Church Events</p></div>
				<div class="calendar">
					<div class="wrap">
						<section id="content" class="planner">
							<?php
								date_default_timezone_set("America/Vancouver");
								$timezone = new DateTimeZone("PST");
								$secondSunday = new DateTime('second sunday of this month', $timezone);
								$date = date('Y-m-d');

								$sundayCount = 0;
								$today = date("d"); // Current day
								if($date > $secondSunday->format('Y-m-d')) {
									// If it's past the second sunday show next month
									$month = new DateTime('first day of next month', $timezone);
								} else {
									$month = new DateTime('this month', $timezone);
								}
								$year = date("Y"); // Current year
						 ?>
						<h2><?php echo $month->format('F') . " " . $year; ?></h2>

						<table class="month">
							<tr class="days">
								<td>Sun</td>
								<td>Mon</td>
								<td>Tues</td>
								<td>Wed</td>
								<td>Thurs</td>
								<td>Fri</td>
								<td>Sat</td>
							</tr>
						<?php
							$month = $month->format('m'); // Current month

							$days = cal_days_in_month(CAL_GREGORIAN,$month,$year); // Days in current month

							$lastmonth = date("t", mktime(0,0,0,$month-1,1,$year)); // Days in previous month

							$start = date("N", mktime(0,0,0,$month,1,$year)); // Starting day of current month
							$finish = date("N", mktime(0,0,0,$month,$days,$year)); // Finishing day of  current month
							$laststart = $start - 1; // Days of previous month in calander

							$counter = 0;
							$nextMonthCounter = 1;

							if($start > 5){	$rows = 6; } else { $rows = 5; }

							for($i = 1; $i <= $rows; $i++) {
								echo '<tr class="week">';
								for($x = 1; $x <= 7; $x++) {

									if(($counter - $start) < 0) {
										$date = (($lastmonth - $laststart) + $counter);
										$class = 'class="blur"';
									} else if(($counter - $start) >= $days){
										$date = ($nextMonthCounter);
										$nextMonthCounter++;

										$class = 'class="blur"';

									} else {
										$date = ($counter - $start + 1);
										// if($x == 1 && $sundayCount < 2 || $x == 1 && $month == "01" && $year == "2019") {
										if($x == 1 && $sundayCount < 2) {
											$class = 'class="active"';
											$sundayCount++;
											$datetime = new DateTime();
											$newDate = $datetime->createFromFormat('d/m/Y', $date.'/'.$month.'/'.$year);
											$args = array(
												'numberposts'	=> 1,
												'post_type'		=> 'events',
												'meta_key'		=> 'date',
												'meta_value'	=> $newDate,
												'meta_type'		=> 'DATETIME'
											);

											$the_query = new WP_Query( $args );
											?>
											<?php if( $the_query->have_posts() ): ?>
												<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
													<!-- <?php echo get_field("event_url"); ?>
													<?php the_title(); ?> -->
												<?php endwhile; ?>
											<?php endif; ?>
											<?php wp_reset_query(); ?>
											<?php
										}
										// if($today == $counter - $start + 1){
										// 	$class = 'class="today"';
										// }
									}

									echo '<td '.$class.'><div class="area"><a href="https://www.facebook.com/pg/barchurchSEA/events" target="_blank" class="date">'. $date . '</a></div></td>';

									$counter++;
									$class = '';
								}
								echo '</tr>';
							}

						?>
						</table>
						</section>
						<section class="info">
							<p>We meet the first two Sundays every month.</p>
							<p>10 — 11:00am</p>
							<p><svg class="svg-inline--fa fa-map-marker fa-w-12" aria-hidden="true" data-prefix="fas" data-icon="map-marker" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0z"></path></svg><!-- <i class="fas fa-map-marker"></i> --><br>
								5449 Ballard Ave NW<br>
								Seattle, WA 98107</p>
							<p class="directions">
								<a href="https://www.google.com/maps/dir/''/bar+church/@47.6683472,-122.4564102,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x549015c5d4c15555:0x47ecfa571a2fb5f5!2m2!1d-122.3863705!2d47.6683685" target="_blank">Directions</a></p>
							</p>
						</section>
					 </div>
				</div>
			</section>

			<footer>
				<div class="grid">
					<div class="g-logo">
						<p><!-- Generator: Adobe Illustrator 22.0.1, SVG Export Plug-In  -->
							<svg version="1.1"
								 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
								 x="0px" y="0px" width="169.4px" height="169.4px" viewBox="0 0 169.4 169.4" style="enable-background:new 0 0 169.4 169.4;"
								 xml:space="preserve">
							<style type="text/css">
								.st5{fill:#DFDFDF;}
							</style>
							<defs>
							</defs>
							<g>
								<path class="st5" d="M84.7,0C38,0,0,38,0,84.7s38,84.7,84.7,84.7c46.7,0,84.7-38,84.7-84.7S131.4,0,84.7,0z M167.4,83.7h-4.3
									c-0.1-9.9-2.1-19.4-5.6-28.1l4-1.7C165.2,63.2,167.3,73.2,167.4,83.7z M160.7,52.1l-4,1.7c-3.8-8.9-9.3-16.9-15.9-23.8l3-3
									C150.9,34.2,156.7,42.7,160.7,52.1z M117.3,8.7c9.4,4,17.9,9.8,25.2,16.9l-3,3c-6.8-6.7-14.9-12.1-23.8-15.9L117.3,8.7z M85.7,2
									c10.5,0.1,20.5,2.2,29.7,5.9l-1.7,4c-8.7-3.5-18.2-5.4-28.1-5.6V2z M83.7,2v4.3c-9.9,0.1-19.4,2.1-28.1,5.6l-1.7-4
									C63.2,4.2,73.2,2.2,83.7,2z M52.1,8.7l1.7,4c-8.9,3.8-16.9,9.3-23.8,15.9l-3-3C34.2,18.5,42.7,12.7,52.1,8.7z M25.5,26.9l3,3
									c-6.7,6.8-12.1,14.9-15.9,23.8l-4-1.7C12.7,42.7,18.5,34.2,25.5,26.9z M7.9,54l4,1.6c-3.5,8.7-5.4,18.2-5.6,28.1H2
									C2.2,73.2,4.2,63.2,7.9,54z M2,85.7h4.3c0.1,9.9,2.1,19.4,5.6,28.1l-4,1.6C4.2,106.2,2.2,96.2,2,85.7z M8.7,117.3l4-1.7
									c3.8,8.9,9.3,16.9,15.9,23.8l-3,3C18.5,135.2,12.7,126.7,8.7,117.3z M52.1,160.7c-9.4-4-17.9-9.8-25.2-16.9l3-3
									c6.8,6.7,14.9,12.1,23.8,15.9L52.1,160.7z M83.7,167.4c-10.5-0.1-20.5-2.2-29.7-5.9l1.7-4c8.7,3.5,18.2,5.4,28.1,5.6V167.4z
									 M8.3,84.7c0-42.1,34.3-76.4,76.4-76.4c42.1,0,76.4,34.3,76.4,76.4s-34.3,76.4-76.4,76.4C42.6,161.1,8.3,126.8,8.3,84.7z
									 M85.7,167.4v-4.3c9.9-0.1,19.4-2.1,28.1-5.6l1.6,4C106.2,165.2,96.2,167.3,85.7,167.4z M117.3,160.7l-1.7-4
									c8.9-3.8,16.9-9.3,23.8-15.9l3,3C135.2,150.9,126.7,156.7,117.3,160.7z M143.9,142.5l-3-3c6.7-6.8,12.1-14.9,15.9-23.8l4,1.7
									C156.7,126.7,150.9,135.2,143.9,142.5z M161.5,115.4l-4-1.6c3.5-8.7,5.4-18.2,5.6-28.1h4.3C167.3,96.2,165.2,106.2,161.5,115.4z"/>
								<path class="st5" d="M123.4,76.6l1.4,1.7l1.5-1.5l3.1-3.1l1.3-1.3l-1.2-1.4c-4.6-5.3-11.5-8.4-18.9-8.4c-13.3,0-24.2,10-24.2,22.2
									s10.9,22.2,24.2,22.2c7.4,0,14.3-3,18.9-8.4l1.2-1.4l-1.3-1.3l-3.1-3.1l-1.5-1.5l-1.4,1.7c-2.8,3.3-7.1,5.4-11.7,5.6v-7L112,91
									l4.9-4.9l1.4-1.4l-1.4-1.4l-4.9-4.9l-0.4-0.4v-7C116.2,71.2,120.6,73.3,123.4,76.6z M115.5,84.7l-4.9,4.9l-4.9-4.9l4.9-4.9
									L115.5,84.7z M104.3,86.1l4.9,4.9l0.4,0.4v7C101.4,98,94.8,92,94.8,84.7s6.5-13.3,14.8-13.7v7l-0.4,0.4l-4.9,4.9l-1.4,1.4
									L104.3,86.1z M110.6,68.9c-9.8,0-17.8,7.1-17.8,15.8s8,15.8,17.8,15.8c5.8,0,11-2.5,14.3-6.4l3.1,3.1c-4.1,4.7-10.4,7.7-17.4,7.7
									c-12.3,0-22.2-9-22.2-20.2c0-11.1,9.9-20.2,22.2-20.2c7.1,0,13.4,3,17.4,7.7l-3.1,3.1C121.7,71.4,116.5,68.9,110.6,68.9z"/>
								<path class="st5" d="M73.4,83.1c1.4-2.1,2.1-4.5,2.1-7.1c0-7.1-5.8-12.9-12.9-12.9H41.4h-2v2v39.2v2h2h24.4
									c7.1,0,12.9-5.8,12.9-12.9C78.6,89.3,76.6,85.5,73.4,83.1z M76.6,93.4c0,6-4.9,10.9-10.9,10.9H41.4V65.1h21.3
									c6,0,10.9,4.9,10.9,10.9c0,3-1.2,5.6-3.1,7.6C74.1,85.3,76.6,89.1,76.6,93.4L76.6,93.4z"/>
								<path class="st5" d="M65.8,86.9h-3.1c0,0,0,0,0,0h-17V100h20.1c3.6,0,6.6-2.9,6.6-6.6S69.4,86.9,65.8,86.9z M65.8,98H47.7v-9.1h15
									h3.1c2.5,0,4.6,2,4.6,4.6C70.3,95.9,68.3,98,65.8,98z"/>
								<path class="st5" d="M67.3,80.6c1.2-1.2,1.9-2.9,1.9-4.6c0-3.6-2.9-6.6-6.6-6.6h-17v13.1h17C64.4,82.5,66,81.9,67.3,80.6z
									 M47.7,80.5v-9.1h15c2.5,0,4.6,2,4.6,4.6c0,1.2-0.5,2.4-1.3,3.2c-0.9,0.9-2,1.3-3.2,1.3H47.7z"/>
							</g>
							</svg>
							 </p>
					</div>
					<div class="g-contact">
						<p>Contact</p>
						<p>5449 Ballard Ave NW<br>Seattle, WA 98107</p>
						<p><a href="mailto:info@barchurch.com">info@barchurch.com</a></p>
						<p>&copy; 2017 Bar Church &mdash; An approved 501 (c)(3).</p>
					</div>
					<div class="g-learn">
						<p>Learn</p>
						<ul>
							<li><a href="<?php echo site_url( '/about', 'http' ); ?>">About</a></li>
							<li><a href="<?php echo site_url( '/journal', 'http' ); ?>">Journal</a></li>
							<li><a href="<?php echo site_url( '/questions', 'http' ); ?>">Questions</a></li>
							<li><a href="https://barchurch.churchcenter.com/giving?open-in-church-center-modal=true">Donate</a></li>
							<li><a href="<?php echo site_url( '/get-involved', 'http' ); ?>">Get Involved</a></li>
							<li><a href="/" class="toggle-modal-contact">Contact</a></li>
						</ul>
					</div>
					<div class="g-connect">
						<p>Connect</p>
						<ul>
							<li><a href="https://www.facebook.com/barchurchSEA/" target="_blank">Facebook</a></li>
							<li><a href="https://twitter.com/Bar_Church" target="_blank">Twitter</a></li>
							<li><a href="http://instagram.com/bar_church" target="_blank">Instagram</a></li>
							<!-- <li><a href="">Vimeo</a></li> -->
							<li><a href="http://eepurl.com/caU-sn" target="_blank">Newsletter</a></li>
						</ul>
					</div>
					<div class="g-newsletter">
						<p>Newsletter</p>
						<div id="mc_embed_signup">
							<form action="https://barchurch.us1.list-manage.com/subscribe/post?u=ddf5c4d0d967b40813f05a1e1&amp;id=50672d5967" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
								<p>
									<label for="mce-EMAIL">Your Email</label>
									<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
									<span class="response" id="mce-error-response" style="display:none"></span>
									<span class="response" id="mce-success-response" style="display:none"></span>
							    <span style="position: absolute; left: -5000px;" aria-hidden="true">
										<input type="text" name="b_ddf5c4d0d967b40813f05a1e1_50672d5967" tabindex="-1" value="">
									</span>
								</p>
								<p>
									<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
								</p>
							</form>
						</div>
					</div>
				</div>
			</footer>

			<?php wp_footer(); ?>

		 <?php endif; ?>
	 </div>
	</body>
</html>

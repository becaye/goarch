<?php get_header();

$goarch = goarch_get_global_class();
$goarch_cat = 0;
$goarch_category = get_category(get_query_var('cat'));
if (isset($goarch_category->cat_ID)) {
	$goarch_cat = $goarch_category->cat_ID;
} else {
	$goarch_cat = 0;
}


?>

<!-- Layout -->

<div class="layout">

	<!-- Home -->

	<main class="main main-inner main-blog bg-blog" data-stellar-background-ratio="0.6">
		<div class="container">
			<header class="main-header">
				<h1>

					<?php $terms = get_the_terms(get_the_ID(), 'projects_categories');

					foreach ($terms as $term) {
						echo esc_html($term->name);
					}


					?>
				</h1>
			</header>
		</div>

		<!-- Lines -->

		<div class="page-lines">
			<div class="container">
				<div class="col-line col-xs-4">
					<div class="line"></div>
				</div>
				<div class="col-line col-xs-4">
					<div class="line"></div>
				</div>
				<div class="col-line col-xs-4">
					<div class="line"></div>
					<div class="line"></div>
				</div>
			</div>
		</div>
	</main>


	<div class="content">
		<?php $type = goarch_get_tememe_color();

		$class = '';

		if ( $type != 'dark' ) {
			$class = "section";
		}
		?>
		<section  <?php echo esc_attr( $class ); ?>
			class="projects ">
			<div class="js-projects-gallery">
				<div class=" projects_block row">
					<?php



					$j = 1;
					if (have_posts()) {
						while (have_posts()) {
							the_post();
							$main_class = '';
							if ($j % 2 == 0) {
								$main_class = ' project-light';
							}
							$j++;

							?>

							<div class="project project_item  <?php echo esc_attr($main_class); ?>  col-sm-6 col-md-4 col-lg-3">
								<?php $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
								<a href="<?php echo esc_url($image_url[0]); ?>" title="<?php the_title(); ?>">
									<figure>
										<?php the_post_thumbnail('goarch-image-480x880-croped'); ?>
										<figcaption>
											<h3 class="project-title">
												<?php echo the_title(); ?>
											</h3>

											<?php $terms = get_the_terms(get_the_ID(), 'projects_categories');

											foreach ($terms as $term) {
												?>
												<h4 class="project-category">
													<?php echo esc_html($term->name); ?>
												</h4>
												<?php
											}
											?>
											<div class="project-zoom"></div>
										</figcaption>
									</figure>
								</a>
							</div>


							<?php
						}

					}

					wp_reset_postdata();
					?>

				</div>
			</div>
			<div class="section-content text-center">
				<a href="#"
				   class="btn p-btn btn-gray"><?php esc_html_e( 'More projects', 'goarch' ) ?></a></div>
		</section>

		<?php
		$term = get_query_var( 'projects_categories' );


		?>
		<script>


			function initialize_map() {
			}

			jQuery(document).ready(function ($) {


				var total =  <?php echo esc_html($wp_query->max_num_pages);?>;
				var ajax = true;
				var count = 2;

				$('.p-btn').click(function () {

					jQuery(this).addClass('active2');
					if (ajax) {
						if (count > total + count) {
							return false;
						} else {
							if ($("div").is(".no_posts_1")) return;
							loadArticle(count);
							count++;

						}
						ajax = false;
					}
					return false;

				});


				function loadArticle(pageNumber) {

					var ofset = $(".projects_block ").length;
					var posttype = "<?php
						if (isset($wp_query->query['post_type']))
							echo esc_attr(sanitize_text_field($wp_query->query['post_type']));
						?>";
					var cat = "<?php
						if (is_front_page()) { // is the index page cat = 0
							echo 0;
						} else {
							if (get_the_category()) {
								echo esc_html($goarch_cat);
							}

						} ?>";
					var is_sticky = "";
					var tag = '<?php
						if (isset($wp_query->query['tag']) && !empty($wp_query->query['tag']))
							echo esc_html($wp_query->query['tag']);
						?>';

					jQuery('.p-btn').attr('disabled', true);

					$.ajax({
						url: "<?php echo esc_url(site_url()); ?>/wp-admin/admin-ajax.php",
						type: 'POST',
						data: "action=goarch_infinite_projects_scroll&page_no=" + pageNumber + "&ofset=" + ofset +
						"&cat=" + cat + '&tag=' + tag + "&is_sticky=" + is_sticky + "&term=<?php  echo esc_html($term);  ?>" ,
						success: function (html) {

							var $moreBlocks = jQuery(html).filter('.project_item');
							jQuery(".projects_block").append($moreBlocks);


							ajax = true;


						}
					});
					return false;
				}


			});
		</script>





		<!-- Footer -->
		<?php
		echo(

		do_shortcode( ( get_theme_mod( 'goarch_c_form_s_val' ) ) ) );

		?>



		<?php get_footer(); ?>

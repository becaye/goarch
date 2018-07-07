<?php get_header();

$goarch_cat = 0;
$goarch_category = get_category( get_query_var( 'cat' ) );
if ( isset( $goarch_category->cat_ID ) ) {
	$goarch_cat = $goarch_category->cat_ID;
} else {
	$goarch_cat = 0;
}


$positin_sidebar = "";

if ( get_theme_mod( 'goarch_sidebar_position', 's2' ) == 's1' ) {
	$positin_sidebar = 'left';
} else {
	$positin_sidebar = 'right';
}

if ( isset( $_GET['showas'] ) && $_GET['showas'] == 'left' ) {
	$positin_sidebar = 'left';
} elseif ( isset( $_GET['showas'] ) && $_GET['showas'] == 'right' ) {
	$positin_sidebar = 'right';
}

?>

<!-- Layout -->

<div class="layout">

	<!-- Home -->

	<main class="main main-inner main-blog bg-blog" data-stellar-background-ratio="0.6">
		<div class="container">
			<header class="main-header">
				<h1>
					<?php
					the_archive_title();
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
		<section class="blog-list <?php echo esc_attr( $class ); ?>">

			<div class="container">

				<?php

				$positin_sidebar = "";
				$class = '';

				if ( get_theme_mod( 'goarch_sidebar_cat_position', 's3' ) == 's1' ) {
					$positin_sidebar = 'left';
					$class = 'col-primary col-md-8';
				} elseif ( get_theme_mod( 'goarch_sidebar_cat_position', 's1' ) == 's2' ) {
					$positin_sidebar = 'right';
					$class = 'col-primary col-md-8';
				} elseif ( get_theme_mod( 'goarch_sidebar_cat_position', 's2' ) == 's3' ) {
					$positin_sidebar = 'none';

				}

				if ( $positin_sidebar == 'left' ) {
					get_sidebar();
				}
				?>


				<div class="b-grid <?php echo esc_attr( $class ); ?>  ">

					<div class="b-grid-sizer"></div>


					<?php if ( have_posts() ) { ?>
						<?php
						// Start the Loop.
						while ( have_posts() ) {
							the_post();
							get_template_part( 'partials/content', get_post_format() );

						}
					}

					wp_reset_postdata();
					?>


				</div>
				<?php
				if ( $positin_sidebar == 'right' ) {
					get_sidebar();
				} else ( $positin_sidebar == 'none' )
				?>

				<div class="section-content text-center">
					<a href="<?php echo esc_url( the_permalink() ); ?>"
					   class="btn more_btn2  btn-gray"> <?php esc_html_e( 'Read more', 'goarch' ) ?></a>


				</div>
			</div>
			<div class="d-none">
				<?php

				$goarch_class = goarch_get_global_class();
				$goarch_class->goarch_pagenavi( $echo = false );
				ob_start();
				the_posts_pagination();
				wp_link_pages( array(
					'echo' => 0
				) );
				ob_get_clean();
				?>
			</div>


		</section>

		<!--goarch_infinite_scroll-->

		<?php
		$cats_arr = array();
		global $wp_query;
		// is archive page
		if (isset($wp_query->query['year']) && !empty($wp_query->query['year']))
			$cats_arr['year'] = ($wp_query->query['year']);

		if (isset($wp_query->query['monthnum']) && !empty($wp_query->query['monthnum']))
			$cats_arr['monthnum'] = ($wp_query->query['monthnum']);

		if (isset($wp_query->query['day']) && !empty($wp_query->query['day']))
			$cats_arr['day'] = ($wp_query->query['day']);


		$searh = get_search_query();
		if( isset($searh{0}))
			$cats_arr['s'] = sanitize_text_field(get_search_query());

		$ne_url =  http_build_query($cats_arr);
		?>
		<script>


			function initialize_map() {
			}

			jQuery(document).ready(function ($) {


				var total =  <?php echo esc_html( $wp_query->max_num_pages );?>;
				var ajax = true;
				var count = 2;

				$('.more_btn2').click(function () {

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

					var ofset = $(".blog-list ").length;
					var posttype = "<?php
						if ( isset( $wp_query->query['post_type'] ) ) {
							echo esc_attr( sanitize_text_field( $wp_query->query['post_type'] ) );
						}
						?>";
					var cat = "<?php
						if ( is_front_page() ) { // is the index page cat = 0
							echo 0;
						} else {
							if ( get_the_category() ) {
								echo esc_html( $goarch_cat );
							}

						} ?>";
					var is_sticky = "";
					var tag = '<?php
						if ( isset( $wp_query->query['tag'] ) && !empty( $wp_query->query['tag'] ) ) {
							echo esc_html( $wp_query->query['tag'] );
						}
						?>';

					jQuery('.more_btn2').attr('disabled', true);

					$.ajax({
						url: "<?php echo esc_url( site_url() ); ?>/wp-admin/admin-ajax.php",
						type: 'POST',
						data: "action=goarch_infinite_scroll&page_no=" + pageNumber + "&ofset=" + ofset +
						"&cat=" + cat + '&tag=' + tag + "&is_sticky=" + is_sticky +'&<?php  echo ($ne_url); ?>',
						success: function (html) {

							var $moreBlocks = jQuery(html).filter('.post-item');
							jQuery(".b-grid").append($moreBlocks);


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

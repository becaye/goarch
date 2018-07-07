<?php
get_header(); ?>

<div class="layout">

	<!-- Home -->

	<main class="main main-inner main-blog bg-blog" data-stellar-background-ratio="0.6">
		<div class="container">
			<header class="main-header">
				<?php if ( get_option_tree( 'goarch_error_heading' ) != '' ) : ?>
					<h1><?php echo wp_kses_post( get_option_tree( 'goarch_error_heading' ) ); ?></h1>

				<?php else : ?>
					<h1><?php esc_html_e( '404', 'goarch' ) ?></h1>
				<?php endif; ?>

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


	<!-- Content -->

	<section class="blog-details">
		<div class="container">
			<div class="row">
				<?php

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
				<div class="col-primary col-md-8">

					<article <?php post_class( 'post' ); ?>>
						<header class="post-header">

								<?php if ( get_option_tree( 'goarch_error_slogan' ) != '' ) : ?>
									<h2>
										<?php echo wp_kses_post( get_option_tree( 'goarch_error_slogan' ) ); ?></h2>
								<?php else : ?>

									<h2><?php
										esc_html_e( ' Oops! The Page you requested was not found!', 'goarch' ); ?>
									</h2>
								<?php endif; ?>



						</header>

						<div class="post-entry text-left">
							<?php get_search_form(); ?>
						</div>
					</article>
				</div>

			</div>
		</div>


		<?php get_footer(); ?>

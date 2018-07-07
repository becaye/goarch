<?php get_header(); ?>

<div class="layout">

	<!-- Home -->

	<main class="main main-inner main-blog bg-blog" data-stellar-background-ratio="0.6">
		<div class="container">
			<header class="main-header">
				<h1><?php

					$big_title = get_post_meta( get_the_ID(), '_goarch_short_description', 1 );
					if ( isset( $big_title{0} ) ) {
						echo wp_kses_post( $big_title );
					} else {
						$categories = get_the_category();
						if ( isset( $categories[0]->cat_ID ) && !is_home() ) {
							$category_id = $categories[0]->cat_ID;
							echo wp_kses_post( get_cat_name( $categories[0]->cat_ID ) );
						}
					}

					?></h1>
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
	<div class="content">
		<section class="blog-details">
			<div class="container">
				<div class="row">
					<?php


					$positin_sidebar = "";
					$class = '';

					if ( get_theme_mod( 'goarch_sidebar_position', 's2' ) == 's1' ) {
						$positin_sidebar = 'left';
						$class = 'col-primary col-md-8';
					} elseif ( get_theme_mod( 'goarch_sidebar_position', 's1' ) == 's2' ) {
						$positin_sidebar = 'right';
						$class = 'col-primary col-md-8';
					} elseif ( get_theme_mod( 'goarch_sidebar_position', 's2' ) == 's3' ) {
						$positin_sidebar = 'none';
						$class = 'col-primary col-md-12';
					}


					if ( $positin_sidebar == 'left' ) {
						get_sidebar();
					}


					?>
					<div class=" <?php echo esc_attr( $class ); ?> ">

						<?php if ( have_posts() ) : ?>
							<?php
							// Start the Loop.
							while ( have_posts() ) : the_post();

								?>
								<?php get_template_part( 'partials/content', get_post_format() ); ?>

							<?php endwhile;


						else :

						endif; ?>
						<section class="section-add-comment section-primary">
							<?php
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif; ?>

						</section>

					</div>
					<?php
					if ( $positin_sidebar == 'right' ) {
						get_sidebar();
					} else ( $positin_sidebar == 'none' )
					?>
				</div>
			</div>
		</section>


		<?php get_footer(); ?>

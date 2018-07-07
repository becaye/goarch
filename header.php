<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Loader -->

<?php


if ( get_theme_mod( 'goarch_performans_preloader', true ) != false ) {
	?>
	<div class="loader">
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
		<div class="loader-brand">
			<div class="sk-folding-cube">
				<div class="sk-cube1 sk-cube"></div>
				<div class="sk-cube2 sk-cube"></div>
				<div class="sk-cube4 sk-cube"></div>
				<div class="sk-cube3 sk-cube"></div>
			</div>
		</div>
	</div>
	<?php
} ?>
<?php $v_title = ( get_theme_mod( 'goarch_performans_vertical' )  );



?>

<!-- Header -->

<header id="top" class="<?php if ( is_home() or is_front_page() or $v_title == 's1' ) { ?>
header-home
<?php } else { ?>
  header-inner
  <?php } ?>
  ">
	<div class="brand-panel">
		<?php $url = get_home_url( '/' );
		$logo_text = ( get_theme_mod( 'logo_text' ) );
		$logo_text2 = ( get_theme_mod( 'logo_text_2' ) );
		$logo_primary = ( get_theme_mod( 'logo_text_primary' ) );
		$brand_name = ( get_theme_mod( 'logo_brand_name' ) );
		?>
        <a href="<?php $url = get_home_url( '/' );
		echo esc_url( $url ); ?>" class="brand"><?php echo wp_kses_post( $logo_text );  if ( isset( $logo_primary{0} ) ): ?><span
                        class="text-primary"><?php echo wp_kses_post( $logo_primary ); ?></span><?php endif; echo wp_kses_post( $logo_text2 ); ?>

			<?php
			$logo = get_theme_mod( 'goarch_logo_small' );
			if ( isset( $logo{2} ) ) {
				?>    <img alt="" class="img-responsive center-block"
                           src="<?php echo esc_url( $logo ); ?>">
				<?php
			}
			?>
        </a>


		<?php $phone = ( get_theme_mod( 'Header_phone' ) ); ?>

		<div class="brand-name"><?php if ( isset( $brand_name{0} ) ) {
				echo wp_kses_post( $brand_name );
			} ?>
		</div>


		<div class="slide-number">
			<span class="current-number text-primary"><span
					class="count"><?php esc_html_e( '01', 'goarch' ); ?></span></span>
			<sup><span class="delimiter"><?php esc_html_e( '/', 'goarch' ); ?></span> <span
					class="total-count"><?php esc_html_e( '01', 'goarch' ); ?></span></sup>
		</div>

	</div>

	<div class="header-phone"><?php if ( isset( $phone{1} ) ) {
			echo wp_kses_post( $phone );
		} ?></div>
	<?php if ( is_home() or is_front_page() or $v_title == 's1'  ) { ?>
		<div class="vertical-panel"></div>
	<?php } ?>
	<div class="vertical-panel-content">
		<div class="vertical-panel-info">
			<?php if ( is_home() or is_front_page() or $v_title == 's1' ) { ?>
				<div
					class="vertical-panel-title"><?php echo esc_html( get_theme_mod( 'goarch_performans_home_text', esc_html__( 'Architecture buro', 'goarch' ) ) ); ?></div>
			<?php } ?>
			<div class="line"></div>
		</div>
		<ul class="social-list">
			<?php
			if ( strlen( get_theme_mod( 'sotial_networks_control_social_shortcode' ) ) > 8 ):
				echo do_shortcode( get_theme_mod( 'sotial_networks_control_social_shortcode' ) );
			endif; ?>
			<?php if ( strlen( get_theme_mod( 'sotial_networks_control_instagram' ) ) > 8 ): ?>
				<li><a  class="fa fa-instagram"
				       href="<?php echo esc_url( get_theme_mod( 'sotial_networks_control_instagram' ) ); ?>">

					</a></li>
			<?php endif; ?>
			<?php if ( strlen( get_theme_mod( 'sotial_networks_control_twitter' ) ) > 8 ): ?>
				<li><a class="fa fa-twitter"
				       href="<?php echo esc_url( get_theme_mod( 'sotial_networks_control_twitter' ) ); ?>">

					</a></li>
			<?php endif; ?>
			<?php if ( strlen( get_theme_mod( 'sotial_networks_control_behance' ) ) > 8 ): ?>
				<li><a class="fa fa-behance"
				       href="<?php echo esc_url( get_theme_mod( 'sotial_networks_control_behance' ) ); ?>">

					</a></li>
			<?php endif; ?>
			<?php if ( strlen( get_theme_mod( 'sotial_networks_control_facebook' ) ) > 8 ): ?>
				<li><a href="<?php echo esc_url( get_theme_mod( 'sotial_networks_control_facebook' ) ); ?>"
				       class="fa fa-facebook">

					</a></li>
			<?php endif; ?>


		</ul>
	</div>


	<!-- Navigation Desctop -->

	<nav class="navbar-desctop visible-md visible-lg">
		<div class="container">

			<?php
			$logo_text = ( get_theme_mod( 'logo_text' ) );
			$logo_text2 = ( get_theme_mod( 'logo_text_2' ) );
			$logo_primary = ( get_theme_mod( 'logo_text_primary' ) );
			?>

            <a href="#top" class="brand js-target-scroll"><?php echo wp_kses_post( $logo_text ); ?><?php if ( isset( $logo_primary{0} ) ): ?><span class="text-primary"><?php echo wp_kses_post( $logo_primary ); ?></span><?php endif; ?><?php echo wp_kses_post( $logo_text2 ); ?>

	            <?php
	            $logo = get_theme_mod( 'goarch_logo_small' );
	            if ( isset( $logo{2} ) ) {
		            ?>    <img alt="" height="40px"  class="center-block"
                               src="<?php echo esc_url( $logo ); ?>">
		            <?php
	            }
	            ?>


            </a>

			<?php $goarch_defaults = array(
				'theme_location' => 'goarch_topmenu',
				'menu' => '',
				'container' => 'div',
				'container_class' => '',
				'container_id' => '',
				'menu_class' => '',
				'menu_id' => '',
				'echo' => true,
				'fallback_cb' => 'wp_page_menu',
				'before' => '',
				'after' => '',
				'link_before' => '',
				'link_after' => '',
				'items_wrap' => '<ul id="%1$s" class="navbar-desctop-menu %2$s">%3$s</ul>',
				'depth' => 0
			);


			if ( @has_nav_menu( 'goarch_topmenu' ) ) {
				@wp_nav_menu( $goarch_defaults );


			} else {

				if ( get_option( 'goarch_one_page_menu' ) == true || get_option( 'goarch_one_page_menu_right' ) ) {
					?>

					<ul class="navbar-desctop-menu">
						<?php echo wp_kses_post( get_option( 'goarch_one_page_menu' ) . get_option( 'goarch_one_page_menu_right' ) ); ?>
					</ul>

					<?php
				} else {
					$goarch_args = array(
						'depth' => 0
					,
						'show_date' => ''
					,
						'date_format' => sanitize_text_field( get_option( 'date_format' ) )
					,
						'child_of' => 0
					,
						'exclude' => ''
					,
						'exclude_tree' => ''
					,
						'title_li' => '',
						'container' => ''
					,
						'echo' => 1
					,
						'authors' => ''
					,
						'sort_column' => 'menu_order, post_title'
					,
						'sort_order' => 'ASC'
					,
						'link_before' => ''
					,
						'link_after' => ''
					,
						'meta_key' => ''
					,
						'meta_value' => ''
					,
						'number' => 5
					,
						'offset' => ''
					,
						'walker' => ''
					);

					?>
					<ul class="navbar-desctop-menu">
						<?php
						@wp_list_pages( $goarch_args );
						?>
					</ul>

					<?php
				}
			}
			?>
		</div>
	</nav>


	<!-- Navigation Mobile -->

	<nav class="navbar-mobile">
		<?php $url = get_home_url( '/' );
		$logo_text = ( get_theme_mod( 'logo_text' ) );
		$logo_text2 = ( get_theme_mod( 'logo_text_2' ) );
		$logo_primary = ( get_theme_mod( 'logo_text_primary' ) );
		?>

		<a href="#top" class="brand js-target-scroll">


			<?php echo wp_kses_post( $logo_text ); ?><span
				class="text-primary"><?php echo wp_kses_post( $logo_primary ); ?></span><?php echo wp_kses_post( $logo_text2 ); ?>
		</a>


		<!-- Navbar Collapse -->

		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-mobile">
			<span class="sr-only"><?php echo esc_html__( 'Toggle navigation', 'goarch' ); ?></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<?php $goarch_defaults = array(
				'theme_location' => 'goarch_topmenu',
				'menu' => '',
				'container' => '',
				'container_class' => '',
				'container_id' => '',
				'menu_class' => '',
				'menu_id' => '',
				'echo' => true,
				'fallback_cb' => 'wp_page_menu',
				'before' => '',
				'after' => '',
				'link_before' => '',
				'link_after' => '',
				'items_wrap' => '<ul id="%1$s" class="navbar-nav-mobile %2$s">%3$s</ul>',
				'depth' => 0,
				'walker' => new goarch_top_menu_walker()
			);


			if ( @has_nav_menu( 'goarch_topmenu' ) ) {
				@wp_nav_menu( $goarch_defaults );


			} else {

				if ( get_option( 'goarch_one_page_menu' ) == true || get_option( 'goarch_one_page_menu_right' ) ) {
					?>

					<ul class="navbar-nav-mobile">
						<?php echo wp_kses_post( get_option( 'goarch_one_page_menu' ) . get_option( 'goarch_one_page_menu_right' ) ); ?>
					</ul>

					<?php
				} else {
					$goarch_args = array(
						'depth' => 0
					,
						'show_date' => ''
					,
						'date_format' => sanitize_text_field( get_option( 'date_format' ) )
					,
						'child_of' => 0
					,
						'exclude' => ''
					,
						'exclude_tree' => ''
					,
						'title_li' => ''
					,
						'echo' => 1
					,
						'authors' => ''
					,
						'sort_column' => 'menu_order, post_title'
					,
						'sort_order' => 'ASC'
					,
						'link_before' => ''
					,
						'link_after' => ''
					,
						'meta_key' => ''
					,
						'meta_value' => ''
					,
						'number' => 5
					,
						'offset' => ''
					,
						'walker' => ''
					);

					?>
					<ul class="navbar-nav-mobile">
						<?php
						@wp_list_pages( $goarch_args );
						?>
					</ul>

					<?php
				}
			}
			?>
		</div>
	</nav>
</header>


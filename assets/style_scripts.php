<?php

/**
 * We print the scripts and styles in the frontend
 */


add_action( 'wp_enqueue_scripts', 'goarch_style_scripts', 500 );


/**
 *
 */
function goarch_style_scripts() {
	global $post, $goarch_class;
	//color theme in css


	$type = goarch_get_tememe_color();

	wp_enqueue_style( 'goarch_style_wp', get_stylesheet_directory_uri() . '/style.css' );


	if ( $type == 'dark' ) {
		wp_enqueue_style( 'goarch_main_style', get_template_directory_uri() . "/css/style.css" );

	} else {
		wp_enqueue_style( 'goarch_main_style', get_template_directory_uri() . "/css/light.css" );
	}
	if ( !isset( $_GET['style'] ) && function_exists( 'goarch_enqueue_url_base_style' ) && goarch_enqueue_url_base_style() == true ) {
		wp_enqueue_style( 'goarch_style', goarch_enqueue_url_base_style() );
	}
	//************************************* Fonts ***********************************************/

	// live color edit
	if ( !isset( $_GET['style'] ) && function_exists( 'goarch_enqueue_url_base_style' ) && goarch_enqueue_url_base_style() == true ) {
		if ( is_customize_preview() && function_exists( 'goarch_css_generator_custumize' ) ) {
			wp_add_inline_style( 'goarch_style', goarch_css_generator_custumize() );
		}
	} else {
		if ( is_customize_preview() && function_exists( 'goarch_css_generator_custumize' ) ) {
			wp_add_inline_style( 'goarch_main_style', goarch_css_generator_custumize() );
		}
	}


	wp_enqueue_style( 'goarch_fonts_google_Oswald', $goarch_class->goarch_google_fonts_url( 'Oswald:300,400,700' ) );
	wp_enqueue_style( 'goarch_fonts_google_Montserrat', $goarch_class->goarch_google_fonts_url( 'Montserrat:400,700' ) );


	// cat image bg
	$bg = goarch_taxonomy_image();
	if ( !isset( $bg{8} ) ) {
		$bg = get_header_image();
	}
	if ( is_single() || is_page() ) {

		$image_id = get_post_meta( $post->ID, '_goarch_image_id', true );
		//if issest id img
		if ( $image_id && get_post( $image_id ) ) {
			$image = wp_get_attachment_image_src( $image_id, 'full' );


			if ( isset( $image[0] ) ) {
				$bg = $image[0];
			}

		}

	}


	$css = '';

	if ( isset( $bg{8} ) ) {
		$css .= '.bg-blog ,  .page  .main-inner {
        background: url(' . esc_url( $bg ) . ') 50%  no-repeat !important; 
        background-size: cover !important; 
        }';
	}

	$footer_bg = get_theme_mod( 'footer_img' );
	if ( isset( $footer_bg{8} ) ) {
		$footer_bg = esc_url( $footer_bg );
		$css .= 'footer.footer{
        background: url(' . esc_url( $footer_bg ) . ') 50%  no-repeat !important; 
        background-size: cover !important; 
        }';
	}


	if ( strlen( get_theme_mod( 'colors_m_D4B068' ) ) > 2 ) {
		if ( get_option( 'goarch_color' ) ) {
			wp_add_inline_style( 'goarch_style_wp', wp_kses_post( get_option( 'goarch_color' ) ) );
		}
	}

	wp_add_inline_style( 'goarch_main_style', $css );
	/*---------------------------------------- JS --------------------------------------------------------------------------*/

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '1', true );

	if ( get_theme_mod( 'goarch_performans_scroll', false ) == true ) {
		wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/js/smoothscroll.js', array( 'jquery' ), '1', true );
	}
	wp_enqueue_script( 'validate', get_template_directory_uri() . '/js/jquery.validate.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'stellar', get_template_directory_uri() . '/js/jquery.stellar.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'goarch_interface', get_template_directory_uri() . '/js/interface.js', array( 'jquery' ), '1', true );


	if ( get_theme_mod( 'goarch_map_google_key' ) != '' ) {
		wp_enqueue_script( 'mapsgoogle', 'https://maps.google.com/maps/api/js?key=' . get_theme_mod( 'goarch_map_google_key' ), array( 'jquery' ), '1', true );

	} else {
		wp_enqueue_script( 'mapsgoogle', 'https://maps.google.com/maps/api/js', array( 'jquery' ), '1', true );

	}


	wp_enqueue_script( 'goarch_gmap', get_template_directory_uri() . '/js/gmap.js', array( 'jquery' ), '1', true );


	wp_enqueue_script( 'comment-reply' );


	wp_localize_script( 'goarch_interface', 'goarch_obj', array(
		'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ),
		'theme_url' => esc_url( get_template_directory_uri() ),


	) );


}


/**
 * init admin scripts and style
 */
function goarch_style_scripts_admin() {
	//Geocoding google

	wp_enqueue_style( 'goarch_admins', get_template_directory_uri() . '/css/admins.css' );
	wp_enqueue_script( 'goarch_admins', get_template_directory_uri() . '/js/admin/admin.js', array( 'jquery' ), '1', true );
	wp_localize_script( 'goarch_admins', 'goarch_admin_obj',
		array(
			'version' => sanitize_text_field( esc_html( get_bloginfo( "version" ) ) )
		)
	);
	$T = get_the_tags();
}

add_action( 'admin_enqueue_scripts', 'goarch_style_scripts_admin' );


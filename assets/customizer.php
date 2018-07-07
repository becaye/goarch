<?php

/**
 * Adds sections and settings to customizer
 *
 * @param $wp_customize
 */

function goarch_true_customizer_init( $wp_customize ) {
	//Panels
	$wp_customize->add_panel( 'panel_blog', array(
		'title' => esc_html__( 'Blog settings', 'goarch' ),
		'description' => esc_html__( 'Settings of the blog', 'goarch' ),
		'priority' => 31,
	) );


	/*******************************************************************
	 * Main page settings
	 *******************************************************************/

	$tmp_sectionname = "goarch";
	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title' => esc_html__( 'Location sidebar', 'goarch' ),
		'priority' => 30,
		'panel' => 'panel_blog'
	) );
	$tmp_tabel = 'sidebar_position';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => 's2',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Location sidebar', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'radio',
		'choices' => array(
			's1' => esc_html__( 'Sidebar Left', 'goarch' ),
			's2' => esc_html__( 'Sidebar Right', 'goarch' ),
			's3' => esc_html__( 'Sidebar none', 'goarch' ),
		)
	) );


	/*******************************************************************
	 * sidebar categories
	 *******************************************************************/


	$tmp_tabel = 'sidebar_cat_position';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => 's3',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Location sidebar in categories', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'radio',
		'choices' => array(
			's1' => esc_html__( 'Sidebar Left', 'goarch' ),
			's2' => esc_html__( 'Sidebar Right', 'goarch' ),
			's3' => esc_html__( 'Sidebar none', 'goarch' ),
		)
	) );


	/*----------------------------------------------------------------
	 * blog list sitting
	 -----------------------------------------------------------------*/
	$tmp_sectionname = "goarch_blog_list";
	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title' => esc_html__( 'blog list', 'goarch' ),
		'priority' => 31,
		'panel' => 'panel_blog'
	) );

	$tmp_tabel = 'text';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => esc_html__( 'READ MORE', 'goarch' ),
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Button text READ MORE', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );

	$tmp_tabel = 'limit_word';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => 40,
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Limint word in post blog list', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );


	/*******************************************************************
	 * Social networks
	 *******************************************************************/
	$tmp_sectionname = "sotial_networks";
	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title' => esc_html__( 'Social networks', 'goarch' ),
		'priority' => 31,
		'description' => esc_html__( 'Enter url desired social networks so that they appear on the site', 'goarch' )
	) );

	/*short*/

	$tmp_settingname = $tmp_sectionname . '_control_social_shortcode';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( ' Insert Social shortcode or another ', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'description' => esc_html__( 'its show in footer example shortcode [goarch_social_links url="https://pinterest.com/" class="fa fa-pinterest"]', 'goarch' ),
		'settings' => $tmp_settingname,
		'type' => 'textarea'
	) );


	/*facebook*/
	$tmp_settingname = $tmp_sectionname . '_control_facebook';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Facebook  url', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );

	/*twitter*/
	$tmp_settingname = $tmp_sectionname . '_control_twitter';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Twitter url', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );

	/*behance*/
	$tmp_settingname = $tmp_sectionname . '_control_behance';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Behance url', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );

	/*instagram*/
	$tmp_settingname = $tmp_sectionname . '_control_instagram';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'instagram url', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );


	/*******************************************************************
	 * Social networks
	 *******************************************************************/
	$tmp_sectionname = "goarch_mail";
	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title' => esc_html__( 'Setting email', 'goarch' ),
		'priority' => 31,
		'description' => ''
	) );

	/*short*/

	$tmp_settingname = $tmp_sectionname . '_email';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( ' Insert your email', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'description' => esc_html__( 'can specify one email', 'goarch' ),
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );



	/*******************************************************************
	 * Header
	 *******************************************************************/

	$tmp_sectionname = "Header";


	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title' => esc_html__( 'Header', 'goarch' ),
		'priority' => 30,
	) );

	/**
	 * Phone
	 */


	$tmp_settingname = $tmp_sectionname . '_phone';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'
	,
		'sanitize_callback' => 'wp_kses_post'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( ' Phone in the header', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );

	/*******************************************************************
	 * logo
	 *******************************************************************/


	$tmp_sectionname = "logo";


	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title' => esc_html__( 'Logo', 'goarch' ),
		'priority' => 30,
		'description' => esc_html__( 'Here You can change the logo in the header and in the footer', 'goarch' )
	) );
	$tmp_settingname =  'goarch_logo_small';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default'           =>
			'',
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
		$tmp_settingname, array(
			'label'    =>  esc_html__( ' Logo', 'goarch' ),
			'section'  => $tmp_sectionname . "_section",
			'settings' => $tmp_settingname,
		) ) );


	/**
	 *  logo
	 */

	$tmp_settingname = $tmp_sectionname . '_brand_name';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'
	,
		'sanitize_callback' => 'wp_kses_post'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Brand name', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'description' => esc_html__( 'Insert brand name (under header logo) )', 'goarch' ),
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );

	$tmp_settingname = $tmp_sectionname . '_text';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'
	,
		'sanitize_callback' => 'wp_kses_post'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Logo text', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );
	$tmp_settingname = $tmp_sectionname . '_text_primary';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'
	,
		'sanitize_callback' => 'wp_kses_post'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Logo text primary', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );
	$tmp_settingname = $tmp_sectionname . '_text_2';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default'
	,
		'sanitize_callback' => 'wp_kses_post'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Logo text', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text'
	) );

	/*******************************************************************
	 * Map style
	 *******************************************************************/

	$tmp_sectionname = "goarch_map";
	$tmp_default = "";
	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title' => esc_html__( 'Map style', 'goarch' ),
		'priority' => 30,
		'description' => esc_html__( 'Map style JSON config (see https://snazzymaps.com, http://www.mapstylr.com/showcase/ )', 'goarch' )
	) );
	$tmp_tabel = 'stylemap_json';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$tmp_settingtitle = esc_html__( 'stylemap_json', 'goarch' );
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => $tmp_default,
		'sanitize_callback' => 'goarch_sanitize_temp'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'stylemap json', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'textarea'
	) );


	$tmp_settingname = $tmp_sectionname . '_google_key';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => '',
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Insert you google map api key', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'description' => esc_html__( '(see https://developers.google.com/maps/documentation/javascript/get-api-key#key )', 'goarch' ),
		'type' => 'text',
	) );


	/******************************************************************
	 * Colors
	 */

	$colors = array();
	if ( function_exists( 'goarch_get_style_color' ) ) {
		$colors = goarch_get_style_color();
	}

	if ( goarch_get_tememe_color() == 'dark' ) {
		$arr_exclude = array(
			'404040',
			'5E5E5E',
			'474747',
			'141414',
			'333333',
			'434343',
			'373737'
		);

	} else {
		$arr_exclude = array(
			'3D3D3D',
			'363636',
			'EDEDED',
			'E5BF93',
			'C5C4C2',
			'141414',
			'6F6F6F',
			'5E5E5E',
			'2B2B2B',
			'686868',
			'333333'
		);

	}
	foreach ( $colors as $k => $v ) {
		$grb = goarch_Hex2RGB( $v );
		/*if ( $grb[0] == $grb[1] ) {
			continue;
		} //gray*/
		if ( in_array( $v, $arr_exclude ) ) {
			continue;
		}
		$tmp_sectionname = 'colors';
		$tmp_settingname = $tmp_sectionname . '_m_' . $v;
		$label = $v;

		// dark version colors name
		if ( goarch_get_tememe_color() == 'dark' ) {
			if ( $v == '272727' ) {
				$label = esc_html__( 'primary for buttons, links', 'goarch' );
			}
			if ( $v == 'C5A47E' ) {
				$label = esc_html__( 'background dark version', 'goarch' );
			}
			if ( $v == 'FF7D7D' ) {
				$label = esc_html__( 'code tag ', 'goarch' );
			}

			if ( $v == 'E5BF93' ) {
				$label = esc_html__( 'object label', 'goarch' );
			}
			if ( $v == 'D0D0D0' ) {
				$label = esc_html__( 'author link', 'goarch' );
			}
			if ( $v == '686868' ) {
				$label = esc_html__( 'Blog links', 'goarch' );
			}
			if ( $v == 'B4B4B4' ) {
				$label = esc_html__( 'blog meta', 'goarch' );
			}
			if ( $v == '6F6F6F' ) {
				$label = esc_html__( 'blog tags', 'goarch' );
			}
			if ( $v == '212121' ) {
				$label = esc_html__( 'project details even ', 'goarch' );
			}
			if ( $v == 'EDEDED' ) {
				$label = esc_html__( 'project details title border top ', 'goarch' );
			}
			if ( $v == '606060' ) {
				$label = esc_html__( 'social icons colors ', 'goarch' );
			}
			if ( $v == '646464' ) {
				$label = esc_html__( 'header vertical line ', 'goarch' );
			}
			if ( $v == '2B2B2B' ) {
				$label = esc_html__( 'vertical header panel', 'goarch' );
			}

			if ( $v == '323232' ) {
				$label = esc_html__( 'button hover focus, fields, blog post background description  ', 'goarch' );
			}

		} else {
			if ( $v == '747474' ) {
				$label = esc_html__( 'body   light version', 'goarch' );
			}

			if ( $v == 'C5A47E' ) {
				$label = esc_html__( 'scrollbar, links ', 'goarch' );
			}

			if ( $v == 'FF7D7D' ) {
				$label = esc_html__( 'code tag', 'goarch' );
			}
			if ( $v == '666666' ) {
				$label = esc_html__( 'fields  text', 'goarch' );
			}
			if ( $v == 'F3F3F3' ) {
				$label = esc_html__( 'fields  background', 'goarch' );
			}
			if ( $v == '323232' ) {
				$label = esc_html__( 'fields background on hover focus', 'goarch' );
			}
			if ( $v == 'F6F5F3' ) {
				$label = esc_html__( 'background brand panel', 'goarch' );
			}
			if ( $v == '5E5E5E' ) {
				$label = esc_html__( 'background brand panel', 'goarch' );
			}
			if ( $v == '212121' ) {
				$label = esc_html__( 'project details item  even', 'goarch' );
			}
			if ( $v == 'B4B4B4' ) {
				$label = esc_html__( 'blog meta ', 'goarch' );
			}
			if ( $v == 'B8B8B8' ) {
				$label = esc_html__( 'widget archive li', 'goarch' );
			}
			if ( $v == 'D0D0D0' ) {
				$label = esc_html__( 'author link', 'goarch' );
			}
			if ( $v == '171717' ) {
				$label = esc_html__( 'header mask', 'goarch' );
			}


			/*
						if ( $v == 'E5BF93' ) {
							$label = esc_html__( 'object label', 'goarch' );
						}
						if ( $v == 'D0D0D0' ) {
							$label = esc_html__( 'author link', 'goarch' );
						}

						if ( $v == 'B4B4B4' ) {
							$label = esc_html__( 'blog meta', 'goarch' );
						}
						if ( $v == '6F6F6F' ) {
							$label = esc_html__( 'blog tags', 'goarch' );
						}

						if ( $v == 'EDEDED' ) {
							$label = esc_html__( 'project details title border top ', 'goarch' );
						}
						if ( $v == 'C5C4C2' ) {
							$label = esc_html__( 'social icons colors , header vertical line', 'goarch' );
						}

						if ( $v == 'F6F5F3' ) {
							$label = esc_html__( 'vertical header panel', 'goarch' );
						}*/


		}


		$wp_customize->add_setting( $tmp_settingname, array(
			'default' => "#" . esc_html( $v ),
			'sanitize_callback' => 'goarch_sanitize_temp'
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $tmp_settingname,
			array(
				'label' => esc_html__( 'Color ', 'goarch' ) . esc_html( $label ) . '',
				'section' => $tmp_sectionname,
				'settings' => $tmp_settingname,
			) ) );
	}


	/*******************************************************************
	 * Performans
	 *******************************************************************/

	$tmp_sectionname = "goarch_performans";
	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title' => esc_html__( 'Performance', 'goarch' ),
		'priority' => 31,
		'description' => esc_html__( '', 'goarch' )
	) );

	$tmp_settingname = $tmp_sectionname . '_style';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => 'dark',
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Select a color scheme', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'select',
		'choices' => array(
			'dark' => esc_html__( 'dark', 'goarch' ),
			'light' => esc_html__( 'light', 'goarch' ),
		)
	) );

	$tmp_settingname = $tmp_sectionname . '_home_text';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' =>  esc_html__('Architecture buro', 'goarch') ,
		'sanitize_callback' => 'esc_attr'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Insert vertical panel title in home page ', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'text',

	) );
	$tmp_tabel = 'vertical';
	$tmp_settingname = $tmp_sectionname . '_' . $tmp_tabel;
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => 's2',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'vertical panel title visibility in other pages', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'radio',
		'choices' => array(
			's1' => esc_html__( 'show', 'goarch' ),
			's2' => esc_html__( 'hide', 'goarch' ),

		)
	) );


	$tmp_settingname = $tmp_sectionname . '_preloader';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => true,
		'sanitize_callback' => 'wp_validate_boolean'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' =>  esc_html__( 'Enable preloader ?', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'checkbox',
	) );





	/*******************************************************************
	 * contact form shortcode
	 *******************************************************************/

	$tmp_sectionname = "goarch_c_form_s";


	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title' => esc_html__( 'Contact form shortcode', 'goarch' ),
		'priority' => 31,
		'description' => esc_html__( '', 'goarch' )
	) );


	$tmp_settingname = $tmp_sectionname . '_val';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => '[goarch_contact_section]',
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Contact form shortcode', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'textarea',
	) );


	$tmp_settingname = $tmp_sectionname . '_susses_title';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => esc_html__( 'Thank you!. Your message is successfully sent...', 'goarch' ),
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Susses title', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'textarea',
	) );


	$tmp_settingname = $tmp_sectionname . '_error_title';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => esc_html__( 'We\'re sorry, but something went wrong', 'goarch' ),
		'sanitize_callback' => 'wp_kses_post'
	) );
	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Error title', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'textarea',
	) );

	/*
	 *
	 */


	/*
	 *
	 */
	$tmp_settingname = $tmp_sectionname . '_error_title';
	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => esc_html__( 'We\'re sorry, but something went wrong', 'goarch' ),
		'sanitize_callback' => 'wp_kses_post'
	) );


	/*********************************************************
	 * Footer
	 **************************************************************/
	$tmp_sectionname = "footer";


	$wp_customize->add_section( $tmp_sectionname . '_section', array(
		'title' => esc_html__( 'Footer', 'goarch' ),
		'priority' => 31,
		'description' => esc_html__( '', 'goarch' )
	) );

	$tmp_settingname = $tmp_sectionname . '_copyright';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Footer copyright', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'textarea',
	) );

	$tmp_settingname = $tmp_sectionname . '_author_link';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default' => '<a class="author-link"  href="http://themeforest.net/user/murren20" target="_blank">' . esc_html__( 'Murren20', 'goarch' ) . '</a>',
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( $tmp_settingname . '_control', array(
		'label' => esc_html__( 'Author link', 'goarch' ),
		'section' => $tmp_sectionname . "_section",
		'settings' => $tmp_settingname,
		'type' => 'textarea',
	) );

	/**
	 * footer img
	 */
	$tmp_settingname = $tmp_sectionname . '_img';

	$wp_customize->add_setting( $tmp_settingname, array(
		'default' =>
			'',
		'sanitize_callback' => 'wp_kses_post'
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
		$tmp_settingname, array(
			'label' => esc_html__( 'Footer img', 'goarch' ),
			'section' => $tmp_sectionname . "_section",
			'settings' => $tmp_settingname,
		) ) );


}

function goarch_sanitize_to_int( $value ) {
	return (int) $value;
}


function goarch_sanitize_temp( $value ) {
	return $value;
}


/**
 *Plug in  script to customize
 */

add_action( 'customize_register', 'goarch_true_customizer_init' );


function goarch_color_hack( $css ) {
	$css = str_ireplace( "322F44", "33244A", $css );
	$css = str_ireplace( "47A5F5", "009ECC", $css );
	$css = str_ireplace( "45C3E8", "009ECC", $css );
	$css = str_ireplace( "7CCB18", "AAC600", $css );
	$css = str_ireplace( "62B50A", "AAC600", $css );
	$css = str_ireplace( "006EC6", "0081DB", $css );
	$css = str_ireplace( array(
		"7CCB18",
		"1B2027",
		"191A22",
		"1F1C2D",
		"191A22"
	), array(
		"97C900",
		"030102",
		"011222",
		"011222"
	), $css );
	//green
	$css = str_ireplace( "AAC600", "97C900", $css );
	//orange
	$css = str_ireplace( array(
		"FF9C00",
		"FFAC00",
		"FF5700",
		"FFCB00"
	), "FF9100", $css );
	//dark red
	$css = str_ireplace( array(
		"D82E26",
		"CC130A",
		"A1201A"
	), "D82E26", $css );
	//light red
	$css = str_ireplace( array(
		"E51616",
		"F54100",
		"E73931"
	), "FF9100", $css );

	return $css;


}

function goarch_Hex2RGB( $color ) {
	$color = str_replace( '#', '', $color );
	if ( strlen( $color ) != 6 ) {
		return array(
			0,
			0,
			0
		);
	}
	$goarch_rgb = array();
	for ( $x = 0; $x < 3; $x ++ ) {
		$goarch_rgb[$x] = hexdec( substr( $color, ( 2 * $x ), 2 ) );
	}

	return $goarch_rgb;
}
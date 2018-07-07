<?php
/**
 * Theme Mode
 */
/**
 * Show Settings Pages
 */
add_filter('ot_show_pages', '__return_false');

/**
 * Show New Layout
 */
add_filter('ot_show_new_layout', '__return_false');

/*******************************************************/

/**
 * Initialize the custom Theme Options.
 */
add_action( 'init', 'goarch_custom_theme_options' );
/**
 * Build the custom settings & update OptionTree.
 *
 * @return    void
 * @since     2.3.0
 */
function goarch_custom_theme_options() {
	/* OptionTree is not loaded yet, or this is not an admin request */
	if ( !function_exists( 'ot_settings_id' ) || !is_admin() ) {
		return false;
	}
	/**
	 * Get a copy of the saved settings array.
	 */
	$saved_settings = get_option( ot_settings_id(), array() );
	$custom_settings = array(
		'contextual_help' => array(
			'sidebar' => ''
		),
		'sections' => array(
			array(
				'id' => 'general',
				'title' => esc_html__( 'General Config', 'goarch' )
			),
			array(
				'id' => 'css',
				'title' => esc_html__( 'Custom CSS & JS', 'goarch' )
			),

			array(
				'id' => 'mask',
				'title' => esc_html__( 'Image mask', 'goarch' )
			),
			array(
				'id' => 'google_fonts',
				'title' => esc_html__( 'Google Fonts', 'goarch' )
			),
			array(
				'id' => 'typography',
				'title' => esc_html__( 'Typography', 'goarch' )
			),
			array(
				'id' => 'navigation',
				'title' => esc_html__( 'Navigation', 'goarch' )
			),

			array(
				'id' => 'sidebars_settings',
				'title' => esc_html__( 'Theme Sidebars Color Options', 'goarch' )
			),


			array(
				'id' => 'frontheader_color',
				'title' => esc_html__( 'Frontage Color Options', 'goarch' )
			),

			array(
				'id' => 'header',
				'title' => esc_html__( 'blog/Page Header Options', 'goarch' )
			),
			array(
				'id' => 'header_color',
				'title' => esc_html__( 'blog/Page Header Color Options', 'goarch' )
			),

			array(
				'id' => 'single_header',
				'title' => esc_html__( 'Single Page Header Options', 'goarch' )
			),
			array(
				'id' => 'archive_page',
				'title' => esc_html__( 'Archive Page Header Options', 'goarch' )
			),
			array(
				'id' => 'error_page',
				'title' => esc_html__( '404 Page Header Options', 'goarch' )
			),
			array(
				'id' => 'search_page',
				'title' => esc_html__( 'Search Page Header Options', 'goarch' )
			),



		),
		'settings' => array(


			array(
				'id' => 'additionalcss',
				'label' => esc_html__( 'additional css', 'goarch' ),
				'desc' => esc_html__( 'You can add additional css ', 'goarch' ),
				'std' => '',
				'type' => 'css',
				'section' => 'css',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => ''
			),

			array(
				'id' => 'additionaljs',
				'label' => esc_html__( 'additional javascript', 'goarch' ),
				'desc' => esc_html__( 'You can add additional javascript ', 'goarch' ),
				'std' => '',
				'type' => 'css',
				'section' => 'css',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => ''
			),

			array(
				'id' => 'goarch_mask',
				'label' => esc_html__( 'Background Black mask', 'goarch' ),
				'desc' => sprintf( esc_html__( 'Background Image Black mask %s or %s.', 'goarch' ), '<code>on</code>', '<code>off</code>' ),
				'std' => 'on',
				'type' => 'on-off',
				'section' => 'mask',
				'operator' => 'and'
			),

			array(
				'id' => 'goarch_m_c',
				'label' => esc_html__( 'Mask color', 'goarch' ),
				'desc' => esc_html__( 'Please select color with opacity', 'goarch' ),
				'type' => 'colorpicker-opacity',
				'std' => '',
				'section' => 'mask'
			),
			array(
				'id' => 'goarch_m_contact',
				'label' => esc_html__( 'Mask color in contacts section', 'goarch' ),
				'desc' => esc_html__( 'Please select color with opacity', 'goarch' ),
				'type' => 'colorpicker-opacity',
				'std' => '',
				'section' => 'mask'
			),

			/**
			 * FRONTPAGE COLOR SETTINGS.
			 */

			array(
				'id' => 'goarch_frontpage_header_slogan_color',
				'label' => esc_html__( 'Frontpage paragraph  color', 'goarch' ),
				'desc' => esc_html__( 'Please select color', 'goarch' ),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'frontheader_color'
			),
			array(
				'id' => 'goarch_frontpage_header_buttonbg_color',
				'label' => esc_html__( 'Frontpage button background color', 'goarch' ),
				'desc' => esc_html__( 'Please select color', 'goarch' ),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'frontheader_color'
			),
			array(
				'id' => 'goarch_frontpage_header_buttonbg_hover_color',
				'label' => esc_html__( 'Frontpage button background hover color', 'goarch' ),
				'desc' => esc_html__( 'Please select color', 'goarch' ),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'frontheader_color'
			),


			/*** GENERAL SETTINGS. **/


			array(
				'id' => 'goarch_logowidth',
				'label' => esc_html__( 'Logo  header width', 'goarch' ),
				'desc' => esc_html__( 'Logo width', 'goarch' ),
				'std' => '39',
				'type' => 'numeric-slider',
				'min_max_step' => '0,100',
				'section' => 'general',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'goarch_logoheight',
				'label' => esc_html__( 'Logo header height', 'goarch' ),
				'desc' => esc_html__( 'Logo header height', 'goarch' ),
				'std' => '40',
				'type' => 'numeric-slider',
				'min_max_step' => '0,100',
				'section' => 'general',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),

			/**
			 * GOOGLE FONTS SETTINGS.
			 */
			array(
				'id' => 'body_google_fonts',
				'label' => esc_html__( 'Google Fonts', 'goarch' ),
				'desc' => 'Add Google Font and after the save settings follow these steps Dashbogoarch > Appearance > Theme Options > Typography',
				'std' => '',
				'type' => 'google-fonts',
				'section' => 'google_fonts',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			/**
			 * TYPOGRAPHY SETTINGS.
			 */
			array(
				'id' => 'goarch_tipigrof',
				'label' => esc_html__( 'Typography', 'goarch' ),
				'desc' => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'goarch' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'goarch_tipigrof1',
				'label' => esc_html__( 'Typography h1', 'goarch' ),
				'desc' => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'goarch' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'goarch_tipigrof2',
				'label' => esc_html__( 'Typography h2', 'goarch' ),
				'desc' => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'goarch' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'goarch_tipigrof3',
				'label' => esc_html__( 'Typography h3', 'goarch' ),
				'desc' => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'goarch' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'goarch_tipigrof4',
				'label' => esc_html__( 'Typography h4', 'goarch' ),
				'desc' => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'goarch' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'goarch_tipigrof5',
				'label' => esc_html__( 'Typography h5', 'goarch' ),
				'desc' => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'goarch' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'goarch_tipigrof6',
				'label' => esc_html__( 'Typography h6', 'goarch' ),
				'desc' => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'goarch' ),
				'std' => '',
				'type' => 'typography',
				'section' => 'typography',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			/**
			 * NAVIGATION SETTINGS.
			 */


			array(
				'id' => 'goarch_navigationbg',
				'label' => esc_html__( 'Theme navigation background color ', 'goarch' ),
				'desc' => esc_html__( 'Please select color with opacity', 'goarch' ),
				'type' => 'colorpicker-opacity',
				'std' => '',
				'section' => 'navigation'
			),
			array(
				'id' => 'goarch_navitem',
				'label' => esc_html__( 'Theme navigation menu item color', 'goarch' ),
				'desc' => esc_html__( 'Please select color', 'goarch' ),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'navigation'
			),
			array(
				'id' => 'goarch_navitem_affix',
				'label' => esc_html__( 'Theme navigation menu item color affix', 'goarch' ),
				'desc' => esc_html__( 'Please select color', 'goarch' ),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'navigation'
			),
			array(
				'id' => 'goarch_navitemhover',
				'label' => esc_html__( 'Theme navigation menu item hover color', 'goarch' ),
				'desc' => esc_html__( 'Please select color', 'goarch' ),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'navigation'
			),


			array(
				'id' => 'goarch_sidebarwidgetgeneralcolor',
				'label' => esc_html__( 'Theme Sidebar widget general color', 'goarch' ),
				'desc' => esc_html__( 'Please select color', 'goarch' ),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'sidebars_settings'
			),
			array(
				'id' => 'goarch_sidebarwidgettitlecolor',
				'label' => esc_html__( 'Theme Sidebar widget title color', 'goarch' ),
				'desc' => esc_html__( 'Please select color', 'goarch' ),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'sidebars_settings'
			),
			array(
				'id' => 'goarch_sidebarlinkcolor',
				'label' => esc_html__( 'Theme Sidebar link title color', 'goarch' ),
				'desc' => esc_html__( 'Please select color', 'goarch' ),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'sidebars_settings'
			),
			array(
				'id' => 'goarch_sidebarlinkhovercolor',
				'label' => esc_html__( 'Theme Sidebar link title hover color', 'goarch' ),
				'desc' => esc_html__( 'Please select color', 'goarch' ),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'sidebars_settings'
			),
			array(
				'id' => 'goarch_sidebarsearchsubmittextcolor',
				'label' => esc_html__( 'Theme Sidebar search submit text color', 'goarch' ),
				'desc' => esc_html__( 'Please select color', 'goarch' ),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'sidebars_settings'
			),
			array(
				'id' => 'goarch_sidebarsearchsubmitbgcolor',
				'label' => esc_html__( 'Theme Sidebar search submit color', 'goarch' ),
				'desc' => esc_html__( 'Please select color', 'goarch' ),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'sidebars_settings'
			),

			/**
			 * blog/PAGE HEADER SETTINGS.
			 */
			array(
				'id' => 'goarch_mask_c_page_header',
				'label' => esc_html__( 'Pages header background image visibility', 'goarch' ),
				'desc' => sprintf( esc_html__( 'Heading visibility %s or %s.', 'goarch' ), '<code>on</code>', '<code>off</code>' ),
				'std' => 'on',
				'type' => 'on-off',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),

			array(
				'id' => 'goarch_blogheaderbgcolor',
				'label' => esc_html__( 'blog Pages Header Section background color ', 'goarch' ),
				'desc' => esc_html__( 'Please select color', 'goarch' ),
				'type' => 'colorpicker-opacity',
				'std' => '',
				'section' => 'header'
			),
			array(
				'id' => 'goarch_blogheaderbgcolor_mask',
				'label' => esc_html__( 'blog Pages Header Section background mask color ', 'goarch' ),
				'desc' => esc_html__( 'Please select color', 'goarch' ),
				'type' => 'colorpicker-opacity',
				'std' => '',
				'section' => 'header'
			),


			array(
				'id' => 'goarch_blogheaderpaddingtop',
				'label' => esc_html__( 'Header padding top', 'goarch' ),
				'desc' => esc_html__( 'You can use this option for heading text vertical align', 'goarch' ),
				'std' => '33',
				'type' => 'numeric-slider',
				'min_max_step' => '0,100',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'goarch_blogheaderpaddingbottom',
				'label' => esc_html__( 'Header padding bottom', 'goarch' ),
				'desc' => esc_html__( 'You can use this option for heading text vertical align', 'goarch' ),
				'std' => '17',
				'type' => 'numeric-slider',
				'min_max_step' => '0,100',
				'section' => 'header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),

			/**
			 * SINGLE HEADER SETTINGS.
			 */


			array(
				'id' => 'goarch_singleheaderpaddingtop',
				'label' => esc_html__( 'Header padding top', 'goarch' ),
				'desc' => esc_html__( 'You can use this option for heading text vertical align', 'goarch' ),
				'std' => '33',
				'type' => 'numeric-slider',
				'min_max_step' => '0,100',
				'section' => 'single_header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'goarch_singleheaderpaddingbottom',
				'label' => esc_html__( 'Header padding bottom', 'goarch' ),
				'desc' => esc_html__( 'You can use this option for heading text vertical align', 'goarch' ),
				'std' => '17',
				'type' => 'numeric-slider',
				'min_max_step' => '0,100',
				'section' => 'single_header',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'goarch_singleheadingcolor',
				'label' => esc_html__( 'Single Pages Heading color ', 'goarch' ),
				'desc' => esc_html__( 'Please select color', 'goarch' ),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'single_header'
			),
			array(
				'id' => 'goarch_singleheaderparagraphcolor',
				'label' => esc_html__( 'Single Pages title post color ', 'goarch' ),
				'desc' => esc_html__( 'Please select color', 'goarch' ),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'single_header'
			),


			/**
			 * ARCHIVE HEADER SETTINGS.
			 */


			array(
				'id' => 'goarch_archiveheaderpaddingtop',
				'label' => esc_html__( 'Header padding top', 'goarch' ),
				'desc' => esc_html__( 'You can use this option for heading text vertical align', 'goarch' ),
				'std' => '33',
				'type' => 'numeric-slider',
				'min_max_step' => '0,100',
				'section' => 'archive_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'goarch_archiveheaderpaddingbottom',
				'label' => esc_html__( 'Header padding bottom', 'goarch' ),
				'desc' => esc_html__( 'You can use this option for heading text vertical align', 'goarch' ),
				'std' => '17',
				'type' => 'numeric-slider',
				'min_max_step' => '0,500',
				'section' => 'archive_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),


			array(
				'id' => 'goarch_archiveheadingcolor',
				'label' => esc_html__( 'Archive Pages Heading color ', 'goarch' ),
				'desc' => esc_html__( 'Please select color', 'goarch' ),
				'type' => 'typography',
				'std' => '',
				'section' => 'archive_page'
			),


			/**
			 * 404 PAGE HEADER SETTINGS.
			 */
			array(
				'id' => 'goarch_errorpageheadbg',
				'label' => esc_html__( '404 Header Section background image', 'goarch' ),
				'desc' => esc_html__( 'You can upload your image for parallax header', 'goarch' ),
				'std' => '',
				'type' => 'upload',
				'section' => 'error_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),

			array(
				'id' => 'goarch_errorheaderbgcolor',
				'label' => esc_html__( '404 Pages Header Section background color ', 'goarch' ),
				'desc' => esc_html__( 'Please select color', 'goarch' ),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'error_page'
			),


			array(
				'id' => 'goarch_errorheaderpaddingtop',
				'label' => esc_html__( 'Header padding top', 'goarch' ),
				'desc' => esc_html__( 'You can use this option for heading text vertical align', 'goarch' ),
				'std' => '33',
				'type' => 'numeric-slider',
				'min_max_step' => '0,100',
				'section' => 'error_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'goarch_errorheaderpaddingbottom',
				'label' => esc_html__( 'Header padding bottom', 'goarch' ),
				'desc' => esc_html__( 'You can use this option for heading text vertical align', 'goarch' ),
				'std' => '17',
				'type' => 'numeric-slider',
				'min_max_step' => '0,100',
				'section' => 'error_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'goarch_error_heading',
				'label' => esc_html__( '404 Page Heading', 'goarch' ),
				'desc' => esc_html__( 'Enter Error Heading', 'goarch' ),
				'std' => '404 Page',
				'type' => 'text',
				'section' => 'error_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => ''
			),
		
			array(
				'id' => 'goarch_errorheadingcolor',
				'label' => esc_html__( '404 Pages Heading color ', 'goarch' ),
				'desc' => esc_html__( 'Please select color', 'goarch' ),
				'type' => 'typography',
				'std' => '',
				'section' => 'error_page'
			),


			array(
				'id' => 'goarch_error_slogan_visibility',
				'label' => esc_html__( '404 Page slogan visibility', 'goarch' ),
				'desc' => sprintf( esc_html__( '404 Page slogan visibility %s or %s.', 'goarch' ), '<code>on</code>', '<code>off</code>' ),
				'std' => 'on',
				'type' => 'on-off',
				'section' => 'error_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'min_max_step' => '',
				'class' => '',
				'condition' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'goarch_error_slogan',
				'label' => esc_html__( '404 Page Slogan', 'goarch' ),
				'desc' => esc_html__( 'Enter 404 Page Slogan', 'goarch' ),
				'std' => 'Oops! That page can’t be found.',
				'type' => 'text',
				'section' => 'error_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => ''
			),
			array(
				'id' => 'goarch_errorheaderparagraphcolor',
				'label' => esc_html__( '404 Pages paragraph/slogan color ', 'goarch' ),
				'desc' => esc_html__( 'Please select color', 'goarch' ),
				'type' => 'typography',
				'std' => '',
				'section' => 'error_page'
			),


			/**
			 * SEARCH PAGE HEADER SETTINGS.
			 */
			array(
				'id' => 'goarch_searchpageheadbg',
				'label' => esc_html__( 'Search Header Section background image', 'goarch' ),
				'desc' => esc_html__( 'You can upload your image for parallax header', 'goarch' ),
				'std' => '',
				'type' => 'upload',
				'section' => 'search_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),

			array(
				'id' => 'goarch_searchheaderbgcolor',
				'label' => esc_html__( 'Search Pages Heading color ', 'goarch' ),
				'desc' => esc_html__( 'Please select color', 'goarch' ),
				'type' => 'typography',
				'std' => '',
				'section' => 'search_page'
			),

			array(
				'id' => 'goarch_searchheaderpaddingtop',
				'label' => esc_html__( 'Header padding top', 'goarch' ),
				'desc' => esc_html__( 'You can use this option for heading text vertical align', 'goarch' ),
				'std' => '33',
				'type' => 'numeric-slider',
				'min_max_step' => '0,100',
				'section' => 'search_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),
			array(
				'id' => 'goarch_searchheaderpaddingbottom',
				'label' => esc_html__( 'Header padding bottom', 'goarch' ),
				'desc' => esc_html__( 'You can use this option for heading text vertical align', 'goarch' ),
				'std' => '17',
				'type' => 'numeric-slider',
				'min_max_step' => '0,100',
				'section' => 'search_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),


			array(
				'id' => 'goarch_search_heading_fontsize',
				'label' => esc_html__( 'Search Page Heading font size', 'goarch' ),
				'desc' => esc_html__( 'Enter Search Page Heading font size', 'goarch' ),
				'std' => '',
				'type' => 'numeric-slider',
				'min_max_step' => '0,100',
				'section' => 'search_page',
				'rows' => '',
				'post_type' => '',
				'taxonomy' => '',
				'class' => '',
				'operator' => 'and'
			),


			/**
			 * blog/PAGE HEADING COLOR SETTINGS.
			 */
			array(
				'id' => 'goarch_blogheadingcolor',
				'label' => esc_html__( 'blog Pages Heading color ', 'goarch' ),
				'desc' => esc_html__( 'Please select color', 'goarch' ),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'header_color'
			),
			array(
				'id' => 'goarch_blogsubtitlecolor',
				'label' => esc_html__( 'blog Pages  post / page title color ', 'goarch' ),
				'desc' => esc_html__( 'Please select color', 'goarch' ),
				'type' => 'colorpicker',
				'std' => '',
				'section' => 'header_color'
			),
		





		)
	);
	/* allow settings to be filtered before saving */
	$custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );
	/* settings are not the same update the DB */
	if ( $saved_settings !== $custom_settings ) {
		update_option( ot_settings_id(), $custom_settings );
	}
	/* Lets OptionTree know the UI Builder is being overridden */
	global $ot_has_custom_theme_options;
	$ot_has_custom_theme_options = true;
}
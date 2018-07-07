<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package goarch
 */
/* HEADER ------------------------------------------- */
function goarch_custom_styling() { ?>
	<?php if ( function_exists( 'ot_get_option' ) ) : ?>

		<style>
			<?php if ( ot_get_option( 'goarch_logowidth' ) !='' &&  ot_get_option( 'goarch_logowidth' ) != '39'): ?>
			.brand-panel {
				width: <?php echo esc_attr( ot_get_option( 'goarch_logowidth' ) ); ?>vmin;
			}

			<?php endif; ?>
			<?php if ( ot_get_option( 'goarch_logoheight' ) !='' && ot_get_option( 'goarch_logoheight' ) != '40' ): ?>
			.brand-panel {
				height: <?php echo esc_attr( ot_get_option( 'goarch_logoheight' ) ); ?>vmin;
			}

			<?php endif; ?>

			<?php if( is_customize_preview('administrator')): ?>
			.logged-in .navbar.affix, .logged-in .navbar {
				top: 0px;
			}

			<?php endif; ?>

			<?php if ( ot_get_option( 'goarch_navigationbg' ) !='' ): ?>
			.navbar-desctop.affix {
				background-color: <?php echo esc_attr( ot_get_option( 'goarch_navigationbg' ) ); ?>;
			}

			<?php endif; ?>
			<?php if ( ot_get_option( 'goarch_navitem' ) !='' ): ?>
			.navbar-desctop-menu > li > a {
				color: <?php echo esc_attr( ot_get_option( 'goarch_navitem' ) ); ?>;
			}

			<?php endif; ?>
			<?php if ( ot_get_option( 'goarch_navitem_affix' ) !='' ): ?>
			.navbar-desctop.affix .navbar-desctop-menu li a {
				color: <?php echo esc_attr( ot_get_option( 'goarch_navitem' ) ); ?>;
			}

			<?php endif; ?>
			<?php if ( ot_get_option( 'goarch_navitemhover' ) !='' ): ?>
			.navbar-nav > li > a:hover, .navbar-nav > li > a:focus, .navbar-nav > .active > a {
				color: <?php echo esc_attr( ot_get_option( 'goarch_navitem_affix' ) ); ?>;
			}

			<?php endif; ?>
			<?php if ( ot_get_option( 'goarch_navigationbg' ) !='' ): ?>

			.navbar-desctop.affix .navbar-desctop-menu li > a:hover,
			.navbar-desctop.affix .navbar-desctop-menu .active > a {
				color: <?php echo esc_attr( ot_get_option( 'goarch_navigationbg' ) ); ?>;
			}

			<?php endif; ?>
			<?php if ( ot_get_option( 'goarch_sidebarwidgettitlecolor' ) !='' ): ?>
			.widget-title {

				color: <?php echo esc_attr( ot_get_option( 'goarch_sidebarwidgettitlecolor' ) ); ?>;
			}

			<?php endif; ?>
			<?php if ( ot_get_option( 'goarch_sidebarwidgetgeneralcolor' ) !='' ): ?>
			.widget ul, .widget li {
				color: <?php echo esc_attr( ot_get_option( 'goarch_sidebarwidgetgeneralcolor' ) ); ?>;
			}

			<?php endif; ?>
			<?php if ( ot_get_option( 'goarch_sidebarlinkcolor' ) !='' ): ?>
			.widget ul li a {
				color: <?php echo esc_attr( ot_get_option( 'goarch_sidebarlinkcolor' ) ); ?>;
			}

			<?php endif; ?>
			<?php if ( ot_get_option( 'goarch_sidebarlinkhovercolor' ) !='' ): ?>
			.widget ul li a:hover {
				color: <?php echo esc_attr( ot_get_option( 'goarch_sidebarlinkhovercolor' ) ); ?>;
			}

			<?php endif; ?>
			<?php if ( ot_get_option( 'goarch_sidebarsearchsubmittextcolor' ) !='' ): ?>
			input[type="text"], input[type="password"], input[type="search"], input[type="email"], input[type="phone"], input[type="tel"], textarea, select {
				color: <?php echo esc_attr( ot_get_option( 'goarch_sidebarsearchsubmittextcolor' ) ); ?>;
			}

			<?php endif; ?>
			<?php if ( ot_get_option( 'goarch_sidebarsearchsubmitbgcolor' ) !='' ): ?>
			.search-form button {
				color: <?php echo esc_attr( ot_get_option( 'goarch_sidebarsearchsubmitbgcolor' ) ); ?>;
			}

			<?php endif; ?>
			<?php if ( ot_get_option( 'goarch_blogheaderpaddingtop' ) !=''
			&& ot_get_option( 'goarch_blogheaderpaddingtop' ) !='33'
			 ): ?>

			.page .main-inner, .single .main-inner {

				padding-top: <?php echo esc_attr( ot_get_option( 'goarch_blogheaderpaddingtop' ) ); ?>vmin !important;
				padding-bottom: <?php echo esc_attr( ot_get_option( 'goarch_blogheaderpaddingbottom' ) ); ?>vmin !important;
			}

			<?php endif; ?>
			<?php if ( ot_get_option( 'goarch_blogheadingcolor' ) !='' ): ?>
			.page .bg-blog h1, .single .bg-blog h1 {
				color: <?php echo esc_attr( ot_get_option( 'goarch_blogheadingcolor' ) ); ?>;
			}

			<?php endif; ?>
			<?php if ( ot_get_option( 'goarch_blogsubtitlecolor' ) !='' ): ?>
			.page .post .post-header h3, .single .post .post-header h3 {
				color: <?php echo esc_attr( ot_get_option( 'goarch_blogsubtitlecolor' ) ); ?>;
			}

			<?php endif; ?>
			<?php if ( ot_get_option( 'goarch_m_c' ) !='' ): ?>
			.project figure:after {
				background-color: <?php echo esc_attr( ot_get_option( 'goarch_m_c' ) ); ?>;
			}
			<?php endif; ?>
			<?php if ( ot_get_option( 'goarch_m_contact' ) !='' ): ?>
			.contact-info .contact-info-content    {
				background-color: <?php echo esc_attr( ot_get_option( 'goarch_m_contact' ) ); ?>;
			}
			<?php endif; ?>
			<?php if ( ot_get_option('goarch_mask') == 'off') : ?>
			.project figure:after {
				background-color: transparent;
			}

			<?php endif; ?>

			<?php

			 if ( ot_get_option('goarch_mask_c_page_header') == 'off') : ?>
			.bg-blog {
				background: none !important;
			}

			<?php endif; ?>

			<?php if ( ot_get_option( 'goarch_frontpage_header_slogan_color' ) !='' ): ?>
			.home p {
				color: <?php echo esc_attr( ot_get_option( 'goarch_frontpage_header_slogan_color' ) ); ?>;
			}

			<?php endif; ?>
			<?php if ( ot_get_option( 'goarch_frontpage_header_buttonbg_color' ) !='' ): ?>
			.home .btn, .home [type="submit"] {
				background-color: <?php echo esc_attr( ot_get_option( 'goarch_frontpage_header_buttonbg_color' ) ); ?>;
			}

			<?php endif; ?>
			<?php if ( ot_get_option( 'goarch_frontpage_header_buttonbg_hover_color' ) !='' ): ?>
			.home .btn:hover, .home .btn:focus, .home [type="submit"]:hover, .home [type="submit"]:focus {
				background-color: <?php echo esc_attr( ot_get_option( 'goarch_frontpage_header_buttonbg_hover_color' ) ); ?>;
			}

			<?php endif; ?>

			<?php if ( ot_get_option( 'goarch_singleheadingcolor' ) !='' ): ?>
			.single .main-header h1 {
				color: <?php echo esc_attr( ot_get_option( 'goarch_singleheadingcolor' ) ); ?>;
			}

			<?php endif; ?>
			<?php if ( ot_get_option( 'goarch_singleheaderparagraphcolor' ) !='' ): ?>
			.single .post-header h3 {
				color: <?php echo esc_attr( ot_get_option( 'goarch_singleheaderparagraphcolor' ) ); ?> !important;
			}

			<?php endif; ?>

			<?php if ((    ot_get_option( 'goarch_singleheaderpaddingtop' ) !=''
			  and ot_get_option( 'goarch_singleheaderpaddingtop' ) !='33')
			||( ot_get_option( 'goarch_singleheaderpaddingbottom' ) !=''
			&&  ot_get_option( 'goarch_singleheaderpaddingbottom' ) !='17' )):
			 ?>

			.single .main-inner {
				padding-top: <?php echo esc_attr( ot_get_option( 'goarch_singleheaderpaddingtop' ) ); ?>vmin !important;
				padding-bottom: <?php echo esc_attr( ot_get_option( 'goarch_singleheaderpaddingbottom' ) ); ?>vmin !important;
			}

			<?php endif; ?>

			<?php

	 $goarch_archiveheadingcolor = ot_get_option( 'goarch_archiveheadingcolor', array() ); ?>
			<?php if($goarch_archiveheadingcolor) { ?>
			.archive .main-header h1 {
				color: <?php echo esc_attr( $goarch_archiveheadingcolor['font-color'] ) ; ?>;
				font-family: <?php echo esc_attr( $goarch_archiveheadingcolor['font-family'] ) ; ?> !important;
				font-size: <?php echo esc_attr( $goarch_archiveheadingcolor['font-size'] ) ; ?>;
				font-style: <?php echo esc_attr( $goarch_archiveheadingcolor['font-style'] ) ; ?>;
				font-variant: <?php echo esc_attr( $goarch_archiveheadingcolor['font-variant'] ) ; ?>;
				font-weight: <?php echo esc_attr( $goarch_archiveheadingcolor['font-weight'] ) ; ?>;
				letter-spacing: <?php echo esc_attr( $goarch_archiveheadingcolor['letter-spacing'] ) ; ?>;
				line-height: <?php echo esc_attr( $goarch_archiveheadingcolor['line-height'] ) ; ?>;
				text-decoration: <?php echo esc_attr( $goarch_archiveheadingcolor['text-decoration'] ) ; ?>;
				text-transform: <?php echo esc_attr( $goarch_archiveheadingcolor['text-transform'] ) ; ?>;
			}

			<?php } ?>

			<?php if ((
			 ot_get_option( 'goarch_archiveheaderpaddingtop' ) !=''  &&   ot_get_option( 'goarch_archiveheaderpaddingtop' ) !='33'

			 )

			 ||( ot_get_option( 'goarch_archiveheaderpaddingbottom' ) !='' &&
			  ot_get_option( 'goarch_archiveheaderpaddingbottom' ) !='17' )): ?>

			.archive .main-inner {
				padding-top: <?php echo esc_attr( ot_get_option( 'goarch_archiveheaderpaddingtop' ) ); ?>vmin !important;
				padding-bottom: <?php echo esc_attr( ot_get_option( 'goarch_archiveheaderpaddingbottom' ) ); ?>vmin !important;
			}

			<?php endif; ?>
			<?php if ( ot_get_option( 'goarch_errorpageheadbg' ) !='' ): ?>
			.error404 .bg-blog {
				background: url( <?php echo esc_attr( ot_get_option( 'goarch_errorpageheadbg' ) ); ?>) no-repeat fixed center top / cover !important;
			}

			<?php endif; ?>
			<?php if ( ot_get_option( 'goarch_errorheaderbgcolor' ) !='' ): ?>
			.error404 .masthead-inner {
				background-color: <?php echo esc_attr( ot_get_option( 'goarch_errorheaderbgcolor' ) ); ?>;
			}

			<?php endif; ?>
			<?php
	  /*
	 * Typography
	 */
	 $goarch_errorheadingcolor = ot_get_option( 'goarch_errorheadingcolor', array() ); ?>
			<?php if($goarch_errorheadingcolor) { ?>
			.error404 .main-header h1 {
				color: <?php echo esc_attr( $goarch_errorheadingcolor['font-color'] ) ; ?>;
				font-family: <?php echo esc_attr( $goarch_errorheadingcolor['font-family'] ) ; ?> !important;
				font-size: <?php echo esc_attr( $goarch_errorheadingcolor['font-size'] ) ; ?>;
				font-style: <?php echo esc_attr( $goarch_errorheadingcolor['font-style'] ) ; ?>;
				font-variant: <?php echo esc_attr( $goarch_errorheadingcolor['font-variant'] ) ; ?>;
				font-weight: <?php echo esc_attr( $goarch_errorheadingcolor['font-weight'] ) ; ?>;
				letter-spacing: <?php echo esc_attr( $goarch_errorheadingcolor['letter-spacing'] ) ; ?>;
				line-height: <?php echo esc_attr( $goarch_errorheadingcolor['line-height'] ) ; ?>;
				text-decoration: <?php echo esc_attr( $goarch_errorheadingcolor['text-decoration'] ) ; ?>;
				text-transform: <?php echo esc_attr( $goarch_errorheadingcolor['text-transform'] ) ; ?>;
			}

			<?php } ?>

			<?php if ( ot_get_option( 'goarch_errorheadingcolor' ) !='' ): ?>
			.error404 .masthead-inner h1 .text-primary {
				color: <?php echo esc_attr( ot_get_option( 'goarch_errorheadingcolor' ) ); ?>;
			}

			<?php endif; ?>
			<?php if ( ot_get_option( 'goarch_errorheaderparagraphcolor' ) !='' ): ?>
			.error404 .masthead-inner p {
				color: <?php echo esc_attr( ot_get_option( 'goarch_errorheaderparagraphcolor' ) ); ?>;
			}

			<?php endif; ?>

			<?php
	  /*
	 * Typography
	 */
	 $goarch_errorheaderparagraphcolor = ot_get_option( 'goarch_errorheaderparagraphcolor', array() ); ?>
			<?php if($goarch_errorheaderparagraphcolor) { ?>
			.error404 h2 {
				color: <?php echo esc_attr( $goarch_errorheaderparagraphcolor['font-color'] ) ; ?>;
				font-family: <?php echo esc_attr( $goarch_errorheaderparagraphcolor['font-family'] ) ; ?> !important;
				font-size: <?php echo esc_attr( $goarch_errorheaderparagraphcolor['font-size'] ) ; ?>;
				font-style: <?php echo esc_attr( $goarch_errorheaderparagraphcolor['font-style'] ) ; ?>;
				font-variant: <?php echo esc_attr( $goarch_errorheaderparagraphcolor['font-variant'] ) ; ?>;
				font-weight: <?php echo esc_attr( $goarch_errorheaderparagraphcolor['font-weight'] ) ; ?>;
				letter-spacing: <?php echo esc_attr( $goarch_errorheaderparagraphcolor['letter-spacing'] ) ; ?>;
				line-height: <?php echo esc_attr( $goarch_errorheaderparagraphcolor['line-height'] ) ; ?>;
				text-decoration: <?php echo esc_attr( $goarch_errorheaderparagraphcolor['text-decoration'] ) ; ?>;
				text-transform: <?php echo esc_attr( $goarch_errorheaderparagraphcolor['text-transform'] ) ; ?>;
			}

			<?php } ?>

			<?php if ( ot_get_option( 'goarch_errorheaderbgheight' ) !='' && ot_get_option( 'goarch_errorheaderbgheight' ) !='0' ): ?>
			.error404 .masthead-inner {
				height: <?php echo esc_attr( ot_get_option( 'goarch_errorheaderbgheight' ) ); ?>vh !important;
			}

			<?php endif; ?>
			<?php if ((
			ot_get_option( 'goarch_errorheaderpaddingtop' ) !=''  &&   ot_get_option( 'goarch_errorheaderpaddingtop' ) != '33'

			)||( ot_get_option( 'goarch_errorheaderpaddingbottom' ) !='' && ot_get_option( 'goarch_errorheaderpaddingbottom' )  !='17' )): ?>

			.error404 .main-inner {
				padding-top: <?php echo esc_attr( ot_get_option( 'goarch_errorheaderpaddingtop' ) ); ?>vmin !important;
				padding-bottom: <?php echo esc_attr( ot_get_option( 'goarch_errorheaderpaddingbottom' ) ); ?>vmin !important;
			}

			<?php endif; ?>

			<?php if ( ot_get_option( 'goarch_searchpageheadbg' ) !='' ): ?>
			.search .bg-blog {
				background: url( <?php echo esc_attr( ot_get_option( 'goarch_searchpageheadbg' ) ); ?>) no-repeat scroll center top / cover !important;
			}

			<?php endif; ?>
			


			<?php
	  /*
	 * Typography
	 */
	 $goarch_searchheaderbgcolor = ot_get_option( 'goarch_searchheaderbgcolor', array() ); ?>
			<?php if($goarch_searchheaderbgcolor) { ?>
			.search  .main-header h1  {
				color: <?php echo esc_attr( $goarch_searchheaderbgcolor['font-color'] ) ; ?>;
				font-family: <?php echo esc_attr( $goarch_searchheaderbgcolor['font-family'] ) ; ?> !important;
				font-size: <?php echo esc_attr( $goarch_searchheaderbgcolor['font-size'] ) ; ?>;
				font-style: <?php echo esc_attr( $goarch_searchheaderbgcolor['font-style'] ) ; ?>;
				font-variant: <?php echo esc_attr( $goarch_searchheaderbgcolor['font-variant'] ) ; ?>;
				font-weight: <?php echo esc_attr( $goarch_searchheaderbgcolor['font-weight'] ) ; ?>;
				letter-spacing: <?php echo esc_attr( $goarch_searchheaderbgcolor['letter-spacing'] ) ; ?>;
				line-height: <?php echo esc_attr( $goarch_searchheaderbgcolor['line-height'] ) ; ?>;
				text-decoration: <?php echo esc_attr( $goarch_searchheaderbgcolor['text-decoration'] ) ; ?>;
				text-transform: <?php echo esc_attr( $goarch_searchheaderbgcolor['text-transform'] ) ; ?>;
			}

			<?php } ?>

			<?php if ( ot_get_option( 'goarch_searchheaderpaddingtop' ) !=''
			&& ot_get_option( 'goarch_searchheaderpaddingtop' ) !='33'
			 ): ?>

			.search .main-inner {

				padding-top: <?php echo esc_attr( ot_get_option( 'goarch_searchheaderpaddingtop' ) ); ?>vmin !important;
				padding-bottom: <?php echo esc_attr( ot_get_option( 'goarch_searchheaderpaddingbottom' ) ); ?>vmin !important;
			}

			<?php endif; ?>



			<?php
			  /*
			 * Typography
			 */
			 $goarch_tipigrof = ot_get_option( 'goarch_tipigrof', array() ); ?>
			<?php if($goarch_tipigrof) { ?>
			body {
				color: <?php echo esc_attr( $goarch_tipigrof['font-color'] ) ; ?>;
				font-family: <?php echo esc_attr( $goarch_tipigrof['font-family'] ) ; ?> !important;
				font-size: <?php echo esc_attr( $goarch_tipigrof['font-size'] ) ; ?>;
				font-style: <?php echo esc_attr( $goarch_tipigrof['font-style'] ) ; ?>;
				font-variant: <?php echo esc_attr( $goarch_tipigrof['font-variant'] ) ; ?>;
				font-weight: <?php echo esc_attr( $goarch_tipigrof['font-weight'] ) ; ?>;
				letter-spacing: <?php echo esc_attr( $goarch_tipigrof['letter-spacing'] ) ; ?>;
				line-height: <?php echo esc_attr( $goarch_tipigrof['line-height'] ) ; ?>;
				text-decoration: <?php echo esc_attr( $goarch_tipigrof['text-decoration'] ) ; ?>;
				text-transform: <?php echo esc_attr( $goarch_tipigrof['text-transform'] ) ; ?>;
			}

			<?php } ?>
			<?php if ( ot_get_option( 'goarch_blogheaderbgcolor' ) !='' ): ?>
			.page .bg-blog, .single .bg-blog {
				background-color: <?php echo esc_attr( ot_get_option( 'goarch_blogheaderbgcolor' ) ); ?> !important;

			}

			<?php endif; ?>
			<?php if ( ot_get_option( 'goarch_blogheaderbgcolor_mask' ) !='' ): ?>
			.page .main-inner:after, .single .main-inner:after {
				background-color: <?php echo esc_attr( ot_get_option( 'goarch_blogheaderbgcolor_mask' ) ); ?> !important;

			}

			<?php endif; ?>
			<?php

			 $goarch_tipigrof1 = ot_get_option( 'goarch_tipigrof1', array() ); ?>
			<?php if( $goarch_tipigrof1 ) { ?>
			h1 {
				color: <?php echo esc_attr( $goarch_tipigrof1['font-color'] ) ; ?>;
				font-family: <?php echo esc_attr( $goarch_tipigrof1['font-family'] ) ; ?> !important;
				font-size: <?php echo esc_attr( $goarch_tipigrof1['font-size'] ) ; ?>;
				font-style: <?php echo esc_attr( $goarch_tipigrof1['font-style'] ) ; ?>;
				font-variant: <?php echo esc_attr( $goarch_tipigrof1['font-variant'] ) ; ?>;
				font-weight: <?php echo esc_attr( $goarch_tipigrof1['font-weight'] ) ; ?>;
				letter-spacing: <?php echo esc_attr( $goarch_tipigrof1['letter-spacing'] ) ; ?>;
				line-height: <?php echo esc_attr( $goarch_tipigrof1['line-height'] ) ; ?>;
				text-decoration: <?php echo esc_attr( $goarch_tipigrof1['text-decoration'] ) ; ?>;
				text-transform: <?php echo esc_attr( $goarch_tipigrof1['text-transform'] ) ; ?>;
			}

			<?php } ?>

			<?php $goarch_tipigrof2 = ot_get_option( 'goarch_tipigrof2', array() ); ?>
			<?php if($goarch_tipigrof2) { ?>
			h2 {
				color: <?php echo esc_attr( $goarch_tipigrof2['font-color'] ) ; ?>;
				font-family: <?php echo esc_attr( $goarch_tipigrof2['font-family'] ) ; ?> !important;
				font-size: <?php echo esc_attr( $goarch_tipigrof2['font-size'] ) ; ?>;
				font-style: <?php echo esc_attr( $goarch_tipigrof2['font-style'] ) ; ?>;
				font-variant: <?php echo esc_attr( $goarch_tipigrof2['font-variant'] ) ; ?>;
				font-weight: <?php echo esc_attr( $goarch_tipigrof2['font-weight'] ) ; ?>;
				letter-spacing: <?php echo esc_attr( $goarch_tipigrof2['letter-spacing'] ) ; ?>;
				line-height: <?php echo esc_attr( $goarch_tipigrof2['line-height'] ) ; ?>;
				text-decoration: <?php echo esc_attr( $goarch_tipigrof2['text-decoration'] ) ; ?>;
				text-transform: <?php echo esc_attr( $goarch_tipigrof2['text-transform'] ) ; ?>;
			}

			<?php } ?>

			<?php $goarch_tipigrof3 = ot_get_option( 'goarch_tipigrof3', array() ); ?>
			<?php if($goarch_tipigrof3) { ?>
			h3 {
				color: <?php echo esc_attr( $goarch_tipigrof3['font-color'] ) ; ?>;
				font-family: <?php echo esc_attr( $goarch_tipigrof3['font-family'] ) ; ?> !important;
				font-size: <?php echo esc_attr( $goarch_tipigrof3['font-size'] ) ; ?>;
				font-style: <?php echo esc_attr( $goarch_tipigrof3['font-style'] ) ; ?>;
				font-variant: <?php echo esc_attr( $goarch_tipigrof3['font-variant'] ) ; ?>;
				font-weight: <?php echo esc_attr( $goarch_tipigrof3['font-weight'] ) ; ?>;
				letter-spacing: <?php echo esc_attr( $goarch_tipigrof3['letter-spacing'] ) ; ?>;
				line-height: <?php echo esc_attr( $goarch_tipigrof3['line-height'] ) ; ?>;
				text-decoration: <?php echo esc_attr( $goarch_tipigrof3['text-decoration'] ) ; ?>;
				text-transform: <?php echo esc_attr( $goarch_tipigrof3['text-transform'] ) ; ?>;
			}

			<?php } ?>

			<?php $goarch_tipigrof4 = ot_get_option( 'goarch_tipigrof4', array() ); ?>
			<?php if($goarch_tipigrof4) { ?>
			h4 {
				color: <?php echo esc_attr( $goarch_tipigrof4['font-color'] ) ; ?>;
				font-family: <?php echo esc_attr( $goarch_tipigrof4['font-family'] ) ; ?> !important;
				font-size: <?php echo esc_attr( $goarch_tipigrof4['font-size'] ) ; ?>;
				font-style: <?php echo esc_attr( $goarch_tipigrof4['font-style'] ) ; ?>;
				font-variant: <?php echo esc_attr( $goarch_tipigrof4['font-variant'] ) ; ?>;
				font-weight: <?php echo esc_attr( $goarch_tipigrof4['font-weight'] ) ; ?>;
				letter-spacing: <?php echo esc_attr( $goarch_tipigrof4['letter-spacing'] ) ; ?>;
				line-height: <?php echo esc_attr( $goarch_tipigrof4['line-height'] ) ; ?>;
				text-decoration: <?php echo esc_attr( $goarch_tipigrof4['text-decoration'] ) ; ?>;
				text-transform: <?php echo esc_attr( $goarch_tipigrof4['text-transform'] ) ; ?>;
			}

			<?php } ?>

			<?php $goarch_tipigrof5 = ot_get_option( 'goarch_tipigrof5', array() ); ?>
			<?php if($goarch_tipigrof5) { ?>
			h5 {
				color: <?php echo esc_attr( $goarch_tipigrof5['font-color'] ) ; ?>;
				font-family: <?php echo esc_attr( $goarch_tipigrof5['font-family'] ) ; ?> !important;
				font-size: <?php echo esc_attr( $goarch_tipigrof5['font-size'] ) ; ?>;
				font-style: <?php echo esc_attr( $goarch_tipigrof5['font-style'] ) ; ?>;
				font-variant: <?php echo esc_attr( $goarch_tipigrof5['font-variant'] ) ; ?>;
				font-weight: <?php echo esc_attr( $goarch_tipigrof5['font-weight'] ) ; ?>;
				letter-spacing: <?php echo esc_attr( $goarch_tipigrof5['letter-spacing'] ) ; ?>;
				line-height: <?php echo esc_attr( $goarch_tipigrof5['line-height'] ) ; ?>;
				text-decoration: <?php echo esc_attr( $goarch_tipigrof5['text-decoration'] ) ; ?>;
				text-transform: <?php echo esc_attr( $goarch_tipigrof5['text-transform'] ) ; ?>;
			}

			<?php } ?>

			<?php $goarch_tipigrof6 = ot_get_option( 'goarch_tipigrof6', array() ); ?>
			<?php if($goarch_tipigrof6) { ?>
			h6 {
				color: <?php echo esc_attr( $goarch_tipigrof6['font-color'] ) ; ?>;
				font-family: <?php echo esc_attr( $goarch_tipigrof6['font-family'] ) ; ?> !important;
				font-size: <?php echo esc_attr( $goarch_tipigrof6['font-size'] ) ; ?>;
				font-style: <?php echo esc_attr( $goarch_tipigrof6['font-style'] ) ; ?>;
				font-variant: <?php echo esc_attr( $goarch_tipigrof6['font-variant'] ) ; ?>;
				font-weight: <?php echo esc_attr( $goarch_tipigrof6['font-weight'] ) ; ?>;
				letter-spacing: <?php echo esc_attr( $goarch_tipigrof6['letter-spacing'] ) ; ?>;
				line-height: <?php echo esc_attr( $goarch_tipigrof6['line-height'] ) ; ?>;
				text-decoration: <?php echo esc_attr( $goarch_tipigrof6['text-decoration'] ) ; ?>;
				text-transform: <?php echo esc_attr( $goarch_tipigrof6['text-transform'] ) ; ?>;
			}

			<?php } ?>

			<?php if (ot_get_option('additionalcss') != '') {
				echo (ot_get_option('additionalcss'));
			} ?>


		</style>

		<?php if ( ot_get_option( 'additionaljs' ) != '' ): ?>
			<script type="text/javascript">
				<?php if ( ot_get_option( 'additionaljs' ) ) {
					echo ( ot_get_option( 'additionaljs' ) );
				} ?>
			</script>
		<?php endif; ?>

	<?php endif; ?>
<?php }

add_action( 'wp_head', 'goarch_custom_styling' );
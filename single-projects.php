<?php

/**
 * Template Name: Full width page with container
 * Preview:
 *
 */



get_header();
the_post();

$shotrcodes = get_the_content();
preg_match_all('#\[goarch_main_slider.*?\]#',$shotrcodes,$math);
preg_match_all('#\[goarch_about_main_section.*?\]#',$shotrcodes,$math_v);
preg_match_all('#\[goarch_page_heading_section.*?\]#',$shotrcodes,$heading);





if(isset($math_v[0][0]))
	echo do_shortcode(apply_filters( 'the_content', $math_v[0][0]));

if(isset($heading[0][0]))
	echo do_shortcode(apply_filters( 'the_content', $heading[0][0]));




?>
	<div class="layout">
<?php  if(isset($math[0][0]))
	echo do_shortcode(apply_filters( 'the_content', $math[0][0])); ?>
	<div class="content">
<?php
$content = $shotrcodes;

if(isset($math[0][0]))
	$content = apply_filters( 'the_content', str_replace($math[0][0],'',$shotrcodes) );

if(isset($math_v[0][0]))
	$content = apply_filters( 'the_content', str_replace($math_v[0][0],'',$shotrcodes) );
if(isset($heading[0][0]))
	$content = apply_filters( 'the_content', str_replace($heading[0][0],'',$shotrcodes) );


echo do_shortcode(str_replace( ']]>', ']]&gt;', $content ));

?>

<?php
get_footer();




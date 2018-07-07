<?php


/**
 * @return categorias
 */
function goarch_wp_infinitepaginate()
{


	$paged = (int)sanitize_text_field($_POST['page_no']);
	$posts_per_page = (int)sanitize_text_field(get_option('posts_per_page'));

	if (isset($_POST['s']{0})) {
		$args = array(
			'paged' => $paged,
			'showposts' => $posts_per_page,
			'post_status' => 'publish',
			's' => sanitize_text_field($_POST['s'])
		);


	} else {
		$args = array(
			'paged' => $paged,
			'showposts' => $posts_per_page,
			'cat' => sanitize_text_field($_POST['cat']),
			'post_status' => 'publish',
			'post_type' => sanitize_text_field($_POST['posttype'])
		);
	}

	if (isset($_POST['year']) && !empty($_POST['year']))
		$args['year'] = ($_POST['year']);

	if (isset($_POST['monthnum']) && !empty($_POST['monthnum']))
		$args['monthnum'] = ($_POST['monthnum']);

	if (isset($_POST['day']) && !empty($_POST['day']))
		$args['day'] = ($_POST['day']);

	$query = new WP_Query($args);

	$n = 0;
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			$n++;
			get_template_part('partials/content', get_post_format());
			if ($n % 3 == 0) {
				?>
				<div class="clearfix visible-md visible-lg"></div>
				<?php
			}
			if ($n % 2 == 0) {
				?>
				<div class="clearfix visible-sm"></div>
				<?php
			}


		}
	}
	wp_reset_postdata();

	exit;
	die();
}

add_action('wp_ajax_goarch_infinite_scroll', 'goarch_wp_infinitepaginate'); // for logged in user
add_action('wp_ajax_nopriv_goarch_infinite_scroll', 'goarch_wp_infinitepaginate'); // if user not logged in


function goarch_wp_infinitepaginate_projects()
{

    $img_type = $_POST['img_type'];

	$paged = (int)sanitize_text_field($_POST['page_no']);
	$posts_per_page = (int)sanitize_text_field($_POST['post_per_page']);
	$type_l = sanitize_text_field($_POST['type']);

	if (isset($_POST['s']{0})) {
		$args = array(
			'paged' => $paged,
			'showposts' => $posts_per_page,
			'post_status' => 'publish',
			'post_type' => 'projects',
			's' => sanitize_text_field($_POST['s'])
		);


	} else {
		$args = array(
			'paged' => $paged,
			'showposts' => $posts_per_page,
			'cat' => sanitize_text_field($_POST['cat']),
			'post_status' => 'publish',
			'post_type' => 'projects',
			//'post_type'   => sanitize_text_field( $_POST['posttype'] )
		);


	}
	if (isset($_POST['term']{0}) && ($_POST['term']!="all")) {
		$args['tax_query'] = array(array(
			'taxonomy' => 'projects_categories',
			'terms' => explode(',' , $_POST['term'] ),
			'field' => 'slug'));
	}
	if (isset($_POST['year']) && !empty($_POST['year']))
		$args['year'] = sanitize_text_field($_POST['year']);

	if (isset($_POST['monthnum']) && !empty($_POST['monthnum']))
		$args['monthnum'] = sanitize_text_field($_POST['monthnum']);

	if (isset($_POST['day']) && !empty($_POST['day']))
		$args['day'] = sanitize_text_field($_POST['day']);

	if (isset($_POST['tag']) && !empty($_POST['tag']))
		$args['tag'] = sanitize_text_field($_POST['tag']);



	$query = new WP_Query($args);

	$j = 1;

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();

			$main_class = '';
			if ($j % 2 == 0) {
				$main_class = ' project-light';
			}
			$j++;

			?>

			<div class="project project_item <?php echo esc_attr($main_class); ?> col-sm-6 col-md-4 col-lg-3">
				<?php $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
                <a
					<?php if ( $type_l == 1 ) { ?>
                        class="link"
					<?php } ?>
                        href="<?php if ( $type_l == 1 ) {
							the_permalink();
						} else {
							echo esc_url( $image_url[0] );
						} ?>" title=" <?php echo the_title(); ?>">
					<figure>
						<?php if ( $img_type == 1 ) { ?>
                            <img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(),'full' ) ); ?>">
						<?php } else {
							the_post_thumbnail( 'goarch-image-480x880-croped' );
						} ?>


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

	exit;
	die();
}

add_action('wp_ajax_goarch_infinite_projects_scroll', 'goarch_wp_infinitepaginate_projects'); // for logged in user
add_action('wp_ajax_nopriv_goarch_infinite_projects_scroll', 'goarch_wp_infinitepaginate_projects'); // if user not logged in


?>
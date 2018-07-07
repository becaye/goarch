<?php


add_action( 'add_meta_boxes', 'goarch_custom_meta_box' );

function goarch_custom_meta_box( $postType ) {

	$postType = ( isset( $postType ) ) ? $postType : "post";
	add_meta_box( 'goarch_meta_box',
		esc_html__( 'goarch Onepage menu', 'goarch' ),
		'goarch_footer_meta_box',
		'page',
		'side',
		'low' );

	add_meta_box( 'goarch_meta_box_all_posttype',
		esc_html__( 'Big title', 'goarch' ),
		'goarch_meta_box_all_posttype_fun',
		$postType,
		'normal',
		'high' );

	add_meta_box( 'goarch_meta_box',
		esc_html__( 'goarch portfolio', 'goarch' ),
		'goarch_portfolio_box_func',
		'portfolio',
		'side',
		'low' );
}

function goarch_portfolio_box_func( $post ) {

	$goarch_portfolio_widht = get_post_meta( $post->ID, '_goarch_portfolio_widht', true );

	?>
    <div class="inside">

        <label class="selectit">
            <input <?php checked( 'on', $goarch_portfolio_widht ); ?> type="checkbox" name="_goarch_portfolio_widht"
                                                                      id="in-portfolio_categories-191">
			<?php esc_html_e( '50% widht?', 'goarch' ); ?>
        </label>

    </div>
	<?php
}


add_action( 'save_post', 'goarch_save_metabox', 9999 );

function goarch_save_metabox( $post_id ) {
	global $post;


	if ( !empty( $_POST['_goarch_portfolio_widht'] ) ) {
		update_post_meta( $post_id, '_goarch_portfolio_widht', wp_kses_post( $_POST['_goarch_portfolio_widht'] ) );

	}
	if ( !empty( $_POST['_goarch_short_description'] ) ) {
		$datta = wp_kses_post( $_POST['_goarch_short_description'] );
		update_post_meta( $post_id, '_goarch_short_description', $datta );

	}

	if ( !current_user_can( 'edit_page', $post_id ) ) {
		return $post_id;
	}

	if ( isset( $post->ID ) ) {
		if ( isset( $_POST["goarch_menu_name"] ) ) {
			$meta_element_class = serialize( $_POST['goarch_menu_name'] );
			update_post_meta( $post->ID, '_goarch_menu_name', ( $meta_element_class ) );
		} else {
			@delete_post_meta( $post->ID, '_goarch_menu_name' );
		}
		if ( isset( $_POST["goarch_munu_url"] ) ) {
			$meta_element_class = serialize( $_POST['goarch_munu_url'] );
			update_post_meta( $post->ID, '_goarch_munu_url', ( $meta_element_class ) );
		} else {
			@delete_post_meta( $post->ID, '_goarch_munu_url' );
		}

		$frontpage_id = get_option( 'page_on_front' );
		$contents = unserialize( get_post_meta( $post->ID, '_goarch_menu_name', true ) );
		$socialurl = unserialize( get_post_meta( $post->ID, '_goarch_munu_url', true ) );
		if ( $post->ID == $frontpage_id ) {


			$menu = '';
			if ( ( $contents && $socialurl ) != '' ) {
				foreach ( array_combine( $contents, $socialurl ) as $content => $url ) {
					$menu .= ' 	<li><a href="' . esc_url( $url ) . '">' . esc_html( $content ) . '</a></li>';
				}
			}
			if ( $menu != '' ) {
				update_option( 'goarch_one_page_menu', $menu );
				//  var_dump($menu);

			} else {
				delete_option( 'goarch_one_page_menu');
			}

		} else {
			/*
			 * onother page
			 */
			$menu_o = '';
			if ( ( $contents && $socialurl ) != '' ) {
				foreach ( array_combine( $contents, $socialurl ) as $content => $url ) {
					$menu_o .= ' 	<li><a href="' . esc_url( $url ) . '">' . esc_html( $content ) . '</a></li>';
				}
			}
			if ( $menu_o != '' ) {
				update_option( 'goarch_one_page_menu_' . $post->ID, $menu_o );
			} else {
				delete_option( 'goarch_one_page_menu_' . $post->ID);
            }

		}

	}


}


function goarch_footer_meta_box( $post ) {

	$goarch_munu_url = unserialize( get_post_meta( $post->ID, '_goarch_munu_url', true ) );
	$goarch_menu_name = unserialize( get_post_meta( $post->ID, '_goarch_menu_name', true ) );


	?>
    <div class="goarch_one_page">
        <div class="inside">
            <strong><?php esc_html_e( 'Menu item name', 'goarch' ) ?></strong>
        </div>
        <div class="input_fields_wrap">

			<?php if ( $goarch_menu_name ) {
				foreach ( $goarch_menu_name as $item ) {
					?>
                    <div><input type="text" name="goarch_menu_name[]" value="<?php echo wp_kses_post( $item ); ?>"
                                class="widefat valid goarch_vdf"/><a href="#" class="remove_field"><i
                                    class="fa fa-times"
                                    aria-hidden="true"></i></a>
                    </div>
					<?php
				}
			} else {
				?>
                <!--div><input type="text" name="goarch_menu_name[]" class="widefat valid goarch_vdf"></div-->
				<?php
			} ?>


        </div>
        <button
                class="add_field_button vc_btn vc_btn-primary vc_btn-sm vc_navbar-btn">
			<?php esc_html_e( '+ Add More item', 'goarch' ) ?>
        </button>
        <p class="description"><?php esc_html_e( 'Format: Any text', 'goarch' ) ?></p>

        <div class="inside">
            <strong><?php esc_html_e( 'Menu item Url', 'goarch' ) ?></strong>
        </div>
        <div class="input_fields_wrap2">


			<?php if ( $goarch_munu_url ) {
				foreach ( $goarch_munu_url as $item ) {
					?>
                    <div><input type="text" name="goarch_munu_url[]" class="widefat valid goarch_vdf"
                                value="<?php echo wp_kses_post( $item ); ?>"/><a href="#" class="remove_field"><i
                                    class="fa fa-times" aria-hidden="true"></i></a></div>
					<?php
				}
			} else {
				?>
                <!--div><input type="text" name="goarch_munu_url[]" class="widefat valid goarch_vdf"></div-->

				<?php
			} ?>

        </div>
        <button
                class="add_field_button2 vc_btn vc_btn-primary vc_btn-sm vc_navbar-btn">
			<?php esc_html_e( '+ Add More item', 'goarch' ) ?>
        </button>
        <p class="description"><?php esc_html_e( 'Format: #sectionname or http://yoururl.com', 'goarch' ) ?></p>

    </div>
	<?php
}


function goarch_meta_box_all_posttype_fun( $post ) {

	$valueeee2 = get_post_meta( $post->ID, '_goarch_short_description', true );
	wp_editor( wp_kses_post( $valueeee2 ), 'mettaabox_ID_stylee',
		$settings = array(
			'textarea_name' => '_goarch_short_description',
			'textarea_rows' => 3,
			'media_buttons' => false
		) );
}

add_action( 'add_meta_boxes', 'goarch_image_add_metabox' );
function goarch_image_add_metabox() {

	add_meta_box( 'goarchimagediv', esc_html__( 'goarch Image', 'goarch' ),
		'goarch_image_metabox', 'post', 'side', 'low' );
	add_meta_box( 'goarchimagediv', esc_html__( 'goarch Image', 'goarch' ),
		'goarch_image_metabox', 'page', 'side', 'low' );
}

function goarch_image_metabox( $post ) {
	global $content_width, $_wp_additional_image_sizes;
	$image_id = get_post_meta( $post->ID, '_goarch_image_id', true );
	$old_content_width = $content_width;
	$content_width = 254;
	if ( $image_id && get_post( $image_id ) ) {

		if ( !isset( $_wp_additional_image_sizes['post-thumbnail'] ) ) {
			echo wp_get_attachment_image( $image_id, array( $content_width, $content_width ) );
		} else {
			echo wp_get_attachment_image( $image_id, 'post-thumbnail' );
			$thumbnail_html = wp_get_attachment_image( $image_id, 'post-thumbnail' );
		}
		if ( !empty( $thumbnail_html ) ) {

			?>
            <p class="hide-if-no-js">
                <a href="javascript:;"
                   id="remove_goarch_image_button">
					<?php esc_html_e( 'Remove goarch image', 'goarch' ); ?>
                </a>
            </p>

            <input type="hidden"
                   id="upload_goarch_image"
                   name="_goarch_cover_image"
                   value="<?php echo esc_attr( $image_id ); ?>"/>
			<?php
		}
		$content_width = $old_content_width;
	} else {
		?>
        <img id="goarch_image_two" src=""
        />

        <p class="hide-if-no-js">
            <a title="<?php esc_html_e( 'Set goarch image', 'goarch' ); ?>"
               href="javascript:;"
               id="upload_goarch_image_button"
               id="set-goarch-image<?php echo esc_html__( 'Choose an image', 'goarch' ) ?>"
               data-uploader_button_text="<?php echo esc_html__( 'Set goarch image', 'goarch' ) ?>"><?php
				echo esc_html__( 'Set goarch image', 'goarch' ); ?></a>
        </p>
        <input type="hidden" id="upload_goarch_image" name="_goarch_cover_image" value=""/>
		<?php

	}


}

add_action( 'save_post', 'goarch_image_save', 10, 1 );
function goarch_image_save( $post_id ) {
	if ( isset( $_POST['_goarch_cover_image'] ) ) {
		$image_id = (int) $_POST['_goarch_cover_image'];
		update_post_meta( $post_id, '_goarch_image_id', $image_id );
	}
}
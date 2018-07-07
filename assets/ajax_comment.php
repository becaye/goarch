<?php

/**
 * This function via Ajax sends a post mail
 */
function goarch_comment_send()
{

    $comment = wp_handle_comment_submission( wp_unslash( $_POST ) );
    if ( is_wp_error( $comment ) ) {
        $data = intval( $comment->get_error_data() );
        if ( ! empty( $data ) ) {
            wp_die( '<p>' . $comment->get_error_message() . '</p>',  array( 'response' => $data, 'back_link' => true ) );
        } else {

            exit;
        }
    }
    echo 1;
    
    wp_die();
    exit;
}

add_action('wp_ajax_goarch_comment_send', 'goarch_comment_send'); // for logged in user
add_action('wp_ajax_nopriv_goarch_comment_send', 'goarch_comment_send'); // if user not logged in



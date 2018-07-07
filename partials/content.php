<?php
$goarch_class = goarch_get_global_class();
if ( !is_single() && ( !is_page() ) ) { ?>

    <article <?php post_class( 'post blog_item  post-item ' ); ?>>
        <div class="row">
			<?php

			if ( has_post_thumbnail() ) {
				?>
                <div class="blog-thumbnail col-md-8">
                    <div class="blog-thumbnail-bg col-md-8 visible-md visible-lg"
                         style="background-image: url(<?php the_post_thumbnail_url( 'goarch_760_514' ); ?>);">

                    </div>
                    <div class="blog-thumbnail-img visible-xs visible-sm">
						<?php goarch_post_thumbnail(); ?>

                    </div>
                </div>

                <div class="blog-info col-md-4">
                    <div class="blog-tags blog-tags-top">
						<?php the_tags( '', '' ); ?>
                    </div>
                    <h3 class="blog-title">
                        <a href="<?php echo esc_url( the_permalink() ); ?>"><?php the_title(); ?></a>
                    </h3>
                    <p><?php echo goarch_limit_excerpt( goarch_words_limit() ); ?></p>
                    <div class="blog-meta">
                        <div class="author">
							<?php esc_html_e( 'by ', 'goarch' ); ?><a
                                    href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a>
                        </div>
                        <div class="time"><?php echo esc_html( get_the_time( 'M , j ' ) ); ?></div>
                    </div>
                    <div class="text-right"><a href="<?php echo esc_url( get_the_permalink() ); ?>"
                                               class="read-more"><?php echo esc_html( get_theme_mod( 'goarch_blog_list_text', esc_html__( 'Read more', 'goarch' ) ) ); ?></a>
                    </div>
                </div>
				<?php
			} else { ?>
                <div class="blog-info col-md-12">
                    <div class="blog-tags">
						<?php the_tags( '', '' ); ?>
                    </div>
                    <h3 class="blog-title">
                        <a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a>
                    </h3>
                    <p><?php echo goarch_limit_excerpt( goarch_words_limit() ); ?></p>
                    <div class="blog-meta">
                        <div class="author">
							<?php esc_html_e( 'by ', 'goarch' ); ?><a
                                    href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a>
                        </div>
                        <div class="time"><?php echo esc_html( get_the_time( 'M , j ' ) ); ?></div>
                    </div>
                    <div class="text-right"><a href="<?php echo esc_url( get_the_permalink() ); ?>"
                                               class="read-more"><?php echo esc_html( get_theme_mod( 'goarch_blog_list_text', esc_html__( 'Read more', 'goarch' ) ) ); ?></a>
                    </div>
                </div>
				<?php

			}
			?>


        </div>
    </article>

<?php } else { ?>

    <article <?php post_class( 'post post' ); ?> >

        <header class="post-header">
            <h3><?php the_title(); ?></h3>
			<?php if ( !is_page() ) { ?>
                <div class="blog-meta">
                    <div class="author">  <?php esc_html_e( 'by ', 'goarch' ); ?>
                        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a>
                    </div>
                    <div class="time"><?php echo esc_html( get_the_time( 'M , j ' ) ); ?></div>
                </div>
			<?php } ?>
        </header>
        <div class="post-thumbnail">
			<?php goarch_post_thumbnail(); ?>
        </div>
		<?php the_content(); ?>
        <div class="post_pagination">
			<?php
			echo goarch_link_pages();
			?>
        </div>
        <div class="blog-tags  blog-tags-bottom">
			<?php the_tags( '', '' ); ?>
        </div>
    </article>

<?php } ?>
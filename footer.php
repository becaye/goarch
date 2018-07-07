

<footer id="footer" class="footer">
    <div class="container">
        <div class="row-base row">
            <div class="col-base text-left-md col-md-4">
		        <?php $url = get_home_url( '/' );
		        $logo_text = ( get_theme_mod( 'logo_text' ) );
		        $logo_text2 = ( get_theme_mod( 'logo_text_2' ) );
		        $logo_primary = ( get_theme_mod( 'logo_text_primary' ) );
		        ?>
                <a href="<?php $url = get_home_url( '/' );
		        echo esc_url( $url ); ?>" class="brand"><?php echo wp_kses_post( $logo_text );
			        if ( isset( $logo_primary{0} ) ) { ?><span class="text-primary"><?php echo wp_kses_post( $logo_primary ); ?></span><?php } echo wp_kses_post( $logo_text2 ); ?>
			        <?php
			        $logo = get_theme_mod( 'goarch_logo_small' );
			        if ( isset( $logo{2} ) ) {
				        ?>    <img alt="" height="40px" class="center-block"
                                   src="<?php echo esc_url( $logo ); ?>">
				        <?php
			        }
			        ?>
                </a>
            </div>
            <div class="text-center-md col-base col-md-4">

                <?php  $author = get_theme_mod('footer_author_link') ;
                 echo wp_kses_post($author );
                
                ?>

            </div>
            <div class="text-right-md col-base col-md-4">
                <?php
                echo wp_kses_post(
                    do_shortcode((get_theme_mod('footer_copyright', ' &copy; ' .  esc_html__('go.arch ', 'goarch') . date('Y') . esc_html__('. All rights reserved ', 'goarch') . ' ' )))); ?>



            </div>
        </div>
    </div>
</footer>
<!-- Lines -->

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
</div>

</div>



<?php wp_footer(); ?>
</body>
</html>
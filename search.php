<?php get_header(); ?>
<div class="layout">
<main class="main main-inner main-blog bg-blog" data-stellar-background-ratio="0.6">
    <div class="container">
        <header class="main-header">
            <h1><?php printf(esc_html(esc_html__('Search Results for: %s', 'goarch')), get_search_query()); ?></h1>
        </header>
    </div>

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
</main>

<!-- Content -->
    <div class="content">

    <section class="blog-list">
        <div class="container">
            <div class="row">
            <?php

            $positin_sidebar = "";

            if (get_theme_mod('goarch_sidebar_position', 's2') == 's1') {
                $positin_sidebar = 'left';
            } else {
                $positin_sidebar = 'right';
            }

            if (isset($_GET['showas']) && $_GET['showas'] == 'left') {
                $positin_sidebar = 'left';
            } elseif (isset($_GET['showas']) && $_GET['showas'] == 'right') {
                $positin_sidebar = 'right';
            }

            if ($positin_sidebar == 'left')
                get_sidebar();
            ?>
                <div class="col-primary col-md-8">

                <?php if (have_posts()) : ?>
                    <?php
                    // Start the Loop.
                    while (have_posts()) : the_post();

                        get_template_part('partials/content', get_post_format());
                        ?>


                    <?php endwhile;
                    wp_reset_postdata();


                else :
                    ?>
                    <article <?php post_class('post'); ?>>

                        <header class="post-header">
                            <h2><?php
                                esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'goarch'); ?>
                            </h2>

                        </header>

                        <div class="post-entry text-left">
                <?php   get_search_form(); ?>
                        </div>

                    </article>
                 <?php

                endif; ?>

            </div>
            <?php
            if ($positin_sidebar == 'right')
                get_sidebar();
            ?>
        </div>

 
</div>

    <!-- Footer -->

    </section>
    <?php get_footer(); ?>



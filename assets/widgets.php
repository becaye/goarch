<?php

add_action('widgets_init', 'goarch_widgets_int');

function goarch_widgets_int()
{

    //sidibar widget
    register_widget('goarch_Recent_posts');
    register_widget('goarch_TAG_Wigdet_class');

}


//sidibar widget
class goarch_Recent_posts extends WP_Widget
{
    function __construct()
    {
        $args = array(
            'name' => esc_html__('goarch  Recent posts', 'goarch'),
            'description' => esc_html__('It displays a list of tweets', 'goarch'),
            'classname' => 'goarch_Recent_posts');
        parent::__construct('goarch_Recent_posts', esc_html__('goarch Tweets2', 'goarch'), $args);

    }

    /**
     * method to display in the admin
     * @param $instance
     */
    function form($instance)
    {
        $instance = wp_parse_args(
            (array)$instance,
            array(
                'title' => esc_html__('Recent posts', 'goarch'), // Legacy.
                'text' => 3


            )
        );
        extract($instance);


        ?>
        <p>
            <label for="<?php echo esc_attr(($this->get_field_id('title'))); ?>"> <?php esc_html_e('Title:',
                    'goarch'); ?></label>
            <input class="widefat" id="<?php echo esc_attr(($this->get_field_id('title'))); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php if (isset($title))
                       echo esc_html($title); ?>">
        </p>


        <p>
            <label for="<?php echo esc_attr($this->get_field_id('text')); ?>"> <?php esc_html_e('How many show post?',
                    'goarch'); ?></label>

            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('text')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('text')); ?>" type="text"
                   value="<?php
                   if (isset($text))
                       echo esc_html($text);
                   ?>">

        </p>


        <?php
    }

    /**
     * frontend for the site
     * @param $args
     * @param $instance
     */
    function widget($args, $instance)
    {
        extract($args);


        $instance = wp_parse_args(
            (array)$instance,
            array(
                'title' => esc_html__('Recent posts', 'goarch'), // Legacy.
                'Name' => '',
                'text' => 3


            )
        );
        extract($instance);
        // Create a filter to the other plug-ins can change them
        $title = sanitize_text_field(apply_filters('widget_title', $title));
        $before_widget = str_replace('class="', 'class=" widget shadow widget-twitter ', $before_widget);
        echo wp_kses_post($before_widget . "");

        echo wp_kses_post($before_title) . esc_attr($title) . wp_kses_post($after_title);

        $args = array(
            'post_type' => 'post',
            'orderby' => 'date',
            'post_status' => 'publish',
            'posts_per_page' => sanitize_text_field($text),
            'ignore_sticky_posts' => true,
            'meta_query' => array(array('key' => '_thumbnail_id'))

        );

        global $goarch_class;

        ?>


        <?php
       $rent_blog_query = new WP_Query($args);
        if ($rent_blog_query->have_posts()):
            while ($rent_blog_query->have_posts()) {
               $rent_blog_query->the_post();
                ?>
                <article class="recent-post">
                <div class="recent-post-thumbnail">
                    <a href="<?php  echo esc_url(get_the_permalink()); ?>"><img alt="<?php the_title(); ?>" src="<?php $goarch_class->goarch_get_post_thumbnail(get_the_ID(), 149, 108); ?>" class="wp-post-image"></a>
                </div>
                <div class="recent-post-body">
                    <h4 class="recent-post-title">
                        <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a>
                    </h4>
                    <div class="recent-post-time">  <?php echo esc_html(get_the_time('M , j ')); ?></div>
                </div>
                </article>
                <?php

            }
                wp_reset_postdata();
            endif; ?>


        <?php

        echo wp_kses_post($after_widget);
    }

function update($new_instance, $old_instance)
{
    $new_instance['title'] = !empty($new_instance['title']) ? esc_attr($new_instance['title']) :
        esc_html__('Recent posts', 'goarch');
    $new_instance['text'] = ((int)$new_instance['text']) ? sanitize_text_field($new_instance['text']) : 3;
    return $new_instance;
}


}


class goarch_TAG_Wigdet_class extends WP_Widget
{
    function __construct()
    {
        $args = array(
            'name' => esc_html__('goarch TAG', 'goarch'),
            'description' => esc_html__('It displays a list of TAG', 'goarch'),
            'classname' => 'widget-tag-cloud');
        parent::__construct('widget-tag-cloud', esc_html__('goarch TAG', 'goarch'), $args);

    }

    /**
     * method to display in the admin
     * @param $instance
     */
    function form($instance)
    {
        $instance = wp_parse_args((array)$instance,
            array(
                'title' => '',
                'type_tag' => '0',
                'number' => 20
            ));
        extract($instance);
        $title = sanitize_text_field($instance['title']);
        ?>
        <p><label
                for="<?php echo esc_attr(($this->get_field_id('title'))); ?>"><?php esc_html_e('Title:', 'goarch'); ?></label>
            <input class="widefat" id="<?php echo esc_attr(($this->get_field_id('title'))); ?>"
                   name="<?php echo esc_attr(($this->get_field_name('title'))); ?>"
                   type="text" value="<?php echo esc_attr(($title)); ?>"/></p>
        <p>

        <?php

    }

    /**
     * frontend for the site
     * @param $args
     * @param $instance
     */
    public function widget($args, $instance)
    {

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        extract($args);
        extract($instance);

        echo wp_kses_post($before_widget);

        echo wp_kses_post($before_title) . esc_attr($title) . wp_kses_post($after_title);

?>
        <div class="blog-tags">
<?php
        $posttags = get_tags();
        if ($posttags) {
            foreach ($posttags as $tag) {
                ?>

                    <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"><?php echo esc_html($tag->name); ?></a>

                <?php
            }
        }
?>  </div>

        <?php
        echo wp_kses_post($after_widget);
    }

    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $new_instance = wp_parse_args((array)$new_instance, array('title' => '', 'count' => 0, 'dropdown' => ''));
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['number'] = $new_instance['number'] ? (int)sanitize_title($new_instance['number']) : 20;
        $instance['type_tag'] = $new_instance['type_tag'] ? (int)sanitize_title($new_instance['type_tag']) : '0';

        return $instance;
    }


}







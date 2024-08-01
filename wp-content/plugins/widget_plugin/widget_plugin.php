<?php
/**
 * Plugin Name: Widget Plugin
 * Author: Hawana Tamang
 * Description: This is a plugin for the event widgets
 * Version: 1.0.0
 */

class Upcoming_Events_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'upcoming_events_widget', // Base ID
            'Upcoming Events Widget', // Name
            array('description' => __('Displays upcoming events.', 'textdomain'))
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        
        // Default title and number of events
        $title = !empty($instance['title']) ? $instance['title'] : __('Upcoming Events', 'textdomain');
        $number = !empty($instance['number']) ? $instance['number'] : 5;

        // Current date in YYYYMMDD format
        $today = date('Ymd');

        // Query for upcoming events
        $query_args = array(
            'post_type' => 'events',
            'posts_per_page' => $number,
            'meta_query' => array(
                array(
                    'key' => 'event_layout', // Meta key for the event date
                    'value' => $today,
                    'compare' => '>=',
                    'type' => 'NUMERIC'
                )
            ),
            'orderby' => 'meta_value',
            'order' => 'ASC'
        );

        $events_query = new WP_Query($query_args);

        ?>
<div class="events-widget">
    <h2 class="widget-title"><?php echo esc_html($title); ?></h2>

    <?php
            if ($events_query->have_posts()) :
                echo '<ul class="events-list">';
                while ($events_query->have_posts()) : $events_query->the_post();
                    ?>
    <li class="event-item">
        <h3><?php the_title(); ?></h3>

        <?php if (have_rows('event_layout')): // Check for flexible content field
                            while (have_rows('event_layout')): the_row();
                                if (get_row_layout() == 'event_details'):
                                    // Output event details here (you can customize this part)
                                    ?>
        <p><?php the_sub_field('event_detail_field'); ?></p>
        <?php
                                endif;
                            endwhile;
                        else:
                            echo '<p>No event details available.</p>';
                        endif; ?>

        <a href="<?php the_permalink(); ?>">Read More</a>
    </li>
    <?php
                endwhile;
                echo '</ul>';
            else:
                echo '<p>No upcoming events found.</p>';
            endif;

            wp_reset_postdata();
            ?>
</div>
<?php

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Upcoming Events', 'textdomain');
        $number = !empty($instance['number']) ? $instance['number'] : 5;
        ?>
<p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'textdomain'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
        name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
</p>
<p>
    <label
        for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of Events to Show:', 'textdomain'); ?></label>
    <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>"
        type="number" value="<?php echo esc_attr($number); ?>" min="1" step="1">
</p>
<?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['number'] = (!empty($new_instance['number'])) ? absint($new_instance['number']) : 5;
        return $instance;
    }
}

function register_upcoming_events_widget() {
    register_widget('Upcoming_Events_Widget');
}
add_action('widgets_init', 'register_upcoming_events_widget');
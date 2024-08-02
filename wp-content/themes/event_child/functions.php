<?php
    function event_child_theme_enqueue_styles(){
        wp_enqueue_style("parent-style", get_template_directory_uri() ."/style.css", array(), wp_get_theme()->parent()->get('Version'));
    }
    add_action('wp_enqueue_scripts','event_child_theme_enqueue_styles');


    class Event_Categories_Widget extends WP_Widget {

        public function __construct() {
            parent::__construct(
                'event_categories_widget',
                __('Event Categories Widget', 'text_domain'),
                array('description' => __('A widget to display event categories.', 'text_domain'))
            );
        }
    
        public function widget($args, $instance) {
            $title = apply_filters('widget_title', $instance['title']);
    
            echo $args['before_widget'];
            if (!empty($title)) {
                echo $args['before_title'] . $title . $args['after_title'];
            }
    
            $taxonomy = 'event_category'; // Your custom taxonomy
    
            $terms = get_terms(array(
                'taxonomy' => $taxonomy,
                'hide_empty' => true, // Set to false if you want to show categories with no posts
            ));
    
            if (!empty($terms) && !is_wp_error($terms)) {
                echo '<ul>';
                foreach ($terms as $term) {
                    $term_link = get_term_link($term);
                    echo '<li><a href="' . esc_url($term_link) . '">' . esc_html($term->name) . '</a></li>';
                }
                echo '</ul>';
            } else {
                echo '<p>No categories found.</p>';
            }
    
            echo $args['after_widget'];
        }
    
        public function form($instance) {
            $title = !empty($instance['title']) ? $instance['title'] : __('Event Categories', 'text_domain');
            ?>
<p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
        name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
</p>
<?php
        }
    
        public function update($new_instance, $old_instance) {
            $instance = array();
            $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
            return $instance;
        }
    }
    
    function register_event_categories_widget() {
        register_widget('Event_Categories_Widget');
    }
    add_action('widgets_init', 'register_event_categories_widget');
    
?>
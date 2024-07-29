<?php
/**
 * Template Name: Upcoming Events
 */
get_header(); ?>

<div class="events-container">
    <h1>Upcoming Events</h1>

    <?php
    // Query for upcoming events
    $today = date('Ymd'); // Current date in YYYYMMDD format
    $args = array(
        'post_type' => 'events',
        'posts_per_page' => -1,
        'meta_key' => 'event_layout',
        'meta_value' => $today,
        'meta_compare' => '>=',
        'orderby' => 'meta_value',
        'order' => 'ASC'
    );
    $events_query = new WP_Query($args);

    if ($events_query->have_posts()) :
        echo '<ul class="events-list">';
        while ($events_query->have_posts()) : $events_query->the_post();
            ?>
    <li class="event-item">
        <h2><?php the_title(); ?></h2>

        <?php if (have_rows('event_layout')): // Check if flexible content field exists
                    while (have_rows('event_layout')): the_row();
                        if (get_row_layout() == 'Event_Details'): // Adjust this if needed
                            ?>
        <p>Date: <?php the_sub_field('event_date'); ?></p>
        <p>Location: <?php the_sub_field('event_location'); ?></p>
        <p>Organizer Name: <?php the_sub_field('organizer_name'); ?></p>
        <p>Organizer Email: <?php the_sub_field('organizer_email'); ?></p>
        <p>Contact: <?php the_sub_field('organizer_contact'); ?></p>
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

<?php get_footer(); ?>
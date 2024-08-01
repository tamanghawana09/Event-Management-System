<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<?php
/**
 * Template Name: Upcoming Events
 */
get_header();
?>
<div class="events-container">
    <h1>Upcoming Events</h1>

    <?php
    // Query for upcoming events
    $today = date('Ymd'); 
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
    ?>

    <?php
    if ($events_query->have_posts()) :
        echo '<div class="grid">';
        while ($events_query->have_posts()) : $events_query->the_post(); ?>
    <div class="card">
        <div class="card-body">
            <div class="event-item">
                <h2><?php the_title(); ?></h2>
                <?php if (have_rows('event_layout')):
                            while (have_rows('event_layout')): the_row();
                                if (get_row_layout() == 'event_details'): ?>
                <p class="event-p">Date: <?php the_sub_field('event_date'); ?></p>
                <p class="event-p">Location: <?php the_sub_field('event_location'); ?></p>
                <p class="event-p">Organizer Name: <?php the_sub_field('organizer_name'); ?></p>
                <?php
                                endif;
                            endwhile;
                        else:
                            echo '<p>No event details available.</p>';
                        endif; ?>
                <a class="read-more" href="<?php the_permalink(); ?>">Read More</a>
            </div>
        </div>
    </div>
    <?php
        endwhile;
        echo '</div>';
    else:
        echo '<p>No upcoming events found.</p>';
    endif;

    wp_reset_postdata();
    ?>

</div>

<?php get_footer(); ?>
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

    <!-- Filter Form -->
    <div class="form">
        <form method="GET" class="filter-form">
            <input type="text" name="event_location" placeholder="Location"
                value="<?php echo isset($_GET['event_location']) ? esc_attr($_GET['event_location']) : ''; ?>">
            <input type="text" name="organizer_name" placeholder="Organizer"
                value="<?php echo isset($_GET['organizer_name']) ? esc_attr($_GET['organizer_name']) : ''; ?>">
            <input type="date" name="event_date" placeholder="Date"
                value="<?php echo isset($_GET['event_date']) ? esc_attr($_GET['event_date']) : ''; ?>">
            <input class="btn" type="submit" value="Filter">
        </form>
    </div>


    <?php
    // Query for upcoming events
    $today = date('Ymd');
    $meta_query = array('relation' => 'AND');

    // Adjust meta query to match your meta keys
    if (!empty($_GET['event_date'])) {
        $meta_query[] = array(
            'key' => 'event_layout_0_event_date',
            'value' => $_GET['event_date'],
            'compare' => '='
        );
    }

    if (!empty($_GET['event_location'])) {
        $meta_query[] = array(
            'key' => 'event_layout_0_event_location',
            'value' => $_GET['event_location'],
            'compare' => 'LIKE'
        );
    }

    if (!empty($_GET['organizer_name'])) {
        $meta_query[] = array(
            'key' => 'event_layout_0_organizer_name',
            'value' => $_GET['organizer_name'],
            'compare' => 'LIKE'
        );
    }

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $args = array(
        'post_type' => 'events',
        'posts_per_page' => 10, // Number of posts per page
        'paged' => $paged,
        'meta_query' => $meta_query,
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
    <?php endwhile;
        echo '</div>';

        // Pagination
        $big = 999999999; // need an unlikely integer
        echo '<div class="pagination">';
        echo paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, $paged),
            'total' => $events_query->max_num_pages
        ));
        echo '</div>';
    else:
        echo '<p>No upcoming events found.</p>';
    endif;

    wp_reset_postdata();
    ?>

</div>

<?php get_footer(); ?>
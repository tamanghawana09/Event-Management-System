<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<?php
/**
 * Template Name: Events Archive
 */
?>
<?php get_header(); ?>

<div class="events-archive">
    <h1>Events</h1>

    <?php if (have_posts()) : ?>
    <div class="grid">
        <?php while (have_posts()) : the_post(); ?>
        <div class="card">
            <div class="card-body">
                <a class="event-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php if (have_rows('event_layout')):
                            while (have_rows('event_layout')): the_row();
                                if (get_row_layout() == 'event_details'): ?>
                <p class="event-p">Date: <?php the_sub_field('event_date'); ?></p>
                <p class="event-p">Location: <?php the_sub_field('event_location'); ?></p>
                <p class="event-p">Organizer Name: <?php the_sub_field('organizer_name'); ?></p>
                <?php endif;endwhile;
                else:
                    echo '<p>No event details available.</p>';
                endif; ?>
            </div>
        </div>
        <?php endwhile; ?>
    </div>

</div>

<div class="pagination mt-4">
    <?php 
            // Pagination
            echo paginate_links(array(
                'total' => $wp_query->max_num_pages
            ));
            ?>
</div>
</div>
<?php else: ?>
<p>No events found.</p>
<?php endif; ?>
</div>

<?php get_footer(); ?>
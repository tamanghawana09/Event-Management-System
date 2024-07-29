<?php get_header(); ?>

<div class="events-archive">
    <h1>Events Archive</h1>

    <?php if (have_posts()) : ?>
    <ul class="events-list">
        <?php while (have_posts()) : the_post(); ?>
        <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <p><?php the_field('event_date'); ?></p> <!-- Adjust if using Flexible Content -->
            <p><?php the_field('event_location'); ?></p> <!-- Adjust if using Flexible Content -->
        </li>
        <?php endwhile; ?>
    </ul>

    <div class="pagination">
        <?php 
            // Pagination
            echo paginate_links(array(
                'total' => $wp_query->max_num_pages
            ));
            ?>
    </div>
    <?php else: ?>
    <p>No events found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
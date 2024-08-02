<?php get_header(); ?>

<div class="main-content-wrapper">
    <main class="main-content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>

        <?php if (have_rows('event_layout')):  ?>
        <?php while (have_rows('event_layout')): the_row(); ?>
        <?php if (get_row_layout() == 'event_details'): ?>

        <div class="event-details">
            <?php the_content(); ?>

            <ul>
                <li class="event-info">Date: <?php the_sub_field('event_date'); ?></li>
                <li class="event-info">Location: <?php the_sub_field('event_location'); ?></li>
                <li class="event-info">Organizer Name: <?php the_sub_field('organizer_name'); ?></li>
                <li class="event-info">Organizer Email: <?php the_sub_field('organizer_email');?></li>
                <li class="event-info">Contact: <?php if (have_rows('organizer_contact')):?>

                    <?php while(have_rows('organizer_contact')): the_row();?>

                    <?php if(get_sub_field('contact_number')): the_sub_field('contact_number');?>,
                    <?php endif?>

                    <?php endwhile;?>

                    <?php endif;?>
                </li>
            </ul>

        </div>
        <?php endif; ?>
        <?php endwhile; ?>
        <?php else: ?>
        <p>No event details available.</p>
        <?php endif; ?>

        <?php endwhile; endif; ?>
    </main>

    <?php get_footer(); ?>
</div>
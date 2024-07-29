<?php echo "This is single events page"?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<h1><?php the_title(); ?></h1>

<?php if (have_rows('event_layout')):  ?>
<?php while (have_rows('event_layout')): the_row(); ?>
<?php if (get_row_layout() == 'event_details'): ?>

<div class="event-details">
    <p>Date: <?php the_sub_field('event_date'); ?></p>
    <p>Location: <?php the_sub_field('event_location'); ?></p>
    <p>Organizer Name: <?php the_sub_field('organizer_name'); ?></p>
    <p>Organizer Email: <?php the_sub_field('organizer_email');?></p>
    <p>Contact: <?php if (have_rows('organizer_contact')):?>

        <?php while(have_rows('organizer_contact')): the_row();?>

        <?php if(get_sub_field('contact_number')): the_sub_field('contact_number');?>,
        <?php endif?>

        <?php endwhile;?>

        <?php endif;?>
    </p>
</div>

<?php endif; ?>
<?php endwhile; ?>
<?php else: ?>
<p>No event details available.</p>
<?php endif; ?>

<?php the_content(); ?>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
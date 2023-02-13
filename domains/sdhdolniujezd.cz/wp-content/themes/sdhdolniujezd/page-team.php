<?php
/* Template Name: Team Page */
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php get_header(); ?>


<?php
echo get_field('aaa');

echo get_field('aaa', 'option');

$args = array(
    'post_type' => 'Sport',
    'post_status' => 'publish',
    'posts_per_page' => -1,
);

$sport = new WP_Query($args);
if ($sport->have_posts()) :
    while ($sport->have_posts()) :
        $sport->the_post();
        $script_mista = "";
        ?>
        <span id='mapa-btn-<?php echo get_the_ID(); ?>' class='terminy-mista-mapa-list-btn' onclick='terminyMapy(<?php echo get_field('jmeno') . ', ' . get_field('prijmeni') . ', "' . get_field('image') . '", ' . get_the_ID(); ?>)'><?php the_title(); ?></span>
        
        <?php
    endwhile;
    wp_reset_postdata();
endif;

echo get_the_title();
?>


<?php get_footer(); ?>



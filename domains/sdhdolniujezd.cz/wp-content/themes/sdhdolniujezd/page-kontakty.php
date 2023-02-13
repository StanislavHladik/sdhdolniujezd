<?php
get_header();

if (have_posts()):
    while (have_posts()) : the_post();
        ?>

        <div class="obsah"> 
            <div class="member">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </div>
            <br>
        </div>

        <?php
    endwhile;
else :
    echo '<p>No content found</p>';
endif;

get_footer();
?>


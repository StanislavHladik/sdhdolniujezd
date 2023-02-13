<?php
$current_page = get_queried_object();
$category =  $current_page->post_name ?? 'Aktuality' ;
$postNumber = 0;
//$category = $current_page->post_name;

/*
if (empty($category)) {
  $category = 'Aktuality';
}
*/

if ($category == 'tym') {
  $category = 'Sport';
}

$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$args = array(
    'paged' => $paged,
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => $category,
    'posts_per_page' => 6,
);
$arr_posts = new WP_Query($args);
?>

<div class="content">
    <div class="member"><?php
        if ($arr_posts->have_posts()):
            while ($arr_posts->have_posts()) : $arr_posts->the_post();
                if ($postNumber % 2 == 0) {
                    ?>
                    <!--Oddíl odkazu na každý lichý článek-->    
                    <a href="<?php the_permalink(); ?>">                          
                        <div class="post">  
                            <div class="hideLeftText">
                                <h2><?php the_title(); ?></h2>
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="leftImage">                                
                                <?php
                                set_post_thumbnail_size(500, 500, true);
                                the_post_thumbnail();
                                ?> 
                            </div>
                            <div class="rightText">
                                <h2><?php the_title(); ?></h2>
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                        <!----------------------------------------------------------------> 
                    </a>
                    <?php
                } else {
                    ?>
                    <!--Oddíl odkazu na každý druhý článek--> 
                    <a href="<?php the_permalink(); ?>">
                        <div class="post">  
                            <div class="leftText">
                                <h2><?php the_title(); ?></h2>
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="rightImage">                                
                                <?php
                                set_post_thumbnail_size(500, 500, true);
                                the_post_thumbnail();
                                ?> 
                            </div>
                        </div>
                        <!---------------------------------------------------------------->
                    </a>
                    <?php
                }
                $postNumber++;
            endwhile;
            ?> 
            <div class="strankovani">
                <?php            
                echo paginate_links(array(
                    'base' => get_pagenum_link(1) . '%_%',
                    'format' => '/page/%#%',
                    'total' => $arr_posts->max_num_pages,
                ));

                wp_reset_postdata();
                ?> 
            </div>
            <?php
        else :
            echo '<p>No content found</p>';
        endif;
        ?>     
    </div>
</div>
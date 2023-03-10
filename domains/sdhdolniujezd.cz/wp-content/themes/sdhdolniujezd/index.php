<?php
get_header();
$current_page = get_queried_object();
$category =  $current_page->post_name ?? 'Aktuality' ;
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
    'posts_per_page' => 3,
);
$arr_posts = new WP_Query($args);

//$videoName = getFirstVideo();
$videosNames = getVideos();
$substr = get_field('pozadi_videa', 'options');
$imagesNames = getBackgroundImages();
//$imagesNames = getBackgroundImagesPosts($arr_posts);
?>
<script>

    var activeVideo = 0;

    function videoFunction() {

        var myvid = document.getElementById('myvideo');
        var myvids = <?php echo json_encode($videosNames); ?>;
        // update the active video index
        activeVideo = (++activeVideo) % myvids.length;

        // update the video source and play
        myvid.src = myvids[activeVideo];
        myvid.play();
    }

    var images = <?php echo json_encode($imagesNames); ?>;
    var index = 1;

    function rotateImage() {

        jQuery('#backgroundImage').fadeOut('slow', function()
        {
            jQuery(this).attr('src', images[index]);

            jQuery(this).fadeIn('slow', function()
            {
                if (index === images.length - 1)
                {
                    index = 0;
                }
                else
                {
                    index++;
                }
            });
        });
    }

    jQuery(document).ready(function()
    {
        setInterval(rotateImage, 10000);
    });


</script>
<?php
if (basename($_SERVER['REQUEST_URI']) == '') {
    ?>
    <div class="container">      
        <div class="backgroundImageDiv">
            <img id="backgroundImage" src = "<?php echo $imagesNames[0]; ?>">
        </div>
        <div class="content">
            <div class="member"><?php
                if (have_posts()):
                    while (have_posts()) : the_post();                    
                        if ($postNumber % 2 == 0)
                        {
                        ?>
                        <!--Odd??l odkazu na ka??d?? lich?? ??l??nek-->    
                        <a href="<?php the_permalink(); ?>">                          
                            <div class="post">  
                                <div class="hideLeftText">
                                    <h2><?php the_title(); ?></h2>
                                    <?php the_excerpt(); ?>
                                </div>
                                <div class="leftImage">                                
                                    <?php 
                                        set_post_thumbnail_size( 500, 500, true);
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
                        }
                        else
                        {
                        ?>
                        <!--Odd??l odkazu na ka??d?? druh?? ??l??nek--> 
                        <a href="<?php the_permalink(); ?>">
                            <div class="post">  
                                <div class="leftText">
                                    <h2><?php the_title(); ?></h2>
                                    <?php the_excerpt(); ?>
                                </div>
                                <div class="rightImage">                                
                                    <?php 
                                        set_post_thumbnail_size( 500, 500, true);
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
                    posts_nav_link();
                else :
                    echo '<p>No content found</p>';
                endif;
                ?>     
            </div>
        </div>
    </div>   
    <?php
} else {
    ?>
    <div class="container"> 
        <div class="member"><?php
            if (have_posts()):
                while (have_posts()) : the_post();
                    ?>
                    <div>
                        <?php
                if ($postNumber % 2 == 0) {
                    ?>
                    <!--Odd??l odkazu na ka??d?? lich?? ??l??nek-->    
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
                    <!--Odd??l odkazu na ka??d?? druh?? ??l??nek--> 
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
                ?>                   
                    </div>
                    <?php
                endwhile;
            else :
                echo '<p>No content found</p>';
            endif;
            ?>     
        </div>
    </div>
<?php } ?>
<?php get_footer(); ?><?php
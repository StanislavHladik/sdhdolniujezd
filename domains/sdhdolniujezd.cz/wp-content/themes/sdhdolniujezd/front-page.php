<?php
get_header();
$current_page = get_queried_object();
$category = $current_page->post_name ?? 'Aktuality';
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

//$videoName = getFirstVideo();
$videosNames = getVideos();
$substr = get_field('pozadi_videa', 'options');
//$imagesNames = getBackgroundImages();
$imagesNames = getBackgroundImagesPosts($arr_posts);
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
    var index = 0;

    function rotateImage() {
        if (index === images.length - 1)
        {
            index = 0;
        } else
        {
            index++;
        }

        jQuery('#backgroundImage').fadeOut('slow', function ()
        {
            jQuery(this).attr('src', images[index][0]);
            jQuery('#backgroundImageP').text(images[index][1]);
            jQuery('#backgroundImageA').attr('url', images[index][2]);

            jQuery(this).fadeIn('slow', function ()
            {

            });
        });
    }

    function rotateImageBack() {
        if (index === 0)
        {
            index = images.length - 1;
        } else
        {
            index--;
        }

        jQuery('#backgroundImage').fadeOut('slow', function ()
        {
            jQuery(this).attr('src', images[index][0]);
            jQuery('#backgroundImageP').text(images[index][1]);
            jQuery('#backgroundImageA').attr('url', images[index][2]);

            jQuery(this).fadeIn('slow', function ()
            {

            });
        });
    }

    jQuery(document).ready(function ()
    {
        setInterval(rotateImage, 20000);
    });


</script>
<?php include 'container.php'; ?>
<?php get_footer(); ?><?php

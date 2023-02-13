<?php
/*
Template Name: Search Page
*/
get_header();
?>

<?php
$current_page = get_queried_object();
$category = $current_page->post_name;
if (basename($_SERVER['REQUEST_URI']) == '') {
    ?>
    <div class="container">     
        <div class="backgroundImageDiv">
            <img id="backgroundImage" src = "<?php echo $imagesNames[0]; ?>">
        </div>
    </div>   
    <?php
} else {
    ?>
        <div class="container">     
            <h2 class="nadpis"><?php echo ucfirst($category) ?></h2>
        <?php
        get_search_form(); 
        ?>
    </div> 
<?php } ?>
<a href="content.php"></a>

<?php
get_footer();
?>
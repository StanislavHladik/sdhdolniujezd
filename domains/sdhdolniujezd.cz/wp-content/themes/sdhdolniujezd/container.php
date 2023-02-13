<?php
$current_page = get_queried_object();
$category = $current_page->post_name ?? 'Aktuality';
//$category = $current_page->post_name;
if (basename($_SERVER['REQUEST_URI']) == '') {
    ?>
    <div class="container">   
        <div class="backgroundImageDiv">
            <a id="backgroundImageA" href="<?php echo $imagesNames[0][2]; ?>">
                <div class="backgroundImagePopis">
                    <p id="backgroundImageP"><?php echo $imagesNames[0][1]; ?></p>
                </div>
                <img id="backgroundImage" src = "<?php echo $imagesNames[0][0]; ?>">
            </a>
            <button class="leftArrow" onclick="rotateImageBack()">
                <img src="https://sdhdolniujezd.stanislavhladik.cz/wp-content/themes/sdhdolniujezd/images/leftArrow.png">
            </button>
            <button class="rightArrow" onclick="rotateImage()">
                <img src="https://sdhdolniujezd.stanislavhladik.cz/wp-content/themes/sdhdolniujezd/images/rightArrow.png">
            </button>
        </div>

        <?php include 'content.php'; ?>
    </div>   
    <?php
} else {
    ?>
    <div class="container">     
        <h2 class="nadpis"><?php echo ucfirst($category) ?></h2>
        <?php include 'content.php'; ?>
    </div> 
<?php } ?>




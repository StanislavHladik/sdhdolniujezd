<!DOCTYPE html>
<html>  
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="/wp-content/themes/sdhdolniujezd/custom.css">
        <script type="text/javascript" src="/wp-content/themes/sdhdolniujezd/js/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="/wp-content/themes/sdhdolniujezd/js/script.js"></script>
        <link rel="icon" href="/wp-content/themes/sdhdolniujezd/images/icon.png" >   
        <title><?php bloginfo('name'); ?></title>
        <?php wp_head(); ?>
    </head>
    <body>   
        <header class="site-header">
            <div class="div_obrazek">
                <a href="<?php echo network_site_url(); ?>">
                    <img class="nadpis_obrazek" src="/wp-content/themes/sdhdolniujezd/images/SDH_nadpis.png" alt="SDH DOLNÍ ÚJEZD">
                    <!--SDH Dolní Újezd-->
                </a>
            </div>
        </header><!-- /site-header -->

        <div class="menu-trigger">
            <input type="checkbox" id="checkbox1" class="checkbox1 visuallyHidden">
            <label for="checkbox1">
                <div class="hamburger hamburger1">
                    <span class="bar bar1"></span>
                    <span class="bar bar2"></span>
                    <span class="bar bar3"></span>
                    <span class="bar bar4"></span>
                </div>
            </label>
        </div>

        <!--<div class="toolbar"> -->
        <nav class="menu-primary-menu-links-container-nav">
            <div class="search_bar">
                <img class="search_obrazek" id="search_obrazek_1" src="/wp-content/themes/sdhdolniujezd/images/search_white.png" alt="Hledání" onclick="showSearchPanel()">
                <div class = "div_search" id="div_search_1">    
                    <div>           
                        <?php
                        get_search_form();
                        ?>
                    </div>
                </div>
                <a href="<?php echo network_admin_url(); ?>">
                    <img class="search_obrazek" src="/wp-content/themes/sdhdolniujezd/images/user_white.png" alt="Hledání">  
                </a>
            </div>
            <?php
            $args = array(
                'theme_location' => 'primary'
            );
            ?>             
            <?php wp_nav_menu($args); ?>
        </nav>
        <!--</div>-->

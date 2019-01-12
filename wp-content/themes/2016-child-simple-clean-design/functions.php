<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

add_action( 'twentysixteen_credits', 'twentysixteen_clean_design_credits_handler' );
function twentysixteen_clean_design_credits_handler(){
    ?>
    Theme Designed by <a href="https://www.tipsandtricks-hq.com/wordpress-twenty-sixteen-2016-child-theme-simple-clean-design-8509" target="_blank">Tips and Tricks HQ</a> |
    <?php
}

<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function wpcampus_body_classes( $classes ) {
    // Adds a class of no-sidebar to custom no-sidebar page template.
    if ( is_page_template('page-no-sidebar.php') ) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter( 'body_class', 'wpcampus_body_classes' );

add_filter( 'wpmem_login_redirect', 'my_login_redirect', 10, 2 );
function my_login_redirect( $redirect_to, $user_id ) {
    
    // This will redirect to https://yourdomain.com/your-page/
    return home_url( '/posts/' );

}

add_filter( 'logout_url', 'my_logout_url' );
function my_logout_url( $url ) {
    return 'http://localhost:81/ecovox';
}
?>
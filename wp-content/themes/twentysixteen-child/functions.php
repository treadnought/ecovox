<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
    wp_enqueue_style( 'datatables-style', '//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css' );
    wp_enqueue_script( 'datatables-script', '//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js' );
}

add_filter( 'wpmem_login_redirect', 'my_login_redirect', 10, 2 );
function my_login_redirect( $redirect_to, $user_id ) {
    
    // This will redirect to https://yourdomain.com/your-page/
    return home_url( '/posts/' );

}

add_filter( 'logout_url', 'my_logout_url' );
function my_logout_url( $url ) {
    return 'http://localhost:81/ecovox';
}

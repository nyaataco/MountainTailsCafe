<?php
add_action( 'wp_enqueue_scripts', 'astra_child_enqueue_styles' );
function astra_child_enqueue_styles() {
    wp_enqueue_style( 'astra-child-style', get_stylesheet_uri(), array( 'astra-theme-css' ), '1.0.0' );
}

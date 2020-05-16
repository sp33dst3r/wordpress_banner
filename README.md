# wordpress_banner

Скопируйте в папку /plugin

В файле functions.php ( в теме) зарегистрируйте sidebar

	add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
	
    register_sidebar( array(
        'name' => __( 'Header widget', 'twentytwenty' ),
        'id' => 'sidebar-my-header',
        'before_widget' => '<div class = "My Widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
	
	 register_sidebar( array(
        'name' => __( 'Footer widget', 'twentytwenty' ),
        'id' => 'sidebar-my-footer',
        'before_widget' => '<div class = "My Widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
}


В header и footer - вызовите sidebar

<?php if ( is_active_sidebar( 'sidebar-my-header' ) ) {
    // header
    dynamic_sidebar( 'sidebar-my-header' );
}?>

<?php if ( is_active_sidebar( 'sidebar-my-footer' ) ) {
  // footer
	dynamic_sidebar( 'sidebar-my-footer' );
}?>


Теперь если появившийся виджет ( в админке) разместить в хедер-сайдбаре - на сайте он появится в хедере, если в футер сайдбаре - то в футере.
http://prntscr.com/shyq58

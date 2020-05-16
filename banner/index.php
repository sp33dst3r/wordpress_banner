<?php
/**
 * Plugin Name: HelloBar
 * Plugin URI: .
 * Description: A simple call to action widget.
 * Version: 1.0
 * Author: Ruslan
 * Author URI: .
 */

class HelloBar_Widget extends WP_Widget {
    function __construct() {

        $widget_options = array (
            'classname' => 'HelloBar_Widget',
            'description' => 'Add a call to action box with your own text and link.'
        );

        parent::__construct( 'HelloBar_Widget', 'Hellobar', $widget_options );

    }

    //function to output the widget form

    function form( $instance ) {

        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
        $text = ! empty( $instance['text'] ) ? $instance['text'] : 'Если у Вас есть вопросы – пожалуйста напишите нам:';
        ?>
        
        
        <p>
            <label for="<?php echo $this->get_field_id( 'title'); ?>">Title:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" /></p>


        <p>
            <label for="<?php echo $this->get_field_id( 'text'); ?>">Текст:</label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" value="<?php echo esc_attr( $text ); ?>" /></p>

       


    <?php }

    //function to define the data saved by the widget

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
         $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['text'] = strip_tags( $new_instance['text'] );
        return $instance;

    }

    //function to display the widget in the site

    function widget( $args, $instance ) {
        //define variables
        $title = apply_filters( 'widget_title', $instance['title'] );
        $text = $instance['text'];
        

        //output code
        echo $args['before_widget'];
        ?>
		<style>
			.banner{
				background-color: blue;
				padding: 20px;
				color: #fff;
				text-align: center;
			}
			.banner h3{
				margin-top: 0;
				font-size: 30px;
				margin-bottom: 20px;
				line-height: 1;
			}
			.banner div{
				font-size: 16px;
				line-height: 1;
			}
		</style>

        <div class="banner">
			<h3><?=$title?></h3>
			<div><?=$text?></div>
        </div>

        <?php /*

        <div class="cta">
            <?php if ( ! empty( $title ) ) {
                echo $before_title . $title . $after_title;
            };
            echo '<a href="' . $link . '">' . $text . '</a>';
            ?>
        </div>
 */?>

        <?php
        echo $args['after_widget'];

    }
}

//function to register the widget
function kinsta_register_cta_widget2() {

    register_widget( 'HelloBar_Widget' );

}
add_action( 'widgets_init', 'kinsta_register_cta_widget2' );

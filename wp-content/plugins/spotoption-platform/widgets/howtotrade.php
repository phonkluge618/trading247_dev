<?php
add_action( 'widgets_init', create_function( '', 'register_widget( "How_to_trade" );' ) );

/**
 * Adds Login_Widget widget.
 */
class How_to_trade extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'How_to_Trade', // Base ID
			'How_to_Trade', // Name
			array( 'description' => __( 'How to trade widget', 'spot' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		wp_register_script( 'howtotrade', get_spot_plugin_path() . '/js/howtotrade.js', FALSE, FALSE, TRUE);
		wp_enqueue_script( 'howtotrade' );
		
		$parent = get_page_by_title( 'how to trade' );
	
		$args = array(
						'post_type' => 'page',
						'posts_per_page' => 4,
						'post_parent' => $parent->ID,
						'orderby' => 'menu_order',
						);
		query_posts($args);
		
		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
		

		
		$html ='<div class="how_to_trade">';
		$html .='    <br/>   ';
		$html .='    <div class="title"> How to Trade </div>    ';
		$html .='    <ul class="howToTradeTabs">  ';
		$html .='    <br/>   ';
		$count = 1;
		if ( have_posts() ): 
			while ( have_posts() ) : the_post();
				global $post;
				if($count++ == 1)
					$html .= '<li class="'.$post->post_name.' selected ">'.get_the_title().'</li>';		
				else
					$html .= '<li class="'.$post->post_name.' ">'.get_the_title().'</li>';		
			endwhile;
		endif;
		

		$html .='    </ul>    ';
		
		$html .='    <div class="text">';
		$count = 1;
		if (have_posts()): 
			while(have_posts()): the_post();
				global $post;
				if($count++ == 1)
					$html .= '<ul class="steps '.$post->post_name.' ">';							
				else
					$html .= '<ul class="steps '.$post->post_name.' hidden">';
					$html .= get_the_content();
					$html .= '</ul>';
					
			endwhile;
		endif;
		wp_reset_query();
		$html .='    </div>        ';
		$html .='	<div class="bottonHow2treade"></div>';
		$html .='	<div class="cb"></div>';
		$html .='</div>';

		echo $html;
		echo $after_widget;
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );


		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance ) ) {
			$title = $instance[ 'title' ];
	
		}
		else {
			$title = __( 'How to trade', 'spot' );

		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		
		<?php 
	}

} // class Login_Widget
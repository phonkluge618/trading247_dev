<?php

add_action( 'widgets_init', create_function( '', 'register_widget( "Login_widget" );' ) );



/**
 * Adds Login_Widget widget.
 */
class Login_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'Login_widget', // Base ID
			'Login_Widget', // Name
			array( 'description' => __( 'A Login Widget', 'spot' ), ) // Args
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

		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
		
		$html ='<div id="userSection">';
		$html .='	<div id="loggedInBox" class="hidden">';
		$html .='		<div class="firstLine">';
                $html .='			<div class="welcometext">'. __('Welcome :','spot').'</div>';
		$html .='			<div class="welcome"></div>';
                $html .='			<div class="balanceText">'. __('Balance :','spot').'</div>';
		$html .='			<div class="balance"></div>';
		$html .='			<form  method="POST" class="logoutForm" action="http://'.get_option('platform_url').'/Login/logout">';
		$html .='				<input type="submit" class="logoutLink" value="'. __('Logout','spot').'">';
		$html .='				<input type="hidden" name="extRedir" value="'.get_bloginfo('url').'/"/>';
		$html .='			</form>';
		$html .='		</div>';
		$html .='	<div class="serviceLinks allAct">';
		$html .= wp_nav_menu( array( 'container'=> false, 'container_class' => 'menu-header', 'menu_class'=>'logged_in_menu', 'theme_location' => 'logged-menu', 'echo'=>0 ) ); 
	
		$html .='	</div>';
		$html .='</div>';
		$html .='	<div id="userLoginForm">';
		$html .='		<form  method="POST" class="loginForm" action="http://'.get_option('platform_url').'/login/login">';
		$html .='			<input type="text" name="email" value="Email" class="text" default="Email">					';
		$html .='			<input type="password" name="password" class="textField  password" value="">';
		$html .='			<input type="submit" name="sendit" class="submit" value="'. __('Login','spot').'">';
		$html .='		</form>';
		$html .='	</div>';
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
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'spot' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}

} // class Login_Widget
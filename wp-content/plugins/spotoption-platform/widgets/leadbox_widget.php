<?php
/*
	Lead box widget
*/
add_action( 'widgets_init', create_function( '', 'register_widget( "lead_Widget" );' ) );
class lead_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'lead_widget', // Base ID
			'Lead_Widget', // Name
			array( 'description' => __( 'Spotoption Lead box', 'spot' ), ) // Args
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
		if (spot_loggedin()) return;
		extract( $args );		
		$title = apply_filters( 'widget_title', $instance['title'] );
		$url =  $instance['url'] ;

		wp_register_script( 'leadbox', get_spot_plugin_path() . '/js/leadbox.js', FALSE, FALSE, TRUE);
		wp_enqueue_script( 'leadbox' );
		
		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
		?>
			<form action="<?php echo $url;?>" method="POST" id="needHelp" name="specialNeedHelp">
            <table class="need_help_table" cellpadding="0" cellspacing="0">
                <tbody><tr>
                    <td >
                      
                            <input class="medBG first" type="text" name="FirstName" default="<?php _e('First Name','spot');?>" value="<?php _e('First Name','spot');?>">
                    </td>
					<td>
                            <input type="text" class="medBG last"  name="LastName" default="<?php _e('Last Name','spot');?>" value="<?php _e('Last Name','spot');?>">
                       
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
						<select class="countrylist selectbox " id="country" name="Country">	
						           
						</select>
                    </td>
                </tr>                    
                <tr>
                    <td colspan="2">
                        <div class="bigBG">
                            <input type="text" name="email" default="<?php _e('Email','spot');?>" value="<?php _e('Email','spot');?>">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td id="phones" colspan="2">
                        <input type="text" name="Prefix" class="tny" default="<?php _e('Prefix','spot');?>" value="" maxlength="4">
                        <input type="text" name="Area" class="tny" default="<?php _e('Area','spot');?>" value="" maxlength="4">
                        <input type="text" name="Phone" class="mid" default="My Phone" value="<?php _e('My Phone','spot');?>" maxlength="20">                        
                    </td>
                </tr>
                <tr class="checkBoxTr">
					
                    <td id="checkBx" colspan="2">
						<div id="headphones"></div>
                        <input type="checkbox" checked="checked">
                        <label><?php _e("I'd like to speak with a trading coach",'spot');?></label>
                    </td>
                </tr>
            </tbody></table>
            <?php wp_nonce_field('leadBox','leadBox'); ?>
			<input type="hidden" name="campaignId" value="<?php echo @$campaignId ?>" />
			<input type="hidden" name="subCampaign" value="<?php echo @$subCampaign ?>" />
			<input type="hidden" value="<?php echo @$aid; ?>" name="a_aid">
			<input type="hidden" value="<?php echo @$bid; ?>" name="a_bid">
			<input type="hidden" value="<?php echo @$cid; ?>" name="a_cid">
            <input type="submit" class="submit" value="Open Account">             
			<input type="hidden" value="1" name="specialNeedHelp">
            <input type="hidden" value="1" name="registerAsLead">
			<div class="errors"></div>
        </form>
		
		<?php
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
		$instance['url'] = strip_tags( $new_instance['url'] );

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
			$title = __( 'Start trading now', 'spot' );
		}
		if ( isset( $instance[ 'url' ] ) ) {
			$url = $instance[ 'url' ];
		}
		else {
			$url = __( '/OpenAccount', 'spot' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e( 'Url:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>" />
		</p>
		
		<?php 
	}

} // class Foo_Widget
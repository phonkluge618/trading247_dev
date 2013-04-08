<?php
// create custom plugin settings menu
add_action('admin_menu', 'spot_create_menu');

function spot_create_menu() {

	//create new top-level menu
	add_menu_page('SPOT Plugin Settings', 'Platform Settings', 'administrator', __FILE__, 'baw_settings_page',plugins_url('/images/icon.png', __FILE__));

	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}


function register_mysettings() {
	//register our settings
	register_setting( 'spot-settings-group', 'platform_url' );
	register_setting( 'spot-settings-group', 'use_bootstrap_css' );
	register_setting( 'spot-settings-group', 'use_so_custom_css' );
}

function baw_settings_page() {
?>
<div class="wrap">
<h2><?php _e('Spotoption Platform settings','spot');?></h2>
<p>
	Use this section to setup the platform as you see fit.
</p>
<form method="post" action="options.php">
    <?php settings_fields( 'spot-settings-group' ); ?>
    <?php //do_settings_fields( 'spot-settings-group' , 'option_etc'); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row"><?php _e('platform Url','spot');?></th>
        <td><input type="text" name="platform_url" value="<?php echo get_option('platform_url'); ?>" /></td>
		<td class="notes"><?php _e('The link to the main platform, all ajax calls will be against this link','spot');?></td>
        </tr>
         
        <tr valign="top">
        <th scope="row"><?php _e('Use Bootstrap CSS','spot');  ?></th>
        <td><input type="checkbox" name="use_bootstrap_css" <?php if(get_option('use_bootstrap_css')) echo 'checked' ;?>  /></td>
		<td class="notes"><?php _e('By default, the plugins uses the twitter bootstrap css on the desing, you can remove that and style by yourself','spot');?></td>
        </tr>
		
		<tr valign="top">
        <th scope="row"><?php _e('Use Spotoption custom CSS','spot');  ?></th>
        <td><input type="checkbox" name="use_so_custom_css" <?php if(get_option('use_so_custom_css')) echo 'checked' ;?>  /></td>
		<td class="notes"><?php ;?></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Options, Etc.</th>
        <td><input type="text" name="option_etc" value="<?php echo get_option('option_etc'); ?>" /></td>
		<td class="notes"><?php ;?></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php }
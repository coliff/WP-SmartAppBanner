<?php
/*
Plugin Name: WP-SmartAppBanner
Plugin URI: http://christianoliff.com/wp-plugins/wp-smartappbanner/
Description: Displays a Smart App Banner to your site to promote your iPhone/iPad app (iOS 6 required to see the Smart App Banner)
Version: 1.1.1
Author: C.Oliff
Author URI: http://christianoliff.com
*/
add_option('set_ios_app_value', 'nothing');
add_action('wp_head', 'set_ios_app_do');
add_action('admin_menu', 'set_ios_app_menu');
function set_ios_app_do(){
echo '<meta name="apple-itunes-app" content="app-id=' . get_option('set_ios_app_value') . '">';
}
function set_ios_app_menu(){
add_options_page( 'Set SmartAppBanner', 'Set SmartAppBanner', 'manage_options', 'set_ios_app', 'set_ios_app_value_admin');
}
function set_ios_app_value_admin(){
echo '<div class="wrap">';
if(isset($_REQUEST["ios_app_value"])){
update_option('set_ios_app_value', $_REQUEST["ios_app_value"]);
echo '<b>Settings Updated!</b>';
}
echo '<p><form name="set_ios_app" action="" method="post"></p>';
echo '<p>iOS App ID: <input type="text" placeholder="e.g. 123456789" pattern="\d*" inputmode="numeric" name="ios_app_value" value="' . get_option('set_ios_app_value') . '" required /></p>';
echo '<p><input type="submit" value="Save Changes" /></p>';
echo '<p></form></p>';
echo '</div>';
}
?>

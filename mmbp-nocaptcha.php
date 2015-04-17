<?php
/*
Plugin Name: BuddyPress NoCaptcha Register Box
Plugin URI: http://www.functionsphp.com/recaptcha
Description: This super-lightweight plugin adds a Google's No Captcha human friendly reCAPTCHA box to the BuddyPress registration form. 
It should help keep your community free from spammers and also hopefully not be too much of a inconvenience for your site's users. 
Based on Buddypress ReCaptacha by Hardeep Asrani, modified for latest reCaptcha API.
Version: 1.0
Author: Neil Foster
Author URI: http://www.mokummusic.com
Requires at least: WordPress 2.8, BuddyPress 1.2.9
License: GPL2
*/

// -----------------Set up the plug-in -------------------
defined('ABSPATH') or die("No script kiddies please!");

function enqueue_mokum_nocaptcha_scripts() {

wp_register_script('mokumnocaptchaScript', 'https://www.google.com/recaptcha/api.js', '','', true);
if (function_exists('bp_is_register_page') && bp_is_register_page()) wp_enqueue_script('mokumnocaptchaScript');
}
add_action( 'wp_enqueue_scripts', 'enqueue_mokum_nocaptcha_scripts');

// ********** ADMIN SETTINGS FUNCTIONS **************

function mmbpcapt_init() {
    add_option( 'mmbpcapt_public');
    add_option( 'mmbpcapt_private');
    add_option( 'mmbpcapt_theme', 'light');
	add_option( 'mmbpcapt_style', 'clear:both; float:right; margin-top:30px;');
    register_setting( 'mmbpcapt', 'mmbpcapt_public' );
    register_setting( 'mmbpcapt', 'mmbpcapt_private' );
    register_setting( 'mmbpcapt', 'mmbpcapt_theme' );
    register_setting( 'mmbpcapt', 'mmbpcapt_style' );
}
add_action('admin_init', 'mmbpcapt_init' );
 
function mmbpcapt_register_options_page() {
	add_options_page('BuddyPress noCaptcha', 'BuddyPress noCaptcha', 'manage_options', 'bp-captcha', 'mmbpcapt_options_page');
}
add_action('admin_menu', 'mmbpcapt_register_options_page');
 
function mmbpcapt_options_page() {
	?>
<div class="wrap">
	<?php screen_icon(); ?>
	<h2>BuddyPress No Captcha reCaptcha</h2>
	<form method="post" action="options.php"> 
		<?php settings_fields( 'mmbpcapt' ); ?>
			<p>If you don't already have your Google reCaptcha API private and public keys, click <a href="https://www.google.com/recaptcha/admin" target="_blank">here</a> to get them.</p>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="mmbpcapt_public">reCAPTCHA Site Key:</label></th>
					<td><input type="text" id="mmbpcapt_public" name="mmbpcapt_public" value="<?php echo get_option('mmbpcapt_public'); ?>" /></td>
				</tr>
				<tr valign="top">
    				<th scope="row"><label for="mmbpcapt_private">reCAPTCHA Secret Key:</label></th>
					<td><input type="text" id="mmbpcapt_private" name="mmbpcapt_private" value="<?php echo get_option('mmbpcapt_private'); ?>" /></td>
				</tr>
                <tr valign="top">
    				<th scope="row"><label for="mmbpcapt_theme">Theme:</label></th>
					<td><select id="mmbpcapt_theme" name="mmbpcapt_theme" value=" <?php
	echo get_option('mmbpcapt_theme'); ?>">
					    <option value="light" <?php
	if (get_option('mmbpcapt_theme') == light) echo 'selected="selected"'; ?>>Light</option>
    				    <option value="dark" <?php
	if (get_option('mmbpcapt_theme') == dark) echo 'selected="selected"'; ?>>Dark</option>
					  </select></td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="mmbpcapt_style">reCAPTCHA container CSS style:</label></th>
					<td><input type="text" id="mmbpcapt_style" name="mmbpcapt_style" value="<?php echo get_option('mmbpcapt_style'); ?>" /></td>
				</tr>
			</table>
		<?php submit_button(); ?>
	</form>
    <span>More Wordpress fun at <a target="_blank" href="http://www.functionsphp.com/">functionsphp.com</a></span>
</div>
<?php
}

// ********** FRONT END **************

$public_key = get_option('mmbpcapt_public');
$private_key = get_option('mmbpcapt_private');
$theme = get_option('mmbpcapt_theme');
$style = get_option('mmbpcapt_style');
	
add_action( 'bp_before_registration_submit_buttons', 'bp_add_code' );
add_action( 'bp_signup_validate', 'bp_validate' );

function bp_add_code() {
	global $bp, $theme, $style, $public_key;
	$html = '<div class="register-section" id="security-section" style="'.$style.'">';
	$html .= '<div class="editfield">';

	if (!empty($bp->signup->errors['recaptcha_response_field'])) {
		$html .= '<div class="error">';
		$html .= $bp->signup->errors['recaptcha_response_field'];
		$html .= '</div>';
	}
	$html .= '<div class="g-recaptcha" data-sitekey="'.$public_key.'" data-theme="'.$theme.'"></div>';
	if ($public_key == null || $public_key == '') $html .= "Enter your reCAPTCHA API keys in Wordpress admin settings!";
	
	$html .= '</div></div>';
	echo $html;
}

function bp_validate() {
	global $bp, $private_key;

	if ($private_key == null || $private_key == '') {
		die ("To use reCAPTCHA you must get an API key from <a href='https://www.google.com/recaptcha/admin/create'>https://www.google.com/recaptcha/admin/create</a>");
	}

	if ($_SERVER['REMOTE_ADDR'] == null || $_SERVER['REMOTE_ADDR'] == '') {
		die ("For security reasons, you must pass the remote ip to reCAPTCHA");
	}

	$query = array(
	   'secret' => $private_key,
	   'response' => $_POST['g-recaptcha-response'],
	   'remoteip' => $_SERVER['REMOTE_ADDR']
	);

	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$request = new WP_Http;
	$result = $request->request( $url, array( 'method' => 'POST', 'body' => $query) );

		$response = $result['response'];
		$body = json_decode( $result['body']);

		if ($response['message'] != 'OK' || $body->success != true) {
			foreach ($body->{'error-codes'} as $error_code) {
				if ($error_code == 'missing-input-response') {
					$error_string .= 'You must prove you are human. ';
				} else {
					$error_string .= 'There was an error ('.$error_code.') in reCaptcha. ';
				}	
			}
			$bp->signup->errors['recaptcha_response_field'] = $error_string;
		}

	return;
}



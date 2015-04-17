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
				<th scope="row"><label for="mmbpcapt_type">Type:</label></th>
				<td><select id="mmbpcapt_type" name="mmbpcapt_type" value=" <?php
					echo get_option('mmbpcapt_type'); ?>">
					<option value="image" <?php
					if (get_option('mmbpcapt_type') == image) echo 'selected="selected"'; ?>>Image</option>
					<option value="audio" <?php
					if (get_option('mmbpcapt_type') == audio) echo 'selected="selected"'; ?>>Audio</option>
				</select></td>
			</tr>
			<tr valign="top">
				<th scope="row"><label for="mmbpcapt_lang">Language:</label></th>
				<td><select id="mmbpcapt_lang" name="mmbpcapt_lang" value=" <?php
					echo get_option('mmbpcapt_lang'); ?>">
					<option value="xx" <?php
					if (get_option('mmbpcapt_lang') == xx) echo 'selected="selected"'; ?>>Auto (browser)</option>
					<option value="en" <?php
					if (get_option('mmbpcapt_lang') == en) echo 'selected="selected"'; ?>>English (US)</option>
					<option value="ar" <?php
					if (get_option('mmbpcapt_lang') == ar) echo 'selected="selected"'; ?>>Arabic</option>
					<option value="bg" <?php
					if (get_option('mmbpcapt_lang') == bg) echo 'selected="selected"'; ?>>Bulgarian</option>
					<option value="ca" <?php
					if (get_option('mmbpcapt_lang') == ca) echo 'selected="selected"'; ?>>Catalan</option>
					<option value="zh-CN" <?php
					if (get_option('mmbpcapt_lang') == 'zh-CN') echo 'selected="selected"'; ?>>Chinese (simplified)</option>
					<option value="zh-TW" <?php
					if (get_option('mmbpcapt_lang') == 'zh-TW') echo 'selected="selected"'; ?>>Chinese (Traditional)</option>
					<option value="hr" <?php
					if (get_option('mmbpcapt_lang') == hr) echo 'selected="selected"'; ?>>Croation</option>
					<option value="cs" <?php
					if (get_option('mmbpcapt_lang') == cs) echo 'selected="selected"'; ?>>Czech</option>
					<option value="da" <?php
					if (get_option('mmbpcapt_lang') == da) echo 'selected="selected"'; ?>>Danish</option>
					<option value="nl" <?php
					if (get_option('mmbpcapt_lang') == nl) echo 'selected="selected"'; ?>>Dutch</option>
					<option value="en-GB" <?php
					if (get_option('mmbpcapt_lang') == 'en-GB') echo 'selected="selected"'; ?>>English (UK)</option>
					<option value="fil" <?php
					if (get_option('mmbpcapt_lang') == fil) echo 'selected="selected"'; ?>>Filipino</option>
					<option value="fi" <?php
					if (get_option('mmbpcapt_lang') == fi) echo 'selected="selected"'; ?>>Finnish</option>
					<option value="fr" <?php
					if (get_option('mmbpcapt_lang') == fr) echo 'selected="selected"'; ?>>French</option>
					<option value="fr-CA" <?php
					if (get_option('mmbpcapt_lang') == 'fr-CA') echo 'selected="selected"'; ?>>French (Canadian)</option>
					<option value="de" <?php
					if (get_option('mmbpcapt_lang') == de) echo 'selected="selected"'; ?>>German</option>
					<option value="de-AT" <?php
					if (get_option('mmbpcapt_lang') == 'de-AT') echo 'selected="selected"'; ?>>German (Austria)</option>
					<option value="de-CH" <?php
					if (get_option('mmbpcapt_lang') == 'de-CH') echo 'selected="selected"'; ?>>German (Switzerland)</option>
					<option value="el" <?php
					if (get_option('mmbpcapt_lang') == el) echo 'selected="selected"'; ?>>Greek</option>
					<option value="iw" <?php
					if (get_option('mmbpcapt_lang') == iw) echo 'selected="selected"'; ?>>Hebrew</option>
					<option value="hi" <?php
					if (get_option('mmbpcapt_lang') == hi) echo 'selected="selected"'; ?>>Hindi</option>
					<option value="hu" <?php
					if (get_option('mmbpcapt_lang') == hu) echo 'selected="selected"'; ?>>Hungarian</option>
					<option value="id" <?php
					if (get_option('mmbpcapt_lang') == id) echo 'selected="selected"'; ?>>Indonesian</option>
					<option value="it" <?php
					if (get_option('mmbpcapt_lang') == it) echo 'selected="selected"'; ?>>Italian</option>
					<option value="ja" <?php
					if (get_option('mmbpcapt_lang') == ja) echo 'selected="selected"'; ?>>Japanese</option>
					<option value="ko" <?php
					if (get_option('mmbpcapt_lang') == ko) echo 'selected="selected"'; ?>>Korean</option>
					<option value="lv" <?php
					if (get_option('mmbpcapt_lang') == lv) echo 'selected="selected"'; ?>>Latvian</option>
					<option value="lt" <?php
					if (get_option('mmbpcapt_lang') == lt) echo 'selected="selected"'; ?>>Lithuanian</option>
					<option value="no" <?php
					if (get_option('mmbpcapt_lang') == no) echo 'selected="selected"'; ?>>Norwegian</option>
					<option value="fa" <?php
					if (get_option('mmbpcapt_lang') == fa) echo 'selected="selected"'; ?>>Persian</option>
					<option value="pl" <?php
					if (get_option('mmbpcapt_lang') == pl) echo 'selected="selected"'; ?>>Polish</option>
					<option value="pt" <?php
					if (get_option('mmbpcapt_lang') == pt) echo 'selected="selected"'; ?>>Portuguese</option>
					<option value="pt-BR" <?php
					if (get_option('mmbpcapt_lang') == 'pt-BR') echo 'selected="selected"'; ?>>Portuguese (Brazil)</option>
					<option value="pt-PT" <?php
					if (get_option('mmbpcapt_lang') == 'pt-PT') echo 'selected="selected"'; ?>>Portuguese (Portugal)</option>
					<option value="ro" <?php
					if (get_option('mmbpcapt_lang') == ro) echo 'selected="selected"'; ?>>Romanian</option>
					<option value="ru" <?php
					if (get_option('mmbpcapt_lang') == ru) echo 'selected="selected"'; ?>>Russian</option>
					<option value="sr" <?php
					if (get_option('mmbpcapt_lang') == sr) echo 'selected="selected"'; ?>>Serbian</option>
					<option value="sk" <?php
					if (get_option('mmbpcapt_lang') == sk) echo 'selected="selected"'; ?>>Slovak</option>
					<option value="sl" <?php
					if (get_option('mmbpcapt_lang') == sl) echo 'selected="selected"'; ?>>Slovenian</option>
					<option value="es" <?php
					if (get_option('mmbpcapt_lang') == es) echo 'selected="selected"'; ?>>Spanish</option>
					<option value="es-419" <?php
					if (get_option('mmbpcapt_lang') == 'es-419') echo 'selected="selected"'; ?>>Spanish (Latin America)</option>
					<option value="sv" <?php
					if (get_option('mmbpcapt_lang') == sv) echo 'selected="selected"'; ?>>Swedish</option>
					<option value="th" <?php
					if (get_option('mmbpcapt_lang') == th) echo 'selected="selected"'; ?>>Thai</option>
					<option value="tr" <?php
					if (get_option('mmbpcapt_lang') == tr) echo 'selected="selected"'; ?>>Turkish</option>
					<option value="uk" <?php
					if (get_option('mmbpcapt_lang') == uk) echo 'selected="selected"'; ?>>Ukrainian</option>
					<option value="vi" <?php
					if (get_option('mmbpcapt_lang') == vi) echo 'selected="selected"'; ?>>Vietnamese</option>
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
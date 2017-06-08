<?php
/**
 * Build the setup options form.
 */
$exists = false;
$output = null;
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
	case xPDOTransport::ACTION_INSTALL:

	case xPDOTransport::ACTION_UPGRADE:
		$dialog = true;
		break;

	case xPDOTransport::ACTION_UNINSTALL: break;
}

if ($dialog) {
	$ru = (bool) ($modx->getOption('manager_language') == 'ru');

	$intro = $ru
		? 'В системные настройки будут внесены изменения, которые включат отправку почты через SMTP.<br>Так же будет изменена настройка <b>emailsender</b>'
		: 'Addon will change sistem settings for SMTP. Also setting <b>emailsender</b> will be changed too.';

	$email = 'Email';
	$key = $ru ? 'Пароль' : 'Password';

	$output =
	'<style>
		#setup_form_wrapper {font: normal 12px Arial;line-height:18px;}
		#setup_form_wrapper a {color: #08C;}
		#setup_form_wrapper label {width: 75px; text-align: right;}
		#setup_form_wrapper input {height: 25px; border: 1px solid #AAA; border-radius: 3px; padding: 3px; width: 100%;}
		#setup_form_wrapper table {margin-top:10px;}
		#setup_form_wrapper small {font-size: 10px; color:#555; font-style:italic;}
		#setup_form_wrapper .more_info {width: 100%;}
		#setup_form_wrapper .more_info a {line-height: 21px; display:inline-block;}
		#setup_form_wrapper .more_info img {border: none; display:inline-block;padding-top:10px;}
	</style>
	<div id="setup_form_wrapper">
		<p>'.$intro.'</p>
		<table cellspacing="5" id="setup_form">
			<tr>
				<td><label for="email">Email:</label></td>
				<td><input type="email" name="email" value="" placeholder="user@yandex.ru" id="email" /></td>
			</tr>
			<tr>
				<td><label for="key">'.$key.'</label></td>
				<td><input type="password" name="password" value="" placeholder="************" id="password" /></td>
			</tr>
		</table>
	</div>
	';
}

return $output;
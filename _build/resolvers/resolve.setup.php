<?php

if ($object->xpdo) {
	/* @var modX $modx */
	$modx =& $object->xpdo;

	switch ($options[xPDOTransport::PACKAGE_ACTION]) {
		case xPDOTransport::ACTION_INSTALL:
		case xPDOTransport::ACTION_UPGRADE:
            $settings = array();
            
            $tmp = array(
            	'mail_smtp_auth' => '1',
            	'mail_smtp_helo' => 'smtp.yandex.ru',
            	'mail_smtp_hosts' => 'smtp.yandex.ru',
            	'mail_smtp_port' => '465',
            	'mail_smtp_prefix' => 'ssl',
            	'mail_smtp_single_to' => '1',
            	'mail_use_smtp' => '1',
            	'mail_smtp_user' => str_replace(array(
            	                                '@yandex.ru',
            	                                '@yandex.com',
            	                                '@ya.ru',
            	                                '@ya.com'), '', $options['email']),
            	'emailsender' => $options['email'],
            	'mail_smtp_pass' => $options['password'],
            );
            
            foreach ($tmp as $k => $v) {
            	/* @var modSystemSetting $setting */
            	$setting = $modx->getObject('modSystemSetting', array('key' => $k));
            	$setting->set('value', $v);
            	$setting->save();
            }
            
            unset($tmp);
			break;
		case xPDOTransport::ACTION_UNINSTALL:
			break;
	}
}
return true;
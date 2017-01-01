#!/usr/bin/php -q
<?php

/**************************************
 *  Schmoozecom Appointment Reminder  *
 *      Copyright (C) 2011-2014       *
 *    Schmooze Communications LLC     *
 **************************************/
// Set up bootstrap
$restrict_mods = Array('areminder' => true); // Only load the areminder module
$bootstrap_settings['freepbx_auth'] = false;
$bootstrap_settings['skip_astman'] = false; //we need an asterisk manager connection in this file
$bootstrap_settings['freepbx_error_handler'] = false;

if (!@include_once(getenv('FREEPBX_CONF') ? getenv('FREEPBX_CONF') : '/etc/freepbx.conf')) {
	include_once('/etc/asterisk/freepbx.conf');
}

// It should already be loaded by freepbx, but maybe not.
if (!defined('ZEND_LICENSE_LOADED')) {
	if (file_exists("/var/lib/asterisk/agi-bin/LoadLicenseIfExists.php")) {
		include "/var/lib/asterisk/agi-bin/LoadLicenseIfExists.php";
	}
}
if (defined('ZEND_LICENSE_LOADED')) {
	include __DIR__."/areminder/areminder-manager.php";
}


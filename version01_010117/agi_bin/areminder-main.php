#!/usr/bin/php -q
<?php

/**********************************************************************
 *                Schmoozecom Appointment Reminder                    *
 *                      Copyright (C) 2011                            *
 *                  Schmooze Communications LLC                       *
 *           Clifford Wagner (clifford.wagner@schmoozecom.com)        *
 **********************************************************************/



if(file_exists("/var/lib/asterisk/agi-bin/LoadLicenseIfExists.php")) {
    include_once("/var/lib/asterisk/agi-bin/LoadLicenseIfExists.php");
	include(dirname(__FILE__) . '/areminder/areminder-main.php');
}




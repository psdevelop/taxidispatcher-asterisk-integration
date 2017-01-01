#!/usr/bin/env php -q
<?php 
/*
* Copyright 2011 by Schmooze Com., Inc.
* By installing, copying, downloading, distributing, inspecting or using the
* materials provided herewith, you agree to all of the terms of use as outlined
* in our End User Agreement which can be found and reviewed at
* http://freepbxdistro.org/signup.php?view=tos
*/

if(file_exists("/var/lib/asterisk/agi-bin/LoadLicenseIfExists.php")) {
        include_once("/var/lib/asterisk/agi-bin/LoadLicenseIfExists.php");
        include_once('enc/backuprecordings.php');
}
?>

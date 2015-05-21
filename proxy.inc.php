<?php
/*
Copyright (C) 2015  Volker Janzen

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>
*/

function simple_get($command, $domain = '', $masterip = '') {
	$get = 'https://api.esgob.com/1.0/'.urlencode($command).'?account='.urlencode(ESGOB_ACCOUNT).'&key='.urlencode(ESGOB_KEY);
	
	if ($domain != '') {
		$get .= '&domain=';
		$get .= urlencode($domain);
	}
	if ($masterip != '') {
		$get .= '&masterip=';
		$get .= urlencode($masterip);
	}

	// erzeuge einen neuen cURL-Handle
	$ch = curl_init();
 
	// setze die URL und andere Optionen
	curl_setopt($ch, CURLOPT_URL, $get);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
	// f�hre die Aktion aus und gebe die Daten an den Browser weiter
	$res = curl_exec($ch);
 
	// schlie�e den cURL-Handle und gebe die Systemresourcen frei
	curl_close($ch);

	return json_decode($res);
}
?>

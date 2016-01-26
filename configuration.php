<?php
include('header.inc.php');
?>

<html lang="en">
<head>
<link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container-fluid">
<h3>Configuration</h3>
	<p>Secondary DNS zones are served via anycast from (please add this to your NS record and delegate at your registrar):<br>
		</p><ul>
			<li><b>ns1.esgob.com</b></li>
			<li>193.47.147.100</li>
			<li>2001:67c:1b43:100::100</li>
		</ul>
	<p></p>
	<h4>Zone transfers to us (AXFRs)</h4>
	<p>We operate a dedicated AXFR host, this distributes zone updates to our anycast nodes. You must allow zone transfers from:<br>
		</p><ul>
			<li><b>axfr.esgob.com</b></li>
			<li>195.177.253.142</li>
			<li>2001:67c:1b40:142::142</li>
		</ul>
	<p>We will honor notifies that are sent to the AXFR host.</p><p>
	</p><h4>Sample BIND configuration</h4>
	<p>Example:</p>
        <div>
	<pre>zone "natmorris.co.uk" {
        type master;
        file "/etc/bind/master/db.natmorris.co.uk";
        allow-transfer { 195.177.253.142;
        2001:67c:1b40:142::142;        };
        also-notify { 195.177.253.142;
        2001:67c:1b40:142::142;        };
};
</pre>
	









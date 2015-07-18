<?php
/*
Plugin Name: Pollcaster Shortcode Plugin
Description: Embed your Pollcaster.com polls on your WordPress site.
Version: 1.0
License: GPL
Author: Pollcaster
Author URI: http://www.pollcaster.com
*/

function createPollcasterEmbedJS($atts, $content = null) {
	extract(shortcode_atts(array(
		'id'   => '',
		'height'     => 'auto',
		'width'     => '100%',
	), $atts));


	if (!$id) {

		$error = "
		<div style='border-radius: 2px;background-color: #192129; padding: 40px; margin: 50px 0 70px; color:white;'>
			<h3 style='color:white;  font-size: 2em;font-weight: 300;'>Uh oh!</h3>
			<p style='margin: 0;'>Something is wrong with your Pollcaster shortcode. If you copy and paste it from the Boombox share screen, you should be good.</p>
		</div>";

		return $error;

	} else {

		wp_enqueue_script( 'pollcaster', '//d6launbk5pe1s.cloudfront.net/widget.js', array(), false, false );

		$pollcasterHook = "<div class='mv-widget' data-widget='poll' data-id='$id' data-width='$width' data-height='$height'></div>";

		return "$pollcasterHook";

	}
}

add_shortcode('pollcaster', 'createPollcasterEmbedJS');

?>

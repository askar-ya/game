<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

$theme_color[] = array(
	'selector' =>
		array(
			0 => '.bs-about .about-icons-list .about-icon-item a',
		),
	'prop'     =>
		array(
			'background-color' => '%%value%% !important',
		),
);


// Remove current color
unset( $theme_color['color']['selector'][41] );
unset( $theme_color['color']['selector'][42] );
unset( $theme_color['color']['selector'][43] );
unset( $theme_color['color']['selector'][44] );
unset( $theme_color['color']['selector'][45] );

$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory

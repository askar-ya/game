<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

$theme_color['color']['selector'][] = 'a.read-more';
$theme_color['color']['selector'][] = '.listing-item a.read-more:hover';


$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory
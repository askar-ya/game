<?php

if ( bf_is_amp() == 'better' ) {
	better_amp_enqueue_ad( 'dfp' );
}

$caption = ! empty( $banner_data['caption'] ) && $args['show-caption'] ? Better_Ads_Manager::get_option( 'caption_position' ) : false;
$ad_code = '';

if ( $caption == 'above' ) {
	$ad_code .= "<p class='bsac-caption bsac-caption-above'>{$banner_data['caption']}</p>";
}

if ( $banner_data['dfp_spot'] === 'custom' ) {
	$ad_code .= $banner_data['custom_dfp_code'];
} else {

	$style = '';

	// no width and height means the spot have multiple dimensions
	if ( ! empty( $banner_data['dfp_spot_width'] ) && ! empty( $banner_data['dfp_spot_height'] ) ) {
		$style = 'width=' . $banner_data['dfp_spot_width'] . ' height=' . $banner_data['dfp_spot_height'];
	}

	$ad_code .= '<amp-ad ' . $style . ' type="doubleclick" data-slot="' . $banner_data['dfp_spot_id'] . '"></amp-ad>';
}

if ( $caption === 'below' ) {
	$ad_code .= "<p class='bsac-caption bsac-caption-below'>{$banner_data['caption']}</p>";
}

return $ad_code;

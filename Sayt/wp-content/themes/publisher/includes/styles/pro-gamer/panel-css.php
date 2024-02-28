<?php

$css_id = $this->get_css_id();

/**
 * =>Color & Style
 */
$theme_color = include PUBLISHER_THEME_PATH . 'includes/options/panel-css-theme_color.php';

// search-handler
unset( $theme_color['color']['selector'][27] );

// RSS Color
$theme_color['color']['selector'][] = '.archive-title .rss-link';

// Main Menu BG Color
$theme_color['color']['selector'][] = '.site-header .main-menu > li.current-menu-item > a';

// Pagination
unset( $theme_color['color']['selector'][41] );
unset( $theme_color['color']['selector'][42] );
unset( $theme_color['color']['selector'][43] );
unset( $theme_color['color']['selector'][44] );
unset( $theme_color['color']['selector'][45] );
$theme_color['bg_color']['selector'][] = '.bs-pagination.bs-ajax-pagination.more_btn .btn-bs-pagination';
$theme_color['bg_color']['selector'][] = '.bs-pagination.bs-ajax-pagination.infinity .btn-bs-pagination';
$theme_color['bg_color']['selector'][] = '.bs-pagination.bs-ajax-pagination.more_btn_infinity .btn-bs-pagination';
$theme_color['bg_color']['selector'][]     = '.pagination.bs-numbered-pagination .wp-pagenavi a:hover';
$theme_color['bg_color']['selector'][]     = '.pagination.bs-numbered-pagination a.page-numbers:hover';
$theme_color['bg_color']['selector'][]     = '.pagination.bs-numbered-pagination .wp-pagenavi .current';
$theme_color['bg_color']['selector'][]     = '.pagination.bs-numbered-pagination .current';
$theme_color['border_color']['selector'][] = '.pagination.bs-numbered-pagination .page-numbers';
$theme_color['border_color']['selector'][] = '.pagination.bs-numbered-pagination .current';


$theme_color[] = array(
	'selector' =>
		array(
			0 => '.site-header.site-header li > a > .better-custom-badge:after',
		),
	'prop'     =>
		array(
			'border-bottom-color' => '%%value%%',
		),
);


$fields['theme_color'][ $css_id ] = $theme_color;
unset( $theme_color ); // clean memory


/**
 * -> Topbar Colors
 */
$fields['topbar_bg_color'][ $css_id ] = array(
	array(
		'selector' => array(
			'.site-header .topbar',
			'.bs-slider-dots .bs-slider-active > .bts-bs-dots-btn',
			'.single-post-share .social-item a',
			'.post-share .post-share-btn-group .post-share-btn:before',
		),
		'prop'     => array(
			'background-color' => '%%value%% !important'
		)
	),
	array(
		'selector' => array(
			'.entry-terms.via .terms-label',
			'.entry-terms.source .terms-label',
			'.entry-terms.post-tags .terms-label',
			'.entry-terms.via a',
			'.entry-terms.source a',
			'.entry-terms.post-tags a',
			'.single-post-share .post-share-btn',
			'.post-related',
			'.single-container > .post-author',
		),
		'prop'     => array(
			'border-color' => '%%value%% !important',
		)
	),
	array(
		'selector' => array(
			'.sidebar-column .sidebar',
			'.bs-newsletter-pack + .next-prev-post',
			'.post-author + .next-prev-post',
			'.comments-template',
			'body.single .content-column > .bs-newsletter-pack',
			'.bs-newsletter-pack.bsnp-t1.bsnp-s9 input.bsnp-input',
		),
		'prop'     => array(
			'border-color' => '%%value%% !important',
		)
	),
	array(
		'selector' => array(
			'.post-share .share-handler:before',
			'.post-share .share-handler:after',
		),
		'prop'     => array(
			'border-left-color' => '%%value%% !important',
		)
	),
	array(
		'selector' => array(
			'.post-meta.single-post-meta .time',
			'.post-meta.single-post-meta .post-author-a',
			'.post-meta.single-post-meta .post-author-a:hover',
		),
		'prop'     => array(
			'color' => '%%value%% !important',
		)
	),
	array(
		'selector' => array(
			'.next-prev-post .pre-title',
		),
		'prop'     => array(
			'color' => '%%value%%',
		)
	),
	
);


$fields['site_bg_color_2'][ $css_id ]    = $fields['site_bg_color_2']['css'];
$fields['site_bg_color_2'][ $css_id ][1] = array(
	'selector' =>
		array(
			0 => 'body',
		),
	'prop'     =>
		array(
			'background-color' => '%%value%%',
		),
	'before'   => '@media (max-width: 767px){',
	'after'    => '}',
);
<?php

if ( ! function_exists( 'publisher_cb_css_generator_layout_2_col' ) ) {
	/**
	 * Custom CSS generator for 2 column layout
	 *
	 * @param array  $block
	 * @param string $value
	 */
	function publisher_cb_css_generator_layout_2_col( &$block = array(), &$value = '' ) {

		$block = array();

		//
		// Site width
		//
		$block['vars'] = array(
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => ':root',
				),
			'prop'            =>
				array(
					'--publisher-site-width-2-col'             => _publisher_width_changer_to_px( $value['width'] ),
					'--publisher-site-width-1-col'             => _publisher_width_changer_to_px( $value['width'] ),
					'--publisher-site-width-2-col-content-col' => _publisher_width_changer_to_px( $value['content'], '%' ),
					'--publisher-site-width-2-col-primary-col' => _publisher_width_changer_to_px( $value['primary'], '%' ),
				),
		);

		//
		// Hide Skyscrapper ad
		//
		$block[8] = array(
			'before'          => '@media (max-width: ' . ( $value['width'] + 90 ) . 'px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => '.page-layout-1-col .bs-sks',
					2 => '.page-layout-2-col .bs-sks',
				),
			'prop'            =>
				array(
					'display' => 'none !important',
				),
		);


		$value = '';

	} // publisher_cb_css_generator_layout_2_col
}


if ( ! function_exists( 'publisher_cb_css_generator_layout_3_col' ) ) {
	/**
	 * Custom CSS generator for 3 column layout
	 *
	 * @param array  $block
	 * @param string $value
	 */
	function publisher_cb_css_generator_layout_3_col( &$block = array(), &$value = '' ) {

		$block = array();

		//
		// Site width
		//
		$block['vars'] = array(
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => ':root',
				),
			'prop'            =>
				array(
					'--publisher-site-width-3-col'               => _publisher_width_changer_to_px( $value['width'] ),
					'--publisher-site-width-3-col-content-col'   => _publisher_width_changer_to_px( $value['content'], '%' ),
					'--publisher-site-width-3-col-primary-col'   => _publisher_width_changer_to_px( $value['primary'], '%' ),
					'--publisher-site-width-3-col-secondary-col' => _publisher_width_changer_to_px( $value['secondary'], '%' ),
				),
		);

		//
		// Hide Skyscrapper ad
		//
		$block[50] = array(
			'before'          => '@media (max-width: ' . ( $value['width'] + 90 ) . 'px){',
			'after'           => '}',
			'skip_validation' => true,
			'selector'        =>
				array(
					0 => '.page-layout-3-col .bs-sks',
				),
			'prop'            =>
				array(
					'display' => 'none !important',
				),
		);

		$value = '';
	} // publisher_cb_css_generator_layout_3_col
}


if ( ! function_exists( 'publisher_cb_css_generator_columns_space' ) ) {
	/**
	 * Custom CSS generator space between columns
	 *
	 * @param array  $block
	 * @param string $value
	 */
	function publisher_cb_css_generator_columns_space( &$block = array(), &$value = '' ) {

		$block[1] = array(
			'skip_validation' => true,
			'selector'        =>
				array(
					1 => ':root',
				),
			'prop'            =>
				array(
					'--publisher-spacing' => intval( $value ),
				),
		);

	} // publisher_cb_css_generator_columns_space
}


if ( ! function_exists( 'publisher_cb_css_generator_views_ranking' ) ) {
	/**
	 * Custom CSS generator for views ranking
	 *
	 * @param array  $block
	 * @param string $value
	 */
	function publisher_cb_css_generator_views_ranking( &$block = array(), &$value = '' ) {

		$block = array();

		foreach ( (array) $value as $rank ) {

			if ( intval( $rank['color'] ) < 0 ) {
				continue;
			}

			if ( empty( $rank['rate'] ) ) {
				$selector = array(
					'.post-meta .views.rank-default',
					'.single-post-share .post-share-btn.post-share-btn-views.rank-default',
				);
			} else {
				$selector = array(
					'.post-meta .views.rank-' . $rank['rate'],
					'.single-post-share .post-share-btn.post-share-btn-views.rank-' . $rank['rate'],
				);
			}

			$block[] = array(
				'skip_validation' => true,
				'selector'        => $selector,
				'prop'            =>
					array(
						'color' => $rank['color'] . ' !important',
					),
			);

		}

	} // publisher_cb_css_generator_views_ranking
}


if ( ! function_exists( 'publisher_cb_css_generator_shares_ranking' ) ) {
	/**
	 * Custom CSS generator for shares ranking
	 *
	 * @param array  $block
	 * @param string $value
	 */
	function publisher_cb_css_generator_shares_ranking( &$block = array(), &$value = '' ) {

		$block = array();

		foreach ( (array) $value as $rank ) {

			if ( empty( $rank['color'] ) ) {
				continue;
			}

			if ( empty( $rank['rate'] ) ) {
				$selector = array(
					'.post-meta .share.rank-default',
					'.single-post-share .post-share-btn.rank-default',
				);
			} else {
				$selector = array(
					'.post-meta .share.rank-' . $rank['rate'],
					'.single-post-share .post-share-btn.rank-' . $rank['rate'],
				);
			}

			$block[] = array(
				'skip_validation' => true,
				'selector'        => $selector,
				'prop'            =>
					array(
						'color' => $rank['color'] . ' !important',
					),
			);

		}

	} // publisher_cb_css_generator_shares_ranking
}


if ( ! function_exists( 'publisher_cb_css_term_badge_bg_color' ) ) {
	/**
	 * CSS Generator callback for Term Badge Background Color
	 *
	 * @param $block
	 * @param $value
	 */
	function publisher_cb_css_term_badge_bg_color( &$block, $value ) {

		$block[] = array(
			'selector' =>
				array(
					'.term-badges.floated a',
				),
			'prop'     =>
				array(
					'background-color' => '%%value%% !important',
				),
		);
	}
}

if ( ! function_exists( 'publisher_cb_css_term_badge_text_color' ) ) {
	/**
	 * CSS Generator callback for Term Badge Background Color
	 *
	 * @param $block
	 * @param $value
	 */
	function publisher_cb_css_term_badge_text_color( &$block, $value ) {

		$block[] = array(
			'selector' =>
				array(
					'.term-badges.floated a',
				),
			'prop'     =>
				array(
					'color' => '%%value%%',
				),
		);
	}
}


if ( ! function_exists( 'publisher_cb_css_generator_section_heading' ) ) {
	/**
	 * Creates section heading generator color
	 *
	 * @param array  $block
	 * @param string $value
	 * @param array  $args
	 */
	function publisher_cb_css_generator_section_heading( &$block = array(), &$value = '', $args = array() ) {

		// Tabbed or not!
		if ( ! isset( $args['tabbed'] ) ) {
			$args['tabbed'] = true;
		}

		// CSS for which sections?
		if ( ! isset( $args['section'] ) ) {
			$args['section'] = 'all';
		}

		// For Term selectors
		$term_class     = '';
		$term_class_imp = '';
		$tab_term_class = '';

		// For Blocks & Widgets selector
		$block_class     = '';
		$block_class_imp = '';

		//
		// Config variables
		//
		if ( $args['type'] == 'term_color' ) {
			$term_class     = '.main-term-' . $block['_TERM_ID'];
			$tab_term_class = '.mtab-main-term-' . $block['_TERM_ID'];
			$term_class_imp = str_repeat( $term_class, 2 );
		} elseif ( $args['type'] === 'block' && ! empty( $block['_BLOCK_ID'] ) ) {
			$block_class     = ".{$block['_BLOCK_ID']}";
			$block_class_imp = str_repeat( $block_class, 2 );
		} elseif ( $args['type'] === 'widget_color' && ! empty( $block['_WIDGET_ID'] ) ) {
			$block_class     = $block['_WIDGET_ID'];
			$block_class_imp = str_repeat( $block_class, 2 );

			// BF sends heading style to use it for generating smaller css code
			if ( ! empty( $block['callback']['_NEEDED_WIDGET_VALUE']['bf-widget-title-style'] ) ) {
				$args['style'] = $block['callback']['_NEEDED_WIDGET_VALUE']['bf-widget-title-style'];
			}
		}

		// Empty style
		// not set by block or widget
		if ( empty( $args['style'] ) ) {
			$args['style'] = '';

			//
			// Custom styles for widgets of sidebars
			//
			if ( $args['type'] === 'widget_color' ) {

				$_check = array(
					''        => '',
					'default' => '',
				);

				if ( isset( $block['_SIDEBAR_ID_'] ) ) {

					$_check2 = array(
						'footer-1' => '',
						'footer-2' => '',
						'footer-3' => '',
						'footer-4' => '',
					);

					if ( isset( $_check2[ $block['_SIDEBAR_ID_'] ] ) ) {
						$args['style'] = publisher_get_option( 'footer_widgets_heading_style' );
					}

					if ( isset( $_check[ $args['style'] ] ) ) {
						$args['style'] = publisher_get_option( 'widgets_heading_style' );
					}
				}
			}

			$_check = array(
				''        => '',
				'default' => '',
			);

			if ( isset( $_check[ $args['style'] ] ) ) {
				$args['style'] = publisher_get_option( 'section_heading_style' );
			}
		}


		/**
		 * Color
		 */
		$block['sh_color'] = array(
			'selector' => array(),
			'prop'     => array(
				'color' => '%%value%%'
			),
		);


		/**
		 * Important Color
		 */
		$block['sh_color_imp'] = array(
			'selector' => array(),
			'prop'     => array(
				'color' => '%%value%% !important'
			),
		);


		/**
		 * Background Color
		 */
		$block['sh_bg'] = array(
			'selector' => array(),
			'prop'     => array(
				'background-color' => '%%value%%'
			),
		);


		/**
		 * Background Color Important
		 */
		$block['sh_bg_imp'] = array(
			'selector' => array(),
			'prop'     => array(
				'background-color' => '%%value%% !important'
			),
		);


		/***
		 * SPECIAL CONDITIONS
		 */
		{
			//
			// Changes all section to BG if the source is custom color for widget
			// to prevent the text color issue.
			//
			if ( $args['style'] === 't3-s4' && $args['type'] === 'widget_color' && $args['section'] === 'all' ) {
				$args['section'] = 'bg';
			}
		}


		/***
		 * Do Color
		 */
		{
			$_do_color = $args['section'] === 'all' || $args['section'] === 'color';

			// don't create extra and unneeded code!
			if ( $_do_color && $args['type'] === 'theme_color' && $args['section'] === 'all' && publisher_get_option( 'section_title_color' ) !== '' ) {
				$_do_color = false;
			}
		}


		/***
		 * Do BG Color
		 */
		{
			$_do_bg = $args['section'] === 'all' || $args['section'] === 'bg';

			// don't create extra and unneeded code!
			if ( $_do_bg && $args['type'] === 'theme_color' && $args['section'] === 'all' && publisher_get_option( 'section_title_bg_color' ) !== '' ) {
				$_do_bg = false;
			}
		}


		/***
		 * Do Widget BG Fix
		 */
		{
			$_do_widget_bg_fix = ( $args['type'] === 'block' || $args['type'] === 'widget_color' ) && $args['section'] === 'bg_fix';
		}


		/***
		 * Do Block Color Fix
		 */
		{
			$_do_block_color_fix = true;

			// Stop block color fix from outside;
			if ( isset( $args['fix-block-color'] ) && ! $args['fix-block-color'] ) {
				$_do_block_color_fix = false;
			}

			if ( $_do_block_color_fix ) {
				$_do_block_color_fix = ( $args['type'] === 'block' || $args['type'] === 'widget_color' ) && $args['section'] != 'bg_fix' && ( $_do_color || $_do_bg );
			}
		}


		/***
		 *
		 * Type 1
		 *
		 */
		{
			$_check = array(
				't1-s1' => '',
				't1-s2' => '',
				't1-s3' => '',
				't1-s4' => '',
				't1-s5' => '',
				't1-s6' => '',
				't1-s7' => '',
				't1-s8' => '',
				'all'   => '',
			);

			if ( isset( $_check[ $args['style'] ] ) ) {

				/**
				 * Color
				 */
				if ( $_do_color ) {
					$block['sh_color']['selector'][] = "$block_class_imp .section-heading.sh-t1 a:hover .h-text$term_class_imp";
					$block['sh_color']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t1 a.active .h-text$term_class";
					$block['sh_color']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t1 > .h-text";
					$block['sh_color']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t1 .main-link:first-child:last-child .h-text$term_class";
				}


				/**
				 * BG Color
				 */
				if ( $_do_bg ) {
					if ( $args['section'] === 'all' || $args['style'] === 't1-s2' || $args['style'] === 't1-s8' ) {
						$block['sh_bg']['selector'][] = "$block_class_imp$block_class $term_class.section-heading.sh-t1:after";
						$block[]                      = array(
							'selector' => array(
								"$block_class_imp $term_class.section-heading.sh-t1.sh-s8 .main-link .h-text$term_class:before",
								"$block_class_imp $term_class.section-heading.sh-t1.sh-s8 .main-link.h-text:before",
								"$block_class_imp $term_class.section-heading.sh-t1.sh-s8 > .h-text:before"
							),
							'prop'     => array(
								'border-right-color' => '%%value%% !important'
							),
						);
					}

					if ( $args['section'] === 'all' || $args['style'] === 't1-s5' ) {
						$block['sh_color_imp']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t1.sh-s5 > .main-link > $term_class.h-text:after";
						$block['sh_color_imp']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t1.sh-s5 > a:first-child:last-child > $term_class.h-text:after";
						$block['sh_color_imp']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t1.sh-s5 > $term_class.h-text:first-child:last-child:after";
					}
				}


				/**
				 * BG Fix for blocks with custom background color
				 */
				if ( $_do_widget_bg_fix ) {

					$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t1 .h-text";
					$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t1 .bs-pretty-tabs-container";
					$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t1 .bs-pretty-tabs-container .bs-pretty-tabs-elements";
					$block[]                      = array(
						'selector' => array(
							"$block_class_imp .section-heading.sh-t1.sh-s8 > .h-text:before"
						),
						'prop'     => array(
							'border-right-color' => '%%value%% !important'
						),
					);

				}
			}
		}


		/***
		 *
		 * Type 2
		 *
		 */
		{
			$_check = array(
				't2-s1' => '',
				't2-s2' => '',
				't2-s3' => '',
				't2-s4' => '',
				't2-s5' => '',
				'all'   => '',
			);

			if ( isset( $_check[ $args['style'] ] ) ) {

				/**
				 * Color
				 */
				if ( $_do_color ) {
					$block['sh_color']['selector'][]     = "$block_class $term_class.section-heading.sh-t2 a.active";
					$block['sh_color']['selector'][]     = "$block_class_imp $term_class.section-heading.sh-t2 .main-link:first-child:last-child $term_class.h-text";
					$block['sh_color_imp']['selector'][] = "$block_class $term_class.section-heading.sh-t2 > .h-text";
				}


				/**
				 * Important Color
				 */
				if ( $_do_color ) {
					$block['sh_color_imp']['selector'][] = "$block_class .section-heading.sh-t2 a:hover .h-text$term_class";
					$block['sh_color_imp']['selector'][] = "$block_class $term_class.section-heading.sh-t2 a.active .h-text";
				}


				/**
				 * BG Color
				 */
				if ( $_do_bg ) {
					$block['sh_bg']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t2:after";
				}


				/**
				 * BG Fix for blocks with custom background color
				 */
				if ( $_do_widget_bg_fix ) {

					if ( $args['style'] == 't2-s1' ) {
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t2 .bs-pretty-tabs-container";
					}

					$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t2 .bs-pretty-tabs-container .bs-pretty-tabs-elements";
				}

			}

		}



		/***
		 *
		 * Type 3
		 *
		 * Highlight Color only for blocks and terms!
		 *
		 */
		{
			$_check = array(
				't3-s1' => '',
				't3-s2' => '',
				't3-s3' => '',
				't3-s4' => '',
				't3-s5' => '',
				't3-s6' => '',
				't3-s7' => '',
				't3-s8' => '',
				't3-s9' => '',
				'all'   => '',
			);

			if ( isset( $_check[ $args['style'] ] ) ) {


				/**
				 * Color
				 */
				if ( $_do_color ) {
					$block['sh_color']['selector'][] = "$block_class $term_class.section-heading.sh-t3 a.active";
					$block['sh_color']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t3 .main-link:first-child:last-child $term_class.h-text";
					$block['sh_color']['selector'][] = "$block_class $term_class.section-heading.sh-t3 > .h-text";

					if ( $args['style'] === 'all' || $args['style'] === 't3-s8' ) {
						$block['sh_color']['selector'][] = "$block_class_imp $tab_term_class.section-heading.sh-t3.sh-s8 > .h-text";
						$block['sh_color']['selector'][] = "$block_class_imp $tab_term_class.section-heading.sh-t3.sh-s8 > a.main-link > .h-text";
					}
				}


				/**
				 * Important Color
				 */
				if ( $_do_color ) {
					$block['sh_color_imp']['selector'][] = "$block_class .section-heading.sh-t3 a:hover .h-text$term_class";
					$block['sh_color_imp']['selector'][] = "$block_class $term_class.section-heading.sh-t3 a.active .h-text";
				}


				/**
				 * BG Color
				 */
				if ( $_do_bg ) {
					$block['sh_bg_imp']['selector']['tp_3_0'] = "$block_class_imp $term_class.section-heading.sh-t3:after";

					if ( $args['style'] === 'all' || $args['style'] === 't3-s7' ) {
						$block[] = array(
							'selector' => array(
								"$block_class_imp $term_class.section-heading.sh-t3:before"
							),
							'prop'     => array(
								'border-top-color' => '%%value%% !important'
							),
						);
					}

					if ( ( $args['style'] === 'all' && $args['type'] === 'widget_color' ) || $args['style'] == 't3-s7' ) {
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t3.sh-s7:after";
					}


					if ( $args['style'] === 'all' || $args['style'] === 't3-s8' ) {

						$block[] = array(
							'selector' => array(
								"$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t3.sh-s8 >.main-link > .h-text",
								"$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t3.sh-s8 > a:last-child:first-child > .h-text",
								// Its not duplicate! It's for adding more priority to tab main term!
								"$block_class_imp $term_class.section-heading.sh-t3.sh-s8 > a:last-child:first-child > .h-text",
								"$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t3.sh-s8 > .h-text:last-child:first-child",
							),
							'prop'     => array(
								'border-color'
							),
						);
					}


					if ( $args['style'] === 'all' || $args['style'] === 't3-s9' ) {
						//						$block['sh_bg']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t3.sh-s9:before";
						$block[] = array(
							'selector' => array(
								"$block_class_imp $term_class.section-heading.sh-t3.sh-s9:before"
							),
							'prop'     => array(
								'background-color' => publisher_get_option( 'section_title_bg_color' ) . '!important'
							),
						);
						$block[] = array(
							'selector' => array(
								"$block_class_imp $term_class.section-heading.sh-t3.sh-s9:after"
							),
							'prop'     => array(
								'background-color' => publisher_get_option( 'section_title_color' ) . '!important'
							),
						);
					}

					$block['sh_bg_imp']['selector'][] = ".bsb-have-heading-color$block_class_imp $term_class.section-heading.sh-t3.sh-s9:after";
					$block['sh_bg_imp']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t3.sh-s9:after";
				}


				/**
				 * BG Fix for blocks with custom background color
				 */
				if ( $_do_widget_bg_fix ) {

					$block['sh_bg']['selector']['tp_3_1'] = "$block_class_imp .section-heading.sh-t3 .bs-pretty-tabs-container .bs-pretty-tabs-elements";

					if ( ( $args['style'] === 'all' && $args['type'] === 'widget_color' ) || $args['style'] == 't3-s1' ) {
						$block['sh_bg']['selector']['tp_3_2'] = "$block_class_imp .section-heading.sh-t3 .bs-pretty-tabs-container";
					}

					if ( ( $args['style'] === 'all' && $args['type'] === 'widget_color' ) || $args['style'] == 't3-s8' ) {
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t3.sh-s8 >.main-link > .h-text:after";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t3.sh-s8 > a:last-child:first-child > .h-text:after";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t3.sh-s8 > .h-text:last-child:first-child:after";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t3.sh-s8 >.main-link > .h-text:before";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t3.sh-s8 > a:last-child:first-child > .h-text:before";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t3.sh-s8 > .h-text:last-child:first-child:before";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t3.sh-s8.bs-pretty-tabs .bs-pretty-tabs-container .bs-pretty-tabs-more.other-link .h-text";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t3.sh-s8 > a > .h-text";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t3.sh-s8 > .h-text";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t3.sh-s8.multi-tab .bs-pretty-tabs-container";
					}
				}

			}

		}


		/***
		 *
		 * Type 4
		 *
		 * Highlight Color on hover and main colored
		 *
		 */
		{
			$_check = array(
				't4-s1' => '',
				't4-s2' => '',
				't4-s3' => '',
				't4-s4' => '',
				't4-s5' => '',
				't4-s6' => '',
				'all'   => '',
			);

			if ( isset( $_check[ $args['style'] ] ) ) {

				/**
				 * Color
				 */
				if ( $_do_color ) {
					if ( $args['tabbed'] ) {
						$block['sh_color']['selector'][] = "$block_class .section-heading.sh-t4 .bs-pretty-tabs-container:hover .bs-pretty-tabs-more.other-link:hover $term_class.h-text";
						$block['sh_color']['selector'][] = "$block_class .section-heading.sh-t4 .bs-pretty-tabs-more.other-link:hover $term_class.h-text";
						$block['sh_color']['selector'][] = "$block_class_imp .section-heading.sh-t4.sh-s5 .h-text$term_class";
					}
				}


				/**
				 * BG Color
				 */
				if ( $_do_bg ) {
					$block['sh_bg_imp']['selector'][]    = "$block_class_imp .section-heading.sh-t4.sh-s4 .h-text$term_class";
					$block['sh_bg_imp']['selector'][]    = "$block_class_imp .section-heading.sh-t4.sh-s4 .h-text$term_class:before";
					$block['sh_bg_imp']['selector'][]    = "$block_class_imp .section-heading.sh-t4.sh-s5 .h-text$term_class";
					$block['sh_bg_imp']['selector'][]    = "$block_class_imp .section-heading.sh-t4.sh-s6 a.active .h-text$term_class";
					$block['sh_bg']['selector'][]        = "$block_class_imp .section-heading.sh-t4 a.active .h-text$term_class";
					$block['sh_bg_imp']['selector'][]    = "$block_class_imp .section-heading.sh-t4.sh-s6 .main-link .h-text$term_class";
					$block['sh_bg']['selector'][]        = "$block_class_imp .section-heading.sh-t4$term_class .main-link:first-child:last-child .h-text$term_class";
					$block['sh_bg']['selector'][]        = "$block_class_imp .section-heading.sh-t4$term_class_imp > .h-text$term_class";
					$block['sh_color_imp']['selector'][] = "$block_class_imp .section-heading.sh-t4 a:hover .h-text$term_class";

					$block[] = array(
						'selector' => array(
							"$block_class_imp $term_class.section-heading.sh-t4.sh-s6 .h-text:before"
						),
						'prop'     => array(
							'border-bottom-color' => '%%value%% !important'
						),
					);
				}


				/**
				 * BG Fix for blocks with custom background color
				 */
				if ( $_do_widget_bg_fix ) {
					$block['sh_bg_imp']['selector'][] = "$block_class .section-heading.sh-t4.sh-s4 .other-link .h-text";
					$block['sh_bg_imp']['selector'][] = "$block_class .section-heading.sh-t4.sh-s4 .other-link .h-text:before";
					$block['sh_bg_imp']['selector'][] = "$block_class .section-heading.sh-t4.sh-s5 .other-link .h-text";
					$block['sh_bg']['selector'][]     = "$block_class .section-heading.sh-t4 > a > .h-text";
					$block['sh_bg']['selector'][]     = "$block_class_imp .section-heading.sh-t4 .h-text:after";
					$block['sh_bg']['selector'][]     = "$block_class_imp .section-heading.sh-t4 .bs-pretty-tabs-container";
					$block['sh_bg']['selector'][]     = "$block_class_imp .section-heading.sh-t4 .bs-pretty-tabs-container .bs-pretty-tabs-elements";
					$block['sh_bg_imp']['selector'][] = "$block_class_imp .section-heading.multi-tab.sh-t4 .bs-pretty-tabs-container .bs-pretty-tabs-more.other-link:hover .h-text";
					$block['sh_bg_imp']['selector'][] = "$block_class_imp .section-heading.multi-tab.sh-t4.bs-pretty-tabs .bs-pretty-tabs-container .bs-pretty-tabs-more.other-link .h-text";
					$block[]                          = array(
						'selector' => array(
							"$block_class_imp $term_class.section-heading.sh-t4.sh-s5 .h-text:before",
						),
						'prop'     => array(
							'border-top-color' => '%%value%% !important'
						),
					);


				}
			}
		}



		/***
		 *
		 * Type 5
		 *
		 */
		{
			$_check = array(
				't5-s1' => '',
				't5-s2' => '',
				'all'   => '',
			);

			if ( isset( $_check[ $args['style'] ] ) ) {

				/**
				 * Color
				 */
				if ( $_do_color ) {
					$block['sh_color']['selector'][] = "$block_class .section-heading.sh-t5 > .main-link > .h-text$term_class";
					$block['sh_color']['selector'][] = "$block_class $term_class.section-heading.sh-t5 a.active";
					$block['sh_color']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t5 .main-link:first-child:last-child $term_class.h-text";
					$block['sh_color']['selector'][] = "$block_class $term_class.section-heading.sh-t5 > .h-text";
				}


				/**
				 * Important Color
				 */
				if ( $_do_color ) {
					$block['sh_color_imp']['selector'][] = "$block_class .section-heading.sh-t5 a:hover .h-text$term_class";
					$block['sh_color_imp']['selector'][] = "$block_class $term_class.section-heading.sh-t5 a.active .h-text";
				}


				/**
				 * BG Color
				 */
				if ( $_do_bg ) {
					$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t5 > .main-link > $term_class.h-text:before";
					$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t5 > a:first-child:last-child > $term_class.h-text:before";
					$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t5 > $term_class.h-text:first-child:last-child:before";
				}
			}


			/**
			 * BG Fix for blocks with custom background color
			 */
			if ( $_do_widget_bg_fix ) {
				$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t5 .bs-pretty-tabs-container .bs-pretty-tabs-elements";
			}
		}


		/***
		 *
		 * Type 6
		 *
		 */
		{
			$_check = array(
				't6-s1'  => '',
				't6-s2'  => '',
				't6-s3'  => '',
				't6-s4'  => '',
				't6-s5'  => '',
				't6-s6'  => '',
				't6-s7'  => '',
				't6-s8'  => '',
				't6-s9'  => '',
				't6-s10' => '',
				't6-s11' => '',
				't6-s12' => '',
				't6-s13' => '',
				'all'    => '',
			);

			if ( isset( $_check[ $args['style'] ] ) ) {

				/**
				 * Important Color
				 */
				if ( $_do_color ) {
					$block['sh_color']['selector'][] = "$block_class .section-heading.sh-t6 .other-link:hover .h-text$term_class";
					$block['sh_color']['selector'][] = "$block_class $term_class.section-heading.sh-t6 .other-link.active .h-text";
				}


				/**
				 * BG Color
				 */
				if ( $_do_bg ) {
					$block['sh_bg']['selector'][] = "$block_class_imp$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6:before";
					$block['sh_bg']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t6:before";
					$block['sh_bg']['selector'][] = "$block_class $term_class.section-heading.sh-t6 > .h-text";
					$block['sh_bg']['selector'][] = "$block_class $term_class.section-heading.sh-t6 > .h-text:before";
					$block['sh_bg']['selector'][] = "$block_class_imp$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6 > .main-link > $term_class.h-text";
					$block['sh_bg']['selector'][] = "$block_class_imp$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6 > .main-link > $term_class.h-text:before";
					$block['sh_bg']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t6 > a:first-child:last-child > $term_class.h-text";
					$block['sh_bg']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t6 > a:first-child:last-child > $term_class.h-text:before";


					if ( $args['style'] === 'all' || $args['style'] === 't6-s3' ) {
						$block['sh_bg']['selector'][] = "$block_class_imp $term_class.section-heading.sh-t6.sh-s3 > a:first-child:last-child > $term_class.h-text";
						$block[]                      = array(
							'selector' => array(
								"$block_class_imp$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s3 > .main-link > $term_class.h-text:before",
								"$block_class_imp $term_class.section-heading.sh-t6.sh-s3 > a:last-child:first-child > $term_class.h-text:before",
								"$block_class_imp $term_class.section-heading.sh-t6.sh-s3 > $term_class.h-text:last-child:first-child:before",
							),
							'prop'     => array(
								'border-bottom-color' => '%%value%%'
							),
						);
					}

					if ( $args['style'] == 'all' || $args['style'] == 't6-s9' ) {
						$block[] = array(
							'selector' => array(
								"$block_class_imp$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s9 > .h-text:last-child:first-child:before",
								"$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s9 > a:last-child:first-child > .h-text:before",
								"$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s9 > .main-link > .h-text:before",
								"$block_class_imp $term_class.section-heading.sh-t6.sh-s9 > a:last-child:first-child > .h-text:before",
								"$block_class_imp $term_class.section-heading.sh-t6.sh-s9 > .main-link > .h-text:before",
							),
							'prop'     => array(
								'border-top-color' => '%%value%%',
								'background-color' => 'transparent'
							),
						);
					}

					if ( $args['style'] == 'all' || $args['style'] == 't6-s10' ) {
						$block[] = array(
							'selector' => array(
								"$block_class_imp$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s10 > .h-text:last-child:first-child:before",
								"$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s10 > a:last-child:first-child > .h-text:before",
								"$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s10 > .main-link > .h-text:before",
								"$block_class_imp $term_class.section-heading.sh-t6.sh-s10 > a:last-child:first-child > .h-text:before",
								"$block_class_imp $term_class.section-heading.sh-t6.sh-s10 > .main-link > .h-text:before",

							),
							'prop'     => array(
								'border-top-color' => '%%value%%',
								'background-color' => 'transparent'
							),
						);
					}

					if ( $args['style'] == 'all' || $args['style'] == 't6-s11' ) {
						$block[] = array(
							'selector' => array(
								"$block_class_imp $term_class.section-heading.sh-t6.sh-s11 svg path",

							),
							'prop'     => array(
								'fill' => '%%value%%'
							),
						);

						$block[] = array(
							'selector' => array(
								"$block_class_imp$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s11 > .h-text:last-child:first-child:before",
								"$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s11 > a:last-child:first-child > .h-text:before",
								"$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s11 > .main-link > .h-text:before",
								"$block_class_imp $term_class.section-heading.sh-t6.sh-s11 > a:last-child:first-child > .h-text:before",
								"$block_class_imp $term_class.section-heading.sh-t6.sh-s11 > .main-link > .h-text:before",
							),
							'prop'     => array(
								'background-color' => '%%value%%'
							),
						);
					}

					if ( $args['style'] == 'all' || $args['style'] == 't6-s12' ) {
						$block[] = array(
							'selector' => array(
								"$block_class_imp$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s12 > .h-text:last-child:first-child:before",
								"$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s12 > a:last-child:first-child > .h-text:before",
								"$block_class_imp $tab_term_class$tab_term_class.section-heading.sh-t6.sh-s12 > .main-link > .h-text:before",
								"$block_class_imp $term_class.section-heading.sh-t6.sh-s12 > a:last-child:first-child > .h-text:before",
								"$block_class_imp $tab_term_class.section-heading.sh-t6.sh-s12 > .main-link > .h-text:before",

							),
							'prop'     => array(
								'border-top-color' => '%%value%%'
							),
						);
					}
				}


				/**
				 * BG Fix for blocks with custom background color
				 */
				if ( $_do_widget_bg_fix ) {
					$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t6 .bs-pretty-tabs-container .bs-pretty-tabs-elements";

					if ( $args['style'] == 'all' || $args['style'] == 't6-s2' ) {
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t6.sh-s2.bs-pretty-tabs .bs-pretty-tabs-more.other-link .h-text";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t6.sh-s2 .other-link .h-text";
					}

					if ( $args['style'] == 'all' || $args['style'] == 't6-s3' ) {
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t6.sh-s3 > .main-link > .h-text:before";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t6.sh-s3 > a:last-child:first-child > .h-text:before";
						$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t6.sh-s3 > .h-text:last-child:first-child:before";
					}

					if ( $args['style'] == 'all' || $args['style'] == 't6-s4' ) {
						$block[] = array(
							'selector' => array(
								"$block_class_imp .section-heading.sh-t6.sh-s4 > .h-text:last-child:first-child:after",
								"$block_class_imp .section-heading.sh-t6.sh-s4 > a:last-child:first-child > .h-text:after",
								"$block_class_imp .section-heading.sh-t6.sh-s4 > .main-link > .h-text:after",
								"$block_class_imp .section-heading.sh-t6.sh-s4 > .h-text:last-child:first-child:before",
								"$block_class_imp .section-heading.sh-t6.sh-s4 > a:last-child:first-child > .h-text:before",
								"$block_class_imp .section-heading.sh-t6.sh-s4 > .main-link > .h-text:before",
							),
							'prop'     => array(
								'border-' . ( is_rtl() ? 'right' : 'left' ) . '-color' => '%%value%%'
							),
						);
					}

					if ( $args['style'] == 'all' || $args['style'] == 't6-s5' ) {
						$block[] = array(
							'selector' => array(
								"$block_class_imp .section-heading.sh-t6.sh-s5 > .h-text:last-child:first-child:before",
								"$block_class_imp .section-heading.sh-t6.sh-s5 > a:last-child:first-child > .h-text:before",
								"$block_class_imp .section-heading.sh-t6.sh-s5 > .main-link > .h-text:before",
							),
							'prop'     => array(
								'border-top-color' => '%%value%%'
							),
						);
					}

					if ( $args['style'] == 'all' || $args['style'] == 't6-s6' ) {

						$block[] = array(
							'selector' => array(
								"$block_class_imp .section-heading.sh-t6.sh-s6 > .h-text:last-child:first-child:before",
								"$block_class_imp .section-heading.sh-t6.sh-s6 > a:last-child:first-child > .h-text:before",
								"$block_class_imp .section-heading.sh-t6.sh-s6 > .main-link > .h-text:before",
							),
							'prop'     => array(
								'border-top-color' => '%%value%%'
							),
						);

						$block[] = array(
							'selector' => array(
								".bs-light-scheme$block_class_imp .section-heading.sh-t6.sh-s6 > .h-text:last-child:first-child",
								".bs-light-scheme$block_class_imp .section-heading.sh-t6.sh-s6 > a:last-child:first-child > .h-text",
								".bs-light-scheme$block_class_imp .section-heading.sh-t6.sh-s6 > .main-link > .h-text",
							),
							'prop'     => array(
								'color' => '%%value%% !important'
							),
						);

						$block[] = array(
							'selector' => array(
								"$block_class_imp .section-heading.sh-t6.sh-s6 > .h-text:last-child:first-child:after",
								"$block_class_imp .section-heading.sh-t6.sh-s6 > a:last-child:first-child > .h-text:after",
								"$block_class_imp .section-heading.sh-t6.sh-s6 > .main-link > .h-text:after",
							),
							'prop'     => array(
								'background-color' => '%%value%%'
							),
						);
					}

					if ( $args['style'] == 'all' || $args['style'] == 't6-s7' ) {

						$block[] = array(
							'selector' => array(
								"$block_class_imp .section-heading.sh-t6.sh-s7 > .h-text:last-child:first-child:before",
								"$block_class_imp .section-heading.sh-t6.sh-s7 > a:last-child:first-child > .h-text:before",
								"$block_class_imp .section-heading.sh-t6.sh-s7 > .main-link > .h-text:before",
							),
							'prop'     => array(
								'border-bottom-color' => '%%value%%'
							),
						);

						$block[] = array(
							'selector' => array(
								"$block_class_imp .section-heading.sh-t6.sh-s7 > .h-text:last-child:first-child:after",
								"$block_class_imp .section-heading.sh-t6.sh-s7 > a:last-child:first-child > .h-text:after",
								"$block_class_imp .section-heading.sh-t6.sh-s7 > .main-link > .h-text:after",
							),
							'prop'     => array(
								'background-color' => '%%value%%'
							),
						);
					}

					if ( $args['style'] == 'all' || $args['style'] == 't6-s8' ) {
						$block[] = array(
							'selector' => array(
								"$block_class_imp .section-heading.sh-t6.sh-s8 > .h-text:last-child:first-child:after",
								"$block_class_imp .section-heading.sh-t6.sh-s8 > a:last-child:first-child > .h-text:after",
								"$block_class_imp .section-heading.sh-t6.sh-s8 > .main-link > .h-text:after",
							),
							'prop'     => array(
								'border-right-color' => '%%value%%'
							),
						);
					}
				}

			}

		}



		/***
		 *
		 * Type 7
		 *
		 */
		{
			$_check = array(
				't7-s1' => '',
				'all'   => '',
			);

			if ( isset( $_check[ $args['style'] ] ) ) {

				/**
				 * BG Color
				 */
				if ( $_do_bg && ! isset( $args['fix-block-scheme'] ) ) {
					$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t7 > .main-link > $term_class.h-text:before";
					$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t7 > a:first-child:last-child > $term_class.h-text:before";
					$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t7 > $term_class.h-text:first-child:last-child:before";
				}


				/**
				 * Color
				 */
				if ( $_do_color ) {
					$block['sh_color']['selector'][] = "$block_class .section-heading.sh-t7 > .h-text";
				}


			}
			if ( $args['style'] === 'all' || $args['style'] === 't7-s1' ) {
				$block[] = array(
					'selector' => array(
						"$block_class_imp $term_class.section-heading.sh-t7.sh-s1 > .h-text",
						".section-heading.sh-t7.sh-s1 > .h-text"
					),
					'prop'     => array(
						'color' => publisher_get_option( 'section_title_color' )
					),
				);
			}


			/**
			 * BG Fix for blocks with custom background color
			 */
			if ( $_do_widget_bg_fix ) {
				$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t7 .bs-pretty-tabs-container .bs-pretty-tabs-elements";
				$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t7 > a > .h-text";
				$block['sh_bg']['selector'][] = "$block_class_imp .section-heading.sh-t7 > .h-text";
			}
		}



		/***
		 *
		 * Clear Empty Blocks
		 *
		 */
		{
			if ( empty( $block['sh_bg']['selector'] ) ) {
				unset( $block['sh_bg'] );
			}

			if ( empty( $block['sh_bg_imp']['selector'] ) ) {
				unset( $block['sh_bg_imp'] );
			}

			if ( empty( $block['sh_color']['selector'] ) ) {
				unset( $block['sh_color'] );
			}

			if ( empty( $block['sh_color_imp']['selector'] ) ) {
				unset( $block['sh_color_imp'] );
			}
		}

		/**
		 *
		 * Customize Block
		 *
		 */
		if ( $_do_block_color_fix ) {


			$block['_block_customize_color'] = array(
				'selector' => array(
					"$block_class_imp .listing-item:hover .title a",
					"$block_class_imp .listing-item-text-1 .post-meta a:hover",
					"$block_class_imp .listing-item-grid .post-meta a:hover",
					"$block_class_imp .listing-item .rating-stars span:before",
				),
				'prop'     => array(
					'color' => '%%value%% !important'
				),
			);

			$block['_block_customize_bg']                = array(
				'selector' => array(
					"$block_class_imp .listing-item .rating-bar span",
					"$block_class_imp .listing-item .post-count-badge.pcb-t1.pcb-s1",
					"$block_class_imp.better-newsticker .heading",
				),
				'prop'     => array(
					'background-color' => '%%value%% !important',
				),
			);
			$block['_block_customize_border_left_color'] = array(
				'selector' => array(
					"$block_class_imp.better-newsticker .heading:after",
				),
				'prop'     => array(
					'border-left-color' => '%%value%% !important',
				),
			);
			$block['_block_customize_pagin_bg']          = array(
				'selector' => array(
					"$block_class .bs-pagination .btn-bs-pagination:hover",
					"$block_class .btn-bs-pagination.bs-pagination-in-loading",
				),
				'prop'     => array(
					'background-color' => '%%value%% !important',
					'border-color'     => '%%value%% !important',
					'color'            => '#fff !important',
				),
			);

			$block['_block_customize_border'] = array(
				'selector' => array(
					"$block_class .listing-item-text-2:hover .item-inner",
				),
				'prop'     => array(
					'border-color' => '%%value%% !important',
				),
			);

			$block['_block_customize_badge_bg'] = array(
				'selector' => array(
					"$block_class_imp$block_class_imp .term-badges.floated .term-badge a",
					"$block_class_imp .bs-pagination-wrapper .bs-loading > div",
				),
				'prop'     => array(
					'background-color' => '%%value%% !important',
					'color'            => '#fff !important',
				),
			);

		}

	} //publisher_cb_css_generator_section_heading
}


if ( ! function_exists( 'publisher_cb_css_generator_section_heading_widget' ) ) {
	/**
	 *
	 * @param $block
	 * @param $value
	 */
	function publisher_cb_css_generator_section_heading_widget( &$block, &$value ) {

		$new_block = array(
			'fix-block-color' => false,
		);

		// type from panel callback or widget callback
		$type = isset( $block['callback']['args']['type'] ) ? $block['callback']['args']['type'] : ( isset( $block['args']['type'] ) ? $block['args']['type'] : false );

		// no callback mean not valid call!
		if ( ! $type ) {
			return;
		}

		if ( $type == 'general-widget' ) {

			// not a difference style
			if ( $value == publisher_get_option( 'section_heading_style' ) ) {
				$block = $new_block;

				return;
			}

			$section_title_bg_color = publisher_get_option( 'section_title_bg_color' );
			$section_title_color    = publisher_get_option( 'section_title_color' );
		} else {

			if ( ! empty( $block['_NEEDED_WIDGET_VALUE']['bf-widget-title-bg-color'] ) ) {
				$section_title_bg_color = $block['callback']['_NEEDED_WIDGET_VALUE']['bf-widget-title-bg-color'];
			} else {
				$section_title_bg_color = publisher_get_option( 'section_title_bg_color' );
			}

			if ( ! empty( $block['_NEEDED_WIDGET_VALUE']['bf-widget-title-color'] ) ) {
				$section_title_color = $block['callback']['_NEEDED_WIDGET_VALUE']['bf-widget-title-color'];
			} else {
				$section_title_color = publisher_get_option( 'section_title_color' );
			}
		}

		$theme_color = publisher_get_option( 'theme_color' );
		$args        = array(
			'type'            => 'widget_color',
			'section'         => 'all',
			'fix-block-color' => false, // do not generate general styles
			'style'           => $value
		);

		if ( ! $section_title_bg_color && ! $section_title_color ) {

			$value = $theme_color;
			publisher_cb_css_generator_section_heading( $new_block, $value, $args );
			$block = $new_block;
		} else {

			// same color
			if ( $section_title_bg_color && $section_title_bg_color == $section_title_color ) {
				$value = $section_title_bg_color;
				publisher_cb_css_generator_section_heading( $new_block, $value, $args );
				$block = $new_block;
			} else {

				$color_block = $new_block;
				$bg_block    = $new_block;

				if ( $section_title_color ) {

					$args['section'] = 'color';
					$value           = $section_title_color ? $section_title_color : $theme_color;
					publisher_cb_css_generator_section_heading( $color_block, $value, $args );

					foreach ( $color_block as $k => $v ) {
						if ( is_array( $color_block[ $k ] ) ) {
							$color_block[ $k ]['value'] = $value;
						}
					}
				}

				if ( $section_title_bg_color ) {

					$args['section'] = 'bg';
					$value           = $section_title_bg_color ? $section_title_bg_color : $theme_color;
					publisher_cb_css_generator_section_heading( $bg_block, $value, $args );

					foreach ( $bg_block as $k => $v ) {
						$bg_block[ $k ]['value']           = $value;
						$bg_block[ $k ]['fix-block-color'] = false;
					}
				}

				$block = array_merge( array_values( $bg_block ), array_values( $color_block ) );
			}
		}
	} // publisher_cb_css_generator_section_heading_widget
}


if ( ! function_exists( 'publisher_cb_css_resp_bg_image' ) ) {
	/**
	 * CSS Generator callback for Responsive Header BG Image
	 *
	 * @param $block
	 * @param $value
	 */
	function publisher_cb_css_resp_bg_image( &$block, $value ) {

		// Only when user selected bg image style!
		if ( publisher_get_option( 'resp_bg_style' ) !== 'image' ) {
			return;
		}

		$block[] = array(
			'selector' =>
				array(
					'.rh-cover',
				),
			'prop'     =>
				array(
					'background-image',
				),
			'type'     => 'background-image',
		);
	}
}

if ( ! function_exists( 'publisher_cb_css_footer_line_top_color' ) ) {
	/**
	 * CSS Generator callback for Footer Menu background color
	 *
	 * @param $block
	 * @param $value
	 */
	function publisher_cb_css_footer_line_top_color( &$block, $value ) {

		if ( $value === BF_Front_End_CSS::$empty_value_marker || empty( $value ) ) {

			$block[] = array(
				'selector' =>
					array(
						'.site-footer:before',
					),
				'prop'     =>
					array(
						'display' => 'none',
					),
			);
		} else {

			$block[] = array(
				'selector' =>
					array(
						'.site-footer:before',
					),
				'prop'     =>
					array(
						'background' => '%%value%%',
					),
			);
			$block[] = array(
				'selector' =>
					array(
						'.site-footer.boxed',
					),
				'prop'     =>
					array(
						'position' => 'relative',
					),
			);
		}
	}
}

if ( ! function_exists( 'publisher_cb_css_footer_menu_bg' ) ) {
	/**
	 * CSS Generator callback for Footer Menu background color
	 *
	 * @param $block
	 * @param $value
	 */
	function publisher_cb_css_footer_menu_bg( &$block, $value ) {

		if ( $value === BF_Front_End_CSS::$empty_value_marker || empty( $value ) ) {

			$block[] = array(
				'selector' =>
					array(
						'.copy-footer .content-wrap',
					),
				'prop'     =>
					array(
						'overflow-x' => 'auto',
					),
			);

			$block[] = array(
				'selector' =>
					array(
						'.site-footer .copy-footer .footer-menu-wrapper .footer-menu-container:before',
					),
				'prop'     =>
					array(
						'display' => 'none',
					),
			);
		} else {
			$block[] = array(
				'selector' =>
					array(
						'.site-footer .copy-footer .footer-menu-wrapper .footer-menu-container:before',
					),
				'prop'     =>
					array(
						'background-color' => '%%value%%',
					),
			);
			$block[] = array(
				'selector' =>
					array(
						'.footer-menu-container',
					),
				'prop'     =>
					array(
						'border-bottom' => 'none',
					),
			);
			$block[] = array(
				'selector' =>
					array(
						'.copy-footer',
					),
				'prop'     =>
					array(
						'overflow-x' => 'hidden',
					),
			);
		}
	}
}


if ( ! function_exists( 'publisher_cb_css_footer_bg' ) ) {
	/**
	 * Generates background for widgets heading
	 * if the CSS Generator callback for Footer widgets background color did not fired
	 *
	 * @param $block
	 * @param $value
	 */
	function publisher_cb_css_footer_bg( &$block, $value ) {

		if ( publisher_get_option( 'footer_widgets_bg_color' ) ) {
			return;
		}

		// Call the main function for CSS colors
		publisher_cb_css_footer_widgets_bg( $block, $value );
	}
}


if ( ! function_exists( 'publisher_cb_css_footer_widgets_bg' ) ) {
	/**
	 * CSS Generator callback for Footer widgets background color
	 *
	 * @param $block
	 * @param $value
	 */
	function publisher_cb_css_footer_widgets_bg( &$block, $value ) {

		$block[] = array(
			'selector' =>
				array(
					'.site-footer .footer-widgets .section-heading.sh-t1 .h-text',
					'.footer-widgets .section-heading.sh-t4.sh-s3 .h-text:after',
					'.footer-widgets .section-heading.sh-t4.sh-s1 .h-text:after',
					'.footer-widgets .section-heading.sh-t3.sh-s8 > .h-text:last-child:first-child:after',
					'.footer-widgets .section-heading.sh-t3.sh-s8 > a:last-child:first-child > .h-text:after',
					'.footer-widgets .section-heading.sh-t3.sh-s8 > .main-link > .h-text:after',
					'.footer-widgets .section-heading.sh-t3.sh-s8 > .h-text:last-child:first-child:before',
					'.footer-widgets .section-heading.sh-t3.sh-s8 > a:last-child:first-child > .h-text:before',
					'.footer-widgets .section-heading.sh-t3.sh-s8 >.main-link > .h-text:before',
					'.footer-widgets .section-heading.sh-t3.sh-s8.bs-pretty-tabs .bs-pretty-tabs-container .bs-pretty-tabs-more.other-link .h-text',
					'.footer-widgets .section-heading.sh-t3.sh-s8 > a > .h-text',
					'.footer-widgets .section-heading.sh-t3.sh-s8 > .h-text',
					'.footer-widgets .section-heading.sh-t6.sh-s7 > .main-link > .h-text:after',
					'.footer-widgets .section-heading.sh-t6.sh-s7 > a:last-child:first-child > .h-text:after',
					'.footer-widgets .section-heading.sh-t6.sh-s7 > .h-text:last-child:first-child:after',
					'.footer-widgets .section-heading.sh-t6.sh-s6 > .main-link > .h-text:after',
					'.footer-widgets .section-heading.sh-t6.sh-s6 > a:last-child:first-child > .h-text:after',
					'.footer-widgets .section-heading.sh-t6.sh-s6 > .h-text:last-child:first-child:after',
					'.footer-widgets .section-heading.sh-t7.sh-s1 > .main-link > .h-text',
					'.footer-widgets .section-heading.sh-t7.sh-s1 > a:last-child:first-child > .h-text',
					'.footer-widgets .section-heading.sh-t7.sh-s1 .h-text'
				),
			'prop'     =>
				array(
					'background-color' => '%%value%%',
				),
		);

		$block[] = array(
			'selector' => array(
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .main-link > .h-text:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > a:last-child:first-child > .h-text:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .h-text:last-child:first-child:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .main-link > .h-text:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > a:last-child:first-child > .h-text:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .h-text:last-child:first-child:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .main-link > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > a:last-child:first-child > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .h-text:last-child:first-child:before'
			),
			'prop'     => array(
				'border-' . ( is_rtl() ? 'right' : 'left' ) . '-color' => '%%value%%'
			),
		);

		$block[] = array(
			'selector' => array(
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .main-link > .h-text:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > a:last-child:first-child > .h-text:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .h-text:last-child:first-child:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .main-link > .h-text:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > a:last-child:first-child > .h-text:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .h-text:last-child:first-child:after',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .main-link > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > a:last-child:first-child > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s4 > .h-text:last-child:first-child:before'
			),
			'prop'     => array(
				'border-' . ( is_rtl() ? 'right' : 'left' ) . '-color' => '%%value%%'
			),
		);

		$block[] = array(
			'selector' => array(
				'.footer-widgets .section-heading.sh-t6.sh-s7 > .main-link > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s7 > a:last-child:first-child > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s7 > .h-text:last-child:first-child:before',
				'.footer-widgets .section-heading.sh-t6.sh-s6 > .main-link > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s6 > a:last-child:first-child > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s6 > .h-text:last-child:first-child:before',
				'.footer-widgets .section-heading.sh-t6.sh-s5 > .main-link > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s5 > a:last-child:first-child > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s5 > .h-text:last-child:first-child:before'
			),
			'prop'     => array(
				'border-top-color' => '%%value%%'
			),
		);

		$block[] = array(
			'selector' => array(
				'.footer-widgets .section-heading.sh-t6.sh-s7 > .main-link > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s7 > a:last-child:first-child > .h-text:before',
				'.footer-widgets .section-heading.sh-t6.sh-s7 > .h-text:last-child:first-child:before'
			),
			'prop'     => array(
				'border-bottom-color' => '%%value%%'
			),
		);

		$block[] = array(
			'selector' => array(
				'.ltr .footer-widgets .section-heading.sh-t6.sh-s8 > .main-link > .h-text:after',
				'.ltr .footer-widgets .section-heading.sh-t6.sh-s8 > a:last-child:first-child > .h-text:after',
				'.ltr .footer-widgets .section-heading.sh-t6.sh-s8 > .h-text:last-child:first-child:after'
			),
			'prop'     => array(
				'border-right-color' => '%%value%%'
			),
		);

		$block[] = array(
			'selector' => array(
				'.rtl .footer-widgets .section-heading.sh-t6.sh-s8 > .main-link > .h-text:after',
				'.rtl .footer-widgets .section-heading.sh-t6.sh-s8 > a:last-child:first-child > .h-text:after',
				'.rtl .footer-widgets .section-heading.sh-t6.sh-s8 > .h-text:last-child:first-child:after'
			),
			'prop'     => array(
				'border-left-color' => '%%value%%'
			),
		);

	} // publisher_cb_css_footer_widgets_bg
}

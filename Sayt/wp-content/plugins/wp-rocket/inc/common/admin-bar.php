<?php
defined( 'ABSPATH' ) || die( 'Cheatin&#8217; uh?' );

/**
 * Add menu in admin bar.
 * From this menu, you can preload the cache files, clear entire domain cache or post cache (front & back-end).
 *
 * @since 1.3.5 Compatibility with qTranslate
 * @since 1.3.0 Compatibility with WPML
 * @since 1.0
 *
 * @param Object $wp_admin_bar Admin bar object.
 */
function rocket_admin_bar( $wp_admin_bar ) {
	global $pagenow, $post;

	if ( ! current_user_can( apply_filters( 'rocket_capacity', 'manage_options' ) ) ) {
		return;
	}

	if ( ! empty( $_SERVER['REQUEST_URI'] ) ) {
		$referer = filter_var( wp_unslash( $_SERVER['REQUEST_URI'] ), FILTER_SANITIZE_URL );
		$referer = '&_wp_http_referer=' . rawurlencode( remove_query_arg( 'fl_builder', $referer ) );
	} else {
		$referer = '';
	}

	/**
	 * Parent.
	 */
	$wp_admin_bar->add_menu(
		[
			'id'    => 'wp-rocket',
			'title' => WP_ROCKET_PLUGIN_NAME,
			'href'  => admin_url( 'options-general.php?page=' . WP_ROCKET_PLUGIN_SLUG ),
		]
	);

	/**
	 * Settings.
	 */
	$wp_admin_bar->add_menu(
		[
			'parent' => 'wp-rocket',
			'id'     => 'rocket-settings',
			'title'  => __( 'Settings', 'rocket' ),
			'href'   => admin_url( 'options-general.php?page=' . WP_ROCKET_PLUGIN_SLUG ),
		]
	);

	/**
	 * Purge Cache.
	 */
	$action = 'purge_cache';

	if ( rocket_valid_key() ) {
		$i18n_plugin = rocket_has_i18n();

		if ( $i18n_plugin ) {
			// Parent.
			$wp_admin_bar->add_menu(
				[
					'parent' => 'wp-rocket',
					'id'     => 'purge-all',
					'title'  => __( 'Clear cache', 'rocket' ),
					'href'   => '#',
				]
			);

			// Add submenu for each active langs.
			switch ( $i18n_plugin ) {
				case 'wpml':
					$langlinks = get_rocket_wpml_langs_for_admin_bar();
					break;
				case 'qtranslate':
					$langlinks = get_rocket_qtranslate_langs_for_admin_bar();
					break;
				case 'qtranslate-x':
					$langlinks = get_rocket_qtranslate_langs_for_admin_bar( 'x' );
					break;
				case 'polylang':
					$langlinks = get_rocket_polylang_langs_for_admin_bar();
					break;
				default:
					$langlinks = [];
			}

			if ( $langlinks ) {
				foreach ( $langlinks as $lang ) {
					$wp_admin_bar->add_menu(
						[
							'parent' => 'purge-all',
							'id'     => 'purge-all-' . $lang['code'],
							'title'  => $lang['flag'] . '&nbsp;' . $lang['anchor'],
							'href'   => wp_nonce_url( admin_url( 'admin-post.php?action=' . $action . '&type=all&lang=' . $lang['code'] . $referer ), $action . '_all' ),
						]
					);
				}

				if ( 'wpml' !== $i18n_plugin ) {
					// Add subemnu "All langs" (the one for WPML is already printed).
					$wp_admin_bar->add_menu(
						[
							'parent' => 'purge-all',
							'id'     => 'purge-all-all',
							'title'  => '<div class="dashicons-before dashicons-admin-site" style="line-height:1.5"> ' . __( 'All languages', 'rocket' ) . '</div>',
							'href'   => wp_nonce_url( admin_url( 'admin-post.php?action=' . $action . '&type=all&lang=all' . $referer ), $action . '_all' ),
						]
					);
				}
			}
		} else {
			// Purge All.
			$wp_admin_bar->add_menu(
				[
					'parent' => 'wp-rocket',
					'id'     => 'purge-all',
					'title'  => __( 'Clear cache', 'rocket' ),
					'href'   => wp_nonce_url( admin_url( 'admin-post.php?action=' . $action . '&type=all' . $referer ), $action . '_all' ),
				]
			);
		}

		if ( is_admin() ) {
			/**
			 * Purge a post.
			 */
			if ( $post && 'post.php' === $pagenow && isset( $_GET['action'], $_GET['post'] ) ) {
				$wp_admin_bar->add_menu(
					[
						'parent' => 'wp-rocket',
						'id'     => 'purge-post',
						'title'  => __( 'Clear this post', 'rocket' ),
						'href'   => wp_nonce_url( admin_url( 'admin-post.php?action=' . $action . '&type=post-' . $post->ID . $referer ), $action . '_post-' . $post->ID ),
					]
				);

			}
		} else {
			/**
			 * Purge this URL (frontend).
			 */
			$wp_admin_bar->add_menu(
				[
					'parent' => 'wp-rocket',
					'id'     => 'purge-url',
					'title'  => __( 'Purge this URL', 'rocket' ),
					'href'   => wp_nonce_url( admin_url( 'admin-post.php?action=' . $action . '&type=url' . $referer ), $action . '_url' ),
				]
			);
		}

		/**
		 * Purge OPCache content if OPcache is active.
		 */
		if ( function_exists( 'opcache_reset' ) ) {
			$action = 'rocket_purge_opcache';

			$wp_admin_bar->add_menu(
				[
					'parent' => 'wp-rocket',
					'id'     => 'purge-opcache',
					'title'  => __( 'Purge OPcache', 'rocket' ),
					'href'   => wp_nonce_url( admin_url( 'admin-post.php?action=' . $action . $referer ), $action ),
				]
			);
		}

		/**
		 * Regenerate Critical Path CSS.
		 */
		/** This filter is documented in inc/classes/class-rocket-critical-css.php. */
		if ( get_rocket_option( 'async_css' ) && apply_filters( 'do_rocket_critical_css_generation', true ) ) {
			$action = 'rocket_generate_critical_css';

			$wp_admin_bar->add_menu(
				[
					'parent' => 'wp-rocket',
					'id'     => 'regenerate-critical-path',
					'title'  => __( 'Regenerate Critical Path CSS', 'rocket' ),
					'href'   => wp_nonce_url( admin_url( 'admin-post.php?action=' . $action . $referer ), $action ),
				]
			);
		}

		/**
		 * Purge CloudFlare cache if CloudFlare is active.
		 */
		if ( get_rocket_option( 'do_cloudflare', 0 ) ) {
			$action = 'rocket_purge_cloudflare';

			$wp_admin_bar->add_menu(
				[
					'parent' => 'wp-rocket',
					'id'     => 'purge-cloudflare',
					'title'  => __( 'Clear Cloudflare cache', 'rocket' ),
					'href'   => wp_nonce_url( admin_url( 'admin-post.php?action=' . $action . $referer ), $action ),
				]
			);
		}

		/**
		 * Cache Preload.
		 */
		$action = 'preload';

		// Go robot gogo!
		if ( get_rocket_option( 'manual_preload', 1 ) ) {
			$i18n_plugin = rocket_has_i18n();

			if ( $i18n_plugin ) {
				// Parent.
				$wp_admin_bar->add_menu(
					[
						'parent' => 'wp-rocket',
						'id'     => 'preload-cache',
						'title'  => __( 'Preload cache', 'rocket' ),
						'href'   => '#',
					]
				);

				// Add submenu for each active langs.
				if ( ! isset( $langlinks ) ) {
					switch ( $i18n_plugin ) {
						case 'wpml':
							$langlinks = get_rocket_wpml_langs_for_admin_bar();
							break;
						case 'qtranslate':
							$langlinks = get_rocket_qtranslate_langs_for_admin_bar();
							break;
						case 'qtranslate-x':
							$langlinks = get_rocket_qtranslate_langs_for_admin_bar( 'x' );
							break;
						case 'polylang':
							$langlinks = get_rocket_polylang_langs_for_admin_bar();
							break;
						default:
							$langlinks = [];
					}
				}

				if ( $langlinks ) {
					foreach ( $langlinks as $lang ) {
						$wp_admin_bar->add_menu(
							[
								'parent' => 'preload-cache',
								'id'     => 'preload-cache-' . $lang['code'],
								'title'  => $lang['flag'] . '&nbsp;' . $lang['anchor'],
								'href'   => wp_nonce_url( admin_url( 'admin-post.php?action=' . $action . '&lang=' . $lang['code'] . $referer ), $action ),
							]
						);
					}

					if ( 'wpml' !== $i18n_plugin ) {
						// Add subemnu "All langs" (the one for WPML is already printed).
						$wp_admin_bar->add_menu(
							[
								'parent' => 'preload-cache',
								'id'     => 'preload-cache-all',
								'title'  => '<div class="dashicons-before dashicons-admin-site" style="line-height:1.5;"> ' . __( 'All languages', 'rocket' ) . '</div>',
								'href'   => wp_nonce_url( admin_url( 'admin-post.php?action=' . $action . '&lang=all' . $referer ), $action ),
							]
						);
					}
				}
			} else {
				// Preload All.
				$wp_admin_bar->add_menu(
					[
						'parent' => 'wp-rocket',
						'id'     => 'preload-cache',
						'title'  => __( 'Preload cache', 'rocket' ),
						'href'   => wp_nonce_url( admin_url( 'admin-post.php?action=' . $action . $referer ), $action ),
					]
				);
			}
		}
	}

	/**
	 * Go to WP Rocket Documentation.
	 */
	$wp_admin_bar->add_menu(
		[
			'parent' => 'wp-rocket',
			'id'     => 'docs',
			'title'  => __( 'Documentation', 'rocket' ),
			'href'   => get_rocket_documentation_url(),
		]
	);

	/**
	 * Go to WP Rocket FAQ.
	 */
	$wp_admin_bar->add_menu(
		[
			'parent' => 'wp-rocket',
			'id'     => 'faq',
			'title'  => __( 'FAQ', 'rocket' ),
			'href'   => get_rocket_faq_url(),
		]
	);

	/**
	 * Go to WP Rocket Support.
	 */
	$wp_admin_bar->add_menu(
		[
			'parent' => 'wp-rocket',
			'id'     => 'support',
			'title'  => __( 'Support', 'rocket' ),
			'href'   => rocket_get_external_url(
				'support',
				[
					'utm_source' => 'wp_plugin',
					'utm_medium' => 'wp_rocket',
				]
			),
		]
	);
}
add_action( 'admin_bar_menu', 'rocket_admin_bar', PHP_INT_MAX );

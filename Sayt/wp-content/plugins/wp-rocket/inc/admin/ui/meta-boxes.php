<?php
defined( 'ABSPATH' ) || die( 'Cheatin&#8217; uh?' );

/**
 * Add a link "Purge cache" in the post submit area
 *
 * @since 1.0
 */
function rocket_post_submitbox_start() {
	/** This filter is documented in inc/admin-bar.php */
	if ( current_user_can( apply_filters( 'rocket_capacity', 'manage_options' ) ) ) {
		global $post;
		$url = wp_nonce_url( admin_url( 'admin-post.php?action=purge_cache&type=post-' . $post->ID ), 'purge_cache_post-' . $post->ID );
		printf( '<div id="purge-action"><a class="button-secondary" href="%s">%s</a></div>', esc_url( $url ), esc_html__( 'Clear cache', 'rocket' ) );
	}
}
add_action( 'post_submitbox_start', 'rocket_post_submitbox_start' );

/**
 * Add "Cache options" metabox
 *
 * @since 2.5
 */
function rocket_cache_options_meta_boxes() {
	if ( current_user_can( apply_filters( 'rocket_capacity', 'manage_options' ) ) ) {
		$cpts = get_post_types(
			array(
				'public' => true,
			),
			'objects'
		);
		unset( $cpts['attachment'] );

		foreach ( $cpts as $cpt => $cpt_object ) {
			$label = $cpt_object->labels->singular_name;
			add_meta_box( 'rocket_post_exclude', sprintf( __( 'WP Rocket Options', 'rocket' ), $label ), 'rocket_display_cache_options_meta_boxes', $cpt, 'side', 'core' );
		}
	}
}
add_action( 'add_meta_boxes', 'rocket_cache_options_meta_boxes' );

/**
 * Displays some checkbox to de/activate some cache options
 *
 * @since 2.5
 */
function rocket_display_cache_options_meta_boxes() {
	/** This filter is documented in inc/admin-bar.php */
	if ( current_user_can( apply_filters( 'rocket_capacity', 'manage_options' ) ) ) {
		global $post, $pagenow;
		wp_nonce_field( 'rocket_box_option', '_rocketnonce', false, true );
		?>

		<div class="misc-pub-section">
			<?php
				$reject_current_uri = false;
			if ( 'post-new.php' !== $pagenow ) {
				$rejected_uris = array_flip( get_rocket_option( 'cache_reject_uri' ) );
				$path          = rocket_clean_exclude_file( get_permalink( $post->ID ) );

				if ( isset( $rejected_uris[ $path ] ) ) {
					$reject_current_uri = true;
				}
			}
			?>
			<input name="rocket_post_nocache" id="rocket_post_nocache" type="checkbox" title="<?php esc_html_e( 'Never cache this page', 'rocket' ); ?>" <?php checked( $reject_current_uri, true ); ?>><label for="rocket_post_nocache"><?php esc_html_e( 'Never cache this page', 'rocket' ); ?></label>
		</div>

		<div class="misc-pub-section">
			<p><?php esc_html_e( 'Activate these options on this post:', 'rocket' ); ?></p>
			<?php
			$fields = array(
				'lazyload'         => __( 'LazyLoad for images', 'rocket' ),
				'lazyload_iframes' => __( 'LazyLoad for iframes/videos', 'rocket' ),
				'minify_html'      => __( 'Minify/combine HTML', 'rocket' ),
				'minify_css'       => __( 'Minify/combine CSS', 'rocket' ),
				'minify_js'        => __( 'Minify/combine JS', 'rocket' ),
				'cdn'              => __( 'CDN', 'rocket' ),
				'async_css'        => __( 'Optimize CSS Delivery', 'rocket' ),
				'defer_all_js'     => __( 'Defer JS', 'rocket' ),
			);

			foreach ( $fields as $field => $label ) {
				$disabled = disabled( ! get_rocket_option( $field ), true, false );
				// translators: %s is the name of the option.
				$title   = $disabled ? ' title="' . esc_attr( sprintf( __( 'Activate first the %s option.', 'rocket' ), $label ) ) . '"' : '';
				$class   = $disabled ? ' class="rkt-disabled"' : '';
				$checked = ! $disabled ? checked( ! get_post_meta( $post->ID, '_rocket_exclude_' . $field, true ), true, false ) : '';
				?>

				<input name="rocket_post_exclude_hidden[<?php echo esc_attr( $field ); ?>]" type="hidden" value="on">
				<input name="rocket_post_exclude[<?php echo esc_attr( $field ); ?>]" id="rocket_post_exclude_<?php echo esc_attr( $field ); ?>" type="checkbox"<?php echo $title; ?><?php echo $checked; ?><?php echo $disabled; ?>>
				<label for="rocket_post_exclude_<?php echo esc_attr( $field ); ?>"<?php echo $title; ?><?php echo $class; ?>><?php echo $label; ?></label><br>

				<?php
			}
			?>

			<p class="rkt-note">
			<?php
			// translators: %1$s = opening strong tag, %2$s = closing strong tag.
			printf( esc_html__( '%1$sNote:%2$s None of these options will be applied if this post has been excluded from cache in the global cache settings.', 'rocket' ), '<strong>', '</strong>' );
			?>
			</p>
		</div>

		<?php
	}
}

/**
 * Manage the cache options from the metabox.
 *
 * @since 2.5
 */
function rocket_save_metabox_options() {
	if ( current_user_can( apply_filters( 'rocket_capacity', 'manage_options' ) ) &&
		isset( $_POST['post_ID'], $_POST['rocket_post_exclude_hidden'], $_POST['_rocketnonce'] ) ) {

		check_admin_referer( 'rocket_box_option', '_rocketnonce' );

		// No cache field.
		if ( 'publish' === $_POST['post_status'] ) {
			$new_cache_reject_uri = $cache_reject_uri = get_rocket_option( 'cache_reject_uri' );
			$rejected_uris        = array_flip( $cache_reject_uri );
			$path                 = rocket_clean_exclude_file( get_permalink( $_POST['post_ID'] ) );

			if ( isset( $_POST['rocket_post_nocache'] ) && $_POST['rocket_post_nocache'] ) {
				if ( ! isset( $rejected_uris[ $path ] ) ) {
					array_push( $new_cache_reject_uri, $path );
				}
			} else {
				if ( isset( $rejected_uris[ $path ] ) ) {
					unset( $new_cache_reject_uri[ $rejected_uris[ $path ] ] );
				}
			}

			if ( $new_cache_reject_uri !== $cache_reject_uri ) {
				// Update the "Never cache the following pages" option.
				update_rocket_option( 'cache_reject_uri', $new_cache_reject_uri );

				// Update config file.
				rocket_generate_config_file();
			}
		}

		// Options fields.
		$fields = array(
			'lazyload',
			'lazyload_iframes',
			'minify_html',
			'minify_css',
			'minify_js',
			'cdn',
			'async_css',
			'defer_all_js',
		);

		foreach ( $fields as $field ) {
			if ( isset( $_POST['rocket_post_exclude_hidden'][ $field ] ) && $_POST['rocket_post_exclude_hidden'][ $field ] ) {
				if ( isset( $_POST['rocket_post_exclude'][ $field ] ) ) {
					delete_post_meta( $_POST['post_ID'], '_rocket_exclude_' . $field );
				} else {
					if ( get_rocket_option( $field ) ) {
						update_post_meta( $_POST['post_ID'], '_rocket_exclude_' . $field, true );
					}
				}
			}
		}
	}
}
add_action( 'save_post', 'rocket_save_metabox_options' );

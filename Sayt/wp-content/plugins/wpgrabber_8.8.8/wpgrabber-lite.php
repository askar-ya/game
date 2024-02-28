<?php
/**
 * @package WPGrabber
 * Plugin Name: WPGrabber 8.8.8 PRO
 * Plugin URI: https://wpgrabber.su/
 * Description: Профессиональный плагин автопарсинга контента для сайтов и блогов на CMS WordPress. |  Professional content auto-parsing plugin for sites and blogs on WordPress CMS.
 * Version: 8.8.8 PRO
 * Author: @WPGrabber
 * Author URI: https://wpgrabber.su/
 * GitHub Plugin URI: https://wpgrabber.su/
 */
if (defined('WPGRABBER_VERSION')) {
    die('На сайте активирован плагин WPGrabber версии ' . WPGRABBER_VERSION . '. Пожалуйста, деактивируйте его перед активацией данного плагина.');
}
define('WPGRABBER_VERSION', '8.8.8');

define('WPGRABBER_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('WPGRABBER_PLUGIN_URL', plugin_dir_url(__FILE__));
define('WPGRABBER_PLUGIN_FILE', __FILE__);

require WPGRABBER_PLUGIN_DIR.'init.php';

function delFirstPic($content)
{
    $content = preg_replace("~<img[^>]+>~is", "", $content, 1);
    return $content;
}

if (get_option('wpg_' .'delFirstPic') == '1') add_filter ('the_content', 'delFirstPic');
if (get_option('wpg_' .'delFirstPic') == '0') remove_filter ('the_content', 'delFirstPic');


#
# https://wp-kama.ru/function/wp_enqueue_script#primery
#
function wpg_instagram_embed() {
    wp_register_script( 'instagram_embed', 'https://www.instagram.com/embed.js');
    // in_footer
    #wp_register_script( 'instagram_embed', 'https://www.instagram.com/embed.js', array(), false, true);

    wp_enqueue_script( 'instagram_embed' );
    // in_footer
    #wp_enqueue_script( 'instagram_embed', 'https://www.instagram.com/embed.js', array(), false, true);
}

function wpg_pinterest_embed() {
    wp_register_script( 'pinterest_embed', 'https://assets.pinterest.com/js/pinit.js');
    wp_enqueue_script( 'pinterest_embed' );
}

if (get_option('wpg_' .'instagram_embed_on') == '1') add_action( 'wp_enqueue_scripts', 'wpg_instagram_embed' );
if (get_option('wpg_' .'pinterest_embed_on') == '1') add_action( 'wp_enqueue_scripts', 'wpg_pinterest_embed' );

$vk_access_token_url = get_option('wpg_' .'vk_access_token_url');
if ( isset( $vk_access_token_url ) && ! empty( $vk_access_token_url ) ) {
    $url                      = explode( '#', $vk_access_token_url );
    $params                   = wp_parse_args( $url[1] );
    $vk_access_token = $params['access_token'];
    update_option('wpg_vk_access_token', $vk_access_token );
}

?>
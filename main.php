<?php
/*
 * Plugin Name: Vimeo Videos - single video embed shortocde
 * Plugin URI: https://codeflavors.com/vimeo-video-post/
 * Description: Adds shortcode "cvm_embed_video_shortcode" to plugin Vimeo Video Post that allows embedding the video in video posts into a certain position.
 * Author: CodeFlavors
 * Version: 1.0
 * Author URI: https://codeflavors.com
 */

if( !function_exists( 'cvm_embed_video_shortcode' ) ) {
	/**
	 * Shortcode callback that displays the video into a video post into
	 * the exact position where the shortode is.
	 * @return string|void
	 */
	function cvm_embed_video_shortcode() {
		if ( ! is_singular() || ! cvm_is_video() ) {
			return;
		}
		global $post;

		return cvm_get_video_embed_html( $post, false );
	}

	add_shortcode( 'cvm_video_embed', 'cvm_embed_video_shortcode' );
}

/**
 * Prevent Vimeo Video Post from embedding automatically
 */
add_filter('cvm_automatic_video_embed', '__return_false');
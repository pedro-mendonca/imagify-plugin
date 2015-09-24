<?php
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

/**
 * Check if Imagify is activated on the network.
 *
 * @since 1.0
 *
 * return bool True if Imagify is activated on the network
 */
function imagify_is_active_for_network() {
    if ( ! function_exists( 'is_plugin_active_for_network' ) ) {
	    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    }
    return is_plugin_active_for_network( 'imagify/imagify.php' );
}

/*
 * Get the URL related to specific admin page or action.
 *
 * @since 1.0
 *
 * @return string The URL of the specific admin page or action
 */
function get_imagify_admin_url( $action = 'options-general', $arg = '' ) {
	$url = '';

	switch( $action ) {
		case 'manual-override-upload':
			$url = wp_nonce_url( admin_url( 'admin-post.php?action=imagify_manual_override_upload&attachment_id=' . $arg ), 'imagify-manual-override-upload' );
		break;

		case 'manual-upload':
			$url = wp_nonce_url( admin_url( 'admin-post.php?action=imagify_manual_upload&attachment_id=' . $arg ), 'imagify-manual-upload' );
		break;

		case 'restore-upload' :
			$url = wp_nonce_url( admin_url( 'admin-post.php?action=imagify_restore_upload&attachment_id=' . $arg ), 'imagify-restore-upload' );
		break;

		case 'dismiss-notice':
			$url = wp_nonce_url( admin_url( 'admin-post.php?action=imagify_dismiss_notice&notice=' . $arg ), 'imagify-dismiss-notice' );
		break;

		case 'bulk-optimization':
			$url = admin_url( 'upload.php?page=' . IMAGIFY_SLUG . '-bulk-optimization' );
		break;

		case 'options-general':
		default :
			$page = imagify_is_active_for_network() ? network_admin_url( 'settings.php' ) : admin_url( 'options-general.php' );
			$url  = $page . '?page=' . IMAGIFY_SLUG;
		break;
	}

	return $url;
}

/**
 * Renew a dismissed Imagify notice.
 *
 * @since 1.0
 *
 * @return void
 */
function imagify_renew_notice( $notice, $user_id = 0 ) {
	global $current_user;
	$user_id = ( 0 === $user_id ) ? $current_user->ID : $user_id;
	$notices = get_user_meta( $user_id, '_imagify_ignore_notices', true );

	if( $notices && false !== array_search( $notice, $notices ) ) {
		unset( $notices[array_search( $notice, $notices )] );
		update_user_meta( $user_id, '_imagify_ignore_notices', $notices );
	}
}

/**
 * Dismissed an Imagify notice.
 *
 * @since 1.0
 *
 * @return void
 */
function imagify_dismiss_notice( $notice, $user_id = 0 ) {
	global $current_user;
	$user_id   = ( 0 === $user_id ) ? $current_user->ID : $user_id;
	$notices   = get_user_meta( $user_id, '_imagify_ignore_notices', true );
	$notices[] = $notice;
	$notices   = array_filter( $notices );
	$notices   = array_unique( $notices );

	update_user_meta( $user_id, '_imagify_ignore_notices', $notices );
}
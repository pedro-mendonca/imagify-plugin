<?php
defined( 'ABSPATH' ) || die( 'Cheatin\' uh?' );

?>
<div class="imagify-title">
	<div class="imagify-logo-block">
		<img width="225" height="26" alt="Imagify" src="<?php echo IMAGIFY_ASSETS_IMG_URL; ?>imagify-logo.png" class="imagify-logo" />
		<small>
			<sup><?php echo IMAGIFY_VERSION; ?></sup>
		</small>
	</div>

	<p class="imagify-rate-us">
		<?php
		printf(
			/* translators: 1 is a "bold" tag start, 2 is the "bold" tag end + a line break tag, 3 is a link tag start, 4 is the link tag end. */
			__( '%1$sDo you like this plugin?%2$s Please take a few seconds to %3$srate it on WordPress.org%4$s!', 'imagify' ),
			'<strong>',
			'</strong><br />',
			'<a href="' . esc_url( imagify_get_external_url( 'rate' ) ) . '" target="_blank">',
			'</a>'
		);
		?>
		<br>
		<a class="stars" href="<?php echo esc_url( imagify_get_external_url( 'rate' ) ); ?>" target="_blank"><?php echo str_repeat( '<span class="dashicons dashicons-star-filled"></span>', 5 ); ?></a>
	</p>

	<p class="imagify-documentation-link-box">
		<span class="imagify-documentation-link-icon" aria-hidden="true"><svg viewBox="0 0 23 31" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="nonzero"><g fill="#40b1d0"><path d="m22.361 31h-21.722c-.353 0-.639-.289-.639-.646v-21.958c0-.172.068-.336.187-.457l7.667-7.75c.12-.12.282-.189.452-.189h14.06c.353 0 .639.289.639.646v29.708c0 .357-.286.646-.639.646m-21.08-1.292h20.444v-28.417h-13.152l-7.292 7.372v21.05"/><path d="m8.306 9.04h-7.667c-.353 0-.639-.289-.639-.646 0-.357.286-.646.639-.646h7.03v-7.104c0-.357.286-.646.639-.646.353 0 .639.289.639.646v7.75c0 .357-.286.646-.639.646"/></g><g fill="#f2f5f7"><path d="m18.375 11h-13.75c-.345 0-.625-.224-.625-.5 0-.276.28-.5.625-.5h13.75c.345 0 .625.224.625.5 0 .276-.28.5-.625.5"/><path d="m19.333 7h-6.667c-.368 0-.667-.224-.667-.5 0-.276.299-.5.667-.5h6.667c.368 0 .667.224.667.5 0 .276-.299.5-.667.5"/><path d="m18.375 15h-13.75c-.345 0-.625-.224-.625-.5 0-.276.28-.5.625-.5h13.75c.345 0 .625.224.625.5 0 .276-.28.5-.625.5"/><path d="m18.375 19h-13.75c-.345 0-.625-.224-.625-.5 0-.276.28-.5.625-.5h13.75c.345 0 .625.224.625.5 0 .276-.28.5-.625.5"/><path d="m18.375 23h-13.75c-.345 0-.625-.224-.625-.5 0-.276.28-.5.625-.5h13.75c.345 0 .625.224.625.5 0 .276-.28.5-.625.5"/><path d="m18.375 27h-13.75c-.345 0-.625-.224-.625-.5 0-.276.28-.5.625-.5h13.75c.345 0 .625.224.625.5 0 .276-.28.5-.625.5"/></g></g></svg></span>
		<span><?php _e( 'Need help or have questions?', 'imagify' ); ?><br/>
		<a class="imagify-documentation-link" href="<?php echo esc_url( imagify_get_external_url( 'documentation' ) ); ?>" target="_blank"><?php _e( 'Check our documentation.', 'imagify' ); ?></a></span>
	</p>
</div>
<?php

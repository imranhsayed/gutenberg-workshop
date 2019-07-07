<?php
/**
 * Gutenberg workshop custom functions.
 *
 * @package gutenberg-workshop
 */
/**
 * An extension to get_template_part function to allow variables to be passed to the template.
 *
 * @param  string $slug file slug like you use in get_template_part without php extension.
 * @param  array  $variables pass an array of variables you want to use in array keys.
 *
 * @return void
 */
function gtbw_get_template_part( $slug, $variables = array() ) {
	$template         = sprintf( '%s.php', $slug );
	$located_template = locate_template( $template, false, false );
	if ( '' === $located_template ) {
		return;
	}
	if ( ! empty( $variables ) && is_array( $variables ) ) {
		extract( $variables, EXTR_SKIP ); // phpcs:ignore -- Used as an exception as there is no better alternative.
	}
	include $located_template; // phpcs:ignore
}
/**
 * Render template.
 *
 * @param string $slug Template path.
 * @param array  $vars Variables to be used in the template.
 *
 * @return string Template markup.
 */
function gtbw_render_template( $slug, $vars = [] ) {
	ob_start();
	gtbw_get_template_part( $slug, $vars );
	$markup = ob_get_clean();
	return $markup;
}

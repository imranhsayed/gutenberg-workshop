<?php
/**
 * Latest post template
 *
 * @package gutenberg-workshop
 */

if ( ! empty( $latest_posts ) && is_array( $latest_posts ) ) {

	foreach ( $latest_posts as $post ) {
		?>
		<div>
			<h4><?php echo $post->title; ?></h4>
		</div>
		<?php
	}

}

<?php
/**
 * Latest post template
 *
 * @package gutenberg-workshop
 */

foreach ( $latest_posts as $post ) {
	?>
	<div>
		<h4><?php echo $post->title; ?></h4>
	</div>
	<?php
}

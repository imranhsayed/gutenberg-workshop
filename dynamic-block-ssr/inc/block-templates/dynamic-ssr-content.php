<?php
/**
 * Latest post template
 *
 * @package gutenberg-workshop
 */

if ( ! empty( $attributes ) && is_array( $attributes ) ) {

	?>
	<div>
		<h4><?php echo esc_html( $attributes['name'] ) ?></h4>

	</div>
	<?php

}

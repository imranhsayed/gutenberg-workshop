const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { ServerSideRender } = wp.components;

import './register-store'

console.warn( 'came' );

registerBlockType( 'gtbw-blocks/store-example', {
	title: __( 'Store Example Block', 'gutenberg-workshop' ),
	icon: 'megaphone',
	category: 'widgets',

	attributes: {
		name: {
			type: 'String'
		},
	},

	edit: edit,

	save: () => {
		return null;
	}

} );

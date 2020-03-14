const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

import './food-store';

registerBlockType( 'gtbw-blocks/store-example', {
	title: __( 'Store Example Block', 'gutenberg-workshop' ),
	icon: 'megaphone',
	category: 'widgets',

	attributes: {
		name: {
			type: 'String'
		},
	},

	edit: () => {
		return 'Hello';
	},

	save: () => {
		return null;
	}

} );

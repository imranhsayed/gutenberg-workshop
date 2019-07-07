const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { ServerSideRender } = wp.components;

registerBlockType( 'gtbw-blocks/dynamic-block-ssr', {
	title: __( 'Dynamic Block SSR', 'gutenberg-workshop' ),
	icon: 'megaphone',
	category: 'widgets',

	attributes: {
		name: {
			type: 'String'
		},
	},

	edit: ( props ) => {

		return (
			<div className="gtbw-dynamic-block-ssr">
				<ServerSideRender
					block="gtbw-blocks/dynamic-block-ssr"
					attributes={ {
						name: 'Imran',
					} }
				/>
			</div>
		)
	},

	save: () => {
		return null;
	}

} );

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { withSelect } = wp.data;

registerBlockType( 'gw-blocks/latest-post', {
	title: __( 'Latest Posts', 'ozy' ),
	icon: 'megaphone',
	category: 'widgets',

	edit: withSelect( ( select ) => {
		return {
			posts: select( 'core' ).getEntityRecords( 'postType', 'post' )
		};
	} )( ( { posts, className } ) => {

		if ( ! posts ) {
			return "Loading...";
		}

		if ( posts && ( 0 === posts.length ) ) {
			return "No posts";
		}

		return (
			<div className={ `story-block-title ${ className }` }>

				{/*Title*/}
				<h1 className="c12-fc">
					{ __( 'Latest Posts', 'ozy' ) }
				</h1>

				{/*Popular News Topics*/}
				<div className="popular-news-topics hot-topics-bar">
					<p className="heading">
						{ __( 'Latest Posts', 'ozy' ) }
					</p>
					<ul>
						{ posts.map( post => (
							<li> { post.title } </li>
						) ) }
					</ul>
				</div>
			</div>
		)
	} ),

	save: () => {}

} );

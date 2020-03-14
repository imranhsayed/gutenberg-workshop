
const initialState = {
	chocolate: 'Dairy Milk'
};

const actions = {
	setCookie( cookie = 'Crack-jack' ) {
		return {
			type: 'COOKIES',
			payload: cookie
		};
	},
};

const myStore =  {
	reducer( state = initialState, action ) {

		if ( action.type === 'COOKIES' ) {
			return { ...state, cookie: action.payload }
		}
		return state;
	},
	selectors: {
		getChocolateName( state ) {
			return state.chocolate;
		},
		getCookieName( state ) {
			return state.cookie ? state.cookie : null;
		},
		getChocolateAndCookie( state ) {

			const cookie = state.cookie ? ` ${ state.cookie }, ` : '';

			return state.chocolate + cookie;
		}
	},
	actions: actions,
};

wp.data.registerStore( 'food', myStore );

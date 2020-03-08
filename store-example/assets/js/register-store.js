
const initialState = {
	firstName: 'Imran'
};

const actions = {
	setLastName( lastName = 'Sayed' ) {
		return {
			type: 'LAST_NAME',
			payload: 'Sayed'
		};
	},
};

const myStore =  {
	reducer( state = initialState, action ) {

		if ( action.type === 'LAST_NAME' ) {
			return { ...state, lastName: action.payload }
		}
		return state;
	},
	selectors: {
		getFirstName( state ) {
			return state.firstName;
		},
		getLastName( state ) {
			return state.lastName ? state.lastName : null;
		},
		getFullName( state ) {

			const lastName = state.lastName ? ` ${ state.lastName }` : '';

			return state.firstName + lastName;
		}
	},
	actions: actions,
};

wp.data.registerStore( 'person', myStore );

export const getCourse = ( course ) => {
	return fetch( `/wp-json/wp/v2/courses/${ course }` )
		.then( response => response.json() )
		.then(
			course => {
				return course;
			},
			error => {
				console.log( error );
				return error;
			}
		);
};

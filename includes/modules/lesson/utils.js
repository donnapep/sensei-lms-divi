export const getLesson = ( lesson ) => {
	return fetch( `/wp-json/wp/v2/lessons/${ lesson }` )
		.then( response => response.json() )
		.then(
			lesson => {
				return lesson;
			},
			error => {
				console.log( error );
				return error;
			}
		);
};

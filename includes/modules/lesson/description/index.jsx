/**
 * External dependencies
 */
import React, { Component, Fragment } from 'react';

/**
 * Internal dependencies
 */
import InactiveModule from '../../components/inactive-module';
import Spinner from '../../components/spinner';
import { getLesson } from '../utils';

class LessonDescription extends Component {
	static slug = 'sensei_lesson_description';

	constructor( props ) {
		super( props );

		this.state = {
			lesson: {},
			error: null,
			isLoading: true,
		};
	}

	componentDidMount() {
		this.loadLesson();
	}

	componentDidUpdate( prevProps ) {
		if ( this.props.lesson !== prevProps.lesson ) {
			this.loadLesson();
		}
	}

	loadLesson() {
		getLesson( this.props.lesson )
			.then( lesson => {
				this.setState( {
					lesson,
					isLoading: false,
				} );
			} )
			.catch( error => {
				this.setState( {
					error,
					isLoading: false,
				} );
			} );
	}

	render() {
		const {
			description_type,
			message,
			name,
		} = this.props;
		const {
			lesson,
			error,
			isLoading,
		} = this.state;

		let description;

		if ( 'description' === description_type ) {
			description = lesson.content && lesson.content.rendered;
		} else {
			description = lesson.excerpt && lesson.excerpt.rendered;
		}

		if ( name ) {
			return (
				<InactiveModule
					name={ name }
					message={ message }
				/>
			);
		}

		return (
			<Fragment>
				{ isLoading &&
					<Spinner />
				}

				{ ! error &&
					<div dangerouslySetInnerHTML={ { __html: description } } />
				}
			</Fragment>
		);
	}
}

export default LessonDescription;

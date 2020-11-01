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

class LessonTitle extends Component {
	static slug = 'sensei_lesson_title';

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
			message,
			name,
		} = this.props;
		const {
			lesson,
			error,
			isLoading,
		} = this.state;

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
					<this.props.header_level dangerouslySetInnerHTML={ { __html: lesson.title && lesson.title.rendered } } />
				}
			</Fragment>
		);
	}
}

export default LessonTitle;

/**
 * External dependencies
 */
import React, { Component, Fragment } from 'react';

/**
 * Internal dependencies
 */
import InactiveModule from '../../components/inactive-module';
import Spinner from '../../components/spinner';
import { getCourse } from '../utils';

class CourseDescription extends Component {
	static slug = 'sensei_course_description';

	constructor( props ) {
		super( props );

		this.state = {
			course: {},
			error: null,
			isLoading: true,
		};
	}

	componentDidMount() {
		this.loadCourse();
	}

	componentDidUpdate( prevProps ) {
		if ( this.props.course !== prevProps.course ) {
			this.loadCourse();
		}
	}

	loadCourse() {
		getCourse( this.props.course )
			.then( course => {
				this.setState( {
					course,
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
			course,
			error,
			isLoading,
		} = this.state;

		let description;

		if ( 'description' === description_type ) {
			description = course.content && course.content.rendered;
		} else {
			description = course.excerpt && course.excerpt.rendered;
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

export default CourseDescription;

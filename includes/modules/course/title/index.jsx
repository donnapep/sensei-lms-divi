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

class CourseTitle extends Component {
	static slug = 'sensei_course_title';

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
			message,
			name,
		} = this.props;
		const {
			course,
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
					<this.props.header_level dangerouslySetInnerHTML={ { __html: course.title && course.title.rendered } } />
				}
			</Fragment>
		);
	}
}

export default CourseTitle;

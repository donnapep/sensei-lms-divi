<?php
/**
 * Sensei LMS Course Description module.
 *
 * @since 1.0.0
 */
class Sensei_Course_Description extends ET_Builder_Module {
	/**
	 * Initialize the module.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		$this->name       = esc_html__( 'Course Description', 'sensei-divi' );
		$this->plural     = esc_html__( 'Course Descriptions', 'sensei-divi' );
		$this->slug       = 'sensei_course_description';
		$this->icon       = '3';
		$this->vb_support = 'on';

		$this->settings_modal_toggles = array(
			'general' => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Content', 'sensei-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					// Enable styling different elements in the description.
					'body' => array(
						'title'             => esc_html__( 'Description Text', 'sensei-divi' ),
						'priority'          => 45,
						'tabbed_subtoggles' => true,
						'bb_icons_support'  => true,
						'sub_toggles'       => array(
							'p' => array(
								'name' => 'P',
								'icon' => 'text-left',
							),
							'a' => array(
								'name' => 'A',
								'icon' => 'text-link',
							),
							'ul' => array(
								'name' => 'UL',
								'icon' => 'list',
							),
							'ol' => array(
								'name' => 'OL',
								'icon' => 'numbered-list',
							),
							'quote' => array(
								'name' => 'QUOTE',
								'icon' => 'text-quote',
							),
						),
					),
					// Enable styling headings in the description.
					'header' => array(
						'title'             => esc_html__( 'Heading Text', 'sensei-divi' ),
						'priority'          => 49,
						'tabbed_subtoggles' => true,
						'sub_toggles'       => array(
							'h1' => array(
								'name' => 'H1',
								'icon' => 'text-h1',
							),
							'h2' => array(
								'name' => 'H2',
								'icon' => 'text-h2',
							),
							'h3' => array(
								'name' => 'H3',
								'icon' => 'text-h3',
							),
							'h4' => array(
								'name' => 'H4',
								'icon' => 'text-h4',
							),
							'h5' => array(
								'name' => 'H5',
								'icon' => 'text-h5',
							),
							'h6' => array(
								'name' => 'H6',
								'icon' => 'text-h6',
							),
						),
					),
				),
			),
		);

		$this->advanced_fields = array(
			'fonts' => array(
				// Text settings for the different elements in the description. Design tab > Text setting.
				'body' => array(
					'label' => esc_html__( 'Description', 'sensei-divi' ),
					'css'   => array(
						'line_height' => '%%order_class%% p',
						'color'       => '%%order_class%%.sensei_course_description',
					),
					'line_height' => array(
						'default' => floatval( et_get_option( 'body_font_height', '1.7' ) ) . 'em',
					),
					'font_size' => array(
						'default' => absint( et_get_option( 'body_font_size', '14' ) ) . 'px',
					),
					'toggle_slug'     => 'body',
					'sub_toggle'      => 'p',
					'hide_text_align' => true,
				),
				'link' => array(
					'label' => esc_html__( 'Link', 'sensei-divi' ),
					'css' => array(
						'main'  => '%%order_class%% a',
						'color' => '%%order_class%%.sensei_course_description a',
					),
					'line_height' => array(
						'default' => '1em',
					),
					'font_size' => array(
						'default' => absint( et_get_option( 'body_font_size', '14' ) ) . 'px',
					),
					'toggle_slug'     => 'body',
					'sub_toggle'      => 'a',
					'hide_text_align' => true,
				),
				'ul' => array(
					'label' => esc_html__( 'Unordered List', 'sensei-divi' ),
					'css'   => array(
						'main'        => '%%order_class%% ul',
						'color'       => '%%order_class%%.sensei_course_description ul',
						'line_height' => '%%order_class%% ul li',
					),
					'line_height' => array(
						'default' => '1em',
					),
					'font_size' => array(
						'default' => '14px',
					),
					'toggle_slug' => 'body',
					'sub_toggle'  => 'ul',
				),
				'ol' => array(
					'label' => esc_html__( 'Ordered List', 'sensei-divi' ),
					'css'   => array(
						'main'        => '%%order_class%% ol',
						'color'       => '%%order_class%%.sensei_course_description ol',
						'line_height' => '%%order_class%% ol li',
					),
					'line_height' => array(
						'default' => '1em',
					),
					'font_size' => array(
						'default' => '14px',
					),
					'toggle_slug' => 'body',
					'sub_toggle'  => 'ol',
				),
				'quote' => array(
					'label' => esc_html__( 'Blockquote', 'sensei-divi' ),
					'css'   => array(
						'main'  => '%%order_class%% blockquote',
						'color' => '%%order_class%%.sensei_course_description blockquote',
					),
					'line_height' => array(
						'default' => '1em',
					),
					'font_size' => array(
						'default' => '14px',
					),
					'toggle_slug' => 'body',
					'sub_toggle'  => 'quote',
				),
				// Text settings for the headers in the description. Design tab > Heading Text setting.
				'header' => array(
					'label' => esc_html__( 'Heading', 'sensei-divi' ),
					'css'   => array(
						'main' => '%%order_class%% h1',
					),
					'font_size' => array(
						'default' => absint( et_get_option( 'body_header_size', '30' ) ) . 'px',
					),
					'line_height' => array(
						'default' => '1em',
					),
					'toggle_slug' => 'header',
					'sub_toggle'  => 'h1',
				),
				'header_2' => array(
					'label' => esc_html__( 'Heading 2', 'sensei-divi' ),
					'css'   => array(
						'main' => '%%order_class%% h2',
					),
					'font_size' => array(
						'default' => '26px',
					),
					'line_height' => array(
						'default' => '1em',
					),
					'toggle_slug' => 'header',
					'sub_toggle'  => 'h2',
				),
				'header_3' => array(
					'label' => esc_html__( 'Heading 3', 'sensei-divi' ),
					'css'   => array(
						'main' => '%%order_class%% h3',
					),
					'font_size' => array(
						'default' => '22px',
					),
					'line_height' => array(
						'default' => '1em',
					),
					'toggle_slug' => 'header',
					'sub_toggle'  => 'h3',
				),
				'header_4' => array(
					'label' => esc_html__( 'Heading 4', 'sensei-divi' ),
					'css'   => array(
						'main' => '%%order_class%% h4',
					),
					'font_size' => array(
						'default' => '18px',
					),
					'line_height' => array(
						'default' => '1em',
					),
					'toggle_slug' => 'header',
					'sub_toggle'  => 'h4',
				),
				'header_5' => array(
					'label' => esc_html__( 'Heading 5', 'sensei-divi' ),
					'css'   => array(
						'main' => '%%order_class%% h5',
					),
					'font_size' => array(
						'default' => '16px',
					),
					'line_height' => array(
						'default' => '1em',
					),
					'toggle_slug' => 'header',
					'sub_toggle'  => 'h5',
				),
				'header_6' => array(
					'label' => esc_html__( 'Heading 6', 'sensei-divi' ),
					'css'   => array(
						'main' => '%%order_class%% h6',
					),
					'font_size' => array(
						'default' => '14px',
					),
					'line_height' => array(
						'default' => '1em',
					),
					'toggle_slug' => 'header',
					'sub_toggle'  => 'h6',
				),
			),
			// Needed for bottom margin to work correctly.
			'margin_padding' => array(
				'css' => array(
					'important' => 'all',
				),
			),
			// This removes the duplicate Text section because of toggle_slug.
			'text' => array(
				'sub_toggle'            => 'p',
				'toggle_slug'           => 'body',
				'options'               => array(
					'text_orientation' => array(
						'default' => 'left',	// Default alignment of body text.
					),
				),
			),
		);
	}

	/**
	 * Define the module settings.
	 *
	 * @since 1.0.0
	 *
	 * @return array Module settings.
	 */
	public function get_fields() {
		$helper = Sensei_Divi_Helper::instance();
		$courses = $helper->get_courses();

		// Workaround for course ID not being passed to React component unless default is set.
		reset( $courses );
		$default = ! empty( $courses ) ? key( $courses ) : '';

		$fields = array(
			'course'            => array(
				'default'         => $default,
				'description'     => esc_html__( 'Select a course.', 'sensei-divi' ),
				'displayRecent'   => false,
				'label'           => esc_html__( 'Course', 'sensei-divi' ),
				'option_category' => 'basic_option',
				'options'         => $courses,
				'searchable'      => true,
				'toggle_slug'     => 'main_content',
				'type'            => 'select',
			),
			'description_type'  => array(
				'default'         => 'excerpt',
				'description'     => esc_html__( 'Choose between displaying the excerpt or the full description.', 'sensei-divi' ),
				'label'           => esc_html__( 'Description Type', 'sensei-divi' ),
				'option_category' => 'configuration',
				'options'         => array(
					'description'   => esc_html__( 'Description', 'sensei-divi' ),
					'excerpt'       => esc_html__( 'Excerpt', 'sensei-divi' ),
				),
				'toggle_slug'     => 'main_content',
				'type'            => 'select',
			),
		);

		if ( ! $helper->is_sensei_active() ) {
			$fields['name'] = array(
				'default' => $this->name,
				'type'    => 'hidden',
			);
			$fields['message'] = array(
				'default' => esc_html( $helper->get_inactive_notice() ),
				'type'    => 'hidden',
			);
		}

		return $fields;
	}

	/**
	 * Get the course description.
	 *
	 * @since 1.0.0
	 *
	 * @return string Course description.
	 */
	protected function get_description() {
		$course_id        = $this->props['course'];
		$description_type = $this->props['description_type'] ? $this->props['description_type'] : 'excerpt' ;

		if ( ! $course_id ) {
			return '';
		}

		$course = get_post( $course_id );

		if ( 'description' === $description_type ) {
			return wp_kses_post( $course->post_content );
		} else {
			return wp_kses_post( $course->post_excerpt );
		}
	}

	/**
	 * Render the module output on the frontend.
	 *
	 * @since 1.0.0
	 *
	 * @param  array  $attrs       List of attributes.
	 * @param  string $content     Content being processed.
	 * @param  string $render_slug Slug of module that is used for rendering output.
	 * @return string Output to display on the frontend.
	 */
	public function render( $attrs, $content = null, $render_slug ) {
		$output = $this->get_description();

		// Render empty string if no output is generated to avoid unwanted vertical space.
		if ( '' === $output ) {
			return '';
		}

		return $output;
	}
}

new Sensei_Course_Description();

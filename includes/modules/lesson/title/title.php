<?php
/**
 * Sensei LMS Lesson Title module.
 *
 * @since 1.0.0
 */
class Sensei_Lesson_Title extends ET_Builder_Module {
	/**
	 * Initialize the module.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		$this->name       = esc_html__( 'Lesson Title', 'sensei-divi' );
		$this->plural     = esc_html__( 'Lesson Titles', 'sensei-divi' );
		$this->slug       = 'sensei_lesson_title';
		$this->icon       = 'a';
		$this->vb_support = 'on';

		$this->settings_modal_toggles = array(
			'general' => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Content', 'sensei-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'header' => array(
						'title' => esc_html__( 'Title Text', 'sensei-divi' ),
					),
				),
			),
		);

		$this->advanced_fields = array(
			'fonts' => array(
				'header' => array(
					'label' => esc_html__( 'Title', 'sensei-divi' ),
					'css'   => array(
						'main' => '%%order_class%% h1, %%order_class%% h2, %%order_class%% h3, %%order_class%% h4, %%order_class%% h5, %%order_class%% h6',
					),
					'header_level' => array(
						'default' => 'h1',
					),
					'toggle_slug' => 'header',
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
				'use_text_orientation' => false,
				'toggle_slug'          => 'header',
			),
		);

		$this->custom_css_fields = array(
			'title_text' => array(
				'label'    => esc_html__( 'Lesson Title', 'sensei-divi' ),
				'selector' => '%%order_class%% h1, %%order_class%% h2, %%order_class%% h3, %%order_class%% h4, %%order_class%% h5, %%order_class%% h6',
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
		$lessons = $helper->get_lessons();

		// Workaround for lesson ID not being passed to React component unless default is set.
		reset( $lessons );
		$default = ! empty( $lessons ) ? key( $lessons ) : '';

		$fields = array(
			'lesson'            => array(
				'default'         => $default,
				'description'     => esc_html__( 'Select a lesson.', 'sensei-divi' ),
				'displayRecent'   => false,
				'label'           => esc_html__( 'Lesson', 'sensei-divi' ),
				'option_category' => 'basic_option',
				'options'         => $helper->get_lessons(),
				'searchable'      => true,
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
	 * Get the lesson title markup.
	 *
	 * @since 1.0.0
	 *
	 * @return string Lesson title markup.
	 */
	protected function get_title() {
		$lesson_id    = $this->props['lesson'];
		$header_level = $this->props['header_level'];

		return sprintf(
			'<%1$s>%2$s</%1$s>',
			et_pb_process_header_level( $header_level, 'h1' ),
			esc_html( get_the_title( $lesson_id ) )
		);
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
		$output = $this->get_title();

		// Render empty string if no output is generated to avoid unwanted vertical space.
		if ( '' === $output ) {
			return '';
		}

		return $output;
	}
}

new Sensei_Lesson_Title();

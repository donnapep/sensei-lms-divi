<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Sensei Divi Helper class
 *
 * Common utility functions for fetching course content.
 *
 * @package Core
 * @author Automattic
 *
 * @since 1.0.0
 */
class Sensei_Divi_Helper {
	/**
	 * Singleton instance.
	 *
	 * @since 1.0.0
	 *
	 * @var self $instance Singleton instance.
	 */
	private static $instance;

	/**
	 * Provide a singleton instance.
	 *
	 * @since 1.0.0
	 *
	 * @return self Singleton instance.
	 */
	public static function instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Class constructor. Private so it can only be initialized internally.
	 *
	 * @since 1.0.0
	 */
	private function __construct() {}

	/**
	 * Check if Sensei LMS is activated.
	 *
	 * @since 1.0.0
	 *
	 * @return bool Whether Sensei LMS is activated.
	 */
	public function is_sensei_active() {
		return class_exists( 'Sensei_Main' );
	}

	/**
	 * Get notice when Sensei LMS is not activated.
	 *
	 * @since 1.0.0
	 *
	 * @return bool Whether Sensei LMS is activated.
	 */
	public function get_inactive_notice() {
		return __( 'Sensei LMS must be active for this module to appear.', 'sensei-divi' );
	}

	/**
	 * Get all courses.
	 *
	 * @since 1.0.0
	 *
	 * @return array Associative array of courses where the key is the course ID and the value is the course title.
	 */
	public function get_courses() {
		$courses = array();
		$post_args = array(
			'post_type'      => 'course',
			'posts_per_page' => -1,
		);
		$posts = get_posts( $post_args );

		foreach( $posts as $post ) {
			$courses[ $post->ID ] = $post->post_title;
		}

		return $courses;
	}

	/**
	 * Get all lessons.
	 *
	 * @since 1.0.0
	 *
	 * @return array Associative array of lessons where the key is the lesson ID and the value is the lesson title.
	 */
	public function get_lessons() {
		$lessons   = array();
		$post_args = array(
			'post_type'      => 'lesson',
			'posts_per_page' => -1,
		);
		$posts     = get_posts( $post_args );

		foreach( $posts as $post ) {
			$lessons[ $post->ID ] = $post->post_title;
		}

		return $lessons;
	}
}

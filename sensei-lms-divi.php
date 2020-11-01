<?php
/*
Plugin Name: Sensei LMS Divi
Plugin URI:  sensei-lms-divi
Description: Edit and style Sensei LMS elements using the Divi Builder.
Version:     1.0.0
Author:      Donna Peplinskie
Author URI:  http://donnapeplinskie.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: sensei-divi
Domain Path: /languages

Divi for Sensei LMS is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Divi for Sensei LMS is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Divi for Sensei LMS. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! function_exists( 'sensei_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function sensei_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/sensei-divi-extension.php';
}

add_action( 'divi_extensions_init', 'sensei_initialize_extension' );

endif;

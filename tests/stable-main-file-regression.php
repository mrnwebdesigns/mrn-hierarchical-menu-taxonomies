<?php
/**
 * Regression coverage for the stable WordPress plugin entrypoint.
 *
 * @package MRN_Hierarchical_Menu_Taxonomies
 */

define( 'ABSPATH', __DIR__ . '/' );

function add_filter() {}
function add_action() {}

require dirname( __DIR__ ) . '/mrn-hierarchical-menu-taxonomies.php';

$main_file  = file_get_contents( dirname( __DIR__ ) . '/mrn-hierarchical-menu-taxonomies.php' );
$class_file = file_get_contents( dirname( __DIR__ ) . '/class-mrn-hierarchical-menu-taxonomies.php' );

if ( false === strpos( $main_file, 'Plugin Name: MRN Hierarchical Menu Taxonomies' ) ) {
	fwrite( STDERR, "Stable main file is missing the plugin header.\n" );
	exit( 1 );
}

if ( false !== strpos( $class_file, 'Plugin Name:' ) ) {
	fwrite( STDERR, "Runtime class file must not register a second plugin entry.\n" );
	exit( 1 );
}

if ( ! class_exists( 'MRN_Hierarchical_Menu_Taxonomies' ) || '0.1.1' !== MRN_Hierarchical_Menu_Taxonomies::VERSION ) {
	fwrite( STDERR, "Stable main file did not load the expected runtime version.\n" );
	exit( 1 );
}

echo "PASS: stable plugin main file loads version 0.1.1 exactly once.\n";

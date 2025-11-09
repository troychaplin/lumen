<?php
/**
 * TC Projects Theme Functions
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function tc_projects_add_editor_styles() {
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/custom-styles.css' );
}
add_action( 'after_setup_theme', 'tc_projects_add_editor_styles' );

/**
 * Enqueue custom styles
 */
function tc_projects_enqueue_styles() {
	wp_enqueue_style(
		'tc-projects-custom-styles',
		get_template_directory_uri() . '/assets/css/custom-styles.css',
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'tc_projects_enqueue_styles' );

/**
 * Register custom block patterns category
 */
function tc_projects_register_pattern_categories() {
	register_block_pattern_category(
		'tc-projects',
		array( 'label' => __( 'TC Projects', 'tc-projects' ) )
	);
}
add_action( 'init', 'tc_projects_register_pattern_categories' );

/**
 * Register custom block styles
 */
function tc_projects_register_block_styles() {
	// Stat item with gradient underline
	register_block_style(
		'core/group',
		array(
			'name'  => 'stat-item',
			'label' => __( 'Stat Item', 'tc-projects' ),
		)
	);
	
	// Skill card style
	register_block_style(
		'core/group',
		array(
			'name'  => 'skill-card',
			'label' => __( 'Skill Card', 'tc-projects' ),
		)
	);
	
	// Tool pill style
	register_block_style(
		'core/paragraph',
		array(
			'name'  => 'tool-pill',
			'label' => __( 'Tool Pill', 'tc-projects' ),
		)
	);
}
add_action( 'init', 'tc_projects_register_block_styles' );


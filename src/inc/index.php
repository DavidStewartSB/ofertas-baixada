<?php

include('scripts.php');
include('styles.php');
include('theme-setup.php');
include('functions/cpts.php');
include('functions/truncate-strings.php');
/**
 * Enqueue theme assets.
 */
function theme_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'theme', theme_asset( 'dist/css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'theme', theme_asset( 'dist/js/app.js' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'swiper', theme_asset( 'assets/lib/swiper.js' ), array(), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function theme_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}


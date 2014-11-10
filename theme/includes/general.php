<?php
/**
 * General Theme-Specific Functions.
 *
 * @package     Hoaloha
 * @subpackage  HybridCore
 * @copyright   Copyright (c) 2014, Flagship, LLC
 * @license     GPL-2.0+
 * @link        http://flagshipwp.com/
 * @since       1.0.0
 */

add_action( 'init', 'hoaloha_register_image_sizes', 5 );
/**
 * Register custom image sizes for the theme.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function hoaloha_register_image_sizes() {
	// Set the 'post-thumbnail' size.
	set_post_thumbnail_size( 175, 130, true );

	// Add the 'hoaloha-full' image size.
	add_image_size( 'hoaloha-full', 1025, 500, true );
}

add_filter( 'excerpt_length', 'hoaloha_excerpt_length' );
/**
 * Add a custom excerpt length.
 *
 * @since  1.0.0
 * @access public
 * @param  integer $length
 * @return integer
 */
function hoaloha_excerpt_length( $length ) {
	return 60;
}

add_action( 'tha_entry_top', 'hoaloha_do_sticky_banner' );
/**
 * Add markup for a sticky ribbon on sticky posts in archive views.
 *
 * @since   1.0.0
 * @return  void
 */
function hoaloha_do_sticky_banner() {
	if ( is_singular() || ! is_sticky() ) {
		return;
	}
	?>
	<div class="corner-ribbon sticky">
		<p class="ribbon-content"><?php _e( 'Sticky', 'hoaloha' ); ?></p>
	</div>
	<?php
}

add_action( 'wp_footer', 'hoaloha_add_this_footer' );
/**
 * Add markup for AddThis to all pages.
 *
 * @since 	1.0.0
 * @return 	void
 */
function hoaloha_add_this_footer() {
	echo '<!-- Go to www.addthis.com/dashboard to customize your tools --><script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-545edc6358e3ed88" async="async"></script>';
}

add_action( 'tha_entry_top', 'hoaloha_single_featured_image' );
/**
 * Add featured image above single post entry.
 *
 * @since 	1.0.0
 * @return 	void
 */
function hoaloha_single_featured_image() {
	if ( is_singular() ) {
		
	?>
	<div class="featured-media image">
		<?php the_post_thumbnail( 'full' ); ?>
	</div>
	<?php

	}

}

add_action( 'tha_header_top', 'hoaloha_image_header' );
/**
 * Add author image to the header
 *
 * @since 	1.0.0
 * @return 	void
 */
function hoaloha_image_header() {
	?>
	<div class="author-image-header">
		<?php echo get_avatar( get_the_author_meta( 'email' ), 75, '', get_the_author() ); ?>
	</div>
	<?php
}

/**
 * Display footer credits for the theme.
 *
 * @since      1.0.0
 * @return     void
 * @deprecated This was moved into the footer.php template and will be deleted.
 */
function hoaloha_footer_creds() {}

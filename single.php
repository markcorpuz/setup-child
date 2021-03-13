<?php
/**
 * SETUP CHILD DATA | 1.0.0 | 210312 | single.php
 *
 * @package      Setup Child
 * @author       Mark Corpuz
 * @since        1.0.0
 * @license      GPL-2.0+
**/


// Entry category in header
//add_action( 'genesis_entry_header', 'setup_child_overline', 8 );
//add_action( 'genesis_entry_header', 'setup_child_dateauthor', 12 );
//add_action( 'genesis_entry_header', 'ea_entry_header_share', 13 );

/**
 * Entry header share
 *
 */
function ea_entry_header_share() {
	do_action( 'ea_entry_header_share' );
}

/**
 * After Entry
 *
 */
function ea_single_after_entry() {
	echo '<div class="after-entry">';

	// Breadcrumbs
	genesis_do_breadcrumbs();

	// Publish date
	echo '<p class="publish-date">Published on ' . get_the_date( 'F j, Y' ) . '</p>';

	// Sharing
	do_action( 'ea_entry_footer_share' );

	// Author Box
	genesis_do_author_box_single();
}
//add_action( 'genesis_after_entry', 'ea_single_after_entry', 8 );
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
remove_action( 'genesis_after_entry', 'genesis_do_author_box_single', 8 );

// Remove entry header altogether
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );

//* Remove the entry title (requires HTML5 theme support)
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

genesis();
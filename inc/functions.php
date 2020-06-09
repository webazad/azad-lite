<?php
// FOR CUSTOM LOGO
function azad_site_logo( $args = array(), $echo = true ) {
	$logo = get_custom_logo();
	$site_title = get_bloginfo( 'name' );
	$contents = '';
	$classname = '';

	$defaults = array(
		'logo' 			=> '%1$s<span class="screen-reader-text">%2$s</span>',
		'logo_class' 	=> 'site-logo',
		'title' 		=> '<a href="%1$s">%2$s</a>',
		'title_class' 	=> 'site-title',
		'home_wrap' 	=> '<h1 class="%1$s">%2$s</h1>',
		'single_wrap' 	=> '<div class="%1$s faux-heading">%2$s</div>',
		'condition' 	=> ( is_front_page() || is_home() && ! is_page() )
	);

	$args = wp_parse_args( $args, $defaults );
	$args = apply_filters( 'azad_site_logo_args', $args, $defaults );

	if ( has_custom_logo() ) {
		$contents = sprintf( $args['logo'], $logo, esc_html( $site_title ) );
		$classname = $args['logo_class'];
	} else {
		$contents = sprintf( $args['title'], esc_url( get_home_url( null, '/' ) ), esc_html( $site_title ) );
		$classname = $args['title_class'];
	}
	
	$wrap = $args['condition'] ? 'home_wrap' : 'single_wrap';

	$html =  sprintf( $args[$wrap], $classname, $contents );

	$html = apply_filters( 'azad_site_logo', $html, $args, $classname, $contents );
	
	if ( ! $echo ) {
		return $html;
	}
	echo $html;
}


function twentytwenty_no_js_class() {
	?>
	<script>document.documentElement.className = document.documentElement.className.replace( 'no-js', 'js' );</script>
	<?php
}

add_action( 'wp_head', 'twentytwenty_no_js_class' );

if ( ! function_exists( 'azad_the_svg' ) ) {
	function azad_the_svg( $svg_name, $group = 'ui', $color = '' ) {
		echo azad_get_svg( $svg_name, $group, $color );
	}
}

if ( ! function_exists( 'azad_get_svg' ) ) {
	function azad_get_svg( $svg_name, $group = 'ui', $color = '' ) {
		$svg = wp_kses(
			Azad_Lite\Admin\Azad_SVG_Icons::get_svg( $svg_name, $group, $color ),
			array(
				'svg'     => array(
					'class'       => true,
					'xmlns'       => true,
					'width'       => true,
					'height'      => true,
					'viewbox'     => true,
					'aria-hidden' => true,
					'role'        => true,
					'focusable'   => true,
				),
				'path'    => array(
					'fill'      => true,
					'fill-rule' => true,
					'd'         => true,
					'transform' => true,
				),
				'polygon' => array(
					'fill'      => true,
					'fill-rule' => true,
					'points'    => true,
					'transform' => true,
					'focusable' => true,
				)
			)
		);

		if ( ! $svg ) {
			return false;
		}
		return $svg;
	}
}

function azad_add_sub_toggles_to_main_menu( $args, $item, $depth ) {

	// Add sub menu toggles to the Expanded Menu with toggles.
	if ( isset( $args->show_toggles ) && $args->show_toggles ) {

		// Wrap the menu item link contents in a div, used for positioning.
		$args->before = '<div class="ancestor-wrapper">';
		$args->after  = '';

		// Add a toggle to items with children.
		if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {

			$toggle_target_string = '.menu-modal .menu-item-' . $item->ID . ' > .sub-menu';
			$toggle_duration      = azad_toggle_duration();

			// Add the sub menu toggle.
			$args->after .= '<button class="toggle sub-menu-toggle fill-children-current-color" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="' . absint( $toggle_duration ) . '" aria-expanded="false"><span class="screen-reader-text">' . __( 'Show sub menu', 'twentytwenty' ) . '</span>' . twentytwenty_get_theme_svg( 'chevron-down' ) . '</button>';

		}

		// Close the wrapper.
		$args->after .= '</div><!-- .ancestor-wrapper -->';

		// Add sub menu icons to the primary menu without toggles.
	} elseif ( 'header_main_menu' === $args->theme_location ) {
		if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {
			$args->after = '<span class="icon"></span>';
		} else {
			$args->after = '';
		}
	}

	return $args;

}

add_filter( 'nav_menu_item_args', 'azad_add_sub_toggles_to_main_menu', 10, 3 );

if ( ! function_exists( 'azad_posted_on' ) ) {
	function azad_posted_on() {
		printf( __(
			'<span class="%1$s">Posted on </span> %2$s <span class="meta-sep">by</span>%3$s', 'azad-x' ),
			'meta-prep meta-prep-author',
			sprintf(
				'<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date"> ' . azad_the_svg( 'calendar' ) . '%3$s</span></a>',
				get_permalink(),
				esc_attr( get_the_time() ),
				get_the_date()
			),
			sprintf(
				'<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
				get_author_posts_url( get_the_author_meta( 'ID' ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'azad-x' ), get_the_author() ) ),
				get_the_author()
			)
		);
	}
}

if ( ! function_exists( 'azad_posted_in' ) ) {
	function azad_posted_in() {
		$tag_list = get_the_tag_list( '', ', ' );
		if ( $tag_list && ! is_wp_error( $tag_list ) ) {
			$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark" >permalink</a>.','azad-x');
		} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
			$posted_in = __('This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark" >permalink</a>.','azad-x');
		} else {
			$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark" >permalink</a>.', 'azad-x' );
		}		
		printf(
			$posted_in,
			get_the_category_list(),
			$tag_list,
			get_permalink(),
			the_title_attribute( 'echo=0' )
		);
	}
}
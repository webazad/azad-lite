<?php
/**
*-----------------------------------------------------------
* :: @package azad-lite
* :: @version 1.0.0
*-----------------------------------------------------------
*/

// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;

define( 'AZAD_LITE_NAME',wp_get_theme()->get( 'Name' ) );
define( 'AZAD_LITE_VERSION',wp_get_theme()->get( 'Version' ) );
define( 'AZAD_LITE_TEXTDOMAIN', wp_get_theme()->get( 'TextDomain' ) );
define( 'AZAD_LITE_DIR', trailingslashit( get_template_directory() ) );
define( 'AZAD_LITE_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

if(file_exists(dirname(__FILE__) . '/vendor/autoload.php')){
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}
if ( class_exists( 'Inc\\Init' ) ) :    
    Inc\Init::register_services();
endif;

require_once AZAD_LITE_DIR . '/inc/azad-hooks.php';

if(! function_exists('azad_posted_on')){
	function azad_posted_on(){
		printf(__(
			'<span class="%1$s">Posted on </span> %2$s <span class="meta-sep">by</span>%3$s','azad-x'),
			'meta-prep meta-prep-author',
			sprintf(
				'<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date"> ' . azad_the_svg( 'calendar' ) . '%3$s</span></a>',
				get_permalink(),
				esc_attr(get_the_time()),
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

if(! function_exists('azad_posted_in')){
	function azad_posted_in(){
		$tag_list = get_the_tag_list('',', ');
		if($tag_list && ! is_wp_error($tag_list)){
			$posted_in = __('This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark" >permalink</a>.','azad-x');
		}elseif(is_object_in_taxonomy(get_post_type(), 'category')){
			$posted_in = __('This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark" >permalink</a>.','azad-x');
		}else{
			$posted_in = __('Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark" >permalink</a>.','azad-x');
		}		
		printf(
			$posted_in,
			get_the_category_list(),
			$tag_list,
			get_permalink(),
			the_title_attribute('echo=0')
		);
	}
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
			Inc\Admin\Azad_SVG_Icons::get_svg( $svg_name, $group, $color ),
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
<?php

// início do menu ---------------------- //

// registra menu
// ------------------------------------- //
function register_menus() {
  register_nav_menus(
    array(
      'principal' 	=> __( 'Principal' ),
      'rodape' 		=> __( 'Rodapé' )
    )
  );
}
add_action( 'init', 'register_menus' );

// adiciona menu WP / Foundation
// ------------------------------------- //
class top_bar_walker extends Walker_Nav_Menu {

	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		$element->has_children = !empty( $children_elements[$element->ID] );
		$element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
		$element->classes[] = ( $element->has_children ) ? 'has-dropdown not-click' : '';

		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

	function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
		$item_html = '';
		parent::start_el( $item_html, $object, $depth, $args );

		$output .= ( $depth == 0 ) ? '<li class="divider"></li>' : '';

		$classes = empty( $object->classes ) ? array() : (array) $object->classes;
		if ( in_array('label', $classes) ) {
			$output .= '<li class="divider"></li>';
			$item_html = preg_replace( '/<a[^>]*>(.*)<\/a>/iU', '<label>$1</label>', $item_html );
		}

		if ( in_array('divider', $classes) ) {
			$item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '', $item_html );
		}

		$output .= $item_html;
	}

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$output .= "\n<ul class=\"sub-menu dropdown\">\n";
	}
}

// necessário para montar o menu
// para adicionar um novo menu, adicione
// o nome da função e o nome do menu.
// No lugar onde quer que apareça o menu, adicine
// a funcção. Chupeta no mel.

// principal
function display_menu_principal() {
	wp_nav_menu( array(
		'theme_location' 	=> 'principal',
		'menu'				=> 'Menu Principal',
		'container' 		=> false, 					// remove nav container
		'container_class' 	=> '', 						// class do container
		'menu_class' 		=> 'top-bar-menu right', 	// adiciona custom nav class
		'before' 			=> '', 						// antes de cada link <a>
		'after' 			=> '', 						// depois de cada link </a>
		'link_before' 		=> '', 						// antes de cada link text
		'link_after' 		=> '', 						// depois de cada link text
		'depth' 			=> 5, 						// limit profundidade
		'fallback_cb' 		=> false, 					// fallback function
		'walker' 			=> new top_bar_walker()
	) );
}

// rodape
function display_menu_rodape() {
	wp_nav_menu( array(
		'theme_location' 	=> 'principal',
		'menu'				=> 'Menu Principal',
		'container' 		=> false, 					// remove nav container
		'container_class' 	=> '', 						// class do container
		'menu_class' 		=> 'top-bar-menu right', 	// adiciona custom nav class
		'before' 			=> '', 						// antes de cada link <a>
		'after' 			=> '', 						// depois de cada link </a>
		'link_before' 		=> '', 						// antes de cada link text
		'link_after' 		=> '', 						// depois de cada link text
		'depth' 			=> 5, 						// limit profundidade
		'fallback_cb' 		=> false, 					// fallback function
		'walker' 			=> new top_bar_walker()
	) );
}

// fim menu ---------------------------- //

// registra widget
// ------------------------------------- //
if (function_exists('register_sidebar')) {
	
	// Area 1
	register_sidebar(array(
		'name'			=> __('Widget Area 1', 'html5blank'),
		'description'	=> __('Description for this widget-area...', 'html5blank'),
		'id'			=> 'widget-area-1',
		'before_widget'	=> '<div id="%1$s" class="%2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3>',
		'after_title'	=> '</h3>'
	));

	// Area 2
	register_sidebar(array(
		'name'			=> __('Widget Area 2', 'html5blank'),
		'description'	=> __('Description for this widget-area...', 'html5blank'),
		'id'			=> 'widget-area-2',
		'before_widget'	=> '<div id="%1$s" class="%2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3>',
		'after_title'	=> '</h3>'
	));
}

// adiciona suporte a thumbnail
// ------------------------------------- //
add_theme_support( 'post-thumbnails' );

// define content width
// ------------------------------------- //
if ( ! isset( $content_width ) ) $content_width = 980;

// adiciona responsive embed
// ------------------------------------- //
function embed_html( $html ) {
    return '<div class="flex-video widescreen">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'embed_html', 10, 3 );
add_filter( 'video_embed_html', 'embed_html' ); // Jetpack

// paginacao
// ------------------------------------- //
function pagination() {
	global $wp_query;
	$big = 999999999;
	echo paginate_links(array(
		'base' => str_replace($big, '%#%', get_pagenum_link($big)),
		'format' => '?paged=%#%',
		'current' => max(1, get_query_var('paged')),
		'total' => $wp_query->max_num_pages
	));
}

// adiciona categoria na classe do post
// ------------------------------------- //
add_filter('the_category', 'the_category_slugs');

function the_category_slugs($thelist, $post_id = false ) {
	global $wp_rewrite;
	$categories = get_the_category( $post_id );

	foreach ( $categories as $category ) {
		$thelist = str_replace('rel="', 'class="'.$category->category_nicename.'" rel="', $thelist);
	}
	return $thelist;
}

// remove itens do dashboard
// ------------------------------------- //
function dashboard_widgets() {
	global $wp_meta_boxes;
	// wp..
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	// bbpress
	unset($wp_meta_boxes['dashboard']['normal']['core']['bbp-dashboard-right-now']);
	// yoast seo
	unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']);
	// gravity forms
	unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);
}
add_action('wp_dashboard_setup', 'dashboard_widgets', 999);

// adiciona css a área administrativa
// ------------------------------------- //
add_action('admin_head', 'admincss');
function admincss() {
	echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/dist/css/admin.css" type="text/css" media="all" />';
}

// remove versão do wordpress
// ------------------------------------- //
remove_action('wp_head', 'wp_generator');

// adiciona reservas
// ------------------------------------- //
function footer_admin () {
	echo 'Desenvolvido por Web Team - Grupo Marista.';
}
add_filter('admin_footer_text', 'footer_admin');

// customs posts
// ------------------------------------- //
// slider
function custom_post_type() {

	$labels = array(
		'name'                => _x( 'Slider', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Slider', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Slider', 'text_domain' ),
		'parent_item_colon'   => __( 'Slide:', 'text_domain' ),
		'all_items'           => __( 'Todos os slides', 'text_domain' ),
		'view_item'           => __( 'Ver slide', 'text_domain' ),
		'add_new_item'        => __( 'Adicionar Slide', 'text_domain' ),
		'add_new'             => __( 'Adicionar Slide', 'text_domain' ),
		'edit_item'           => __( 'Editar Slide', 'text_domain' ),
		'update_item'         => __( 'Atualizar Slide', 'text_domain' ),
		'search_items'        => __( 'Procurar Slide', 'text_domain' ),
		'not_found'           => __( 'Nada encontrado', 'text_domain' ),
		'not_found_in_trash'  => __( 'Nada encontrado na lixeira', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'slider', 'text_domain' ),
		'description'         => __( 'Slider principal do site', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
        'menu_icon'           => 'dashicons-images-alt',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'slider', $args );
}
// utilizem a mesma instância, se possível
add_action( 'init', 'custom_post_type', 0 );



// Function used in the action hook
function add_dashboard_widgets() {
	wp_add_dashboard_widget('dashboard_widget', 'Google Analytics', 'google_analytics_widget');
}
add_action('wp_dashboard_setup', 'add_dashboard_widgets' );


function register_my_cool_plugin_settings() {
	register_setting( 'google-analyticsgroup', 'new_option_name' );
//	register_setting( 'google-analyticsgroup', 'some_other_option' );
}

function google_analytics_widget() { ?>

<form method="post" action="options.php" class="google-ua-form">

	<?php 
	settings_fields( 'google-analyticsgroup' );
	do_settings_sections( 'google-analyticsgroup' ); ?>
	
	<p class="description" id="tagline-description">Coloque aqui o código UA do Google Analytics de seu site.</p>
	<input type="text" name="new_option_name" class="google-ua-input" value="<?php echo esc_attr( get_option('new_option_name') ); ?>" />
    <?php submit_button(); ?>

</form>
<?php }


// -------------------------------------- this is all folks -------------------------------------- \\

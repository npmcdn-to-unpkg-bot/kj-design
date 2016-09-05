<?php

	// Need to require these files
	if ( !function_exists('media_handle_upload') ) {
		require_once(ABSPATH . "wp-admin" . '/includes/image.php');
		require_once(ABSPATH . "wp-admin" . '/includes/file.php');
		require_once(ABSPATH . "wp-admin" . '/includes/media.php');
	}


add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
function theme_enqueue_scripts(){

	wp_register_script('modernizr', get_bloginfo('template_url') . '/js/modernizr.js');
	wp_enqueue_script('modernizr');

	wp_register_script('require', get_bloginfo('template_url') . '/js/vendor/requirejs/require.js', array(), false, true);
	wp_enqueue_script('require');

	wp_register_script('global', get_bloginfo('template_url') . '/js/global.js', array('require'), false, true);
	wp_enqueue_script('global');


	wp_register_script('jquery', get_bloginfo('template_url') . '/js/vendor/jquery/jquery.min.js', false, true);
	wp_enqueue_script('jquery');

	wp_register_script('parallax.js', get_bloginfo('template_url') . '/js/vendor/parallax.js/parallax.min.js');
	wp_enqueue_script('parallax.js');


	wp_register_script('instafeed.js', get_bloginfo('template_url') . '/js/vendor/instafeed.js/instafeed.min.js');
	wp_enqueue_script('instafeed.js');

	wp_register_script('swiper', get_bloginfo('template_url') . '/js/vendor/Swiper/dist/js/swiper.min.js');
	wp_enqueue_script('swiper');


	wp_register_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', null, false, true);
	wp_enqueue_script('livereload');


	wp_enqueue_style('global', get_bloginfo('template_url') . '/css/global.css');

	wp_enqueue_style('swiper.min.css', get_bloginfo('template_url') . '/js/vendor/Swiper/dist/css/swiper.min.css');

	wp_enqueue_style('bootstrap.min.css', get_bloginfo('template_url') . '/js/vendor/bootstrap/dist/css/bootstrap.min.css');

	wp_enqueue_style('font-awesome.min.css', get_bloginfo('template_url') . '/js/vendor/font-awesome/css/font-awesome.min.css');

	wp_enqueue_style('animate.min.css', get_bloginfo('template_url') . '/js/vendor/animate.css/animate.min.css');

	wp_enqueue_style('custom.css', get_bloginfo('template_url') . '/css/custom.css');

	wp_enqueue_style('responsive.css', get_bloginfo('template_url') . '/css/responsive.css');



}

//Add Featured Image Support
add_theme_support('post-thumbnails');

// Clean up the <head>
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

function register_menus() {
	register_nav_menus(
		array(
			'main-nav' => 'Main Navigation',
			'secondary-nav' => 'Secondary Navigation',
			'sidebar-menu' => 'Sidebar Menu',
			'left-menu' => 'Left menu',
			'right-menu' => 'Right menu'
		)
	);
}
add_action( 'init', 'register_menus' );

function register_widgets(){

	register_sidebar( array(
		'name' => __( 'Sidebar' ),
		'id' => 'main-sidebar',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

		register_sidebar( array(
		'name' => __( 'footer_left' ),
		'id' => 'footer-left',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
				register_sidebar( array(
		'name' => __( 'footer_center' ),
		'id' => 'footer-center',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

				register_sidebar( array(
		'name' => __( 'footer_right' ),
		'id' => 'footer-right',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

}//end register_widgets()
add_action( 'widgets_init', 'register_widgets' );


// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_worker_taxonomies', 0 );


function create_worker_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Uppdrag', 'taxonomy general name' ),
		'singular_name'     => _x( 'Uppdrag', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Genres' ),
		'all_items'         => __( 'All Genres' ),
		'parent_item'       => __( 'Parent Genre' ),
		'parent_item_colon' => __( 'Parent Genre:' ),
		'edit_item'         => __( 'Edit Genre' ),
		'update_item'       => __( 'Update Genre' ),
		'add_new_item'      => __( 'Add New Uppdrag' ),
		'new_item_name'     => __( 'New Genre Name' ),
		'menu_name'         => __( 'Uppdrag' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'uppdrag' ),
	);



register_taxonomy( 'uppdrag', 'worker', $args );

}





/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function prefix_register_name() {

	$labels = array(
		'name'                => __( 'Nyheter', 'text-domain' ),
		'singular_name'       => __( 'Nyhet', 'text-domain' ),
		'add_new'             => _x( 'Lägg till en ny nyhet', 'text-domain', 'text-domain' ),
		'add_new_item'        => __( 'Add New Singular Name', 'text-domain' ),
		'edit_item'           => __( 'Edit Singular Name', 'text-domain' ),
		'new_item'            => __( 'New Singular Name', 'text-domain' ),
		'view_item'           => __( 'View Singular Name', 'text-domain' ),
		'search_items'        => __( 'Search Plural Name', 'text-domain' ),
		'not_found'           => __( 'No Plural Name found', 'text-domain' ),
		'not_found_in_trash'  => __( 'No Plural Name found in Trash', 'text-domain' ),
		'parent_item_colon'   => __( 'Parent Singular Name:', 'text-domain' ),
		'menu_name'           => __( 'Nyheter', 'text-domain' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'description',
		'taxonomies'          => array('category'),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => array('slug' => 'nyhet'),
		'capability_type'     => 'post',
		'supports'            => array(
			'title', 'editor', 'author', 'thumbnail',
			'excerpt','custom-fields', 'trackbacks', 'comments',
			'revisions', 'page-attributes', 'post-formats',
			)
	);

	register_post_type( 'nyhet', $args );
}

add_action( 'init', 'prefix_register_name' );


function prefix_register_annons() {

	$labels = array(
		'name'                => __( 'Medarbetare', 'text-domain' ),
		'singular_name'       => __( 'Medarbetare', 'text-domain' ),
		'add_new'             => _x( 'Lägg till en ny medarbetare', 'text-domain', 'text-domain' ),
		'add_new_item'        => __( 'Add New Singular Name', 'text-domain' ),
		'edit_item'           => __( 'Edit Singular Name', 'text-domain' ),
		'new_item'            => __( 'New Singular Name', 'text-domain' ),
		'view_item'           => __( 'View Singular Name', 'text-domain' ),
		'search_items'        => __( 'Search Plural Name', 'text-domain' ),
		'not_found'           => __( 'No Plural Name found', 'text-domain' ),
		'not_found_in_trash'  => __( 'No Plural Name found in Trash', 'text-domain' ),
		'parent_item_colon'   => __( 'Parent Singular Name:', 'text-domain' ),
		'menu_name'           => __( 'Medarbetare', 'text-domain' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => true,
		'description'         => 'description',
		'taxonomies'          => array('uppdrag'),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => array('slug' => 'worker'),
		'capability_type'     => 'post',
		'supports'            => array(
			'title', 'author', 'thumbnail',
			'excerpt','custom-fields', 'trackbacks', 'comments',
			'revisions', 'page-attributes', 'post-formats'
			)
	);

	register_post_type( 'worker', $args );
}

add_action( 'init', 'prefix_register_annons' );



//Leverantör post

function register_leverantor_post() {

$labels = array(

			'name'                => __( 'Leverantör', 'text-domain' ),
		'singular_name'       => __( 'Leverantör', 'text-domain' ),
		'add_new'             => _x( 'Lägg till en ny leverantör', 'text-domain', 'text-domain' ),
		'add_new_item'        => __( 'Add New Singular Name', 'text-domain' ),
		'edit_item'           => __( 'Edit Singular Name', 'text-domain' ),
		'new_item'            => __( 'New Singular Name', 'text-domain' ),
		'view_item'           => __( 'View Singular Name', 'text-domain' ),
		'search_items'        => __( 'Search Plural Name', 'text-domain' ),
		'not_found'           => __( 'No Plural Name found', 'text-domain' ),
		'not_found_in_trash'  => __( 'No Plural Name found in Trash', 'text-domain' ),
		'parent_item_colon'   => __( 'Parent Singular Name:', 'text-domain' ),
		'menu_name'           => __( 'Leverantörer', 'text-domain' ),



	);
$args = array(

	'labels'                   => $labels,
		'hierarchical'        => true,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => array('slug' => 'leverantor'),
		'capability_type'     => 'post',
		'supports'            => array(
			'title', 'author', 'thumbnail',
			'excerpt','custom-fields', 'trackbacks', 'comments',
			'revisions', 'page-attributes', 'post-formats'
			)


	);

register_post_type( 'leverantor', $args );

}

add_action( 'init', 'register_leverantor_post' );

function register_produkt_post() {

$labels = array(

			'name'                => __( 'Produkter', 'text-domain' ),
		'singular_name'       => __( 'Produkt', 'text-domain' ),
		'add_new'             => _x( 'Lägg till en ny produkt', 'text-domain', 'text-domain' ),
		'add_new_item'        => __( 'Add New Singular Name', 'text-domain' ),
		'edit_item'           => __( 'Edit Singular Name', 'text-domain' ),
		'new_item'            => __( 'New Singular Name', 'text-domain' ),
		'view_item'           => __( 'View Singular Name', 'text-domain' ),
		'search_items'        => __( 'Search Plural Name', 'text-domain' ),
		'not_found'           => __( 'No Plural Name found', 'text-domain' ),
		'not_found_in_trash'  => __( 'No Plural Name found in Trash', 'text-domain' ),
		'parent_item_colon'   => __( 'Parent Singular Name:', 'text-domain' ),
		'menu_name'           => __( 'Produkter', 'text-domain' ),



	);
$args = array(

	'labels'                   => $labels,
		'hierarchical'        => true,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => array('slug' => 'produkt'),
		'capability_type'     => 'post',
		'supports'            => array(
			'title', 'author', 'thumbnail',
			'excerpt','custom-fields', 'trackbacks', 'comments',
			'revisions', 'page-attributes', 'post-formats', 'editor'
			)


	);

register_post_type( 'produkt', $args );

}

add_action( 'init', 'register_produkt_post' );



// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_annons_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_annons_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Typ', 'taxonomy general name' ),
		'singular_name'     => _x( 'Typ', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Typ' ),
		'all_items'         => __( 'All Typ' ),
		'parent_item'       => __( 'Parent Genre' ),
		'parent_item_colon' => __( 'Parent Genre:' ),
		'edit_item'         => __( 'Edit Genre' ),
		'update_item'       => __( 'Update Genre' ),
		'add_new_item'      => __( 'Add New Genre' ),
		'new_item_name'     => __( 'New Genre Name' ),
		'menu_name'         => __( 'Annonstyp' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'typ' ),
	);

	register_taxonomy( 'typ', array( 'annons' ), $args );

	// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name'                       => _x( 'Writers', 'taxonomy general name' ),
		'singular_name'              => _x( 'Writer', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Writers' ),
		'popular_items'              => __( 'Popular Writers' ),
		'all_items'                  => __( 'All Writers' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Writer' ),
		'update_item'                => __( 'Update Writer' ),
		'add_new_item'               => __( 'Add New Writer' ),
		'new_item_name'              => __( 'New Writer Name' ),
		'separate_items_with_commas' => __( 'Separate writers with commas' ),
		'add_or_remove_items'        => __( 'Add or remove writers' ),
		'choose_from_most_used'      => __( 'Choose from the most used writers' ),
		'not_found'                  => __( 'No writers found.' ),
		'menu_name'                  => __( 'Writers' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'writer' ),
	);

	register_taxonomy( 'writer', 'annons', $args );
}

add_filter( 'rwmb_meta_boxes', 'your_prefix_meta_boxes' );
function your_prefix_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'title'      => __( 'Annonsinformation', 'textdomain' ),
        'post_types' => 'annons',
        'fields'     => array(
            array(
                'id'   => 'name',
                'name' => __( 'Name', 'textdomain' ),
                'type' => 'text',
            ),
            array(
                'id'      => 'email',
                'name'    => __( 'Email', 'textdomain' ),
                'type'    => 'text',
            ),
                        array(
                'id'      => 'telefon',
                'name'    => __( 'Telefon', 'textdomain' ),
                'type'    => 'text',
            ),
                        array(
                'id'      => 'plats',
                'name'    => __( 'Plats', 'textdomain' ),
                'type'    => 'options',
                'options' => array(
                    'u' => __( 'Uppsala', 'textdomain' ),
                    's' => __( 'Stockholm', 'textdomain' ),
                ),
            ),
                                                array(
                'id'      => 'kommun',
                'name'    => __( 'Kommun', 'textdomain' ),
                'type'    => 'options',
                'options' => array(
                    'u' => __( 'Uppsala', 'textdomain' ),
                    's' => __( 'Stockholm', 'textdomain' ),
                ),
            ),
            array(
                'id'   => 'postnummer',
                'name' => __( 'Postnummer', 'textdomain' ),
                'type' => 'text',
            ),
                        array(
                'id'      => 'kategori',
                'name'    => __( 'Kategori', 'textdomain' ),
                'type'    => 'options',
                'options' => array(
                    'b' => __( 'Bil', 'textdomain' ),
                    'e' => __( 'Elektronik', 'textdomain' ),
                ),
            ),
                         array(
                'id'   => 'rubrik',
                'name' => __( 'Rubrik', 'textdomain' ),
                'type' => 'text',
            ),

               array(
                'id'   => 'annonstext',
                'name' => __( 'Annonstext', 'textdomain' ),
                'type' => 'textarea',
            ),
                              array(
                'id'   => 'pris',
                'name' => __( 'Pris', 'textdomain' ),
                'type' => 'text',
            ),


                                                            array(
                'id'   => 'bild',
                'name' => __( 'Annonsbild', 'textdomain' ),
                'type' => 'image',
                'force_delete'     => false,
                'max_file_uploads' => 2,
            ),

            )

    );
    return $meta_boxes;
}?>
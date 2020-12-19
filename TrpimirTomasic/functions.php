<?php

//INIT TEME
if ( ! function_exists( 'inicijaliziraj_temu' ) )
{
	function inicijaliziraj_temu()
	{
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		register_nav_menus( array(
			'glavni-menu' => "Glavni navigacijski izbornik",
			'sporedni-menu' => "Izbornik u podnožju",
		) );
		add_theme_support( 'custom-background', apply_filters
			(
				'test_custom_background_args', array
				(
					'default-color' => 'ffffff',
					'default-image' => '',
				) 	
			) 
		);
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
}
add_action( 'after_setup_theme', 'inicijaliziraj_temu' );


//UCITAVANJE CSS DATOTEKA
function UcitajCssTeme()
{	
	wp_enqueue_style( 'clean-blog-css', get_template_directory_uri() . '/css/clean-blog.css' );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/vendor/fontawesome-free/css/all.min.css' );
	wp_enqueue_style( 'glavni-css', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'UcitajCssTeme' );
//UCITAVANJE JS DATOTEKA
function UcitajJsTeme()
{		
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/vendor/bootstrap/js/bootstrap.min.js', array('jquery'), true);
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), true);
	wp_enqueue_script('fontawesome-js', get_template_directory_uri().'/vendor/fontawesome-free/js/all.min.js', array('jquery'), true);
	wp_enqueue_script('jquery-js', get_template_directory_uri().'/vendor/jquery/jquery.min.js', array('jquery'), true);	
	wp_enqueue_style( 'clean-blog-js', get_template_directory_uri() . '/js/clean-blog.min.js' );
	wp_enqueue_script('glavni-js', get_template_directory_uri().'/js/skripta.js', array('jquery'), true);
}
add_action( 'wp_enqueue_scripts', 'UcitajJsTeme' );

/* CPT Program */
function registriraj_cpt_program() {
	$labels = array(
		'name'                  => _x( 'Programi', 'Post Type General Name', 'achilles_gym' ),
		'singular_name'         => _x( 'Program', 'Post Type Singular Name', 'achilles_gym' ),
		'menu_name'             => __( 'Programi', 'achilles_gym' ),
		'name_admin_bar'        => __( 'Programi', 'achilles_gym' ),
		'archives'              => __( 'Programi arhiva', 'achilles_gym' ),
		'attributes'            => __( 'Atributi', 'achilles_gym' ),
		'parent_item_colon'     => __( 'Parent Item:', 'achilles_gym' ),
		'all_items'             => __( 'Svi programi', 'achilles_gym' ),
		'add_new_item'          => __( 'Dodaj novi program', 'achilles_gym' ),
		'add_new'               => __( 'Dodaj novi', 'achilles_gym' ),
		'new_item'              => __( 'Dodaj program', 'achilles_gym' ),
		'edit_item'             => __( 'Uredi program', 'achilles_gym' ),
		'update_item'           => __( 'Ažuriraj program', 'achilles_gym' ),
		'view_item'             => __( 'Pregledaj program', 'achilles_gym' ),
		'view_items'            => __( 'Pregledaj programe', 'achilles_gym' ),
		'search_items'          => __( 'Pretraži programe', 'achilles_gym' ),
		'not_found'             => __( 'Nema pronađenih programa', 'achilles_gym' ),
		'not_found_in_trash'    => __( 'Nema programa u smeću', 'achilles_gym' ),
		'featured_image'        => __( 'Glavna slika', 'achilles_gym' ),
		'set_featured_image'    => __( 'Postavi glavnu sliku', 'achilles_gym' ),
		'remove_featured_image' => __( 'Ukloni glavnu sliku', 'achilles_gym' ),
		'use_featured_image'    => __( 'Koristi kao glavnu sliku', 'achilles_gym' ),
		'insert_into_item'      => __( 'Umetni u program', 'achilles_gym' ),
		'uploaded_to_this_item' => __( 'Dodano na program', 'achilles_gym' ),
		'items_list'            => __( 'Lista programa', 'achilles_gym' ),
		'items_list_navigation' => __( 'Navigacija kroz programe', 'achilles_gym' ),
		'filter_items_list'     => __( 'Filtriraj programe', 'achilles_gym' ),
	);
	$args = array(
		'label'                 => __( 'Program', 'achilles_gym' ),
		'description'           => __( 'Post Type Description', 'achilles_gym' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor','thumbnail' ),
		'taxonomies'            => array( 'tezina', ' vjezba' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-text-page',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'program', $args );
}
add_action( 'init', 'registriraj_cpt_program', 0);
	
/* Taksonomija Težina */
function registriraj_taksonomiju_tezina() {
	$labels = array(
	'name'                       => _x( 'Težine', 'Taxonomy General Name', 'achilles_gym' ),
	'singular_name'              => _x( 'Težina', 'Taxonomy Singular Name', 'achilles_gym' ),
	'menu_name'                  => __( 'Težine', 'achilles_gym' ),
	'all_items'                  => __( 'Sve težine', 'achilles_gym' ),
	'parent_item'                => __( 'Parent Item', 'achilles_gym' ),
	'parent_item_colon'          => __( 'Parent Item:', 'achilles_gym' ),
	'new_item_name'              => __( 'Nova težina', 'achilles_gym' ),
	'add_new_item'               => __( 'Dodaj novu težinu', 'achilles_gym' ),
	'edit_item'                  => __( 'Uredi težinu', 'achilles_gym' ),
	'update_item'                => __( 'Ažuriraj težinu', 'achilles_gym' ),
	'view_item'                  => __( 'Pogledaj težinu', 'achilles_gym' ),
	'separate_items_with_commas' => __( 'Odvojite težine zarezima', 'achilles_gym' ),
	'add_or_remove_items'        => __( 'Dodaj ili ukloni težinu', 'achilles_gym' ),
	'choose_from_most_used'      => __( 'Odaberite među najpopularnijima', 'achilles_gym' ),
	'popular_items'              => __( 'Popularne težine', 'achilles_gym' ),
	'search_items'               => __( 'Pretraži težine', 'achilles_gym' ),
	'not_found'                  => __( 'Težina nije nađena', 'achilles_gym' ),
	'no_terms'                   => __( 'Nema težine', 'achilles_gym' ),
	'items_list'                 => __( 'Lista težina', 'achilles_gym' ),
	'items_list_navigation'      => __( 'Navigacija kroz težine', 'achilles_gym' ),
	);
	$args = array(
	'labels' => $labels,
	'hierarchical' => true,
	'public' => true,
	'show_ui' => true,
	'show_admin_column' => true,
	'show_in_nav_menus' => true,
	'show_tagcloud' => true,
	);
	register_taxonomy( 'tezina', array( 'program' ), $args );
}
add_action( 'init', 'registriraj_taksonomiju_tezina', 0 );

function daj_programe( $slug )
{
    $args = array(
		'posts_per_page' => -1,
		'post_type' => 'program',
		'post_status' => 'publish',
		'tax_query' => array(
		array(
		'taxonomy' => 'tezina',
		'field' => 'slug',
		'terms' => $slug
    )));
    $programM = get_posts( $args );
    $sHtml = "<ul class='program-item-ul'>";
    foreach ($programM as $program)
    {
        $nProgramId = $program->ID;
		$sProgramUrl = $program->guid;
        $sProgramNaziv = $program->post_title;
        $sProgramImg = get_the_post_thumbnail_url($nProgramId);

        $sHtml .= '
        <a href="'.$sProgramUrl.'">
            <div class="card">
                <img class="card-img-top" src="'.$sProgramImg.'" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">'.$sProgramNaziv.'</h5>
                    
                </div>
            </div>
        </a>';
    }
    $sHtml .= "</ul>";
    return $sHtml;
}




/* CPT Trener */
function registriraj_cpt_trener() {
	$labels = array(
		'name'                  => _x( 'Treneri', 'Post Type General Name', 'achilles_gym' ),
		'singular_name'         => _x( 'Trener', 'Post Type Singular Name', 'achilles_gym' ),
		'menu_name'             => __( 'Treneri', 'achilles_gym' ),
		'name_admin_bar'        => __( 'Treneri', 'achilles_gym' ),
		'archives'              => __( 'Treneri arhiva', 'achilles_gym' ),
		'attributes'            => __( 'Atributi', 'achilles_gym' ),
		'parent_item_colon'     => __( 'Parent Item:', 'achilles_gym' ),
		'all_items'             => __( 'Svi treneri', 'achilles_gym' ),
		'add_new_item'          => __( 'Dodaj novog trenera', 'achilles_gym' ),
		'add_new'               => __( 'Dodaj novog', 'achilles_gym' ),
		'new_item'              => __( 'Dodaj trenera', 'achilles_gym' ),
		'edit_item'             => __( 'Uredi trenera', 'achilles_gym' ),
		'update_item'           => __( 'Ažuriraj trenera', 'achilles_gym' ),
		'view_item'             => __( 'Pregledaj trenera', 'achilles_gym' ),
		'view_items'            => __( 'Pregledaj trenere', 'achilles_gym' ),
		'search_items'          => __( 'Pretraži trenere', 'achilles_gym' ),
		'not_found'             => __( 'Nema pronađenih trenera', 'achilles_gym' ),
		'not_found_in_trash'    => __( 'Nema trenera u smeću', 'achilles_gym' ),
		'featured_image'        => __( 'Glavna slika', 'achilles_gym' ),
		'set_featured_image'    => __( 'Postavi glavnu sliku', 'achilles_gym' ),
		'remove_featured_image' => __( 'Ukloni glavnu sliku', 'achilles_gym' ),
		'use_featured_image'    => __( 'Koristi kao glavnu sliku', 'achilles_gym' ),
		'insert_into_item'      => __( 'Umetni u trenera', 'achilles_gym' ),
		'uploaded_to_this_item' => __( 'Dodano na trenera', 'achilles_gym' ),
		'items_list'            => __( 'Lista trenera', 'achilles_gym' ),
		'items_list_navigation' => __( 'Navigacija kroz trenere', 'achilles_gym' ),
		'filter_items_list'     => __( 'Filtriraj trenere', 'achilles_gym' ),
	);
	$args = array(
		'label'                 => __( 'Trener', 'achilles_gym' ),
		'description'           => __( 'Post Type Description', 'achilles_gym' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor','thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'trener', $args );
}
add_action( 'init', 'registriraj_cpt_trener', 0);
	
/* Taksonomija Tip */
function registriraj_taksonomiju_tip() {
	$labels = array(
	'name'                       => _x( 'Tipovi', 'Taxonomy General Name', 'achilles_gym' ),
	'singular_name'              => _x( 'Tip', 'Taxonomy Singular Name', 'achilles_gym' ),
	'menu_name'                  => __( 'Tipovi', 'achilles_gym' ),
	'all_items'                  => __( 'Svi tipovi', 'achilles_gym' ),
	'parent_item'                => __( 'Parent Item', 'achilles_gym' ),
	'parent_item_colon'          => __( 'Parent Item:', 'achilles_gym' ),
	'new_item_name'              => __( 'Novi tip', 'achilles_gym' ),
	'add_new_item'               => __( 'Dodaj novi tip', 'achilles_gym' ),
	'edit_item'                  => __( 'Uredi tip', 'achilles_gym' ),
	'update_item'                => __( 'Ažuriraj tip', 'achilles_gym' ),
	'view_item'                  => __( 'Pogledaj tip', 'achilles_gym' ),
	'separate_items_with_commas' => __( 'Odvojite tipove zarezima', 'achilles_gym' ),
	'add_or_remove_items'        => __( 'Dodaj ili ukloni tip', 'achilles_gym' ),
	'choose_from_most_used'      => __( 'Odaberite među najpopularnijima', 'achilles_gym' ),
	'popular_items'              => __( 'Popularni tipovi', 'achilles_gym' ),
	'search_items'               => __( 'Pretraži tipove', 'achilles_gym' ),
	'not_found'                  => __( 'Tip nije nađena', 'achilles_gym' ),
	'no_terms'                   => __( 'Nema tipa', 'achilles_gym' ),
	'items_list'                 => __( 'Lista tipova', 'achilles_gym' ),
	'items_list_navigation'      => __( 'Navigacija kroz tipove', 'achilles_gym' ),
	);
	$args = array(
	'labels' => $labels,
	'hierarchical' => true,
	'public' => true,
	'show_ui' => true,
	'show_admin_column' => true,
	'show_in_nav_menus' => true,
	'show_tagcloud' => true,
	);
	register_taxonomy( 'tip', array( 'trener' ), $args );
}
add_action( 'init', 'registriraj_taksonomiju_tip', 0 );



function daj_trenere( $slug )
{
    $args = array(
		'posts_per_page' => -1,
		'post_type' => 'trener',
		'post_status' => 'publish',
		'tax_query' => array(
		array(
		'taxonomy' => 'tip',
		'field' => 'slug',
		'terms' => $slug
    )));
    $trenerM = get_posts( $args );
    $sHtml = "<ul class='trener-item-ul'>";
    foreach ($trenerM as $trener)
    {
        $nTrenerId = $trener->ID;
		$sTrenerUrl = $trener->guid;
        $sTrenerNaziv = $trener->post_title;
        $sTrenerImg = get_the_post_thumbnail_url($nTrenerId);

        $sHtml .= '
        <a href="'.$sTrenerUrl.'">
            <div class="card">
                <img class="card-img-top" src="'.$sTrenerImg.'" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">'.$sTrenerNaziv.'</h5>
                    
                </div>
            </div>
        </a>';
    }
    $sHtml .= "</ul>";
    return $sHtml;
}


/* CPT Sprava */
function registriraj_cpt_sprava() {
	$labels = array(
		'name'                  => _x( 'Sprave', 'Post Type General Name', 'achilles_gym' ),
		'singular_name'         => _x( 'Sprava', 'Post Type Singular Name', 'achilles_gym' ),
		'menu_name'             => __( 'Sprave', 'achilles_gym' ),
		'name_admin_bar'        => __( 'Sprave', 'achilles_gym' ),
		'archives'              => __( 'Sprave arhiva', 'achilles_gym' ),
		'attributes'            => __( 'Atributi', 'achilles_gym' ),
		'parent_item_colon'     => __( 'Parent Item:', 'achilles_gym' ),
		'all_items'             => __( 'Sve sprave', 'achilles_gym' ),
		'add_new_item'          => __( 'Dodaj novu spravu', 'achilles_gym' ),
		'add_new'               => __( 'Dodaj novu', 'achilles_gym' ),
		'new_item'              => __( 'Dodaj spravu', 'achilles_gym' ),
		'edit_item'             => __( 'Uredi spravu', 'achilles_gym' ),
		'update_item'           => __( 'Ažuriraj spravu', 'achilles_gym' ),
		'view_item'             => __( 'Pregledaj spravu', 'achilles_gym' ),
		'view_items'            => __( 'Pregledaj sprave', 'achilles_gym' ),
		'search_items'          => __( 'Pretraži sprave', 'achilles_gym' ),
		'not_found'             => __( 'Nema pronađenih sprava', 'achilles_gym' ),
		'not_found_in_trash'    => __( 'Nema sprava u smeću', 'achilles_gym' ),
		'featured_image'        => __( 'Glavna slika', 'achilles_gym' ),
		'set_featured_image'    => __( 'Postavi glavnu sliku', 'achilles_gym' ),
		'remove_featured_image' => __( 'Ukloni glavnu sliku', 'achilles_gym' ),
		'use_featured_image'    => __( 'Koristi kao glavnu sliku', 'achilles_gym' ),
		'insert_into_item'      => __( 'Umetni u spravu', 'achilles_gym' ),
		'uploaded_to_this_item' => __( 'Dodano na spravu', 'achilles_gym' ),
		'items_list'            => __( 'Lista sprava', 'achilles_gym' ),
		'items_list_navigation' => __( 'Navigacija kroz sprave', 'achilles_gym' ),
		'filter_items_list'     => __( 'Filtriraj sprave', 'achilles_gym' ),
	);
	$args = array(
		'label'                 => __( 'Sprava', 'achilles_gym' ),
		'description'           => __( 'Post Type Description', 'achilles_gym' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor','thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'				=> 'dashicons-admin-tools',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'sprava', $args );
}
add_action( 'init', 'registriraj_cpt_sprava', 0);
	
/* Taksonomija Grupa mišića */
function registriraj_taksonomiju_grupa_misica() {
	$labels = array(
	'name'                       => _x( 'Grupe mišića', 'Taxonomy General Name', 'achilles_gym' ),
	'singular_name'              => _x( 'Grupa mišića', 'Taxonomy Singular Name', 'achilles_gym' ),
	'menu_name'                  => __( 'Grupe mišića', 'achilles_gym' ),
	'all_items'                  => __( 'Sve grupe mišića', 'achilles_gym' ),
	'parent_item'                => __( 'Parent Item', 'achilles_gym' ),
	'parent_item_colon'          => __( 'Parent Item:', 'achilles_gym' ),
	'new_item_name'              => __( 'Nova grupa mišića', 'achilles_gym' ),
	'add_new_item'               => __( 'Dodaj novu grupu mišića', 'achilles_gym' ),
	'edit_item'                  => __( 'Uredi grupu mišića', 'achilles_gym' ),
	'update_item'                => __( 'Ažuriraj grupu mišića', 'achilles_gym' ),
	'view_item'                  => __( 'Pogledaj grupu mišića', 'achilles_gym' ),
	'separate_items_with_commas' => __( 'Odvojite grupe mišića zarezima', 'achilles_gym' ),
	'add_or_remove_items'        => __( 'Dodaj ili ukloni grupu mišića', 'achilles_gym' ),
	'choose_from_most_used'      => __( 'Odaberite među najpopularnijima', 'achilles_gym' ),
	'popular_items'              => __( 'Popularne grupe mišića', 'achilles_gym' ),
	'search_items'               => __( 'Pretraži grupe mišića', 'achilles_gym' ),
	'not_found'                  => __( 'Grupa mišića nije nađena', 'achilles_gym' ),
	'no_terms'                   => __( 'Nema grupe mišića', 'achilles_gym' ),
	'items_list'                 => __( 'Lista grupe mišića', 'achilles_gym' ),
	'items_list_navigation'      => __( 'Navigacija kroz grupe mišića', 'achilles_gym' ),
	);
	$args = array(
	'labels' => $labels,
	'hierarchical' => true,
	'public' => true,
	'show_ui' => true,
	'show_admin_column' => true,
	'show_in_nav_menus' => true,
	'show_tagcloud' => true,
	);
	register_taxonomy( 'grupa_misica', array( 'sprava' ), $args );
}
add_action( 'init', 'registriraj_taksonomiju_grupa_misica', 0 );



function daj_sprave( $slug )
{
    $args = array(
		'posts_per_page' => -1,
		'post_type' => 'sprava',
		'post_status' => 'publish',
		'tax_query' => array(
		array(
		'taxonomy' => 'grupa_misica',
		'field' => 'slug',
		'terms' => $slug
    )));
    $spravaM = get_posts( $args );
    $sHtml = "<ul class='sprava-item-ul'>";
    foreach ($spravaM as $sprava)
    {
        $nSpravaId = $sprava->ID;
		$sSpravaUrl = $sprava->guid;
        $sSpravaNaziv = $sprava->post_title;
        $sSpravaImg = get_the_post_thumbnail_url($nSpravaId);

        $sHtml .= '
        <a href="'.$sSpravaUrl.'">
            <div class="card">
                <img class="card-img-top" src="'.$sSpravaImg.'" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">'.$sSpravaNaziv.'</h5>
                    
                </div>
            </div>
        </a>';
    }
    $sHtml .= "</ul>";
    return $sHtml;
}

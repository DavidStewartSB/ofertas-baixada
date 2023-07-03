<?php

//if (function_exists('acf_add_options_page') && is_user_logged_in() && is_admin() && current_user_can('administrator')) {
//    function create_posttype() {
//        register_post_type( 'lojas',
//            // CPT Options
//            array(
//                'labels' => array(
//                    'name' => __( 'Lojas' ),
//                    'singular_name' => __( 'Loja' )
//                ),
//                'public' => true,
//                'has_archive' => false,
//                'rewrite' => array( 'slug' => 'lojas' ), // Define o slug da post type
//                'supports' => array( 'title', 'editor', 'thumbnail' ) // Adicionar suporte à imagem destacada
//            )
//        );
//    }
//
//    // Hooking up our function to theme setup
//    add_action( 'init', 'create_posttype' );
//    /* Custom Post Type End */
//}
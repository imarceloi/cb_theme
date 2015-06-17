<?php
/**
 * Odin functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Odin
 * @since 2.2.0
 */

/**
 * Sets content width.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

/**
 * Odin Classes.
 */
require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';
require_once get_template_directory() . '/core/classes/class-shortcodes.php';
require_once get_template_directory() . '/core/classes/class-thumbnail-resizer.php';
require_once get_template_directory() . '/core/classes/class-theme-options.php';
// require_once get_template_directory() . '/core/classes/class-options-helper.php';
// require_once get_template_directory() . '/core/classes/class-post-type.php';
// require_once get_template_directory() . '/core/classes/class-taxonomy.php';
require_once get_template_directory() . '/core/classes/class-metabox.php';
// require_once get_template_directory() . '/core/classes/abstracts/abstract-front-end-form.php';
// require_once get_template_directory() . '/core/classes/class-contact-form.php';
// require_once get_template_directory() . '/core/classes/class-post-form.php';
// require_once get_template_directory() . '/core/classes/class-user-meta.php';

/**
 * Odin Widgets.
 */
require_once get_template_directory() . '/core/classes/widgets/class-widget-like-box.php';

if ( ! function_exists( 'odin_setup_features' ) ) {

	/**
	 * Setup theme features.
	 *
	 * @since  2.2.0
	 *
	 * @return void
	 */
	function odin_setup_features() {

		/**
		 * Add support for multiple languages.
		 */
		load_theme_textdomain( 'odin', get_template_directory() . '/languages' );

		/**
		 * Register nav menus.
		 */
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'odin' )
			)
		);

		/*
		 * Add post_thumbnails suport.
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Add feed link.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Support Custom Header.
		 */
		$default = array(
			'width'         => 0,
			'height'        => 0,
			'flex-height'   => false,
			'flex-width'    => false,
			'header-text'   => false,
			'default-image' => '',
			'uploads'       => true,
		);

		add_theme_support( 'custom-header', $default );

		/**
		 * Support Custom Background.
		 */
		$defaults = array(
			'default-color' => '',
			'default-image' => '',
		);

		add_theme_support( 'custom-background', $defaults );

		/**
		 * Support Custom Editor Style.
		 */
		add_editor_style( 'assets/css/editor-style.css' );

		/**
		 * Add support for infinite scroll.
		 */
		add_theme_support(
			'infinite-scroll',
			array(
				'type'           => 'scroll',
				'footer_widgets' => false,
				'container'      => 'content',
				'wrapper'        => false,
				'render'         => false,
				'posts_per_page' => get_option( 'posts_per_page' )
			)
		);

		/**
		 * Add support for Post Formats.
		 */
		// add_theme_support( 'post-formats', array(
		//     'aside',
		//     'gallery',
		//     'link',
		//     'image',
		//     'quote',
		//     'status',
		//     'video',
		//     'audio',
		//     'chat'
		// ) );

		/**
		 * Support The Excerpt on pages.
		 */
		// add_post_type_support( 'page', 'excerpt' );
	}
}

add_action( 'after_setup_theme', 'odin_setup_features' );

/**
 * Register widget areas.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'odin' ),
			'id' => 'main-sidebar',
			'description' => __( 'Site Main Sidebar', 'odin' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'odin_widgets_init' );

/**
 * Flush Rewrite Rules for new CPTs and Taxonomies.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_flush_rewrite() {
	flush_rewrite_rules();
}

add_action( 'after_switch_theme', 'odin_flush_rewrite' );

/**
 * Load site scripts.
 *
 * @since  2.2.0
 *
 * @return void
 */
function odin_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// Loads Odin main stylesheet.
	wp_enqueue_style( 'odin-style', get_stylesheet_uri(), array(), null, 'all' );

	// jQuery.
	wp_enqueue_script( 'jquery' );

	// Bootstrap.
	wp_enqueue_script( 'bootstrap', $template_url . '/assets/js/libs/bootstrap.min.js', array(), null, true );

	// General scripts.
	// FitVids.
	wp_enqueue_script( 'fitvids', $template_url . '/assets/js/libs/jquery.fitvids.js', array(), null, true );

	// Easing jQuery.
	wp_enqueue_script( 'easing', $template_url . '/assets/js/libs/jquery.easing.1.3.js', array(), null, true );

	// jQuery BxSlider.
	wp_enqueue_script( 'carousel', $template_url . '/assets/js/libs/jquery.bxslider.min.js', array(), null, true );

	// Main jQuery.
	wp_enqueue_script( 'odin-main', $template_url . '/assets/js/actions.js', array(), null, true );

	// Grunt main file with Bootstrap, FitVids and others libs.
	// wp_enqueue_script( 'odin-main-min', $template_url . '/assets/js/main.min.js', array(), null, true );

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'odin_enqueue_scripts', 1 );

/**
 * Odin custom stylesheet URI.
 *
 * @since  2.2.0
 *
 * @param  string $uri Default URI.
 * @param  string $dir Stylesheet directory URI.
 *
 * @return string      New URI.
 */
function odin_stylesheet_uri( $uri, $dir ) {
	return $dir . '/assets/css/style.css';
}

add_filter( 'stylesheet_uri', 'odin_stylesheet_uri', 10, 2 );

/**
 * Core Helpers.
 */
require_once get_template_directory() . '/core/helpers.php';

/**
 * WP Custom Admin.
 */
require_once get_template_directory() . '/inc/admin.php';

/**
 * Comments loop.
 */
require_once get_template_directory() . '/inc/comments-loop.php';

/**
 * WP optimize functions.
 */
require_once get_template_directory() . '/inc/optimize.php';

/**
 * WP Custom Admin.
 */
require_once get_template_directory() . '/inc/plugins-support.php';

/**
 * Custom template tags.
 */
require_once get_template_directory() . '/inc/template-tags.php';

// METABOX ESPECÍFICA DA PÁGINA DO PROFESSOR
function campos_personalizados_produtos() {
	$post_ID = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
	if( $post_ID === '27' ) {
	    $marca_metabox = new Odin_Metabox(
	        '27', // Slug/ID of the Metabox (Required)
	        'Area Professor', // Metabox name (Required)
	        'page', // Slug of Post Type (Optional)
	        'normal', // Context (options: normal, advanced, or side) (Optional)
	        'high' // Priority (options: high, core, default or low) (Optional)
	    );
	    $marca_metabox->set_fields(
	        array(
	            // FOTO.
	            array(
				    'id'          => 'foto', // Obrigatório
				    'label'       => __( 'Foto', 'odin' ), // Obrigatório
				    'type'        => 'image', // Obrigatório
				    'default'     => '', // Opcional (deve ser o id de uma imagem em mídia)
				    'description' => __( 'Insira a foto destaque da área Professor', 'odin' ), // Opcional
				),
	            // DESCRIÇÃO
				array(
					'id'          => 'descricao', // Obrigatório
					'label'       => __( 'Descrição', 'odin' ), // Obrigatório
					'type'        => 'input', // Obrigatório
					'description' => __( 'Descrição logo abaixo do título', 'odin' ), // Opcional
					'attributes'  => array( // Opcional (atributos para input HTML/HTML5)
						'type'    => 'text',
					)
				),
				// FACBOOK
				array(
					'id'          => 'facebook', // Obrigatório
					'label'       => __( 'Facebook', 'odin' ), // Obrigatório
					'type'        => 'input', // Obrigatório
					'description' => __( 'link para o Facebook', 'odin' ), // Opcional
					'attributes'  => array( // Opcional (atributos para input HTML/HTML5)
						'type'    => 'text',
					)
				),
				// TWITTER
				array(
					'id'          => 'twitter', // Obrigatório
					'label'       => __( 'Twitter', 'odin' ), // Obrigatório
					'type'        => 'input', // Obrigatório
					'description' => __( 'link para o Twitter', 'odin' ), // Opcional
					'attributes'  => array( // Opcional (atributos para input HTML/HTML5)
						'type'    => 'text',
					)
				),
				// LINKEDIN
				array(
					'id'          => 'linkdin', // Obrigatório
					'label'       => __( 'LinkdIn', 'odin' ), // Obrigatório
					'type'        => 'input', // Obrigatório
					'description' => __( 'link para o LinkedIn', 'odin' ), // Opcional
					'attributes'  => array( // Opcional (atributos para input HTML/HTML5)
						'type'    => 'text',
					)
				),
				// GOOGLE PLUS
				array(
					'id'          => 'gplus', // Obrigatório
					'label'       => __( 'google Plus', 'odin' ), // Obrigatório
					'type'        => 'input', // Obrigatório
					'description' => __( 'link para o Google Plus', 'odin' ), // Opcional
					'attributes'  => array( // Opcional (atributos para input HTML/HTML5)
						'type'    => 'text',
					)
				),
				// TIMELINE
	            array(
	                'id'          => 'timeline', // Required
	                'label'       => __( 'Itens Timeline', 'odin' ), // Required
	                'type'        => 'editor', // Required
	                // 'default'     => 'Default text', // Optional
	                'description' => __( 'Insira aqui os itens descritivos da timeline', 'odin' ), // Optional
	            ),
	        )
	    );
	} elseif( $post_ID === '105' ) {
	    $inscreva_metabox = new Odin_Metabox(
	        '105', // Slug/ID of the Metabox (Required)
	        'Informações complementares', // Metabox name (Required)
	        'page', // Slug of Post Type (Optional)
	        'normal', // Context (options: normal, advanced, or side) (Optional)
	        'high' // Priority (options: high, core, default or low) (Optional)
	    );
	    $inscreva_metabox->set_fields(
	        array(
				// TXT ESQUERDA
	            array(
	                'id'          => 'txt_inscreva_esquerda', // Required
	                'label'       => __( 'Texto complementar esquerda', 'odin' ), // Required
	                'type'        => 'editor', // Required
	                // 'default'     => 'Default text', // Optional
	                'description' => __( 'Insira aqui o texto complementar esquerda', 'odin' ), // Optional
	            ),
	            // TXT DIREITA
	            array(
	                'id'          => 'txt_inscreva_direita', // Required
	                'label'       => __( 'Texto complementar direita', 'odin' ), // Required
	                'type'        => 'editor', // Required
	                // 'default'     => 'Default text', // Optional
	                'description' => __( 'Insira aqui o texto complementar direita', 'odin' ), // Optional
	            ),
				// TXT FINAL 1
	            array(
	                'id'          => 'txt_inscreva_final_1', // Required
	                'label'       => __( 'Texto complementar rodapé', 'odin' ), // Required
	                'type'        => 'editor', // Required
	                // 'default'     => 'Default text', // Optional
	                'description' => __( 'Insira aqui o texto complementar da seção Inscreva-se (o texto que fica lá no final da página)', 'odin' ), // Optional
	            ),
	            // TXT FINAL 2
	            array(
	                'id'          => 'txt_inscreva_final_2', // Required
	                'label'       => __( 'Texto complementar rodapé', 'odin' ), // Required
	                'type'        => 'editor', // Required
	                // 'default'     => 'Default text', // Optional
	                'description' => __( 'Insira aqui o texto complementar da seção Inscreva-se (o texto que fica lá no final da página)', 'odin' ), // Optional
	            ),
	        )
	    );
	}
}
add_action( 'init', 'campos_personalizados_produtos', 1 );

// CUSTOM THEME OPTIONS
function odin_theme_settings_example() {

    $settings = new Odin_Theme_Options(
        'odin-settings', // Slug/ID of the Settings Page (Required)
        'Configurações rodapé', // Settings page name (Required)
        'manage_options' // Page capability (Optional) [default is manage_options]
    );

    $settings->set_tabs(
        array(
            array(
                'id' => 'odin_general', // Slug/ID of the Settings tab (Required)
                'title' => __( 'Informações Rodapé', 'odin' ), // Settings tab title (Required)
            )/*,
            array(
                'id' => 'odin_address', // Slug/ID of the Settings tab (Required)
                'title' => __( 'Endereços', 'odin' ), // Settings tab title (Required)
            )*/
        )
    );

    $settings->set_fields(
        array(
            'odin_general_fields_section' => array( // Slug/ID of the section (Required)
                'tab'   => 'odin_general', // Tab ID/Slug (Required)
                'title' => __( 'Informações', 'odin' ), // Section title (Required)
                'fields' => array( // Section fields (Required)
                    array(
                        'id'          => 'face_input', // Required
                        'label'       => __( 'Facebook', 'odin' ), // Required
                        'type'        => 'input', // Required
                        // 'default'  => 'Default text', // Optional
                        'description' => __( 'Url do Facebook', 'odin' ), // Optional
                        'attributes'  => array( // Optional (html input elements)
                        )
                    ),
                    array(
                        'id'          => 'youtube_input', // Required
                        'label'       => __( 'Youtube', 'odin' ), // Required
                        'type'        => 'input', // Required
                        // 'default'  => 'Default text', // Optional
                        'description' => __( 'Link para youtube', 'odin' ), // Optional
                        'attributes'  => array( // Optional (html input elements)
                            'type' => 'tel'
                        )
                    ),
                    array(
                        'id'          => 'prezi_input', // Required
                        'label'       => __( 'Prezi', 'odin' ), // Required
                        'type'        => 'input', // Required
                        // 'default'  => 'Default text', // Optional
                        'description' => __( 'Url do Prezi', 'odin' ), // Optional
                        'attributes'  => array( // Optional (html input elements)
                        )
                    ),
                    array(
                        'id'          => 'four_input', // Required
                        'label'       => __( 'Foursquare', 'odin' ), // Required
                        'type'        => 'input', // Required
                        // 'default'  => 'Default text', // Optional
                        'description' => __( 'Url do Foursquare', 'odin' ), // Optional
                        'attributes'  => array( // Optional (html input elements)
                        )
                    ),
                    array(
                        'id'          => 'gplus_input', // Required
                        'label'       => __( 'Google Plus', 'odin' ), // Required
                        'type'        => 'input', // Required
                        // 'default'  => 'Default text', // Optional
                        'description' => __( 'Url do Google Plus', 'odin' ), // Optional
                        'attributes'  => array( // Optional (html input elements)
                        )
                    ),
                    array(
                        'id'          => 'link_input', // Required
                        'label'       => __( 'LinkdIn', 'odin' ), // Required
                        'type'        => 'input', // Required
                        // 'default'  => 'Default text', // Optional
                        'description' => __( 'Url do LinkdIn', 'odin' ), // Optional
                        'attributes'  => array( // Optional (html input elements)
                        )
                    ),
                    array(
                        'id'          => 'twitter_input', // Required
                        'label'       => __( 'Twitter', 'odin' ), // Required
                        'type'        => 'input', // Required
                        // 'default'  => 'Default text', // Optional
                        'description' => __( 'Url do Twitter', 'odin' ), // Optional
                        'attributes'  => array( // Optional (html input elements)
                        )
                    ),
                )
            ),
        )
    );
}

add_action( 'init', 'odin_theme_settings_example', 1 );

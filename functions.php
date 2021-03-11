<?php

	
	add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
	
    
    function my_theme_enqueue_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'child-style', 
             get_stylesheet_directory_uri() . '/style.css',
             array( 'parent-style' ),
             wp_get_theme()->get('Version')
        );
	 }
	 
	 add_action( 'customize_register', 'gridbox_child_add_stuff_to_customizer' );
	function gridbox_child_add_stuff_to_customizer( $wp_customize ) { 

/* ici j'ajoute la section */
$wp_customize->add_section(
    'gridbox_child_custom_section', /* section id */
    array(
      'title'       => 'Réglages Brioche et Cannelle',
      'description' => 'Les options ajoutés via mon thème enfant',
    )
  );

    /* ici j'ajoute un setting, une entrée dans la base de donnée pour mon option */

	$wp_customize->add_setting(
		'gridbox_child_sponsor_info',
		array(
		  'default'           => '',
		  'sanitize_callback' => 'wp_kses_post', /* ceci dépend du type de données */
		)
	  );

  /* ici  j'ajoute un control (autrement dit un champ input, textarea, select etc.) qui permettra à enregistrer notre setting */

  $wp_customize->add_control(
    'gridbox_child_sponsor_info',
    array(
      'type'        => 'textarea', /* différents types sont disponible */
      'section'     =>  'gridbox_child_custom_section', // Required, core or custom.
      'label'       => 'Info sponsor (text)',
      'description' => 'Texte affiché en haut de toutes les pages.',
    )
  );




  $wp_customize->add_setting(
	'gridbox_child_sponsor_info_link',
	array(
	  'default'           => '',
	  'sanitize_callback' => 'esc_url_raw', /* ceci dépend du type de données */
	)
  );

/* ici  j'ajoute un control (autrement dit un champ input, textarea, select etc.) qui permettra à enregistrer notre setting */

$wp_customize->add_control(
'gridbox_child_sponsor_info_link',
array(
  'type'        => 'textarea', /* différents types sont disponible */
  'section'     =>  'gridbox_child_custom_section', // Required, core or custom.
  'label'       => 'Info sponsor (link) ',
  'description' => 'Texte affiché en haut de toutes les pages.',
)
);

$wp_customize->add_setting(
	'gridbox_child_footer_text',
	array(
	  'default'           => '',
	  'sanitize_callback' => 'wp_kses_post', /* ceci dépend du type de données */
	)
  );

$wp_customize->add_control(
	'gridbox_child_footer_text',
	array(
	  'type'        => 'textarea', /* différents types sont disponible */
	  'section'     =>  'gridbox_child_custom_section', // Required, core or custom.
	  'label'       => 'Footer text',
	  'description' => 'Texte affiché en footer.',
	)
	);


	 }
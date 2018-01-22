<?php
/**
 * exploore Theme Customizer.
 *
 * @package exploore
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function exploore_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';



  //___Custom Option___//
  $wp_customize->add_section(
      'exploore_custom',
      array(
          'title' => esc_html__('Exploore Customization', 'exploore'),
          'priority' => 15,
      )
  );

$wp_customize->add_setting('font_size_body', array(
    'default'        => esc_html__('15','exploore'),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'   => 'refresh'
  ));
  $wp_customize->add_control( 'font_size_body', array(
    'settings' => 'font_size_body',
    'label'   =>  esc_html__('Select Your Body Font Size','exploore'),
    'section' => 'exploore_custom',
    'type'    => 'text',
  ));



  $wp_customize->add_setting('font_size', array(
    'default'        => esc_html__('14','exploore'),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'   => 'refresh'
  ));
  $wp_customize->add_control( 'font_size', array(
    'settings' => 'font_size',
    'label'   =>  esc_html__('Select Your Menu Font Size','exploore'),
    'section' => 'exploore_custom',
    'type'    => 'text',
  ));


  $wp_customize->add_setting('text_transform', array(
    'default'        => esc_html__('uppercase','exploore'),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'   => 'refresh'
  ));
  $wp_customize->add_control( 'text_transform', array(
    'settings' => 'text_transform',
    'label'   =>  esc_html__('Select Your Menu Text Transform','exploore'),
    'section' => 'exploore_custom',
    'type'    => 'select',
    'choices' => array(
      'uppercase'    => esc_html__('Uppercase','exploore'),
      'lowercase'    => esc_html__('Lowercase','exploore'),
      'capitalize'    => esc_html__('Capitalize','exploore'),
      
    )
  ));


    //___Color Option___//
    $wp_customize->add_section(
        'exploore_general',
        array(
            'title' => esc_html__('Exploore Custom Color', 'exploore'),
            'priority' => 9,
        )
    );

    //___theme primary Color___//
    $wp_customize->add_setting(
        'theme_primary_color',
        array(
            'default' => '#419dd8',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'theme_primary_color',
            array(
               'label'          => esc_html__( 'Theme Primary Color', 'exploore' ),
               'type'           => 'color',
               'section'        => 'exploore_general',
               'settings'       => 'theme_primary_color',
            )
        )
    );


    //___Header Background Color___//
    $wp_customize->add_setting(
        'header_bg_color',
        array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_bg_color',
            array(
               'label'          => esc_html__( 'Header Background Color', 'exploore' ),
               'type'           => 'color',
               'section'        => 'exploore_general',
               'settings'       => 'header_bg_color',
               'priority' => 11,
            )
        )
    );
    //___End header background option___//

    //___Menu Link  Color___//
    $wp_customize->add_setting(
        'nav_link_color',
        array(
            'default' => '#444',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'nav_link_color',
            array(
               'label'          => esc_html__( 'Nav Menu Link Color', 'exploore' ),
               'type'           => 'color',
               'section'        => 'exploore_general',
               'settings'       => 'nav_link_color',
               'priority' => 12,
            )
        )
    );
    //___End menu link color option___//

    //___Menu Link  hover Color___//
    $wp_customize->add_setting(
        'nav_link_hover_color',
        array(
            'default' => '#419dd8',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'nav_link_hover_color',
            array(
               'label'          => esc_html__( 'Menu Link Hover & Active Color', 'exploore' ),
               'type'           => 'color',
               'section'        => 'exploore_general',
               'settings'       => 'nav_link_hover_color',
               'priority' => 13,
            )
        )
    );
    //___End menu link color option___//


    //___Footer Background Color___//
    $wp_customize->add_setting(
        'footer_bg_color',
        array(
            'default' => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_bg_color',
            array(
               'label'          => esc_html__( 'Footer Background Color', 'exploore' ),
               'type'           => 'color',
               'section'        => 'exploore_general',
               'settings'       => 'footer_bg_color',
               'priority' => 14,
            )
        )
    );

    //___Copyright Background Color___//
    $wp_customize->add_setting(
        'copyright_bg_color',
        array(
            'default' => '#676767',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'copyright_bg_color',
            array(
               'label'          => esc_html__( 'CopyRight Background Color', 'exploore' ),
               'type'           => 'color',
               'section'        => 'exploore_general',
               'settings'       => 'copyright_bg_color',
               'priority' => 15,
            )
        )
    );




//___Sidebar Selection___//
  $wp_customize->add_section('tx_sidebar_position', array(
    'title'    => esc_html__('SideBar Position', 'exploore'),
    'priority' => 16,
  )); 

  $wp_customize->add_setting('tx_sidebar', array(
    'default'        => esc_html__('right','exploore'),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'   => 'refresh'
  ));
  $wp_customize->add_control( 'tx_sidebar', array(
    'settings' => 'tx_sidebar',
    'label'   =>  esc_html__('Select Sidebar','exploore'),
    'section' => 'tx_sidebar_position',
    'type'    => 'select',
    'choices' => array(
      'left'    => esc_html__('Left','exploore'),
      'right'    => esc_html__('Right','exploore'),
      
    )
  ));




  //___Slider Enable Disable__//
  $wp_customize->add_section('tx_slider_enable', array(
    'title'    => esc_html__('Slider Enabe/Disable', 'exploore'),
    'priority' => 16,
  ));

  $wp_customize->add_setting('slider_enable', array(
    'sanitize_callback' => 'sanitize_text_field',
    'transport'   => 'refresh'
  ));

  $wp_customize->add_control( 'slider_enable', array(
    'settings' => 'slider_enable',
    'label'   =>  esc_html__('Slider Off/On','exploore'),
    'section' => 'tx_slider_enable',
    'type'    => 'checkbox',
    'std'         => '1'
  ));


//___Sticky Post___//
  $wp_customize->add_section('tx_sticky_post', array(
    'title'    => esc_html__('Slider Sticky Post', 'exploore'),
    'priority' => 17,
  ));

  $wp_customize->add_setting('exploore_sticky', array(
    'default'        => esc_html__('3','exploore'),
    'sanitize_callback' => 'sanitize_text_field',
    'transport'   => 'refresh'
  ));
  $wp_customize->add_control( 'exploore_sticky', array(
    'settings' => 'exploore_sticky',
    'label'   =>  esc_html__('Slider Post Number','exploore'),
    'section' => 'tx_sticky_post',
    'type'    => 'text',
  ));





  //___Copyright ___//
  $wp_customize->add_section('exploore_copyright_text', array(
    'title'    => esc_html__('Copyright', 'exploore'),
    'priority' => 558,
  ));

  $wp_customize->add_setting('exploore_copyright', array(
    'default'        => esc_html__('Copyright @ 2016-2017. All right reserved.','exploore'),
    'sanitize_callback' => 'sanitize_text_field',
   
    'transport'   => 'refresh'
  ));
  $wp_customize->add_control( 'exploore_copyright', array(
    'settings' => 'exploore_copyright',
    'label'   =>  esc_html__('Write Your Copyright Text','exploore'),
    'section' => 'exploore_copyright_text',
    'type'    => 'textarea',
  ));
             
}
add_action( 'customize_register', 'exploore_customize_register' );


// Custom Css

function exploore_customize_css(){
    ?>
        <style type="text/css">



            body{
              <?php if( get_theme_mod('font_size_body') ):?>
                   font-size: <?php echo get_theme_mod( 'font_size_body', '14' ); ?>px;
                <?php else: ?>
                   font-size: 15px;
                <?php endif; ?>
              background-color:#f5f5f5;
              }


          .btn, 
          .copyright a, 
          .entry-meta a:hover, 
          .widget a:hover,  
          .carousel-caption 
          .slider-title a:hover, 
          .carousel-caption .entry-meta a:hover,
          .entry-title a:hover,
          #wp-calendar tbody td a, 
          #wp-calendar tfoot td#prev a:hover, 
          #wp-calendar tfoot td#next a:hover{
            color: <?php echo esc_html(get_theme_mod('theme_primary_color', '#419dd8')); ?>; 
          }

          .post .triangle{border-top: 100px solid <?php echo esc_html(get_theme_mod('theme_primary_color', '#419dd8')); ?>;}

          blockquote{border-left:5px solid <?php echo esc_html(get_theme_mod('theme_primary_color', '#419dd8')); ?>;}

        .btn-border:hover,   
        .btn-nav:hover, 
        .post-meta a:hover,button, 
        input[type="button"], 
        input[type="reset"], 
        input[type="submit"],
        .reply a:hover, 
        .post-meta a:hover,
        button, 
        input[type="button"]:hover,
        input[type="reset"]:hover, 
        input[type="submit"]:hover, 
        .widget .tagcloud a:hover,
        .nav-links span:hover, 
        .nav-links a:hover, 
        .page-numbers.current,
        .carousel-control:focus,
        .carousel-control:hover,
        .pager li > a:hover, 
        .pager li > a:focus,
        .edit-link a:hover{
            background-color: <?php echo esc_html(get_theme_mod('theme_primary_color', '#419dd8')); ?>;
            border-color: <?php echo esc_html(get_theme_mod('theme_primary_color', '#419dd8')); ?>;
            color: #fff;
        }

        .widget-title:before{background-color: <?php echo esc_html(get_theme_mod('theme_primary_color', '#419dd8')); ?>;}
        
            .navbar-default {
                  background-color: <?php echo esc_html(get_theme_mod('header_bg_color', '#fff')); ?>;
                  background-image:url(<?php header_image(); ?>);
                  height: 93px;
            }
            .navbar-default .navbar-nav>li>a { 
                color:<?php echo esc_html(get_theme_mod('nav_link_color', '#444')); ?>;
                text-transform: <?php echo esc_html(get_theme_mod('text_transform', 'uppercase')); ?>;
                <?php if( get_theme_mod('font_size') ):?>  
                    font-size: <?php echo get_theme_mod( 'font_size', '12' ); ?>px;
                <?php else: ?>
                    font-size: 12px;
                <?php endif; ?>
              }

          #wp-calendar tbody td#today{
            color: <?php echo esc_html(get_theme_mod('theme_primary_color', '#419dd8')); ?>;
            border-color: <?php echo esc_html(get_theme_mod('theme_primary_color', '#419dd8')); ?>;
          }


            .navbar-default .navbar-nav>li>a:hover,
            .current-menu-item a,
            .navbar-nav>li>a:hover, .search-icon i:hover, .active{  
                color:<?php echo esc_html(get_theme_mod('nav_link_hover_color', '#419dd8')); ?> !important;}

            ul.sub-menu li a:hover{ background-color:<?php echo esc_html(get_theme_mod('nav_link_hover_color', '#419dd8')); ?> ;}

            ul.sub-menu li:first-child {border-top: 2px solid <?php echo esc_html(get_theme_mod('nav_link_hover_color', '#419dd8')); ?> ;}

            .site-footer { 
                background-color:<?php echo esc_html(get_theme_mod('footer_bg_color')); ?>;
                padding: 40px 0;
            }
            .copyright { 
                background-color: <?php echo esc_html(get_theme_mod('copyright_bg_color', '#676767')); ?>;
                padding: 30px 20px 10px;
                color: #fff;
            }
        </style>
    <?php
}
add_action( 'wp_head', 'exploore_customize_css');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function exploore_customize_preview_js() {
	wp_enqueue_script( 'exploore_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'exploore_customize_preview_js' );

<?php
/**
 * @package CoolWeb
*/
		
add_action( 'widgets_init', 'coolweb_widgets_init' );
	
	function coolweb_widgets_init() {
		register_sidebar( array(
			'name' => __( 'Main Sidebar', 'cool-web' ),
			'id' => 'sidebar-1',
			'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'cool-web' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
		) );
	}
	
	function coolweb_enqueu_scripts() {
		wp_enqueue_style( 'coolweb-bootstrap', get_template_directory_uri().'/css/bootstrap.css' );
		wp_enqueue_style('coolweb-font-style',get_template_directory_uri().'/css/font-awesome.css?'.time());
		wp_enqueue_style('coolweb-style',get_stylesheet_uri());
	
		//scripts
		wp_enqueue_script('coolweb-popper-js',get_template_directory_uri().'/js/popper.js',array('jquery'),'',true);
		wp_enqueue_script('coolweb-bootstrap-js',get_template_directory_uri().'/js/bootstrap.js',array('jquery'),'',true);
	}
	add_action('wp_enqueue_scripts','coolweb_enqueu_scripts',99);

	class coolweb_My_Widget extends WP_Widget {
	
		public function __construct() {
			$widget_ops = array(
				'classname' => 'my_widget',
				'description' => 'My Widget is awesome',
			);
			parent::__construct( 'my_widget', 'My Widget', $widget_ops );
		}
	
		
		public function widget( $args, $instance ) {
			// outputs the content of the widget
	
	
			if ( ! empty( $instance['title'] && $instance['description'] )  ) {
				echo esc_html($args['before_title'],'cool-web') .esc_html( apply_filters( 'widget_title', $instance['title'] ),'cool-web') . esc_html($args['after_title'],'cool-web');
				echo esc_html('<p style="color:#fff">','cool-web'). esc_html(apply_filters( 'widget_description', $instance['description'] ),'cool-web') .esc_html('</p>','cool-web');
			}
	
		}
	
		
		public function form( $instance ) {
			// outputs the options form on admin
			$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Title', 'cool-web' );
			$description = ! empty( $instance['description'] ) ? $instance['description'] : esc_html__( 'Description', 'cool-web' );
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'cool-web' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_attr_e( 'Description:', 'cool-web' ); ?></label>
				<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"> <?php echo esc_attr( $description ); ?></textarea>
			</p>
			<?php
		}	
	
	
		public function update( $new_instance, $old_instance ) {
			// processes widget options to be saved
		
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
		
			return $instance;
		}
	}
	
	
	add_action( 'widgets_init', function(){
		register_widget( 'coolweb_My_Widget' );
	});
	
	function coolweb_customize_register( $wp_customize ) {
		$wp_customize->add_section( 'Footer' , array(
		'default'   => 'CoolWeb 2018',
		'transport' => 'refresh',
		'title' => 'footer'
		) );
		$wp_customize->add_setting('text_setting', array(
		'default'        => 'Default Text For Footer Section',
		'sanitize_callback' => 'coolweb_sanitize_data',
			));
	}
	add_action( 'customize_register', 'coolweb_customize_register' );
	
	
	function coolweb_register_theme_customizer( $wp_customize ) {
		$wp_customize->add_setting(
			'coolweb_footer_html',
			array(
				'default'     => 'CoolWeb 2018',
				'sanitize_callback' => 'coolweb_sanitize_data'
			)
		);
	
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_html',
				array(
					'label'      => __( 'Footer Copyright', 'cool-web' ),
					'section'    => 'Footer',
					'settings'   => 'coolweb_footer_html'
				)
			)
		);
	
	}
	add_action( 'customize_register', 'coolweb_register_theme_customizer' );
	
	
	add_action( 'widgets_init', 'coolweb_sidebar_init' );
	function coolweb_sidebar_init() {
		register_sidebar( array(
			'name' => __( 'New Sidebar', 'cool-web' ),
			'id' => 'wc-sidebar',
			'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'cool-web' ),
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>',
			) );
	}
	
	
function coolweb_init_options()  {
	register_nav_menus(array(
		'primary' => esc_html__('Primary Menu', 'cool-web'),
	));
	
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo');
	add_theme_support('post-thumbnails');
	add_image_size('coolweb-blog-thumbnail',738,400, true);
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'widgets' );
	$GLOBALS['content_width'] = apply_filters( 'coolweb_content_width', 900 );
	
	add_editor_style( 'css/style.css' );
	require get_template_directory() . '/inc/coolweb-navwalker.php';

	 $defaults = array(
        'default-image'      => get_template_directory_uri() . '/img/page-banner.jpg',
        'width'              => 1920,
        'height'             => 540,
        'uploads'       	=> true,
		'default-text-color'     => "e5e5e5",
		'wp-head-callback'       => 'coolweb_header_style'
    );
    add_theme_support( 'custom-header' , $defaults);

}
add_action( 'after_setup_theme', 'coolweb_init_options');


function coolweb_header_style()
{
	$header_text_color = get_header_textcolor();
	?>
		<style type="text/css">
			<?php
				//Check if user has defined any header image.
				if ( get_header_image() ) :
			?>
				span.highlight a.navbar-brand {
					color: #<?php echo esc_attr($header_text_color); ?> !important;
					
				}
				#branding .nav-link  {
				  color: #<?php echo esc_attr($header_text_color); ?> !important;
				}
				.cw_header {
					background:url('<?php echo esc_url(get_header_image()); ?>');
				}
			<?php endif; ?>	
		</style>
	<?php

}

/* Sanitization */
if ( !function_exists('coolweb_sanitize_data') ) :
	function coolweb_sanitize_data( $input, $setting ) {
		return $input;
	}
endif;

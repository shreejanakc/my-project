<?php

function revised_demo_setup() {
	include( get_template_directory() .'/inc/customizer.php');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
			'height' 	  => 100,
			'width'  	  => 100,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
	));
	add_theme_support( 'custom-header', array(
			'default-image'	=> '',
			'height' 	    => 250,
			'width'  	    => 1500,
			'flex-height'   => false,
			'flex-width'    => false,
			'video'			=> true,
			'audio'			=> true,
		));
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-background', array(
			'default-image'		=> '',
			'default-size'		=> 'auto',
			'default-preset'	=> 'default',
			'default-attachment'=> 'scroll',
			'default-repeat'    => 'repeat',
			'default-position-x'=> 'right',
			'default-position-y'=> 'top',
			'default-color'		=> '',			
		) );

	
}

add_action( 'after_setup_theme', 'revised_demo_setup' );

function revised_demo_scripts() {
	//style
	wp_enqueue_style( 'revised-style', get_stylesheet_uri() );
	wp_enqueue_style( 'revised-bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.css', array() );
	wp_enqueue_style( 'revised-bootstrap-min', get_template_directory_uri() .'/assets/css/bootstrap.min.css', array() );
}
add_action( 'wp_enqueue_scripts', 'revised_demo_scripts');

/*nabigation menus*/
function my_menu() {
	register_nav_menu( 'primary', __('Primary Menu') );
}

add_action( 'after_setup_theme', 'my_menu' );
/* Sidebar*/

function register_my_sidebar() {

	register_sidebar( array(
		'name' 		    => 'Sidebar',
		'id'   		    => 'sidebar-1',
		'description'   => 'This is custom sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
		));

	register_sidebar( array(
		'name' 		    => 'First Footer Sidebar',
		'id'   		    => 'first-footer-sidebar',
		'description'   => 'This is Footer sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
		));
	register_sidebar( array(
		'name' 		    => 'Second Footer Sidebar',
		'id'   		    => 'second-footer-sidebar',
		'description'   => 'This is Footer sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
		));
	register_sidebar( array(
		'name' 		    => 'Third Footer Sidebar',
		'id'   		    => 'third-footer-sidebar',
		'description'   => 'This is Footer sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
		));
	register_sidebar( array(
		'name' 		    => 'Fourth Footer Sidebar',
		'id'   		    => 'fourth-footer-sidebar',
		'description'   => 'This is Footer sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
		));
	register_sidebar( array(
		'name' 		    => 'Action Sidebar',
		'id'   		    => 'action-sidebar',
		'description'   => 'This is action sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
		));

}

add_action( 'widgets_init', 'register_my_sidebar' );

/*widgets*/
class custom_widget extends WP_Widget {

	function __construct() {
		$widget_options = array(
			'classname'	  => 'custom_widget',
			'description' => __( 'This is custom text widget', 'revised' ),

		);
		$control_options = array(
			'height' => 100,
			'width'  => 100,
		);
		$name = __( 'My Text Widget' );

		parent::__construct( false, $name, $widget_options, $control_options );
	}

	function form( $instance ) {
		
		$title = sanitize_text_field( $instance[ 'title' ] );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' );?>"><?php __( 'Title:', 'revised' )?></label>
			<input id="<?php echo $this->get_field_id( 'title' );?>" name="<?php echo $this->get_field_name( 'title' );?>" type="text" value="<?php echo $title; ?>"/>
		</p>

	<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance 			 = $old_instance;
		$instance[ 'title' ] = $new_instance[ 'title'];
		return $instance;

	} 

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );
		$title = !empty( $instance[ 'title' ] )? $instance[ 'title' ] : '';
		?>
		<h3><?php echo esc_html( $title ); ?></h3>

	<?php
	}

}

function register_my_widget() {
	register_widget( 'custom_widget' );
}
add_action( 'widgets_init', 'register_my_widget' );

/*more-link*/
function custom_morelink( $link ) {
	$link .='<a class="more-link" href="'. get_permalink() .'"> Read More</a>.';
	return $link; 
}
add_filter( 'the_excerpt', 'custom_morelink', 21 );

//Service Widget
class my_service_widget extends WP_Widget {
	function __construct() {
		$widdget_ops = array (
			'classname'   => 'service_widget',
			'description' => __( 'Display service pages', 'revised' ),
			
		);
		$control_ops = array(
			'width'	 => 200,
			'height' => 200
			);
		parent::__construct( false, $name = __( 'Custom Service Widget' ), $widget_ops, $control_ops );

	}

	function form( $instance ) {
		for( $i = 0; $i < 5; $i++ ) {
			$var			  = 'page_id' .$i;
			$defaults[ $var ] = '';
		}
		$instance = wp_parse_args( ( array ) $instance, $defaults );
		for( $i = 0; $i < 5; $i++ ) {
		?>
			<p>
				<label for="<?php $this->get_field_id( key( $defaults ) );?>"><?php _e( 'Page', 'revised' );?>
					<?php wp_dropdown_pages( array( 'show_option_none' => ' ', 'name' =>$this->get_field_name( key( $defaults ) ), 'selected' => $instance[ key( $defaults ) ] ) );?>
		   </p>
		<?php next( $defaults );
		}
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		for	( $i = 0; $i < 5; $i++) {
			$var			  = 'page_id' .$i ;
			$instance[ $var ] = absint( $new_instance[ $var] );
			}
		return $instance;
	}
	

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );
		global $post;
		$page_array = array();
		for	( $i =0; $i < 5; $i++) {
			$var			  = 'page_id' .$i ;
			$page_id		  = isset( $instance[ $var ] )? $instance[ $var ] : '';

			if ( !empty( $page_id ) ) {
				array_push( $page_array, $page_id );
			}
		}

		$get_pages = new WP_Query( array(
			'posts_per_page' => -1,
			'post_type'		 => array( 'page' ),
			'post__in'		 => $page_array,
			'orderby'		 => 'post__in',
		) );

		echo $before_widget; 
		$j = 1;
		while( $get_pages->have_posts() ): $get_pages->the_post();
			$page_title	= get_the_title();
			if ( $j % 2 == 1 && $j > 1 ) {
				$service_class = "tg-one-third";
			} else if ( $j % 3 == 1 && $j > 1 ) {
				$service_class = "tg-one-third tg-after-three-blocks-clearfix";
			} else {
				$service_class = "tg-one-third";
			}
			?>
			<div class="<?php echo $service_class; ?>" >
				<?php if ( has_post_thumbnail( ) ) {
					$tilte_attribute =get_the_title( $post->ID );
					echo '<div class="service-image">' . get_the_post_thumbnail( $post->ID, 'featured', array( 'title' => esc_attr( $tilte_attribute ) ) ) .'</div>' ;


				}
				echo $before_title; ?>
				<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink();?>"><?php echo $page_title; ?></a>
				<?php echo $after_title; ?>
				<?php the_excerpt();?>
				
			</div>
			<?php  
		endwhile;
		wp_reset_query();
		echo $after_widget;
	 
	}
}

function load_service_widget() {
	register_widget( 'my_service_widget' );

}
add_action( 'widgets_init', 'load_service_widget' );


/* call to action widget*/
class custom_call_to_action_widget extends WP_Widget {
	function __construct()
	{
		$widget_ops = array(
			'classname'					  => 'custom_calltoaction_widget',
			'description'     			  =>  __('This is custom call to acion widget','demo'),
			'customize_selective_refresh' =>  true,

		);

		$control_ops = array(
			'width' => 100,
			'height' => 400,

		);
		parent::__construct( false, $name=__( 'Custom Call to Action Widget','demo' ), $widget_ops, $control_ops );
	}

	function form( $instance )	{
		$defaults[ 'text_main' ]		='';
		$defaults[ 'text_additional' ]	='';
		$defaults[ 'button_text' ]		='';
		$defaults[ 'button_url' ]		='';
		$instance 						= wp_parse_args( (array) $instance, $defaults );
		$text_main						= esc_textarea( $instance[ 'text_main' ] );
		$text_additional				= esc_textarea( $instance[ 'text_additional' ] );
		$button_text					= esc_attr( $instance[ 'button_text' ] );
		$button_url						= esc_url( $instance[ 'button_url' ] );
		?>

		<?php _e( ' main Text', 'demo' ); ?>
		<textarea class="widefat" rows="3" cols="10" id="<?php echo $this->get_field_id( 'text_main' ); ?>" name="<?php echo $this->get_field_name( 'text_main' ); ?>" ><?php echo $text_main; ?> </textarea>

		<?php _e( 'Additional Text', 'demo' ); ?>
		<textarea class="widefat" rows="3" cols="10" id="<?php echo $this->get_field_id( 'text_additional' ); ?>" name="<?php echo $this->get_field_name( 'text_additional' ); ?>" ><?php echo $text_additional; ?> 
		</textarea> 

		<p>
			<label for="<?php echo $this->get_field_id( 'button_text' ); ?>"><?php _e( 'Button Text:', 'demo'); ?></label>
			<input id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' );?>" type="text" value="<?php echo $button_text; ?>"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'button_url' );?>"><?php _e( 'Button Redirect Url:', 'demo'); ?></label>
			<input id="<?php echo $this->get_field_id( 'button_url' );?>" name="<?php echo $this->get_field_name( 'button_url' ); ?>" type="text" value="<?php echo $button_url; ?>"/>
		</p>		

	<?php
	}

	function update( $new_instance, $old_instance ) {
		$old_instance =	$old_instance;
		$instance[ 'text_main' ] 		= strip_tags( $new_instance[ 'text_main' ] );
		$instance[ 'text_additional' ]  = strip_tags( $new_instance[ 'text_additional' ] );
		$instance[ 'button_text' ]      = strip_tags( $new_instance[ 'button_text' ] );
		$instance[ 'button_url' ]       = esc_url( $new_instance[ 'button_url' ] );
		return $instance;
	}

	function widget( $args, $instance )	{
		extract( $args );
		extract( $instance);
		$text_main 		 = !empty( $instance[ 'text_main' ] ) ? $instance[ 'text_main' ] : '';
		$text_additional = !empty( $instance[ 'text_additional' ] ) ? $instance[ 'text_additional' ] : '';
		$button_text 	 = isset( $instance[ 'button_text' ] ) ? $instance[ 'button_text' ] : '';
		$button_url      = isset( $instance[ 'button_url' ] ) ? $instance[ 'button_url' ] : '';
		echo $before_widget;
		?>
		<div class="call-to-action-content-wrapper">
			<div class="call-to-action-content">
				<?php
				if( !empty( 'text_main' )) {
				?>
					<h3><?php echo esc_html( $text_main ); ?></h3>

				<?php		
				}

				if( !empty( 'text_additional' )) {
				?>
					<h5><?php echo esc_html( $text_additional );?></h5>

				<?php		
				}
				?>
			</div>

			<?php
			if( !empty( 'button_text' )) {
			?>
			  <a class="call-to-action-button" href="<?php echo  $button_url; ?>" title="<?php echo $button_text;?>"> <?php echo esc_html( $button_text );?> </a>
			<?php 
			}
			?>
		</div>

	<?php
		echo $after_widget;
	}
}

function load_add_to_action_widget() {
	register_widget( 'custom_call_to_action_widget' );
}
add_action( 'widgets_init', 'load_add_to_action_widget' );


//refresh
function site_title_selective_refresh() {
	bloginfo( 'name' );
}

?>
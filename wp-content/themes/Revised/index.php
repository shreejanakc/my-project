<?php get_header(); ?>
<div class="content">
	<div class="service-section">
		<h2 id="centered"><?php echo get_theme_mod( 'body_setting' );?></h2><br />
		<div class="row">
			
					<?php if( is_active_sidebar( 'sidebar-1' ) ) {
								dynamic_sidebar( 'sidebar-1' );
							}
					?>
		</div>
			
		
	</div>
	<div class="call-to-action-section">
		<?php if( is_active_sidebar( 'action-sidebar' ) ) {
								dynamic_sidebar( 'action-sidebar' );
							}
					?>
	</div>
	
	<div class="row">
		<?php
			$args = array(
				'post_type' 	=> 'post',
				'posts_per_page'=> 2,
			);
			$query = new WP_Query( $args );
			if( $query->have_posts() ):
				while( $query->have_posts() ) : $query->the_post();
			?>
					<div class="col-sm-6">
						
							<h3><?php the_title(); ?></h3>
							<p><?php the_excerpt(); ?></p>

					</div>
			<?php
				endwhile;
			endif;
			wp_reset_postdata(); 
			?>
	</div>

	<div class="row">
		<?php
			$args = array(
				'post_type' 	=> 'post',
				'cat'			=> 'featured',
				'posts_per_page'=> 2,
			);
			$query = new WP_Query( $args );
			if( $query->have_posts() ):
				while( $query->have_posts() ) : $query->the_post();
			?>
					<div class="col-md-6">	
							<h3><?php the_title(); ?></h3>
							<p><?php the_excerpt(); ?></p>

					</div>
			<?php
				endwhile;
			endif;
			wp_reset_postdata(); 
			?>
	</div>

</div>


<?php get_footer(); ?>
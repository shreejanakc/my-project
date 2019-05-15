	</div>
	<div id="footer">
		<h2>Footer Section</h2> <br />
		<div class="content">
			<div class="row">
				<div class="col-md-3">
					<?php if( is_active_sidebar( 'first-footer-sidebar' ) ) {

						dynamic_sidebar( 'first-footer-sidebar' );
					}?>
				</div>
			
			
				<div class="col-md-3">
					<?php if( is_active_sidebar( 'second-footer-sidebar' ) ) {

						dynamic_sidebar( 'second-footer-sidebar' );
					}?>
				</div>
			
				<div class="col-md-3">
					<?php if( is_active_sidebar( 'third-footer-sidebar' ) ) {

						dynamic_sidebar( 'third-footer-sidebar' );
					}?>
				</div>

				<div class="col-md-3">
					<?php if( is_active_sidebar( 'fourth-footer-sidebar' ) ) {

						dynamic_sidebar( 'fourth-footer-sidebar' );
					}?>
				</div>
			</div>
		</div>
	</div>


<?php wp_footer();?>
</body>
</html>
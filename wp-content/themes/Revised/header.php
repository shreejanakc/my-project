<?php
/**
 * File for header section
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' );?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Revised Demo </title>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="header-left-section">
		<div id="header-logo">
			<?php the_custom_logo();?>
		</div>
		<div id="header-text">
			<h2 id="blog-title"><?php echo get_bloginfo( 'name' ); ?></h2>
			<p id="site-description"><?php echo get_bloginfo( 'description' );?></p>
		</div>
	</div>

	<div id="header-right-section">
		<div id="navigation">
				<ul>
					<li><?php wp_nav_menu(); ?></li>
				</ul>
		</div>
	</div>

	<?php the_custom_header_markup();?>
<div class="container">

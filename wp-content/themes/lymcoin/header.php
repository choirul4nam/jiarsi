<?php
/**
 * The Header: Logo and main menu
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js scheme_<?php
										 // Class scheme_xxx need in the <html> as context for the <body>!
										 echo esc_attr(lymcoin_get_theme_option('color_scheme'));
										 ?>">
<head>
	<?php wp_head(); ?>
</head>

<body <?php	body_class(); ?>>
    <?php wp_body_open(); ?>

	<?php do_action( 'lymcoin_action_before_body' ); ?>

	<div class="body_wrap">

		<div class="page_wrap"><?php
			
			// Desktop header
			$lymcoin_header_type = lymcoin_get_theme_option("header_type");
			if ($lymcoin_header_type == 'custom' && !lymcoin_is_layouts_available())
				$lymcoin_header_type = 'default';
			get_template_part( "templates/header-{$lymcoin_header_type}");

			// Side menu
			if (in_array(lymcoin_get_theme_option('menu_style'), array('left', 'right'))) {
				get_template_part( 'templates/header-navi-side' );
			}
			
			// Mobile menu
			get_template_part( 'templates/header-navi-mobile');
			?>

			<div class="page_content_wrap">

				<?php if (lymcoin_get_theme_option('body_style') != 'fullscreen') { ?>
				<div class="content_wrap">
				<?php } ?>

					<?php
					// Widgets area above page content
					lymcoin_create_widgets_area('widgets_above_page');
					?>				

					<div class="content">
						<?php
						// Widgets area inside page content
						lymcoin_create_widgets_area('widgets_above_content');
						?>				

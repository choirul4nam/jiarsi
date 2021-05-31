<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0
 */

						// Widgets area inside page content
						lymcoin_create_widgets_area('widgets_below_content');
						?>				
					</div><!-- </.content> -->

					<?php
					// Show main sidebar
					get_sidebar();

					// Widgets area below page content
					lymcoin_create_widgets_area('widgets_below_page');

					$lymcoin_body_style = lymcoin_get_theme_option('body_style');
					if ($lymcoin_body_style != 'fullscreen') {
						?></div><!-- </.content_wrap> --><?php
					}
					?>
			</div><!-- </.page_content_wrap> -->

			<?php
			// Footer
			$lymcoin_footer_type = lymcoin_get_theme_option("footer_type");
			if ($lymcoin_footer_type == 'custom' && !lymcoin_is_layouts_available())
				$lymcoin_footer_type = 'default';
			get_template_part( "templates/footer-{$lymcoin_footer_type}");
			?>

		</div><!-- /.page_wrap -->

	</div><!-- /.body_wrap -->

	<?php if (lymcoin_is_on(lymcoin_get_theme_option('debug_mode')) && lymcoin_get_file_dir('images/makeup.jpg')!='') { ?>
		<img src="<?php echo esc_url(lymcoin_get_file_url('images/makeup.jpg')); ?>" id="makeup">
	<?php } ?>

	<?php wp_footer(); ?>

</body>
</html>
<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dbstarter-theme
 */

?>

	</div> <!-- End #page -->

	<footer class="footer">
		<?php if ( is_active_sidebar( 'footer-top' ) ) : ?>
			 <section class="section footer-top">
				 <div class="container">
					 <div class="columns is-centered">
						 <?php if ( is_active_sidebar( 'footer-top' ) ) : ?>
							 <div class="column is-8 has-text-centered">
								 <div id="footerTop" class="widget-area" role="complementary">
									 <?php dynamic_sidebar( 'footer-top' ); ?>
								 </div>
							 </div>
						 <?php endif; ?>

					 </div>
				 </div>
			 </section>
		 <?php endif; ?>
		<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
			 <section class="section footer-mid">
				 <div class="container">
					 <div class="columns is-centered">
						 <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
							 <div class="column is-3">
								 <div id="footer1" class="widget-area" role="complementary">
									 <?php dynamic_sidebar( 'footer-1' ); ?>
								 </div>
							 </div>
						 <?php endif; ?>
						 <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
							 <div class="column is-3">
								 <div id="footer2" class="widget-area" role="complementary">
									 <?php dynamic_sidebar( 'footer-2' ); ?>
								 </div>
							 </div>
						 <?php endif; ?>
						 <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
							 <div class="column is-3">
								 <div id="footer3" class="widget-area" role="complementary">
									 <?php dynamic_sidebar( 'footer-3' ); ?>
								 </div>
							 </div>
						 <?php endif; ?>
						 <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
							 <div class="column is-3">
								 <div id="footer4" class="widget-area" role="complementary">
									 <?php dynamic_sidebar( 'footer-4' ); ?>
								 </div>
							 </div>
						 <?php endif; ?>
					 </div>
				 </div>
			 </section>
		 <?php endif; ?>
		 <section class="section footer-bottom">
			 <div class="container">
				 <?php if ( is_active_sidebar( 'footer-bottom' ) ): ?>
					 <div class="columns">
						 <div class="column has-text-centered">
							 <?php if ( is_active_sidebar( 'footer-bottom' ) ) : ?>
								 <div id="footer-bottom" class="widget-area" role="complementary">
									 <?php dynamic_sidebar( 'footer-bottom' ); ?>
								 </div>
							 <?php endif; ?>
						 </div>
					 </div>
				 <?php endif; ?>
				 <div class="columns">
						 <div class="column has-text-centered">
							 Copyright &copy; <?php echo date('Y'); ?>. All rights reserved.
						 </div>
					 </div>
				 </div>
		 </section>
	</footer>

	<?php wp_footer(); ?>

</body>
</html>

<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dbstarter-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <?php if ( is_active_sidebar( 'top-bar' ) ) : ?>
		<section class="section top-bar has-background-light">
			<div class="container">
				<div class="columns has-text-centered">
					<div class="column">
            <div id="topBarWidgetArea" class="widget-area" role="complementary">
              <?php dynamic_sidebar( 'top-bar' ); ?>
            </div>
					</div>
				</div>
			</div>
		</section>
  <?php endif; ?>

	<div class="navbar-wrapper">
	  <nav class="navbar is-black">
      <div class="navbar-brand">
        <a class="navbar-item" href="<?php echo get_site_url(); ?>">
          <?php echo '<h3>'. get_bloginfo( 'name' ) .'</h3>'; ?>
        </a>
        <a role="button" class="navbar-burger burger" data-target="primaryNavigation">
          <span></span>
          <span></span>
          <span></span>
        </a>
      </div>
			<div id="primaryNavigation" class="navbar-menu" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
	      <div class="navbar-end">
          <?php bulmapress_navigation(); ?>
					<li class="navbar-item">
						<form role="search" method="get" id="searchform" class="searchform" action="<?php echo get_site_url(); ?>/modules/">
							<div class="field is-grouped">
								<p class="control is-expanded">
									<input class="input" type="text" value="<?php echo get_search_query(); ?>" name="mkeyword" id="s" placeholder="Search our site" />
								</p>
								<p class="control">
									<input type="submit" id="searchsubmit" class="button is-white is-outlined" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
								</p>
					    </div>
						</form>
					</li>
	      </div>
      </div>
	  </nav>
	</div>
	<div id="page"> <!-- Start of content -->

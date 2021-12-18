<?php
/**
* The template for displaying archive pages ===== OLD
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package dbstarter-theme
*/

get_header();

$mkeyword = "";
$content_type = "";
$subject = "";
$age = "";
$has_video = false;

if( isset($_GET['mkeyword']) && !empty($_GET['mkeyword']) ) {
	$mkeyword = sanitize_text_field($_GET['mkeyword']);
}

if( isset($_GET['content-type']) && !empty($_GET['content-type']) ) {
	$content_type = sanitize_text_field($_GET['content-type']);
}
if( isset($_GET['subject']) && !empty($_GET['subject']) ) {
	$subject = sanitize_text_field($_GET['subject']);
}
if( isset($_GET['age']) && !empty($_GET['age']) ) {
	$age = sanitize_text_field($_GET['age']);
}
if( isset($_GET['has_video']) && !empty($_GET['has_video']) ) {
	$has_video = intval($_GET['has_video']);
}

?>

<main id="main" class="site-main">
	<section class="section has-background-light">
		<div class="container">
			<div class="columns">
				<div class="column">
					<h1>All Content</h1>

					<?php echo the_archive_description(); ?>
				</div>
			</div>
		</div>
	</section>

	<section class="section filters is-paddingless-bottom">
		<div class="container">
			<form action="<?php echo get_site_url(); ?>/modules/" method="get" class="module-filters">
				<div class="columns is-variable is-2 is-vcentered" style="width: 100%;">

					<div class="column">
						<div class="field">
							<div class="control">
								<input type="text" class="input filter-search" name="mkeyword" placeholder="Search" value="<?php echo $mkeyword; ?>">
							</div>
						</div>
					</div>

					<div class="column">
						<div class="field">
							<div class="control">
								<div id="selectContentType" class="filter-select">
									<span class="filter-name" data-name="Content Type">Content Type</span>
									<ul class="options">
										<?php
										$args = array(
											'taxonomy'               => 'content-type',
											'orderby'                => 'name',
											'order'                  => 'ASC',
											'hide_empty'             => false,
											'parent'								 => 0,
										);
										$the_query = new WP_Term_Query($args);
										foreach($the_query->get_terms() as $term){
											?>
											<?php
											$children = get_terms(
												"content-type",
												array(
													"orderby" => "slug",
													"parent"  => $term->term_id
												)
											);
											?>
											<li data-value="<?php echo $term->slug; ?>"><span><?php echo $term->name; ?></span><?php echo ( $children ? '<a class="children-toggle"></a>' : '' ); ?></li>
											<?php if($children) : ?>
												<ul class="children">
													<?php foreach($children as $key => $child) : ?>
														<li data-value="<?php echo $child->slug; ?>"><span><?php echo $child->name; ?></span></li>
													<?php endforeach; ?>
												</ul>
											<?php endif; ?>
											<?php
										}
										?>
									</ul>
								</div>
								<input name="content-type" type="hidden" data-option="selectContentType" value="" />
							</div>
						</div>
					</div>

					<div class="column">
						<div class="field">
							<div class="control">
								<div id="selectSubject" class="filter-select">
									<span class="filter-name" data-name="Subject">Subject</span>
									<ul class="options">
										<?php
										$args = array(
											'taxonomy'               => 'subject',
											'orderby'                => 'name',
											'order'                  => 'ASC',
											'hide_empty'             => false,
											'parent'								 => 0,
										);
										$the_query = new WP_Term_Query($args);
										foreach($the_query->get_terms() as $term){
											?>
											<?php
											$children = get_terms(
												"subject",
												array(
													"orderby" => "slug",
													"parent" => $term->term_id
												)
											);
											?>
											<li data-value="<?php echo $term->slug; ?>"><span><?php echo $term->name; ?></span><?php echo ( $children ? '<a class="children-toggle"></a>' : '' ); ?></li>
											<?php if($children) : ?>
												<ul class="children">
													<?php foreach($children as $key => $child) : ?>
														<li data-value="<?php echo $child->slug; ?>"><span><?php echo $child->name; ?></span></li>
													<?php endforeach; ?>
												</ul>
											<?php endif; ?>
											<?php
										}
										?>
									</ul>
								</div>
								<input name="subject" type="hidden" data-option="selectSubject" value="" />
							</div>
						</div>
					</div>

					<div class="column">
						<div class="field">
							<div class="control">
								<div id="selectAge" class="filter-select">
									<span class="filter-name" data-name="Age">Age</span>
									<ul class="options">
										<?php
										$args = array(
											'taxonomy'               => 'age',
											'orderby'                => 'name',
											'order'                  => 'ASC',
											'hide_empty'             => false,
											'parent' 								 => 0,
										);
										$the_query = new WP_Term_Query($args);
										foreach($the_query->get_terms() as $term){
											?>
											<?php
											$children = get_terms(
												"age",
												array(
													"orderby" => "slug",
													"parent" => $term->term_id
												)
											);
											?>
											<li data-value="<?php echo $term->slug; ?>"><span><?php echo $term->name; ?></span><?php echo ( $children ? '<a class="children-toggle"></a>' : '' ); ?></li>
											<?php if($children) : ?>
												<ul class="children">
													<?php foreach($children as $key => $child) : ?>
														<li data-value="<?php echo $child->slug; ?>"><span><?php echo $child->name; ?></span></li>
													<?php endforeach; ?>
												</ul>
											<?php endif; ?>
											<?php
										}
										?>
									</ul>
								</div>
								<input name="age"  type="hidden" data-option="selectAge" value="" />
							</div>
						</div>
					</div>

					<div class="column is-narrow">
						<div class="field is-grouped">
							<label class="checkbox" style="white-space: nowrap;">
								<input type="checkbox" name="has_video" value="1">
								Has Video?
							</label>
						</div>
					</div>

					<div class="column is-narrow">
						<div class="field is-grouped">
							<div class="control">
								<button type="submit" name="" class="button is-fullwidth is-black">Filter</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>

	<?php if ( (isset($mkeyword) && !empty($mkeyword)) || (isset($content_type) && !empty($content_type)) || (isset($subject) && !empty($subject)) || (isset($age) && !empty($age)) || isset($has_video) && !empty($has_video) ) { ?>
		<section class="section active-filters">
			<div class="container">
				<div class="field is-grouped is-grouped-multiline">
					<?php if ( isset($mkeyword) && !empty($mkeyword) ) { ?>
						<div class="control">
							<a href="#" id="mkeyword" class="active-filter tags has-addons ">
								<span class="tag is-link">Keyword: <?php echo $mkeyword; ?></span>
								<span class="tag is-delete"></span>
							</a>
						</div>
					<?php } ?>


					<?php if ( isset($content_type) && !empty($content_type) ) { ?>
						<div class="control">
							<a href="#" id="content-type" class="active-filter tags has-addons ">
								<span class="tag is-link"><?php echo $content_type; ?></span>
								<span class="tag is-delete"></span>
							</a>
						</div>
					<?php } ?>
					<?php if ( isset($subject) && !empty($subject) ) { ?>
						<div class="control">
							<a href="#" id="subject" class="active-filter tags has-addons ">
								<span class="tag is-link"><?php echo $subject; ?></span>
								<span class="tag is-delete"></span>
							</a>
						</div>
					<?php } ?>
					<?php if ( isset($age) && !empty($age) ) { ?>
						<div class="control">
							<a href="#" id="age" class="active-filter tags has-addons ">
								<span class="tag is-link"><?php echo $age; ?></span>
								<span class="tag is-delete"></span>
							</a>
						</div>
					<?php } ?>
					<?php if ( isset($has_video) && !empty($has_video) ) { ?>
						<div class="control">
							<a href="#" id="has_video" class="active-filter tags has-addons ">
								<span class="tag is-link">Has Video</span>
								<span class="tag is-delete"></span>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
	<?php } ?>

	<section class="section">
		<div class="container">
			<div class="columns is-multiline" id="articles">
				<?php

				if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) : the_post();

					/*
					* Include the Post-Format-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Format name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content-category', get_post_format() );

				endwhile; ?>
			</div>
		</div>
	</section>

	<div class="post-pagination container is-centered" role="navigation" aria-label="pagination">
		<span class="previous"><?php previous_posts_link( 'Previous' ); ?></span>
		<span class="next"><?php next_posts_link( 'Next', '' ); ?></span>
		<?php
		the_posts_pagination( array(
			'screen_reader_text' => ' ',
			'mid_size'  => 1,
			'prev_next'          => false,
			'type' => 'list',
		) );
		?>
	</div>

	<?php
	else :
		echo '<div class="column">';
		echo '<h4>No Posts Found</h4>';
		echo '</div>';
	endif; ?>

</main><!-- #main -->

<script>
jQuery(document).ready( function() {
	// Get search Values
	var getMKeyword = '<?php echo $mkeyword; ?>';
	var getContentType = '<?php echo $content_type; ?>';
	var getSubject = '<?php echo $subject; ?>';
	var getAge = '<?php echo $age; ?>';
	var getHasVideo = '<?php echo $has_video; ?>';
	// Populate inputs relative to search
	if( getContentType != '' ) {
		var getContentTypeName = jQuery('[data-value="' + getContentType + '"]').text();
		var select = jQuery('#selectContentType').find('.filter-name');
		var dropdown = jQuery('#selectContentType').find('li[data-value="' + getContentType + '"]');
		select.text(getContentTypeName);
		select.addClass('active');
		dropdown.addClass('active');
		jQuery('[data-option="selectContentType"]').val(getContentType);
	}
	if( getSubject != '' ) {
		var getSubjectName = jQuery('[data-value="' + getSubject + '"]').text();
		var select = jQuery('#selectSubject').find('.filter-name');
		var dropdown = jQuery('#selectSubject').find('li[data-value="' + getSubject + '"]');
		select.text(getSubjectName);
		select.addClass('active');
		dropdown.addClass('active');
		jQuery('[data-option="selectSubject"]').val(getSubject);
	}
	if( getAge != '' ) {
		var getAgeName = jQuery('[data-value="' + getAge + '"]').text();
		var select = jQuery('#selectAge').find('.filter-name');
		var dropdown = jQuery('#selectAge').find('li[data-value="' + getAge + '"]');
		select.text(getAgeName);
		select.addClass('active');
		dropdown.addClass('active');
		jQuery('[data-option="selectAge"]').val(getAge);
	}
	if( getHasVideo != '' ) {
		jQuery('input[name="has_video"]').prop("checked", true);
	}

	jQuery('.filter-name').on('click', function() {
		jQuery(this).parent().find('ul.options').toggle();
	});

	jQuery('.filter-select .options li span').on('click', function() {
		var optionId = jQuery(this).parents('.filter-select').attr('id');
		var optionSelected = jQuery(this).parent().data('value');
		var optionSelectedName = jQuery(this).parent().text();
		var parentSelect = jQuery(this).parents('.filter-select');
		var selectName = parentSelect.find('.filter-name');
		if( jQuery(this).parent().hasClass('active') ) {
			// Toggle Menus
			jQuery(this).parent().removeClass('active');
			parentSelect.find('.filter-name.active').removeClass('active');

			// Change Values
			selectName.text(selectName.attr('data-name'));
			parentSelect.parent().find('input').val("");
		} else {
			// Toggle Menus
			parentSelect.find('li.active').removeClass('active');
			jQuery(this).parent().addClass('active');
			parentSelect.find('.filter-name').addClass('active');

			// Change Values
			parentSelect.parent().find('input').val(optionSelected);
			selectName.text(optionSelectedName);
		}
		jQuery(this).parents('ul.options').hide();
	});

	jQuery('.children-toggle').on('click', function(e) {
		e.preventDefault();
		jQuery(this).toggleClass('open');
		jQuery(this).parent().next().toggle();
	});

	jQuery('.active-filter').on('click', function(e) {
		e.preventDefault();
		var id = jQuery(this).attr('id');
		var queryString = window.location.search;
		var params = new URLSearchParams(queryString);
		params.delete(id);
		var newURL = window.location.href.split('?')[0] + '?' + params.toString();
		window.location.href = newURL;
	});
});
</script>

<?php
get_footer();

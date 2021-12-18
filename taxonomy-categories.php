<?php
/**
* The template for displaying archive pages ===== OLD
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package dbstarter-theme
*/

get_header();

$title = get_queried_object()->name;
$current_term = get_queried_object()->term_id;
$current_name = get_queried_object()->name;
$current_parent = get_queried_object()->parent;
?>

<main id="main" class="site-main">
	<?php
	if ( have_posts() ) : ?>
	<section class="section has-background-light">
		<div class="container">
			<div class="columns">
				<div class="column">
					<h1><?php echo $title; ?></h1>

					<?php echo the_archive_description(); ?>
				</div>
			</div>
		</div>
	</section>
	<section class="section is-paddingless-bottom">
		<div class="container blog-filter">
			<div class="columns">
				<div class="column">
					<script>
					jQuery(function(){
						// bind change event to select
						jQuery('#dynamic_select').on('change', function () {
							var url = jQuery(this).val(); // get selected value
							if (url) { // require a URL
								window.location = url; // redirect
							}
							return false;
						});
					});
					</script>

					<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter" class="module-filters">

						<?php
						$terms = get_terms(
							"categories",
							array(
								"orderby" => "slug",
								"parent" => 0,
								'orderby' => 'id',
								'order' => 'ASC',
								"include" => "58"
							)
						); ?>
						<?php foreach($terms as $key => $term) : ?>
							<div class="select">
								<select id="dynamic_select" name="categoryfilter<?php echo $term->term_id; ?>">
									<option value="http://schools.fitz.ms/modules/"><?php echo $term->name; ?> (All)</option>
									<?php
									$children = get_terms(
										"categories",
										array(
											"orderby" => "slug",
											"parent" => $term->term_id
										)
									);
									?>
									<?php if($children) : ?>
										<?php foreach($children as $key => $child) : ?>
											<option value="<?php echo get_term_link($child->term_id); ?>" <?php echo ( $current_term == $child->term_id ? 'selected' : '' ); ?>><?php echo $child->name; ?></option>
											<?php
											$sub_children = get_terms(
												"categories",
												array(
													"orderby" => "slug",
													"parent" => $child->term_id
												)
											);
											?>
											<?php if($sub_children) : ?>
												<?php foreach($sub_children as $key => $sub_child) : ?>
													<option value="<?php echo get_the_permalink($sub_child->term_id); ?>">- <?php echo $sub_child->name; ?></option>
												<?php endforeach; ?>
											<?php endif; ?>
										<?php endforeach; ?>
									<?php endif; ?>
								</select>
							</div>
						<?php endforeach; ?>

						<?php
						$terms = get_terms(
							"categories",
							array(
								"orderby" => "slug",
								"parent" => 0,
								'orderby' => 'id',
								'order' => 'ASC',
								"include" => "28,29,60,58"
							)
						); ?>
						<?php foreach($terms as $key => $term) : ?>
							<div class="select" <?php echo ( $term->term_id == 58 ? 'style="display: none;"' : ''); // Hide Content Type Filter ?>>
								<select name="categoryfilter<?php echo $term->term_id; ?>">
									<option><?php echo $term->name; ?> (All)</option>
									<?php
									$children = get_terms(
										"categories",
										array(
											"orderby" => "slug",
											"parent" => $term->term_id
										)
									);
									?>
									<?php if($children) : ?>
										<?php foreach($children as $key => $child) : ?>

											<?php if( $term->term_id == 58 && $child->term_id == $current_term ) { // Select current content type on hidden filter ?>
												<option selected value="<?php echo $child->term_id; ?>"><?php echo $child->name; ?></option>
											<?php } else { ?>

												<option value="<?php echo $child->term_id; ?>"><?php echo $child->name; ?></option>
												<?php
												$sub_children = get_terms(
													"categories",
													array(
														"orderby" => "slug",
														"parent" => $child->term_id
													)
												);
												?>
												<?php if($sub_children) : ?>
													<?php foreach($sub_children as $key => $sub_child) : ?>
														<option value="<?php echo $sub_child->term_id; ?>">- <?php echo $sub_child->name; ?></option>
													<?php endforeach; ?>
												<?php endif; ?>
											<?php } ?>
										<?php endforeach; ?>
									<?php endif; ?>
								</select>
							</div>
						<?php endforeach; ?>
						<button class="button is-black">Filter</button>
						<input type="hidden" name="action" value="myfilter">
					</form>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="columns">
				<div class="column">
					<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div class="field is-grouped">
							<p class="control is-expanded">
								<input class="input" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search our site" />
							</p>
							<p class="control">
								<input type="submit" id="searchsubmit" class="button is-black" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
							</p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	<script>
	jQuery(function($){
		$('#filter').submit(function(){
			var filter = $('#filter');
			$.ajax({
				url:filter.attr('action'),
				data:filter.serialize(), // form data
				type:filter.attr('method'), // POST
				beforeSend:function(xhr){
					filter.find('.select').addClass('is-loading');
					filter.find('button').prop("disabled", true);
				},
				success:function(data){
					filter.find('.select').removeClass('is-loading');
					filter.find('button').prop("disabled", false);
					$('#articles').html(data); // insert data
				}
			});
			return false;
		});
	});
	</script>

	<section class="section">
		<div class="container">
			<div class="columns is-multiline" id="articles">
				<?php
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
	get_template_part( 'template-parts/content', 'none' );
endif; ?>

</main><!-- #main -->

<?php
get_footer();

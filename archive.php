<?php
/**
* @package CoolWeb
*/

get_header(); 

?>
<div class="container" id="content">
	<div class="row mt-3 mb-3">
		<div class="col-md-8 col-xs-12">
			<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
			</header>
			<!-- .page-header -->
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
					
					get_template_part( 'template-parts/content');
					
				// End the loop.
				endwhile;
				
				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => __( 'Previous page', 'cool-web' ),
					'next_text'          => __( 'Next page', 'cool-web' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'cool-web' ) . ' </span>',
				) );
				
				// If no content, include the "No posts found" template.
				else :
				get_template_part( 'template-parts/content', 'none' );
				
				endif;
				?>
		</div>
		<div class="col-md-4 col-xs-12 mb-50">
			<?php get_sidebar(); ?>
		</div>
	</div>
	<!-- .site-main -->
</div>
<!-- .content-area -->
<?php get_footer(); ?>
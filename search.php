<?php
/**
* @package CoolWeb
*/
get_header();
?>
<section  class="container" id="content">
	<div class="row mt-3 mb-3">
		<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php printf( esc_html( 'Search Results for: %s', 'cool-web' ), '<span>' . esc_html( get_search_query(),'cool-web' ) . '</span>' ); ?>
			</h1>
		</header><!-- .page-header -->
		<?php
			// Start the loop.
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content');
			// End the loop.
			endwhile;
			
			// If no content, include the "No posts found" template.
			else :
			get_template_part( 'template-parts/content', 'none' );
			endif;
		?>
	</div><!-- .site-main -->
</section><!-- .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
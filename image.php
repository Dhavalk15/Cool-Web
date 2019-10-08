<?php
/**
* @package CoolWeb
*/
get_header();
?>
<div class="container">
	<div class="row mt-3 mb-3">
		<?php
			// Start the loop.
			while ( have_posts() ) : the_post();
		?>
		<div class="col-md-8">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
				<header class="image_header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
				<div class="entry-attachment mt-4 mb-4">
					<?php echo wp_get_attachment_image( get_the_ID(),'medium' ); ?>
				</div><!-- .entry-attachment -->
				<?php
					the_content();
					wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'cool-web' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'cool-web' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );
				?>
				<nav class="image-navigation">
					<div class="nav-links">
						<div class="nav-previous float-left"><?php previous_image_link( false, __( 'Previous Image', 'cool-web' ) ); ?>
						</div>
						<div class="nav-next float-right"><?php next_image_link( false, __( 'Next Image', 'cool-web' ) ); ?>
						</div>
					</div><!-- .nav-links -->
				</nav><!-- .image-navigation -->
			</article>
		</div>
		<?php endwhile; ?>
		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div>
	</div><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>
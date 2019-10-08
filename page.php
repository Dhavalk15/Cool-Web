<?php
/**
* @package CoolWeb
*/
get_header();
?>
<section class="container" id="content">
	<div class="row mt-3 mb-3">
		<article class="col-sm-8">
			<?php if(have_posts()): while (have_posts()):the_post(); ?>
			<?php get_template_part( 'template-parts/content'); ?>
			<?php endwhile; else: ?>
			<p><?php esc_html_e('There are no posts or pages here','cool-web'); ?></p>
			<?php endif; ?>
		</article>
		<aside class="col-sm-4">
			<div class="sidebar-main">
				<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
					</div><!-- #primary-sidebar -->
				</div>
			</aside>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php if ( comments_open() || get_comments_number() ) :
				comments_template();
				endif; ?>
			</div>
		</div>
	</section>
	<?php get_footer(); ?>
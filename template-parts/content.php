<div id="post-<?php the_ID(); ?>" class="card mt-3 post-14 post type-post status-publish format-standard hentry category-uncategorized tag-wordpress">
	<?php if( has_post_thumbnail() ): ?>
		<?php the_post_thumbnail('coolweb-blog-thumbnail',['class' => 'card-img-top']); ?>
	<?php endif; ?>
		<div class="card-body">
			<header class="entry-header">
				<h2 class="entry-title card-title h3"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>
				<div class="entry-meta text-muted">
					<span class="posted-on"><?php esc_html_e('Posted on ','cool-web'); ?><time class="entry-date published" ><?php the_modified_date(); ?></time></span><span class="byline"> <?php esc_html_e(' by ','cool-web'); ?> <span class="author vcard"><a class="url fn n" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></span></span>
				</div>
				<!-- .entry-meta -->
			</header>
			<!-- .entry-header -->
			<div class="entry-summary">
				<p><?php the_excerpt(); ?></p>
				<?php if( '' !== get_post()->post_content ) { ?>
				<div class="">
					<a href="<?php esc_url( the_permalink() ); ?>" class="btn btn-primary btn-sm"><?php echo esc_html__( 'Read More', 'cool-web' ); ?><small class="fa fa-chevron-right ml-1"></small></a>
				</div>
				<?php } ?>
			</div>
			<!-- .entry-summary -->
		</div>
		<!-- /.card-body -->
	<?php $terms = wp_get_post_categories(get_the_ID()); ?>
	<?php if(! empty($terms)) { ?>
		<footer class="entry-footer card-footer text-muted">
			<span><?php esc_html_e('Categories : ','cool-web'); ?></span>
			<?php foreach ($terms as $key => $wp_term) : $wp_term = get_category( $wp_term ); $name = $wp_term->name; ?>
			<span class="cat-links">
				<span class=""><a href="<?php echo esc_url(get_term_link($wp_term->term_id)); ?>"><?php echo esc_html($wp_term->name,'cool-web'); ?></a></span>
			</span>
			<?php endforeach; ?>
			<?php the_tags('Tags : ', ' ', ''); ?>
		</footer>
		<!-- .entry-footer -->
	<?php } ?>
</div>
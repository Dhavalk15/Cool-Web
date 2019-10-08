<footer class="coolweb_footer">
	<?php
		function coolweb_customizer_footer() {
		        
		       if( get_theme_mod('coolweb_footer_html') ) : ?>
					<p><?php echo esc_html(get_theme_mod( 'coolweb_footer_html' ),'cool-web'); ?></p>
				<?php else : 
					/* translators: 1: poweredby, 2: link, 3: span tag closed  */
					printf( esc_html__('%1$sPowered by %2$s%3$s','cool-web'),'<span>','<a href="'. esc_url( __( 'https://wordpress.org/','cool-web')).'"target="_blank">WordPress.</a>','</span>');
					/* translators: 1: poweredby, 2: link, 3: span tag closed  */
					printf( esc_html__( 'Design by %2$s%3$s', 'cool-web' ), '<span>', '<a href="'. esc_url( __( 'https://wordpress.org/themes/', 'cool-web' ) ) .'" target="_blank">'.esc_html__('CoolWeb','cool-web').'</a>', '</span>' );
				endif; 
		}
		add_action( 'wp_footer', 'coolweb_customizer_footer' );
		?>
	<?php wp_footer(); ?>
</footer>
</body>
</html>
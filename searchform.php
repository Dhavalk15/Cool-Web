<?php
/**
* @package CoolWeb
*/
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text1"><?php esc_html_e( 'Search for:','cool-web' ); ?></span>
		<input type="search" class="search-field form-control" placeholder="<?php esc_attr_e( 'Search &hellip;', 'cool-web' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="btn btn-primary search-submit"><span class="screen-reader-text"><?php esc_attr_e( 'Search','cool-web' ); ?></span></button>
</form>
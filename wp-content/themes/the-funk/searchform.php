<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div>
		<input type="text" value="" name="s" id="s" class="search-query"/>
		<input type="submit" id="searchsubmit" class="search-submit" value="<?php esc_attr_e( 'Search', 'the-funk' ); ?>" />
    </div>
</form>
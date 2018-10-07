<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <fieldset>
        <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr_x('Type to search here', 'placeholder', 'dot-blog'); ?>">
        <button type="submit" class="ico-search"></button>
    </fieldset>
</form>

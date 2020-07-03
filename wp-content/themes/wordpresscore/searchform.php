<!--<form id="searchform" method="get" action="--><?php //echo home_url('/'); ?><!--">-->
<!--    <input type="text" class="search-field" name="s" placeholder="Search" value="--><?php //the_search_query(); ?><!--">-->
<!--    <input type="submit" value="Search">-->
<!--</form>-->

<form role="search" method="get" class="search-form" action=" <?= esc_url( home_url( '/' ) ) ?>">
<label>
    <input type="search" class="search-field" placeholder="<?= esc_attr_x( 'Search &hellip;', 'placeholder' ) ?>" value="<?php get_search_query() ?>" name="s" />
    <button type="submit" class="search-submit btn btn--primary">
        <span class="btn__text search-submit__txt"><?= esc_attr_x( 'Search', 'submit button' ) ?> </span>
        <span class="search-submit__icon"><i class="zmdi zmdi-search"></i></span>
    </button>
</label>
</form>
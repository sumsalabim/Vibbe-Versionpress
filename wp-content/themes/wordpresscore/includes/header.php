<?php include 'head.php'; ?>

<header class="header <?php if ($pageName === 'single-post') {
    echo 'header--bg';} ?>">
    <div class="container container--header">
        <div class="header__content">
            <div class="header__logo">
                <?php the_custom_logo(); ?>
            </div>
            <nav id="site-navigation" class="main-navigation">
                <button class="burger" id="burgerButton" aria-controls="primary-menu"
                        aria-expanded="false">
                  <div class="burger__box">
                    <span class="burger__line burger__line--1"></span>
                    <span class="burger__line burger__line--2"></span>
                  </div>
                </button>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-1',
                    'menu_id' => 'primary-menu',
                ));
                ?>
            </nav>
        </div>
    </div>
</header>

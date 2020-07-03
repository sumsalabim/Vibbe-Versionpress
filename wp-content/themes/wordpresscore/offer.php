<?php
/* Template Name: offer*/
$pageName = 'offer';
$title = "offer";
?>
<?php include 'includes/header.php'; ?>
    <div class="banner banner--page">
        <img class="banner__img" src="<?= get_template_directory_uri(); ?>/assets/img/image1.webp"/>
        <div class="banner__wrapper">
            <div class="container container-relative">
                <div class="banner__content">
                    <div class="banner__title">
                        The standard Lorem Ipsum passage
                    </div>
                    <div class="banner__desc">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                        ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                        nulla pariatur.
                    </div>
                </div>
                <div class="banner__graphic">
                    <img src="<?= get_template_directory_uri(); ?>/assets/img/graphic.png"/>
                </div>
            </div>
        </div>
    </div>



<?php
get_footer();


<?php use Roots\Sage\Nav\NavWalker; ?>

<header class="banner navbar navbar-static-top" role="banner">

    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"><?= __('Toggle navigation', 'sage'); ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logos/sevinci-logo.png" alt="" width="120px"/>
            </a>
        </div>

        <nav class="collapse navbar-collapse navbar-right" role="navigation">
            <?php
            if (has_nav_menu('primary_navigation')) :
                wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new NavWalker(), 'menu_class' => 'nav navbar-nav']);
            endif;
            ?>
        </nav>
    </div>

</header>

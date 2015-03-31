<?php
use Roots\Sage\Nav\NavWalker;
$menu_name = 'primary_navigation1';
?>


<div id="top-menu" class="ui borderless fixed top seconday menu">
    <div class="ui vertical padded grid">
        <a class="item" href="<?= esc_url(home_url('/')); ?>">
            <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logo/sevinci-logo-red-full.svg" alt="" width="120px"/>
        </a>
        <div class="right menu">
            <?php  if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) :
                $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                $menu_items = wp_get_nav_menu_items($menu->term_id);
                foreach ( (array) $menu_items as $key => $menu_item ) :
                    $class = $menu_item->classes; ?>
                    <a href="<?php echo $menu_item->url; ?>" class="item button <?php if(get_the_ID() == $menu_item->object_id){echo 'active';}else{echo 'bla';}?>">
                        <?php echo $menu_item->title; ?>
                    </a>
                    <?php
                endforeach;
            endif;
            languages_list_footer();
            ?>
        </div>
    </div>
</div>

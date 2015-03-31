<?php

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

?>

<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
    <!--[if lt IE 9]>
    <div class="alert alert-warning">
    <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
</div>
<![endif]-->
<?php
do_action('get_header');
get_template_part('templates/header');
?>

<?php if (Config\display_sidebar()) : ?>
    <div class="ui vertical segment">
        <br>
        <div class="ui padded grid">
            <div class="column">
                <div class="ui two column grid">
                    <div class="twelve wide column">                        
                        <?php include Wrapper\template_path(); ?>
                    </div>
                    <div class="four wide column">
                        <aside class="sidebar" role="complementary">
                            <?php include Wrapper\sidebar_path(); ?>
                        </aside><!-- /.sidebar -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="ui vertical segment">
        <?php include Wrapper\template_path(); ?>
    </div>
<?php endif; ?>

<?php
get_template_part('templates/footer');
wp_footer();
?>
</body>
</html>

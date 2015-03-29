<?php
/**
* Template Name: Toolbox Template
*/
?>


<div class="ui padded grid">
    <div class="sixteen wide column">
        <button id="toolbox-filter" class="ui button" name="button" type="button">
            <i class="filter icon"></i> <?php _e('Filter','sage') ?>
        </button>
    </div>

    <?php get_template_part('templates/toolbox','tools'); ?>
</div>

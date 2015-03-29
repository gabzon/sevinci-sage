<div id="filters" class="ui bottom horizontal sidebar menu">
    <!-- BY BRANCH ***************************************************** -->
    <?php $branches = get_terms(array( 'name' => 'branch')); ?>
    <div class="ui-group ui padded grid" id="filter-branch">
        <h4><?php _e('By category','roots'); ?></h4>
        <div class="button-group js-radio-button-group" role="group" data-filter-group="branch">
            <button class="ui basic button active filter-button" data-filter="*"><?php _e('Show all','sage'); ?></button>
            <?php foreach ($branches as $branch): ?>
                <button class="ui basic button filter-button" data-filter="<?php echo "." . $branch->slug; ?>">
                    <?php echo $branch->name ?>
                </button>
            <?php endforeach; ?>
        </div>
    </div>
    <br>
    <!-- BY PHASE ****************************************************** -->
    <?php
    $phases = get_posts(array(
        'post_type'         => 'phase',
        'numberposts'       => -1,
        'suppress_filters'  => 0,
        'order'             => 'ASC'
    ));
    ?>
    <br>
    <div class="ui-group ui padded grid" id="filter-phase">
        <h4><?php _e('By phase','roots'); ?></h4>
        <div class="button-group js-radio-button-group" role="group" data-filter-group="phase">
            <button class="ui basic button active filter-button" data-filter="*"><?php _e('Show all','sage'); ?></button>
            <?php foreach ($phases as $phase): ?>
                <button type="button" class="ui basic button filter-button" data-filter="<?php echo ".".$phase->post_name; ?>">
                    <?php echo $phase->post_title ?>
                </button>
            <?php endforeach; ?>
        </div>
    </div>
</div>

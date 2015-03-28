<div id="filters">

    <?php $branches = get_terms(array( 'name' => 'branch')); ?>
    <div class="ui-group">
        <!-- <h4><?php //_e('Fields','roots'); ?></h4> -->
        <div class="button-group js-radio-button-group btn-group-vertical" role="group" data-filter-group="branch">
            <button class="button is-checked btn btn-default" data-filter="*"><?php _e('Show all','sage'); ?></button>
            <?php foreach ($branches as $branch): ?>
                <button class="button btn btn-default" data-filter="<?php echo "." . $branch->slug; ?>">
                    <?php echo $branch->name ?>
                </button>
            <?php endforeach; ?>
        </div>
    </div>
    <?php
    $phases = get_posts(array(
        'post_type'         => 'phase',
        'numberposts'       => -1,
        'suppress_filters'  => 0,
        'order'             => 'ASC'
    ));
    ?>
    <br>

    <div class="ui-group">
        <!-- <h4><?php //_e('Phases','roots'); ?></h4> -->
        <div class="button-group js-radio-button-group btn-group-vertical" role="group" data-filter-group="phase">
            <button class="button is-checked btn btn-default" data-filter="*"><?php _e('Show all','sage'); ?></button>
            <?php foreach ($phases as $phase): ?>
                <button type="button" class="button btn btn-default" data-filter="<?php echo ".".$phase->post_name; ?>">
                    <?php echo $phase->post_title ?>
                </button>
            <?php endforeach; ?>
        </div>
    </div>
</div>

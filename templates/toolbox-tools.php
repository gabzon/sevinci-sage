<?php

if(ICL_LANGUAGE_CODE=='en'){
    $direct = 'direct';
    $discover = 'discover';
    $design = 'design';
    $disrupt = 'disrupt-2';
    $defy = 'defy';
    $deploy = 'deploy';
} elseif(ICL_LANGUAGE_CODE=='fr'){
    $direct = 'diriger';
    $discover = 'decouvrir';
    $design = 'dessiner';
    $disrupt = 'deranger';
    $defy = 'defier';
    $deploy = 'deployer';
} elseif(ICL_LANGUAGE_CODE=='es'){
    $direct = 'dirigir';
    $discover = 'descubrir';
    $design = 'disenar';
    $disrupt = 'perturbar';
    $defy = 'desafiar';
    $deploy = 'desplegar';
};

$phases = get_posts(array(
    'post_type'  => 'phase',
    'numberposts'=> -1,
    'suppress_filters' => 0,
));

foreach ($phases as $phase) {
    switch ($phase->post_name) {
        case $direct:
        $decision_id = $phase->ID;
        $decision_name = $phase->post_title;
        break;
        case $discover:
        $discover_id = $phase->ID;
        $discover_name = $phase->post_title;
        break;
        case $design:
        $design_id = $phase->ID;
        $design_name = $phase->post_title;
        break;
        case $disrupt:
        $disrupt_id = $phase->ID;
        $disrupt_name = $phase->post_title;
        break;
        case $defy:
        $defy_id = $phase->ID;
        $defy_name = $phase->post_title;
        break;
        case $deploy:
        $deploy_id = $phase->ID;
        $deploy_name = $phase->post_title;
        break;
    }
}

$tools = get_posts( array(
    'post_type'  => 'tool',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'suppress_filters' => 0
));

function get_tool_last_version_attachment($id){
    $version = get_post_meta($id, 'tool_version_group',true);
    $last_version = end($version['tool_version_file']);
    return $last_version;
}

function display_tools($tools){
    for ($i=0; $i < count($tools); $i++):
        echo '<div class="thumbnail" style="width:240px" style="float:left">';
        if (has_post_thumbnail( $tools[$i]->ID ) ):
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $tools[$i]->ID ), 'single-post-thumbnail' );
            echo '<img src="' . $image[0] . '" alt="">';
        endif;
        echo '<div class="caption">';
        $url = get_post_permalink($tools[$i]->ID);
        echo '<h3>' . $tools[$i]->post_title . '</h3>';
        echo '<p>' . $tools[$i]->post_excerpt . '</p>';
        $download = get_tool_last_version_attachment($tools[$i]->ID);
        if(!empty($download)):
            echo '<a href="'. wp_get_attachment_url($download[0]) .'" class="btn btn-primary" target="_blank">';
            _e('Download','roots');
            echo '</a>&nbsp;';
        endif;
        echo '&nbsp;<a href="'.$url.'" class="btn btn-default">';
        echo _e('More Info','roots');
        echo '</a>';
        echo '</div>';
        echo '</div>';
    endfor;
}

?>

<div class="isotope">
    <div class="ui special cards">
        <?php
        for ($i=0; $i < count($tools) ; $i++):
            $related = get_posts(array(
                'post_type' => 'phase',
                'posts_per_page' => -1,
                'post_belongs' => $tools[$i]->ID,
                'post_status' => 'publish',
                'suppress_filters' => false
            ));

            $the_item = "";
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $tools[$i]->ID ), 'single-post-thumbnail' );
            $url = get_post_permalink($tools[$i]->ID);
            $download = get_tool_last_version_attachment($tools[$i]->ID);

            foreach ($related as $related_post):
                $the_item = $the_item . " " . $related_post->post_name;
            endforeach;

            $the_branches="";
            $branches = get_the_terms($tools[$i]->ID,'branch' );

            foreach ($branches as $b) {
                $the_branches = $the_branches . " " . $b->slug;
            }

            ?>
            <!-- <div class=" "> -->
            <div class="isotope-item card <?php echo $the_item . $the_branches ?>">
                <div class="dimmable image">
                    <div class="ui dimmer">
                        <div class="content">
                            <div class="center">
                                <a class="ui inverted button sans-serif" href="<?php echo $url; ?>"><?php _e('More Info','sage'); ?></a>
                            </div>
                        </div>
                    </div>
                    <?php if (has_post_thumbnail( $tools[$i]->ID ) ): ?>
                        <img src="<?php echo $image[0]; ?>" alt="" >
                    <?php endif; ?>
                </div>
                <div class="content">
                    <a class="header" href="<?php echo $url; ?>"><?php echo $tools[$i]->post_title ?></a>
                    <div class="description">
                        <?php echo $tools[$i]->post_excerpt; ?>
                    </div>
                    <br>
                </div>
                <?php if(!empty($download)): ?>
                    <a class="ui bottom red attached button" href="<?php echo wp_get_attachment_url($download[0]); ?>" target="_blank">
                        <i class="download icon"></i>
                        <?php _e('Download','sage'); ?>
                    </a>
                <?php endif; ?>
            </div>
            <!-- </div> -->
        <?php endfor; ?>
    </div>
</div>

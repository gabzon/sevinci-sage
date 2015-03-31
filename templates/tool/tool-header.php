<div id="header-section" class="ui blue vertical inverted segment">
    <br>
    <br>
    <header id="tool-header">
        <h2 class="ui center aligned icon header">
            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full' ); ?>
                <div class="ui large image">
                    <img src="<?php echo $image[0]; ?>" alt="" class="" />
                </div>
            <?php endif; ?>
            <h1 class="text-center"><?php the_title(); ?></h1>
            <div class="ui column centered grid">
                <div class="ten wide column">
                    <div class="subheading text-center">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            </div>
        </h2>
    </header>
    <br>
    <br>
    <div class="ui column centered grid stackable">
        <div class="five wide column">
            <a href="<?php echo wp_get_attachment_url($last_version[0]); ?>" class="ui large red button" id="download-tool" target="_blank">
                <i class="large download icon"></i>
                <?php _e('Download','sage') ?>
            </a>
            <a href="#" class="ui large inverted button">
                <i class="large info icon"></i>
                <?php _e('More info','sage') ?>
            </a>
        </div>
    </div>
</div>

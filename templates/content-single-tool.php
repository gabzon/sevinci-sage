<?php while (have_posts()) : the_post();
   $img = get_post_meta($post->ID,'tool_background_image',true);
   if (!empty($img)) {
      $bg_img = wp_get_attachment_url($img);
   }else{
      $bg_img = get_stylesheet_directory_uri().'/assets/img/tools-bg.jpg';
   }
   $time = get_post_meta($post->ID, 'tool_duration_group',true);
   $brain = get_post_meta($post->ID, 'tool_brain_side',true);
   $version = get_post_meta($post->ID, 'tool_version_group',true);
   $last_version = end($version['tool_version_file']);
   $videos = get_post_meta($post->ID,'tool_video');
   $quotes_group = get_post_meta($post->ID,'tool_quote_group');
   $quotes = $quotes_group[0];

   $sources = get_posts( array(
      'post_type'  => 'source',
      'posts_per_page' => -1,
      'post_belongs' => $post->ID,
      'post_status' => 'publish',
      'suppress_filters' => false
   ));
?>

   <style media="screen">
      .full {
         display: table;
         width: 100%;
         height: auto;
         background: url(<?php echo $bg_img; ?>) no-repeat center center scroll;
         -webkit-background-size: cover;
         -moz-background-size: cover;
         background-size: cover;
         -o-background-size: cover;
      }
   </style>


   <?php get_template_part('templates/tool/tool-header'); ?>


   <?php if(!empty($video[0])): ?>
      <section class="tool-videos">
         <div class="jumbotron" style="background:white">
            <div class="container">
               <div class="embed-responsive embed-responsive-16by9">
                  <?php echo $video[0];  ?>
               </div>
            </div>
         </div>
      </section>
   <?php endif; ?>

   <section class="tool-tips">
      <div class="jumbotron" style="background:white">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <h4><?php _e('Tips & Tricks','roots') ?></h4>
                  <hr class="sevinci-hr">
                  <?php echo get_post_meta($post->ID, 'tool_tips_and_tricks', true); ?>
               </div>
               <div class="col-md-3 text-center">
                  <span class="fa-stack fa-4x">
                     <i class="fa fa-circle fa-stack-2x"></i>
                     <i class="fa fa-clock-o fa-stack-1x fa-inverse"></i>
                  </span>
                  <h5>
                     <?php echo $time['tool_duration_value'][0]; ?>
                     <?php " " ?>
                     <?php echo $time['tool_duration_type'][0];  ?>
                  </h5>
               </div>

               <div class="col-md-3 text-center">
                  <span class="fa-stack fa-4x">
                     <i class="fa fa-circle fa-stack-2x"></i>
                     <i class="fa fa-group fa-stack-1x fa-inverse"></i>
                  </span>
                  <h5>
                     <?php echo get_post_meta($post->ID, 'tool_participants',true); ?>
                     <?php _e('Participants', 'roots'); ?>
                  </h5>
               </div>
            </div>
         </div>
      </div>
   </section>

   <section class="tool-tags">
      <div class="jumbotron">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <h4><i class="fa fa-tags"></i> <?php _e('Tags','roots'); ?></h4>
                  <hr class="sevinci-hr-dark">
                  <?php
                     the_tags('','<br>','');
                     $tags = get_the_terms($post->ID,'tags');
                     if ( $tags && ! is_wp_error( $tags ) ) :
                        foreach ( $tags as $t ) {
                           echo $t->name . "<br>";
                        }
                     endif;
                  ?>
               </div>
               <div class="col-md-4">
                  <h4><i class="fa fa-smile-o"></i> <?php _e('Attitudes','roots'); ?></h4>
                  <hr class="sevinci-hr-dark">
                  <?php
                     $attitudes = get_the_terms($post->ID,'attitude');
                     if ( $attitudes && ! is_wp_error( $attitudes ) ) :
                        foreach ( $attitudes as $a ):
                           echo $a->name . "<br>";
                        endforeach;
                     endif;
                  ?>
               </div>
               <div class="col-md-4">
                  <h4><i class="fa fa-user-md"></i> <?php _e('Used by','roots'); ?></h4>
                  <hr class="sevinci-hr-dark">
                  <?php
                     $roles = get_the_terms($post->ID,'role');
                     if ( $roles && ! is_wp_error( $roles ) ) :
                        foreach ( $roles as $r ):
                           echo $r->name . "<br>";
                        endforeach;
                     endif;
                  ?>
               </div>
            </div>
         </div>
      </div>
   </section>


   <?php if(!empty($quotes['tool_quote'][0])): ?>
      <?php $quote_count = count($quotes); ?>
      <section class="tool-quote">
         <div id="carousel-tool-quote" class="carousel slide" data-ride="carousel">
            <div class="jumbotron" style="background:white">
               <!-- Indicators -->
               <ol class="carousel-indicators">
                  <?php $i = 0; ?>
                  <?php foreach ($quotes as $key): ?>
                        <li data-target="#carousel-tool-quote" data-slide-to="<?php $i; ?>" class="<?php if($i==0){ echo "active"; } ?>"></li>
                  <?php $i++; endforeach; ?>
               </ol>

               <div class="container">
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner text-center" role="listbox">
                     <?php for ($i=0; $i < $quote_count; $i++): ?>
                           <div class="item col-md-8 col-md-offset-2 <?php if($i==0){echo "active";} ?>">
                              <h2><?php echo $quotes['tool_quote'][$i]; ?></h2>
                              <p> <?php echo $quotes['tool_quote_author'][$i]; ?></p>
                           </div>

                     <?php endfor; ?>
                  </div>
               </div>

               <!-- Controls -->
               <a class="left carousel-control" href="#carousel-tool-quote" role="button" data-slide="prev" style="background:transparent">
                  <span class="glyphicon glyphicon-chevron-left" style="color:#c90333"></span>
                  <span class="sr-only">Previous</span>
               </a>
               <a class="right carousel-control" href="#carousel-tool-quote" role="button" data-slide="next" style="background:transparent">
                  <span class="glyphicon glyphicon-chevron-right" style="color:#c90333"></span>
                  <span class="sr-only">Next</span>
               </a>
            </div>
         </div>
      </section>
   <?php endif; ?>

   <section class="tool-question">
      <div class="jumbotron" style="background:white">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <h4><i class="fa fa-question-circle"></i> <?php _e('Questions','roots'); ?></h4>
                  <hr class="sevinci-hr">
                  <?php
                     $questions = get_the_terms($post->ID,'question');
                     if ( $questions && ! is_wp_error( $questions ) ) :
                        foreach ( $questions as $q ) {
                           echo $q->name . "<br>";
                        }
                     endif;
                  ?>
               </div>
               <div class="col-md-4">
                  <h4><i class="fa fa-paste"></i> <?php _e('Versions','roots'); ?></h4>
                  <hr class="sevinci-hr">
                  <?php
                     $version_count = count($version['tool_version_file']);
                     for ($i=0; $i < $version_count; $i++) {
                        ?>
                        <a href="<?php echo wp_get_attachment_url($version['tool_version_file'][$i][0]); ?>" target="_blank">
                           <?php _e('Version','roots'); echo " "  . $version['tool_version_number'][$i]; ?>
                        </a>
                        <?php echo ": " . $version['tool_version_date'][$i] . "<br> "; ?>
                        <?php
                     }
                  ?>
               </div>
            </div>
         </div>
      </div>
   </section>

   <section class="tool-brain-dominance">
      <div class="jumbotron">
         <div class="container">
            <div class="col-lg-12 text-center">
               <h2 class="section-heading"><i class="fa fa-line-chart"></i> <?php _e('Boost yourself','roots'); ?></h2>
               <h3 class="section-subheading text-muted"><?php _e('Increase your performance by preparing yourself with the right mindset'); ?></h3>
            </div>
            <?php $brain = Brain::get_brain_dominance($brain); ?>
            <div class="row">
               <div class="col-md-6">
                  <img src="<?php echo $brain['img'] ?>" alt="" width="400" class="img-responsive" />
               </div>
               <div class="col-md-6">
                  <h3><?php echo $brain['title']; ?></h3>
                  <hr class="sevinci-hr-dark">
                  <h5><?php echo $brain['tagline']; ?> </h5>
                  <strong><?php _e('Interest','roots'); ?>:</strong> <?php echo $brain['interest']; ?>
                  <br>
                  <strong><?php _e('Focus','roots'); ?>:</strong> <?php echo $brain['focus']; ?>
                  <hr class="sevinci-hr-dark">
                  <h5><?php _e('Characteristics','roots'); ?> </h5>
                  <div class="row">
                     <div class="col-md-6">
                        <?php
                           foreach ($brain['business'] as $b):
                              echo $b ."<br>";
                           endforeach;
                        ?>
                     </div>
                     <div class="col-md-6">
                        <?php
                           foreach ($brain['traits'] as $t):
                              echo $t . "<br>";
                           endforeach;
                        ?>
                     </div>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </section>

   <?php if(!empty($sources)): ?>
      <section class="tool-source">
         <div class="jumbotron" style="background:white">
            <div class="container">
               <div class="row">
                  <div class="col-md-9">
                     <h4><i class="fa fa-book"></i> <?php _e('Sources','roots'); ?></h4>
                     <hr>
                     <ul>
                        <?php foreach($sources as $src): ?>
                           <li><?php display_source($src->ID); ?></li>
                        <?php endforeach; ?>
                     </ul>
                  </div>
                  <div class="col-md-3">
                     <h4><i class="fa fa-pencil"></i> <?php _e('Resources','roots'); ?></h4>
                     <hr>
                     <?php
                        $resource = get_the_terms($post->ID,'resource');
                        if ( $resource && ! is_wp_error( $resource ) ) :
                           foreach ( $resource as $r ):
                              echo $r->name . "<br>";
                           endforeach;
                        endif;
                     ?>
                  </div>
               </div>
            </div>
         </div>
      </section>
   <?php endif; ?>

   <?php //if (!empty(the_content())):?>
      <!-- <section class="tool-content">
         <div class="jumbotron" >
            <div class="container">
               <div class="entry-content"> -->
                  <?php //the_content(); ?>
               <!-- </div>
            </div>
         </div>
      </section> -->
   <?php //endif; ?>

   <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
   </footer>

   <section class="tool-comments">
      <div class="container">
         <div class="container">
            <?php comments_template('/templates/comments.php'); ?>
         </div>
      </div>
   </section>


<?php endwhile; ?>

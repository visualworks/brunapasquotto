<div class="feature-news">
<?php if (!$title == '' || !$content=='') {?>
    <div class="description col-md-12 col-sm-12 col-xs-12">
    <?php if (!$title=='') {?>
      <?php printf('<h2>%s</h2>', $title)?>
    <?php }
    if (!$content == '') {?>
      <div class="desc-section"><p><?php echo wpb_js_remove_wpautop($content)?></p></div>
    <?php }?>
    </div>
<?php }?>
<div class="beau-features">
<ul class="feature-list">
<?php
  if ($loop->have_posts()) {
    $i = $j = $a = $k = 0;
      while ($loop->have_posts()) {
        $loop->the_post();
        $size ="";
        $link_post    =  get_the_permalink();
        $title_post   =  get_the_title();
        $image        =  get_the_post_thumbnail( get_the_ID(), 'large');
        $author       =  get_the_author_link();
        $post_format  =  get_post_format();
        $audio        =  get_post_meta(get_the_ID(), '_beautheme_soud_cloud',TRUE);
        $audio_file   =  get_post_meta(get_the_ID(), '_beautheme_audio_file', TRUE);
        $video        =  get_post_meta(get_the_ID(), '_beautheme_video_embed',TRUE);
        $video_file   =  get_post_meta(get_the_ID(), '_beautheme_video_file',TRUE);

        //Set style for news item
        $size           = 'beau-big';
        $float          = 'left';
        $class_image    = 'col-md-8 col-sm-8 col-xs-8';
        $class_title    = 'col-md-4 col-sm-6 col-xs-6';
        $k              = $k+1;
        if ($i%3==0) {$j+=1; $k=1;}
        if ($j%2==0) {
            switch ($k) {
              case 1:
                $size         = 'beau-small';
                $float        = 'left';
                $class_image  = 'col-md-4 col-sm-6 col-xs-6';
                $class_title  = 'col-md-8 col-sm-6 col-xs-6';
                break;
              case 3:
                $size         = 'beau-small';
                $float        = 'left';
                $class_image  = 'col-md-4 col-sm-6 col-xs-6';
                $class_title  = 'col-md-8 col-sm-6 col-xs-6';
                break;
              default:
                $size         = 'beau-big';
                $float        = 'right';
                $class_image  = 'col-md-8 col-sm-8 col-xs-6';
                $class_title  = 'col-md-4 col-sm-4 col-xs-6';
                break;
            }
        }else{
            switch ($k) {
              case 2:
                $size         = 'beau-small';
                $float        = 'right';
                $class_image  = 'col-md-4 col-sm-6 col-xs-6';
                $class_title  = 'col-md-8 col-sm-6 col-xs-6';
                break;
              case 3:
                $size         = 'beau-small';
                $float        = 'right';
                $class_image  = 'col-md-4 col-sm-6 col-xs-6';
                $class_title  = 'col-md-8 col-sm-6 col-xs-6';
                break;
              default:
                $size         = 'beau-big';
                $float        = 'left';
                $class_image  = 'col-md-8 col-sm-8 col-xs-6';
                $class_title  = 'col-md-4 col-sm-4 col-xs-6';
                break;
            }
        }
        if (hugo_option('hugo-style') != NULL) {
            if (hugo_option('hugo-style')=='classic.css' && $show_type =='list-grid') {
                $size           = 'beau-small item-classic';
                $float          = 'left';
                $class_image    = 'col-md-4 col-sm-6 col-xs-6';
                $class_title    = 'col-md-8 col-sm-6 col-xs-6';
            }
        }
        if ($size =='beau-big') {
          $image = get_the_post_thumbnail(get_the_ID(), 'medium');
        }else{
          $image = get_the_post_thumbnail(get_the_ID(), 'small-thumbnail');
        }
           // Check standard comment
        if ($image=="") {
            if ($size =='beau-big') {
              $image = '<img src="http://placehold.it/370x370" alt="No images">';
            }else{
              $image = '<img src="http://placehold.it/170x170" alt="No images">';
            }
            if ($show_type == 'standard') {
              $image = '<img src="http://placehold.it/770x440" alt="No images">';
            }
        }
        //Check post type
        global  $wp_embed;
        switch ($post_format) {
            case 'audio':
            if ($audio !="") {
                $show_view = $wp_embed->run_shortcode('[embed]'.$audio.'[/embed]');
            }
            break;
            case 'video':
            $show_view = '<a class="feature-image-news beau-video-item" href="'.esc_attr($link_post).'">'.$image.'</a>';
            break;

            default:
                $show_view = '<a class="feature-image-news" href="'.esc_attr($link_post).'">'.$image.'</a>';
            break;
        }
        ?>
        <li class="<?php echo esc_attr($size)?> <?php echo esc_attr($float)?>">
          <span class="<?php echo esc_attr($class_image)?>">
            <?php printf('%s', $show_view)?>
            <i class="beau-arrow"></i>
          </span>
          <span class="<?php echo esc_attr($class_title)?> desc-news-hugo">
            <span class="name"><i class="fa fa-user"></i><?php printf('%s', $author)?></span>
            <a href="<?php echo esc_url($link_post)?>" class="hugo-title-news"><?php printf('%s', $title_post)?></a>
            <span class="time-up"><i class="fa fa-clock-o"></i><?php echo get_the_date()?></span>
          </span>
        </li>
      <?php
      $i++;
    }
  }
  ?>
  </ul>
  <?php
  if ($show_pagging) {
      echo  beau_pagination($loop);
  }
  ?>
</div>
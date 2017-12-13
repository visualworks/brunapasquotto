<div class="news-categories-standard">
<ul class="list-news">
<?php
  if ($loop->have_posts()) {
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
        <li>
          <?php if ($show_view !="") {?>
            <span class="thumbs">
              <?php printf('%s', $show_view);?>
            </span>
          <?php }else{?>
            <div class="clear-thumbs"></div>
          <?php }?>
          <spam class="author"><i class="fa fa-user"></i><?php printf('%s', $author)?>  <i class="fa fa-clock-o"></i><?php echo get_the_date()?></spam>
          <span class="excerp-news">
            <a href="<?php echo esc_url($link_post)?>" class="hugo-title-news"><?php printf('%s', $title_post)?></a>
            <p><?php echo get_the_excerpt()?></p>
          </span>
          <div class="clearfix"></div>
          <a class="btn-readmore" href="<?php echo esc_url($link_post)?>"><?php esc_html_e('Read more','hugo')?></a>
        </li>
      <?php
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
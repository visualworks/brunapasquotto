<?php
wp_reset_postdata();
if (!function_exists('beau_pagination')) {
	wp_link_pages(array('before' => '<div class="pagination"><strong>'.__('Pages', 'hugo').'</strong> : ', 'after' => '</div>', 'next_or_number' => 'number'));
}
edit_post_link(esc_html__('Edit ', 'hugo').get_post_type(), '<div class="edit-link">', '</div>');
$footer = '';
if (!is_page_template('template-noneheader.php')) {
	while ( have_posts() ) : the_post();
		$footer = get_post_meta($post->ID, '_beautheme_footer', TRUE);
	endwhile;
	if ($footer=='') {
        $footer =  hugo_option('footer-default');
		if ($footer == NULL) {
			$footer = 'footer-content';
		}
	}
	get_template_part('selekon/'.$footer);
}
$enable_go_top = hugo_option('enable-gotop');
if ($enable_go_top == NULL){
    $enable_go_top = 2;
}
if ($enable_go_top == 2) {
?>
<div id="beau-go-top">
	<i class="fa fa-angle-up"></i>
</div>
<script type="text/javascript">
    (function($){
        'use strict';
        $('#beau-go-top').click(function() {
        $("html, body").animate({ scrollTop: 0 },1000);
        });
        $(window).scroll(function(){
          if ($(this).scrollTop() < 250) {
              $('#beau-go-top') .fadeOut();
          } else {
              $('#beau-go-top') .fadeIn();
          }
        });
    })(jQuery)
</script>
<?php }?>
<?php wp_footer();?>
</body>
</html>


<footer class="footer-with-widget">
<?php
	global $beau_option;
	if ($beau_option && isset($beau_option['footer-columns'])) {
		$numshow = intval($beau_option['footer-columns']);
	}else{
		$numshow = 4;
	}
	if($numshow > 0){
?>
	<div class="top-footer">
		<div class="container">
		<?php
		if (function_exists("dynamic_sidebar")) {
			for ($i=0; $i <= $numshow; $i++) {
			 	if ( is_active_sidebar( 'sidebar-footer-'.$i ) ){
					dynamic_sidebar( 'sidebar-footer-'.$i );
				}
			 }
		}
		?>
		</div>
	</div>
<?php }?>
	<div class="bottom-footer">
		<div class="container">
			<?php
				$logo="";
			    if (isset($beau_option['hugo-logo'])) {
			        $logo = $beau_option['hugo-logo']['url'];
			    }
			?>
			<div class="col-md-2 col-sm-2 col-xs-6">
				<a href="<?php echo esc_url( home_url() ) ?>"><img src="<?php echo esc_attr($logo)!=""?esc_attr($logo):BEAU_IMAGES.'/logo.png';?>" alt="<?php echo esc_attr(bloginfo('name'));?>"></a>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
            <?php
                if (isset($beau_option['hugo-footer-text'])) {
                    printf('%s', $beau_option['hugo-footer-text']);
                }else{
            ?>
				&copy;<?php echo date('Y')?> <?php echo esc_attr(bloginfo( 'name' ))?>. <?php esc_html_e('All rights reserved.', 'hugo') ?> <?php _e('Designed by', 'hugo');  echo '&nbsp;'. BEAU_THEME_AUTHOR?>
             <?php }?>
			</div>
			<div class="col-md-4 col-sm-4 pull-right hidden-xs">
			<ul class="social-link">
				<?php get_template_part('selekon/social-list'); ?>
			</ul>
			</div>
		</div>
	</div>
</footer>
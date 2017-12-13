<footer class="footer-sigle">
	<div class="top-footer">
		<div class="container">
			<div class="category-footer">
				<?php
                    $logo = hugo_option('hugo-logo');
                    if ($logo != NULL) {
                        $logo = $logo['url'];
                    }
                ?>
				<img src="<?php echo esc_attr($logo)!=""?esc_attr($logo):BEAU_IMAGES.'/logo.png';?>" alt="<?php echo esc_attr(bloginfo('name'));?>">
				<?php
                if (hugo_option('hugo-footer-text')) {
                    echo hugo_option('hugo-footer-text');
                }else{
                ?>
                    &copy;<?php echo date('Y')?> <?php echo esc_attr(bloginfo( 'name' ))?>. <?php esc_html_e('All rights reserved.', 'hugo') ?> <?php _e('Designed by', 'hugo');  echo '&nbsp;'. BEAU_THEME_AUTHOR?>
                 <?php }?>
				<ul class="social-link">
					<?php get_template_part('selekon/social-list'); ?>
				</ul>
			</div>
		</div>
	</div>
</footer>
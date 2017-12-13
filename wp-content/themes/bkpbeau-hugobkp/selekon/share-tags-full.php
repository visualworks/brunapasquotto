<div class="beau-tags social-share">
	<ul class="pull-left">
		<?php if(the_tags()){?>
			<li><?php _e('Tags','hugo')?>:</li>
			<?php the_tags( '<li>', '</li><li>', '</li>' ); ?>
		<?php }?>
	</ul>
<?php
	if ( '' != get_the_post_thumbnail( $post->ID ) ) {
		$pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		$pinImage = $pinterestimage[0];
	} else {
		$pinImage = 'http://placehold.it/500x500&text=No%20Image';
	}
?>
	<ul class="pull-right">
		<li class="sbutton pinterest-cresta-share" id="pinterest-cresta"><a rel="nofollow" href="http://pinterest.com/pin/create/bookmarklet/?url=<?php echo urlencode(get_permalink( $post->ID )) ?>&amp;media=<?php echo esc_attr($pinImage)?>&amp;description=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title( $post->ID ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8')?>" title="<?php _e('Share to Pinterest','')?>" onclick="window.open(this.href, 'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450');return false;"><i class="fa fa-pinterest"></i></a><span class="cresta-the-count" id="pinterest-count"><i class="cs c-icon-cresta-spinner animate-spin"></i></span></li>
		<li class="sbutton twitter-cresta-share" id="twitter-cresta"><a rel="nofollow" href="http://twitter.com/share?text=<?php echo htmlspecialchars(urlencode(html_entity_decode(the_title_attribute( 'echo=0' ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') ?>&amp;url=<?php echo  urlencode(get_permalink( $post->ID )) ?>" title="<?php _e('Share to Twitter','hugo')?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450');return false;"><i class="fa fa-twitter"></i></a><span class="cresta-the-count" id="twitter-count"><i class="cs c-icon-cresta-spinner animate-spin"></i></span></li>
		<li class="sbutton facebook-cresta-share" id="facebook-cresta"><a rel="nofollow" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink( $post->ID )) ?>&amp;t=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title( $post->ID ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') ?>" title="<?php _e('Share to Facebook','hugo')?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450');return false;"><i class="fa fa-facebook"></i></a><span class="cresta-the-count" id="facebook-count"><i class="cs c-icon-cresta-spinner animate-spin"></i></span></li>
		<li class="sbutton googleplus-cresta-share" id="googleplus-cresta"><a rel="nofollow" href="https://plus.google.com/share?url=<?php echo  urlencode(get_permalink( $post->ID )) ?>" title="<?php _e('Share to Google Plus','hugo')?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450');return false;"><i class="fa fa-google-plus"></i></a><span class="cresta-the-count" id="googleplus-count"><i class="cs c-icon-cresta-spinner animate-spin"></i></span></li>
		<li class="sbutton linkedin-cresta-share" id="linkedin-cresta"><a rel="nofollow" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo  urlencode(get_permalink( $post->ID )) ?>&amp;title=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title( $post->ID ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') ?>&amp;source=<?php echo esc_url( home_url( '/' )) ?>" title="<?php _e('Share to LinkedIn','eautheme')?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450');return false;"><i class="fa fa-linkedin"></i></a><span class="cresta-the-count" id="linkedin-count"><i class="cs c-icon-cresta-spinner animate-spin"></i></span></li>
	</ul>

</div>
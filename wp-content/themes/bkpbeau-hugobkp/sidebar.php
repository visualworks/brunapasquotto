<div class="col-md-12 col-sm-12 col-xs-12 pull-right">
<?php
global $beau_option;
if (!$beau_option['custom_sidebar']) {
?>
	<div class="right-widget recent-posts">
		<h2><?php _e('Recent posts','hugo')?></h2>
		<?php
		if(is_category() || is_single()){
		  $cat = get_category_by_path(get_query_var('category_name'),false);
		  $current = $cat->cat_ID;
		  $current_name = $cat->cat_name;
	      $current_cat_slug = $cat->slug;
		}
		else{
			$current = $current_name = $current_cat_slug ='';
		}
		$args = array(
			'post_type' 		=> 'post',
			'posts_per_page' 	=> '3',
			'paged' 			=> $paged,
			'category'			=> $current,
			'category_name'		=> $current_name,
			'orderby'  			=> 'post_date',
			'order'  			=> 'DESC',
	    );
      	$postType = new WP_Query( $args);
      	?>
		<ul>
		<?php
		if ($postType->have_posts()) {
	      	while ($postType->have_posts()) {
	      	$postType->the_post();
	      	$link_post 		=  esc_attr(get_post_permalink());
	        $title_post 	=  esc_attr(get_the_title());
   			$image 			= get_the_post_thumbnail( $post->ID, 'thumbnail');
   			if ($image=="") {
   				$image      = '<img src="http://placehold.it/70x70" alt="No image">';
   			}
   		?>
			<li>
				<a class="imgthumb"><?php printf('%s', $image)?></a>
				<?php the_title( "<h3>", "</h3>", TRUE ); ?> <a class="read-more" href="<?php echo the_permalink();?>"><?php esc_html_e('Read more >>','hugo')?></a>
			</li>
		<?php }?>
		</ul>
		<?php }?>
	</div>

	<div class="right-widget categories">
		<h2><?php _e('Categories','hugo')?></h2>
		<?php
		$args = array(
			'orderby'            => 'name',
			'order'              => 'ASC',
			'style'              => 'list',
			'show_count'         => 0,
			'hide_empty'         => 1,
			'use_desc_for_title' => 1,
			'child_of'           => 0,
			'hierarchical'       => 1,
			'number'             => null,
			'echo'               => 1,
			'taxonomy'           => 'category',
		);
		$categories = get_categories( $args);
		$tags = get_tags();
	?>
		<ul>
			<?php foreach ($categories as $key => $cat) {?>
				<li><a href="<?php echo get_category_link($cat->cat_ID)?>"><?php printf('%s', $cat->name) ?></a></li>
			<?php } ?>
		</ul>
	</div>

	<div class="right-widget tags">
		<h2><?php _e('Tags','hugo')?></h2>
		<ul>
		<?php
        $tags = get_tags( array('orderby' => 'count', 'order' => 'DESC', 'number'=>10) );
            foreach ( (array) $tags as $tag ) {
	    ?>
	        <li><a href="<?php echo get_tag_link ($tag->term_id)?>" rel="tag"><?php printf('%s', $tag->name )?></a></li>
	    <?php }?>
		</ul>
	</div>
<?php }?>
<!--Show dinamic widget-->
<?php
if ($beau_option['custom_sidebar'] && $beau_option['sidebar_numbers']) {
	$numberWidget = intval($beau_option['sidebar_numbers']);
	if (function_exists("dynamic_sidebar")) {
		for ($i=1; $i <= $numberWidget; $i++) {
		 	if ( is_active_sidebar( 'sidebar-right-'.$i ) ){
				dynamic_sidebar( 'sidebar-right-'.$i );
			}
		}
	}

}
?>
</div>
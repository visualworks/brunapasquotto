<?php while ( have_posts() ) : the_post();?>
	<div class="container contain_default">
	<a href="<?php esc_html(the_permalink()); ?>" alt="<?php esc_html(the_title());?>" class="title-page"> <?php the_title()?> </a>
	<?php the_content();?>
	<?php
	if ( comments_open() ) {
		comments_template();
	}
	?>
	</div>
<?php endwhile;?>
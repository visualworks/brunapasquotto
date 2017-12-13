
<div class="page-header">
	<h2 class="page-title"><?php _e( 'Nothing Found', 'hugo' ); ?></h2>
</div>
<div class="page-content">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p><?php printf( esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'hugo' ), admin_url( 'post-new.php' ) ); ?></p>

	<?php elseif ( is_search() ) : ?>

		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'hugo' ); ?></p>
		<?php get_search_form(); ?>

	<?php else : ?>

		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'hugo' ); ?></p>
		<?php get_search_form(); ?>

	<?php endif; ?>
</div>

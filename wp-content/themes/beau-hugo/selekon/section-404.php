<section class="notfound not-found-v2 padding-section">
	<div class="container">
		<div class="description col-md-12 col-sm-12 col-xs-12">
			<h2><?php esc_html_e('Oops! Page not found', 'hugo')?></h2>
			<div class="desc-section"><?php __('Sorry but the page you are loking for does not exist, have been removed or name changed.', 'hugo')?><br><a href="javascript:history.go(-1)"><?php esc_html_e('Go back','hugo')?></a> <?php esc_html_e('or enter the key wirds to search please!','hugo')?></div>
		</div>
		<div class="img-404">
			<img src="<?php echo BEAU_IMAGES?>/404.png" alt="404 image">
		</div>
		<div class="beautheme-form search-form col-md-12 col-sm-12 col-xs-12">
			<form action="<?php echo esc_url( home_url( '/'  ) ); ?>" method="get" accept-charset="utf-8">
				<input type="text" name="s" placeholder="<?php esc_html_e('Search something...','hugo')?>" autocomplete="off">
				<button type="submit" class="gradient"><i class="fa fa-search"></i></button>
			</form>
		</div>
	</div>
</section>
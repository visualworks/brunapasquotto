<?php
global $product;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! comments_open() ) {
	return;
}
$aria_req = ( $req ? " aria-required='true'" : '' );
?>
	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>

		<div class="beau-comment">
			<h3 class="title-comment"><?php echo get_comments_number()?> <?php _e('Comments','hugo')?></h3>
			<?php if ( have_comments() ) :
			?>
			<?php wp_list_comments( array(
		        'walker' 		=> new beau_theme_walker_comment,
		        'style' 		=> 'ul',
		        'callback' 		=> null,
		        'end-callback' 	=> null,
		        'type' 			=> 'all',
		        'page' 			=> null,
		        'avatar_size' 	=> 50
		    ) ); ?>
			<?php endif; // have_comments() ?>
			<div class="clearfix"></div>
			<div class="form-comment">

				<?php
				comment_form(
					array(
				        'label_submit'	=>'Submit',
				        'title_reply'	=>__('Leave a comment','hugo'),
				        'comment_notes_before' =>'<ul class="beau-contact beau-comment-form col-md-12 col-sm-12 col-xs-12"',
					    'fields' => array(
				            'author' => '><li class="col-md-6 col-sm-6 col-xs-12"><input id="email" class="required email" name="email" type="text" placeholder="'.__('Email','hugo').'' . ( $req ? '*' : '' ) .'" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' /></li>',
				            'email' => '<li class="col-md-6 col-sm-6 col-xs-12">
				            <input id="author" class="required" name="author" placeholder="'.__('Name','hugo').' '. ( $req ? '*' : '' ) .'" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></li>',
				            //'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label>' .
				            //'<input id="url" class="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'
					    ),
					    'comment_field' => '<li class="col-md-12 col-sm-12 col-xs-12"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="required" placeholder="'.__('Message *','hugo').'"></textarea></li></ul>',
					    'comment_notes_after' => '
						<input type="hidden" name="rating" id="rating" value="5">'
					)
				);
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'hugo' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>

<?php
if ( post_password_required() ) { return; }
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
?>
<div class="beau-comment">
	<h3 class="title-comment"><?php echo get_comments_number()?> <?php esc_html_e('Comments','hugo')?></h3>
	<?php if ( have_comments() ) : ?>
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
		        'label_submit'	=>esc_html__('Submit','hugo'),
		        'title_reply'	=>esc_html__('Leave a comment','hugo'),
		        'comment_notes_before' =>'<ul class="beau-contact beau-comment-form col-md-12 col-sm-12 col-xs-12"',
			    'fields' => array(
		            'author' => '><li class="col-md-6 col-sm-6 col-xs-12"><input id="email" class="required email" name="email" type="text" placeholder="'.esc_html__('Email','hugo').'' . ( $req ? '*' : '' ) .'" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' /></li>',
		            'email' => '<li class="col-md-6 col-sm-6 col-xs-12">
		            <input id="author" class="required" name="author" placeholder="'.esc_html__('Name','hugo').' '. ( $req ? '*' : '' ) .'" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></li>',
			    ),
			    'comment_field' => '<li class="col-md-12 col-sm-12 col-xs-12"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="required" placeholder="'.esc_html__('Message *','hugo').'"></textarea></li></ul>',
			    'comment_notes_after' => ''
			)
		);
		paginate_comments_links();
		previous_comments_link();
		?>
		<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
	</div>
</div>

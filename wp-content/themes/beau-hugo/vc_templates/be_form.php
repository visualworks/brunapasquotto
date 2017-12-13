<?php
$title = $form_type ='';
extract(shortcode_atts(array(
    'title' => '',
    'form_type' => 'full',
), $atts));
if ($form_type == 'form_contact') {
    $form_type =  'full';
}
require(get_template_directory().'/selekon/contact-'.$form_type.'.php');
?>
<script>
	(function($) {
		$('.beau-btn-contact').click(function(event) {
        $('body, html').click(function(event) {
            $('.success-form-message').removeClass('active');
            $('.beau-btn-contact').removeAttr('disabled');
            $('.beau-btn-contact').removeClass('success-form');
        });
        $('.beau-btn-contact').attr('disabled', 'disabled');
        $(this).addClass('loading');
        $.ajax({
            type: "GET",
            url: '<?php echo admin_url( "admin-ajax.php?ajax-contact=true" ); ?>',
            data:$('.hugo-contact').serialize(),
            success: function(data){
                var sucCessme = '<?php esc_html_e('Your email has been sent successfully','hugo');?>';
                if (data == 1) {
                    $('.beau-input').val('');
                    $('.success-form-message').removeClass('error').addClass('active').html(sucCessme);
                    $('.beau-btn-contact').removeClass('loading').addClass('success-form');
                }else{
                    $('.success-form-message').addClass('active error').html(data);
                    $('.beau-btn-contact').removeClass('loading');
                }
            }
        })
    });
})(jQuery);
</script>
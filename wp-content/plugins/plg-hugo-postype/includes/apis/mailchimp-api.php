<?php//Add hook scriptadd_action( 'wp_footer', 'hugo_action_script' );function hugo_action_script(){?><script>    (function($){        // Subcribe mailchimp        $('#beau-subcribe').submit(function() {            // update user interface            $('#beau-response').html('<?php esc_html_e('Adding email address...','hugo');?>');            // Prepare query string and send AJAX request            $.ajax({                type:'GET',                url: '<?php echo admin_url( "admin-ajax.php" ); ?>?ajax-subcribe',                data: $('#beau-form-subcribe').serialize(),                success: function(msg) {                    $('#beau-response, .subcribe-message').html(msg);                }            });            return false;        });    })(jQuery)</script><?php}//Add request dataadd_action('wp_AJAX_beau_storeAddress', 'beau_storeAddress');add_action('wp_AJAX_nopriv_beau_storeAddress', 'beau_storeAddress');function beau_storeAddress(){    global $beau_option;    $api_value  = $beau_option['mailchimp-api'];    $list_id    = $beau_option['mailchimp-groupid'];	// Validation	if(!$_GET['email']){ return "No email address provided"; }	if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/i", $_GET['email'])) {		return "Email address is invalid";	}	require_once(BEAU_PLUGIN_DIR.'/libs/MailChimp/MCAPI.class.php');	// grab an API Key from http://admin.mailchimp.com/account/api/	$api = new MCAPI($api_value);	// grab your List's Unique Id by going to http://admin.mailchimp.com/lists/	// Click the "settings" link for the list - the Unique Id is at the bottom of that page.	//$list_id = "my_list_unique_id";	if($api->listSubscribe($list_id, $_GET['email'], '') === true) {		// It worked!		return 'Success! Check your email to confirm sign up.';	}else{		// An error ocurred, return error message		return 'Error: ' . $api->errorMessage;	}}// If being called via ajax, autorun the functionif(isset($_GET['ajax'])){ echo beau_storeAddress(); }?>
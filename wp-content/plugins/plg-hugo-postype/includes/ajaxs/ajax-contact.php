<?php
add_action('wp_ajax_send_contact', 'beau_Contact');
add_action('wp_ajax_nopriv_send_contact', 'beau_Contact');
function beau_valid_email($str)
{
	return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}
function beau_Contact(){
    if ( isset($_GET['email']) )
    {
    	$_GET = array_map('trim', $_GET);
    	$contact_name = stripslashes($_GET['name']);
    	$contact_email = stripslashes($_GET['email']);
    	$contact_message = stripslashes($_GET['message']);
    	$regex_email = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    	if ( empty($contact_name) ) {
    		$halt[] = esc_html__('empty name', 'hugo');
    	}
    	if ( empty($contact_email) ) {
    		$halt[] = esc_html__('empty email', 'hugo');
    	}
    	elseif ( !beau_valid_email($contact_email) ) {
    		$halt[] = esc_html__('email is malformed', 'hugo');
    	}
    	if ( empty($contact_message) ) {
    		$halt[] = esc_html__('empty message', 'hugo');
    	}
    	if ( isset($halt) )
    	{
    		return esc_html__('Error: ','hugo').@implode(', ', $halt);
            exit();
    	}
    	else {
    		$messages = '
    		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    		<html xmlns="http://www.w3.org/1999/xhtml">
    		<head></head>
    		<body>
    		<table>
    			<tr><td colspan="3"><strong>'.esc_html__('You have a messages from website','hugo').'</strong> '.get_site_url().'</td></tr>
    			<tr><td valign="top"><b>'. esc_html__('Name', 'hugo') .'</b></td><td valign="top">:</td><td valign="top">' . $contact_name . ' </td></tr>
    			<tr><td valign="top"><b>'. esc_html__('Email', 'hugo') .'</b></td><td valign="top">:</td><td valign="top">' . $contact_email . '</td></tr>
    			<tr><td valign="top"><b>'. esc_html__('Message', 'hugo') .'</b></td><td valign="top">:</td><td valign="top">' . $contact_message . '</td></tr>
    		</table>
    		</body>
    		</html>';
    		$headers = "MIME-Version: 1.0" . "\r\n";
    		$headers .= "Content-type:text/html;charset=utf-8" . "\r\n";
    		$headers .= "From: " . stripslashes($contact_name) . " <" . $contact_email . ">" . "\r\n";
    		$headers .= "Sender-IP: " . $_SERVER["SERVER_ADDR"] . "\r\n";
    		$headers .= "Priority: normal" . "\r\n";
    		$headers .= "X-Mailer: PHP/" . phpversion();
    		$body     = utf8_decode($messages);
    		$to = get_option('admin_email');
    		global $beau_option;
    		if (!empty($beau_option['admin-email'])) {
                $to = $beau_option['admin-email'];
            }
            $subject = esc_html__('Contact email from', 'hugo') .': '. $contact_name;
            $sendEmail = wp_mail( $to, $subject, $body, $headers);
    		if ($sendEmail){
    			return true;
                exit();
    		}else{
    			return esc_html__('Sending email error please try again','hugo');
                exit();
    		}
    	}
    }else{
    	return esc_html__('Nodata Post','hugo');
        exit();
    }
}
if (isset($_GET['email']) && isset($_GET['ajax-contact'])) { echo beau_Contact(); exit();}
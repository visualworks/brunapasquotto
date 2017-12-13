<div class="contactform">
    <div class="container">
        <?php if (!$title == '' || !$content=='') {?>
            <div class="description col-md-12 col-sm-12 col-xs-12">
                <?php if (!$title=='') {?>
                      <h2><?php echo esc_html($title)?></h2>
                <?php }
                if (!$content == '') {?>
                  <div class="desc-section"><p><?php echo wpb_js_remove_wpautop($content)?></p></div>
                <?php }?>
            </div>
        <?php }?>

        <div class="beau-form col-md-12 col-sm-12 col-xs-12">
        <div class="success-form-message"><?php esc_html_e('Success & Error message','hugo');?></div>
        <form class="hugo-contact" action="#" method="post">
            <ul class="beau-contact form-center col-md-8 col-sm-12 col-xs-12">
                <li class="col-md-6 col-sm-6 col-xs-12"><input class="beau-input hugo-email" id="hugo-email" type="text" name="email" placeholder="<?php esc_html_e('Email *','hugo')?>"></li>
                <li class="col-md-6 col-sm-6 col-xs-12"><input class="beau-input hugo-name" id="hugo-name" type="text" name="name" placeholder="<?php esc_html_e('Name *','hugo')?>"></li>
                <li class="col-md-12 col-sm-12 col-xs-12">
                    <textarea class="beau-input hugo-message" id="hugo-message" name="message" placeholder="<?php esc_html_e('Message *','hugo')?>"></textarea>
                </li>
                <li class="col-md-12 col-sm-12 col-xs-12">
                    <button type="button" class="btn-submit hugo-btn-contact beau-btn-contact" name="btn-submit"><?php esc_html_e('Submit','hugo')?></button>
                </li>
            </ul>
        </form>
        </div>
    </div>
</div>
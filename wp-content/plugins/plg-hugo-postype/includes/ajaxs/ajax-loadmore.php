<?php
function beautheme_jqueryLoadmore($setting='', $args_loop='', $customFunction = ''){ $rand_id = rand(9,999);?>
<div class="clearfix text-center">
    <button type="button" class="btn-loadmore <?php echo esc_attr(isset($setting['class_extra']) ? $setting['class_extra']:'');?>" id="loadmore-button-<?php echo esc_attr($rand_id);?>" data-offset="<?php echo esc_attr(isset($args_loop['posts_per_page']) ? $args_loop['posts_per_page']: $setting['offset']);?>">
        <?php echo esc_html(isset($setting['button_text']) ? $setting['button_text']:'');?>
    </button>
</div>
<script>
    (function($){
        'use strict';
        $('#loadmore-button-<?php echo esc_js($rand_id);?>').click(function() {
            var $button                 = $('#loadmore-button-<?php echo esc_js($rand_id);?>');
            var dataIn                  = <?php echo json_encode($args_loop, JSON_FORCE_OBJECT);?>;
            var currentPage             = $button.attr('data-page');
            var loadMore                = <?php echo esc_js(isset($setting['loadmore']) ? $setting['loadmore']: get_option( 'posts_per_page' ));?>;
            var offset                  = $button.attr('data-offset');
            var $container              = $('<?php echo esc_html($setting['container'] ? $setting['container']:'');?>');
            dataIn.beau_ajax_loadmore   = 'true';
            dataIn.template             = '<?php echo esc_html($setting['template'] ? $setting['template']:'');?>';
            dataIn.offset               = offset;
            dataIn.posts_per_page       = parseInt(loadMore);
            dataIn.enable_buy           = '<?php echo esc_html(isset($setting['enable_buy']) ? $setting['enable_buy']:'');?>';
            if (currentPage ==undefined) {currentPage =1;}
            dataIn.page                 = currentPage;
            var dataLoad                = dataIn;
            if ($button.hasClass('disabled')) {return false;}
            if (!$button.hasClass('loading')) {
                var nextPage = parseInt(currentPage) + 1;
                if (nextPage >1) {$button.attr('data-offset', parseInt(offset)+parseInt(loadMore));}
                $button.addClass('loading');
                jQuery.ajax({
                    type: 'GET',
                    url: '<?php echo admin_url( "admin-ajax.php"); ?>',
                    dataType:'html',
                    data: dataLoad,
                    complete: function(xhr, textStatus) {
                        // console.log(textStatus);
                    },
                    success: function(result) {
                        console.log(result.length);
                        if(result.length > 1){
                            $container.append(result);
                            $button.attr('data-page', nextPage).removeClass('loading');
                            <?php echo esc_js($customFunction);?>
                        }else{
                            $button.removeClass('loading').addClass('disabled');
                        }
                    }
                });
            }
            return false;
        });
    })(jQuery)
</script>
<?php
}//End of script

// Add hook loadmore for page
add_action('wp_AJAX_beau_loadmoreTicket', 'beau_ajaxLoadMore');
add_action('wp_AJAX_nopriv_beau_ajaxLoadMore', 'beau_ajaxLoadMore');
function beau_ajaxLoadMore($args){
    $items_loadmore = $args['template'];
    $enable_buy     = $args['enable_buy'];
    unset($args['beau_ajax_loadmore']);
    unset($args['template']);
    unset($args['enable_buy']);
    $loadmore_Object = new WP_Query($args);
    if( $loadmore_Object->have_posts() ) {
        while ($loadmore_Object->have_posts()) :
            $loadmore_Object->the_post();
            include(get_template_directory().'/selekon/'.$items_loadmore.'.php');
        endwhile;
    }
    exit();
}
if(isset($_GET['beau_ajax_loadmore'])){beau_ajaxLoadMore($_REQUEST);exit();}




<?php
$randID = rand(999,9999);
?>
<?php
    if ($loop->have_posts()) {
    $count = $loop ->post_count;

    $i=1;
    while ($loop->have_posts()) {
        $loop->the_post();
        $post_format  =  get_post_format();
        $image        =  get_the_post_thumbnail(get_the_ID(), 'large');
        $class        = "beau-image";
        if ($image=="") {
            $image = '<img src="http://placehold.it/350x300" alt="No image" />';
        }
        if ($post_format=='video') {
            $class    = 'beau-video';
            $plus     = 'fa-play';
        }
    ?>
    <div class="gallery-horizontal <?php echo esc_attr($post_format)?>">
        <?php if ($post_format=='video'): ?>
            <a class="view-popup link-<?php echo  esc_html($class)?>" data-toggle="modal" data-target="#hugo_modal_<?php echo esc_attr($i) ?>">
                <span class="beau-plus"><i class="fa <?php echo esc_attr($plus)?>"></i></span>
            </a>
        <?php endif ?>
        <a class="link-<?php echo esc_html($class)?>" data-toggle="modal" data-target="#hugo_modal_<?php echo esc_attr($i) ?>">
            <?php printf('%s', $image)?>
        </a>
    </div>
    <!-- Modal -->
<?php
    $i++;
    }
}
if ($count) {?><style type="text/css">.gallery-horizontal{width: <?php echo esc_html(100/$count) ?>%;}</style><?php }?>
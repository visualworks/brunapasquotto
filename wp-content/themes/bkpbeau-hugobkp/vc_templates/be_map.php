<?php
$latitude = $longitude = $hugo_map_marker = $height = $enable_scroll ='';
extract(shortcode_atts(array(
    'latitude' => '',
    'longitude'  => '',
    'hugo_map_marker'  => '',
    'height' => '440px',
    'enable_scroll' => 'false',
), $atts));
$map_marker = wp_get_attachment_image_src($hugo_map_marker,'full');
?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOeGmyX-gl-BqGDrCvYd1qeEWstO9553Y&sensor=false&libraries=places,geometry&v=3.18"></script>
<script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', init);
    function init() {
        var mapOptions = {
            zoom: 8,
            scrollwheel: <?php echo esc_js($enable_scroll);?>,
            // mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: new google.maps.LatLng(<?php echo esc_js($latitude); ?>, <?php echo esc_js($longitude); ?>),
            styles: [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}]
        };
        var mapElement = document.getElementById('hugo_mapview');
        var map = new google.maps.Map(mapElement, mapOptions);
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(<?php echo esc_js($latitude); ?>, <?php echo esc_js($longitude); ?>),
            map: map,
            icon: "<?php echo esc_url($map_marker[0]);?>",
            title: 'Map title'
        });
    }
</script>
<div class="hugo_mapview col-md-12 col-sm-12 col-xs-12">
    <div id="hugo_mapview"></div>
</div>
<style type="text/css"> #hugo_mapview{ width: 100%; height: <?php echo esc_attr($height);?>;!important;}
</style>
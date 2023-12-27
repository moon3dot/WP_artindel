<?php
get_header();
$options = get_option( 'kaveh_frame' );
?>
<pre>
<?php
var_dump($options['kaveh_boxmenudown_url']['url']);
?>
</pre>

<?php
if($options['prtamas'] === '1'):
echo $options['tamas_sho']; 
endif;
get_footer();
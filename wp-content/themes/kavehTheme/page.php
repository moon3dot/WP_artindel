<?php 
get_header();
?>


<?php
if ( have_posts() ) {
while ( have_posts() ) {
the_post();
//
$account_page_id = get_option('woocommerce_myaccount_page_id');
if( ! is_page( $account_page_id ) ): ?>
<div class="container">
<?php
the_content();
?>
</div>
<?php
else:
the_content();  
endif;
//
} // end while
} // end if
?>
 
 

<?php 
get_footer();
?>
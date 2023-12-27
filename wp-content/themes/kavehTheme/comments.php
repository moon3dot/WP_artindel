<div class="container">
  <div class="detail-blog-comments">
    <h4 class="title fw-bold text-center">
      نظرات
      <span class="fw-normal"> کاربران </span>
    </h4>
    <div class="detail-blog-comments-wrapper position-relative bg-white">

<?php
function kaveh_comment($comment,$args,$depth){

?>
<div class="comments">
<li>
    <div class="content">
        <div class="info d-flex align-items-center flex-column flex-sm-row">
            <img class="rounded-circle text-center mb-3 mb-sm-0" src="<?php $avatar = get_avatar_url($comment->comment_author_email); echo esc_url($avatar) ?>">
            <div class="detail d-flex align-items-center justify-content-between flex-column flex-sm-row">
                <div class="author-date text-center text-sm-right">
                    <div class="author">
                        <?php echo $comment->comment_author ?>
                    </div>
                    <div class="date">
                        <?php comment_date(); ?>
                    </div>
                </div>
                <div class="star-position d-flex align-items-center flex-column flex-sm-row">
                    <?php if($comment->comment_approved == 0){ ?>
                    <em>دیدگاه شما در انتظار بررسی است</em>
                    <?php } ?>
                    <?php if(is_user_logged_in()): ?>
                    <div class="position rounded-pill me-2"><?php edit_comment_link('ویرایش دیدگاه') ?></div>
                    <?php endif; ?>
                        <div class="position rounded-pill"><?php comment_reply_link(array('depth'=>$depth,'max_depth'=>$args['max_depth'])) ?></div>
                 </div>
            </div>
        </div>
        <div class="box">
            <p>
            <?php comment_text(); ?>
            </p>
        </div>
    </div>
</li>
</div>
<?php
}

wp_list_comments(
  array(
  'style' => 'ul',
  'max_depth' => '5',
  'callback' => 'kaveh_comment',
  )
);
?> 

 <!-- Start Send Comment -->
 <?php
        $user = wp_get_current_user();
        $commenter = wp_get_current_commenter();
        //var_dump($commenter);
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );

        $fields = array(
            'author' => '<div class="col-12">
                        <div class="form-group position-relative">
                        <label for="author"> نام شما </label>
                        <input type="text" name="author" id="subject" class="form-control rounded-pill" value="' . esc_attr( $commenter['comment_author'] ) .'" ' . $aria_req . '>
                        </div>
                        </div>',
            'email' =>
                        '<div class="col-md-6">
                        <div class="form-group position-relative">
                        <label for="email"> ایمیل</label>
                        <input type="text" name="email" id="strengths" class="form-control rounded-pill" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                        '" ' . $aria_req . '/>
                        </div>
                        </div>',
            'url' =>
                        '<div class="col-md-6">
                        <div class="form-group position-relative">
                        <label for="url"> سایت شما </label>
                        <input type="text" name="url" id="weak" class="form-control rounded-pill" value="' . esc_attr( $commenter['comment_author_url'] ) .
                        '" />
                        </div>
                    </div>'
        );
        $args = array(
            'class_form' => 'send-comment row',
            'class_submit' => 'btn btn-primary rounded-pill p-0 w-100',
            'title_reply' => __('<span>دیدگاهی بگذارید</span>'),
            'title_reply_to' => __('پاسخ به دیدگاه %s'),
            'cancel_reply_link' => __('لغو ارسال دیدگاه'),
            'label_submit' => __('Post Comment'),
            'format' => 'html5',
            'comment_field' => '<div class="col-12"><div class="form-group position-relative"><label for="comment"> نظر شما </label><textarea name="comment" id="content" class="form-control" aria-required="true"></textarea></div></div>',
            'must_log_in' => '<p class="must-log-in">' .
                sprintf(
                    __( 'شما باید حتما <a class="cmouse" onclick="showPopup()">وارد شوید</a> تا بتوانید نظر دهید.' ),
                    wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
                ) . '</p>',
            'logged_in_as' => '<p class="logged-in-as">' .
                sprintf(
                __( 'وارد شده به عنوان <a href="%1$s">%2$s</a>. <a href="%3$s" title="از این اکانت خارج شوید">خروج؟</a>' ),
                    admin_url( 'profile.php' ),
                    $user->user_nicename,
                    wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
                ) . '</p><br><br>',
            'comment_notes_before' => '<p class="comment-notes">' .
                __( 'Your email address will not be published.' ) .
                '</p>',
          
            'fields' => apply_filters( 'comment_form_default_fields', $fields ),
        );
        comment_form($args);
        ?>
      <!-- End Send Comment -->
    </div>
  </div>
</div>
<!-- End Comments -->

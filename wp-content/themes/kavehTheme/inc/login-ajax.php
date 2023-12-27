<?php

// Start a new or resume an existing session
session_start();

// Check if the verification code has already been generated for this user
if (!isset($_SESSION['verification_code'])) {
  // Generate a new verification code
  $verification_code = rand(1000,9999);
  
  // Store the verification code in the session variable
  $_SESSION['verification_code'] = $verification_code;
  $vercode = $_SESSION['verification_code'];

} else {
  // Retrieve the verification code from the session variable
  $vercode = $_SESSION['verification_code'];

}
add_action( 'wp_footer', 'ajax_login_fetch' );
function ajax_login_fetch() {
  $page = get_page_by_path('klogin');
  $page_id = $page->ID;
  if(!is_page( $page_id )): ?>
  <div id="popup" class="popup">
    <div class="popup-content">
      <span class="close" onclick="hidePopup()">&times;</span>
        <div class="myloginpop">
        <button class="btn btn-primary mt-3 vercode position-absolute top-0 start-0 shadow-xl vpa" id="vpa"> ورود با پیامک </button>
          <button class="btn btn-primary mt-3 vercode position-absolute top-0 end-0 bg-white text-black shadow-lg vma" id="vma"> ورود با رمز </button>
          <?php $options = get_option( 'kaveh_frame' ); ?>
          <img src="<?php echo $options['kaveh_logo_up'] ?>" alt="">
          <form class="logbuttonpre">
          <h5 class="mt-3">شماره موبایل خود را وارد کنید</h5>
          <input class="form-control mt-3" type="tel" id="phone" name="phone" required>
          <button class="w-100 btn btn-primary mt-3 vercode" type="submit">دریافت کد تایید</button>
          <button class="faramosh">فراموشی رمز عبور</button>
          </form>
        </div>
    </div>
  </div>
  <script>
    function showPopup() {
      var popup = document.getElementById('popup');
      popup.classList.remove('hide');
      popup.classList.add('show');
  }
  function hidePopup() {
      var popup = document.getElementById('popup');
      popup.classList.remove('show');
      popup.classList.add('hide');
  }
  </script>
  <?php endif;
}
add_action( 'wp_ajax_tab_pa', 'tab_pa_callback' );
add_action( 'wp_ajax_nopriv_tab_pa', 'tab_pa_callback' );
function tab_pa_callback(){
  ?>
   <button class="btn btn-primary mt-3 vercode position-absolute top-0 start-0 shadow-xl vpa" id="vpa"> ورود با پیامک </button>
          <button class="btn btn-primary mt-3 vercode position-absolute top-0 end-0 bg-white text-black shadow-lg vma" id="vma"> ورود با رمز </button>
          <?php $options = get_option( 'kaveh_frame' ); ?>
<img src="<?php echo $options['kaveh_logo_up'] ?>" alt="">
          <form class="logbuttonpre">
          <h5 class="mt-3">شماره موبایل خود را وارد کنید</h5>
          <input class="form-control mt-3" type="tel" id="phone" name="phone" required>
          <button class="w-100 btn btn-primary mt-3 vercode" type="submit">دریافت کد تایید</button>
          <button class="faramosh">فراموشی رمز عبور</button>
          </form>
     
<?php
  die();
}



add_action( 'wp_ajax_tab_email', 'tab_email_callback' );
add_action( 'wp_ajax_nopriv_tab_email', 'tab_email_callback' );
function tab_email_callback(){
  ?>
  <button class="btn btn-primary mt-3 vercode position-absolute top-0 start-0 bg-white text-black shadow-lg vpa" id="vpa"> ورود با پیامک </button>
  <button class="btn btn-primary mt-3 vercode position-absolute top-0 end-0 shadow-xl vma" id="vma"> ورود با رمز </button>
  <?php $options = get_option( 'kaveh_frame' ); ?>
<img src="<?php echo $options['kaveh_logo_up'] ?>" alt="">
  <form class="logbuttonpre tabemail">
  <h5 class="mt-3">ایمیل یا موبایل خود را وارد کنید</h5>
  <input style="text-align:right" class="form-control mt-3" type="email" id="email" name="email" placeholder="ایمیل یا موبایل شما" required>
  <input class="form-control mt-2" type="password" id="password" name="password" placeholder="رمز عبور" required>
  <button class="w-100 btn btn-primary mt-3 vercode" type="submit">ورود / ثبت نام</button>
  <button class="faramosh ">فراموشی رمز عبور</button>
  </form>
  <?php
  die();
}





//login ajax
add_action( 'wp_ajax_login_j_ajax_ver_back', 'login_ajax_back' );
add_action( 'wp_ajax_nopriv_login_j_ajax_ver_back', 'login_ajax_back' );
function login_ajax_back() {
  ?>
  <button class="btn btn-primary mt-3 vercode position-absolute top-0 start-0 shadow-xl vpa" id="vpa"> ورود با پیامک </button>
  <button class="btn btn-primary mt-3 vercode position-absolute top-0 end-0 bg-white text-black shadow-lg vma" id="vma"> ورود با رمز </button>
  <?php $options = get_option( 'kaveh_frame' ); ?>
  <img src="<?php echo $options['kaveh_logo_up'] ?>" alt="">
  <form class="logbuttonpre">
  <h5 class="mt-3">شماره موبایل خود را وارد کنید</h5>
  <input class="form-control mt-3" type="tel" id="phone" name="phone" required>
  <button class="w-100 btn btn-primary mt-3 vercode" type="submit">دریافت کد تایید</button>
  <button class="faramosh">فراموشی رمز عبور</button>
  </form>
  <?php
  die();
}




// login ajax
add_action( 'wp_ajax_login_j_ajax_ver', 'login_ajax_ver' );
add_action( 'wp_ajax_nopriv_login_j_ajax_ver', 'login_ajax_ver' );
function login_ajax_ver() {
    $options = get_option( 'kaveh_frame' );
    global $vercode;
      $phone = sanitize_text_field($_POST['phone']);
    if($options['kaveh_sms_gateway'] == 'option-1'):
      
      $client     = new SoapClient("http://188.0.240.110/class/sms/wsdlservice/server.php?wsdl");
      $user       = $options['kaveh_username_sms'];
      $pass       = $options['kaveh_password_sms'];
      $fromNum    = $options['kaveh_number_sms'];
      $toNum      = $phone;
      $pattern_code = $options['kaveh_pattern_sms'];
      $input_data = array(
      "verification-code" => $vercode,
      );
      $client->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);
    elseif($options['kaveh_sms_gateway'] == 'option-2'):
      $code   	= $vercode;
	    $mobile 	= $phone;
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.sms.ir/v1/send/verify',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "mobile": "'.$mobile.'",
            "templateId": '.$options['kaveh_pattern_sms'].',
            "parameters": [
                {
                  "name": "CODE",
                  "value": "'.$code.'"
                }
            ]
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Accept: text/plain',
            'x-api-key: '.$options['kaveh_password_api']
        ),
        ));
        curl_exec($curl);
        curl_close($curl);

    elseif($options['kaveh_sms_gateway'] == 'option-3'):
      $code   	= $vercode;
      $mobile 	= $phone;
      $bodyId 	= $options['kaveh_pattern_sms'];
      $username 	= $options['kaveh_username_sms'];
      $password 	= $options['kaveh_password_sms'];
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,"http://rest.payamak-panel.com/api/SendSMS/BaseServiceNumber");
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, 'username='.$username.'&password='.$password.'&to='.$mobile.'&bodyId='.$bodyId.'&text='.$code);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $server_output = curl_exec($ch);
      curl_close ($ch);
    elseif($options['kaveh_sms_gateway'] == 'option-4'):
      $api_key = $options['kaveh_password_api'];
      $receptor = $phone; // Replace with the actual phone number
      $token = $vercode; // Replace with the actual verification code
      $template = $options['kaveh_pattern_sms']; // Replace with the name of your actual template
      $url = "https://api.kavenegar.com/v1/$api_key/verify/lookup.json?receptor=$receptor&token=$token&template=$template";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch);
      curl_close($ch);
    endif;    
    ?>
  <button class="btn btn-primary mt-3 vercode position-absolute top-0 start-0 shadow-xl vpa" id="vpa"> ورود با پیامک </button>
  <button class="btn btn-primary mt-3 vercode position-absolute top-0 end-0 bg-white text-black shadow-lg vma" id="vma"> ورود با رمز </button>
  <?php $options = get_option( 'kaveh_frame' ); ?>
<img src="<?php echo $options['kaveh_logo_up'] ?>" alt="">
  <p class="mb-0 mt-3 pnumber"><?php echo $phone; ?></p>
  <span class="returnback d-block">اصلاح شماره</span>
    <div class="divan">
            <form class="verifyform logbutton">
              <h5 class="text-center mb-1">کد پیامک شده را وارد کنید</h5>
              <div class="d-flex mb-3">
                <input id="boxv1" class="verifyinput form-control" type="tel" maxlength="1" pattern="[0-9]">
                <input id="boxv2" class="verifyinput form-control" type="tel" maxlength="1" pattern="[0-9]">
                <input id="boxv3" class="verifyinput form-control" type="tel" maxlength="1" pattern="[0-9]">
                <input id="boxv4" class="verifyinput form-control" type="tel" maxlength="1" pattern="[0-9]">
              </div>
              <button type="submit" class="w-100 btn btn-primary vercode">تایید کد</button>
            </form>
          </div>
          <?php
          die();
    }

    
//login ajax
add_action( 'wp_ajax_login_j_ajax', 'login_ajax' );
add_action( 'wp_ajax_nopriv_login_j_ajax', 'login_ajax' );
function login_ajax() {
  global $vercode;
  $phones = sanitize_text_field( $_POST['phones'] );
  $uservcode = (int)sanitize_text_field( $_POST['uservcode'] );
  if( $vercode !== $uservcode) {
    ?>
    <button class="btn btn-primary mt-3 vercode position-absolute top-0 start-0 shadow-xl vpa" id="vpa"> ورود با پیامک </button>
    <button class="btn btn-primary mt-3 vercode position-absolute top-0 end-0 bg-white text-black shadow-lg vma" id="vma"> ورود با رمز </button>
    <?php $options = get_option( 'kaveh_frame' ); ?>
    <img src="<?php echo $options['kaveh_logo_up'] ?>" alt="">
    <p class="mb-0 pnumber"><?php echo $phones; ?></p>
    <span class="returnback d-block">اصلاح شماره</span>
      <div class="divan">
              <form class="verifyform logbutton">
              <h5 class="text-center mb-4" style="color:red">کد تایید معتبر نیست دوباره تلاش کنید</h5>
                <div class="d-flex mb-3">
                  <input id="boxv1" class="verifyinput form-control" type="tel" maxlength="1" pattern="[0-9]">
                  <input id="boxv2" class="verifyinput form-control" type="tel" maxlength="1" pattern="[0-9]">
                  <input id="boxv3" class="verifyinput form-control" type="tel" maxlength="1" pattern="[0-9]">
                  <input id="boxv4" class="verifyinput form-control" type="tel" maxlength="1" pattern="[0-9]">
                </div>
                <button type="submit" class="w-100 btn btn-primary vercode">تایید کد</button>
              </form>
            </div>
            <?php
  }
  else{
      // Check if user with this phone number already exists
      $user = get_users([
          'meta_key' => 'billing_phone',
          'meta_value' => $phones,
          'number' => 1,
      ]);
      if ($user) {
          // User already exists, log them in
          $user = $user[0];
          wp_set_current_user($user->ID);
          wp_set_auth_cookie($user->ID);
      } else {
          // Create a new user with the phone number as the username and password
          $user_id = wp_insert_user([
              'user_login' => $phones,
              'user_pass' => wp_generate_password(),
              'role' => 'customer',
          ]);
          update_user_meta($user_id, 'billing_phone', $phones);
          wp_set_current_user($user_id);
          wp_set_auth_cookie($user_id);
      }
          ?>
          <img class="d-inline-block mx-auto" 
          src="<?php echo esc_url( get_template_directory_uri() ) . "/assets/images/tick-login.svg" ?>"
           alt="">
           <h5 class="d-block mt-3">با موفقیت وارد شدید</h5>
           <script> 
            setTimeout(() => {
              if (typeof window !== 'undefined' && window.location && window.location.search) {
                const queryParams = new URLSearchParams(window.location.search);
                const redirectTo = queryParams.get('redirect_to');
                if (redirectTo) {
                  window.location.href = redirectTo;
                }
              }
              else{
                location.reload();
              }
            }, 2000);
          </script>
          <?php
  }
  die();
}





//login email ajax
add_action( 'wp_ajax_login_email_ajax', 'login_email_ajax_kaveh' );
add_action( 'wp_ajax_nopriv_login_email_ajax', 'login_email_ajax_kaveh' );
function login_email_ajax_kaveh() {
    $email_p = sanitize_text_field($_POST['email']);
    $pass_p = sanitize_text_field($_POST['pass']);
      // Check if user with this email already exists
    $user = get_users([
        'meta_key' => 'billing_email',
        'meta_value' => $email_p,
        'number' => 1,
    ]);
    if ($user) {
        // User already exists, check the password
        $user = $user[0];
        if (wp_check_password($pass_p, $user->user_pass, $user->ID)) {
            // Password is correct, log the user in
            wp_set_current_user($user->ID);
            wp_set_auth_cookie($user->ID);
              ob_start();
            ?>
            <img class="d-inline-block mx-auto" 
            src="<?php echo esc_url( get_template_directory_uri() ) . "/assets/images/tick-login.svg" ?>"
            alt="">
            <h5 class="d-block mt-3">با موفقیت وارد شدید</h5>
            <script> 
            setTimeout(() => {
              if (typeof window !== 'undefined' && window.location && window.location.search) {
                const queryParams = new URLSearchParams(window.location.search);
                const redirectTo = queryParams.get('redirect_to');
                if (redirectTo) {
                  window.location.href = redirectTo;
                }
              }
              else{
                location.reload();
              }
            }, 2000);
          </script>
            <?php
            $res_success = ob_get_clean();
                $response = array(
                    'result' => 'success',
                    'res' => $res_success,
                );
                wp_send_json($response);
        } else {
             ob_start();
            ?>
            <button class="btn btn-primary mt-3 vercode position-absolute top-0 start-0 shadow-xl vpa" id="vpa"> ورود با پیامک </button>
            <button class="btn btn-primary mt-3 vercode position-absolute top-0 end-0 bg-white text-black shadow-lg vma" id="vma"> ورود با رمز </button>
            <?php $options = get_option( 'kaveh_frame' ); ?>
<img src="<?php echo $options['kaveh_logo_up'] ?>" alt="">
            <form class="logbuttonpre tabemail">
            <h5 class="text-center mb-4" style="color:red">رمز عبور معتبر نیست دوباره تلاش کنید</h5>
            <input value="<?php echo $email_p; ?>" style="text-align:right" class="form-control mt-3" type="email" id="email" name="email" placeholder="ایمیل یا موبایل شما" required>
            <input class="form-control mt-2" type="password" id="password" name="password" placeholder="رمز عبور" required>
            <button class="w-100 btn btn-primary mt-3 vercode" type="submit">ورود / ثبت نام</button>
            <button class="faramosh">فراموشی رمز عبور</button>
            </form>
            <?php
           $res_success = ob_get_clean();
            $response = array(
                'result' => 'success',
                'res' => $res_success,
            );
            wp_send_json($response);
        }
    } else {
        // Create a new user with the email as the username and password
        $user_id = wp_insert_user([
            'user_login' => $email_p,
            'user_email' => $email_p,
            'user_pass' => $pass_p,
            'role' => 'customer',
        ]);
        update_user_meta($user_id, 'billing_email', $email_p);
        wp_set_current_user($user_id);
        wp_set_auth_cookie($user_id);
        ob_start();
      ?>
      <img class="d-inline-block mx-auto" 
      src="<?php echo esc_url( get_template_directory_uri() ) . "/assets/images/tick-login.svg" ?>"
       alt="">
       <h5 class="d-block mt-3">با موفقیت وارد شدید</h5>
       <script> 
            setTimeout(() => {
              if (typeof window !== 'undefined' && window.location && window.location.search) {
                const queryParams = new URLSearchParams(window.location.search);
                const redirectTo = queryParams.get('redirect_to');
                if (redirectTo) {
                  window.location.href = redirectTo;
                }
              }
              else{
                location.reload();
              }
            }, 2000);
          </script>
      <?php
      $res_success = ob_get_clean();
        $response = array(
            'result' => 'success',
            'res' => $res_success,
        );
        wp_send_json($response);
    }
      die();
}

add_action( 'wp_ajax_tab_fa', 'tab_fa_callback' );
add_action( 'wp_ajax_nopriv_tab_fa', 'tab_fa_callback' );
function tab_fa_callback(){
  ?>
   <button class="btn btn-primary mt-3 vercode position-absolute top-0 start-0 bg-white text-black shadow-lg vpa" id="vpa"> ورود با پیامک </button>
    <button class="btn btn-primary mt-3 vercode position-absolute top-0 end-0 bg-white text-black shadow-lg vma" id="vma"> ورود با رمز </button>
    <?php $options = get_option( 'kaveh_frame' ); ?>
    <img src="<?php echo $options['kaveh_logo_up'] ?>" alt="">
    <form class="logfapre">
    <h4 class="mt-3 fabaz">فرآیند بازیابی رمز عبور</h4>
    <h5 class="mt-3">شماره موبایل یا ایمیل شما</h5>
    <input class="form-control mt-3" type="text" id="fa_field" name="fa_field" required>
    <button class="w-100 btn btn-primary mt-3 barr" type="submit">بررسی</button>
    </form>
<?php
  die();
}

add_action( 'wp_ajax_tab_fa_invalid', 'tab_fa_invalid_callback' );
add_action( 'wp_ajax_nopriv_tab_fa_invalid', 'tab_fa_invalid_callback' );
function tab_fa_invalid_callback(){
  ?>
   <button class="btn btn-primary mt-3 vercode position-absolute top-0 start-0 bg-white text-black shadow-lg vpa" id="vpa"> ورود با پیامک </button>
          <button class="btn btn-primary mt-3 vercode position-absolute top-0 end-0 bg-white text-black shadow-lg vma" id="vma"> ورود با رمز </button>
          <?php $options = get_option( 'kaveh_frame' ); ?>
<img src="<?php echo $options['kaveh_logo_up'] ?>" alt="">
          <form class="logfapre">
          <h5 class="mt-3">شماره موبایل یا ایمیل شما</h5>
          <h5 class="text-center mb-4" style="color:red">مقدار ورودی معتبر نیست دوباره تلاش کنید</h5>
          <input class="form-control mt-3" type="text" id="fa_field" name="fa_field" required>
          <button class="w-100 btn btn-primary mt-3 barr" type="submit">بررسی</button>
          </form>
     
<?php
  die();
}

add_action( 'wp_ajax_tab_fa_validmail', 'tab_fa_validmail_callback' );
add_action( 'wp_ajax_nopriv_tab_fa_validmail', 'tab_fa_validmail_callback' );
function tab_fa_validmail_callback(){
$email = sanitize_text_field($_POST['email']);
$user = get_user_by('email', $email);
	if (!$user) {
		?>
		 <button class="btn btn-primary mt-3 vercode position-absolute top-0 start-0 bg-white text-black shadow-lg vpa" id="vpa"> ورود با پیامک </button>
          <button class="btn btn-primary mt-3 vercode position-absolute top-0 end-0 bg-white text-black shadow-lg vma" id="vma"> ورود با رمز </button>
          <?php $options = get_option( 'kaveh_frame' ); ?>
<img src="<?php echo $options['kaveh_logo_up'] ?>" alt="">
          <form class="logfapre">
          <h5 class="mt-3">شماره موبایل یا ایمیل شما</h5>
          <h5 class="text-center mb-4" style="color:red">چنین ایمیلی وجود ندارد دوباره تلاش کنید</h5>
          <input class="form-control mt-3" type="text" id="fa_field" name="fa_field" required>
          <button class="w-100 btn btn-primary mt-3 barr" type="submit">بررسی</button>
          </form>
		<?php
	}
	elseif ($user){
	// Generate a unique password reset token and store it in the user's meta data.
  $reset_token = wp_generate_password(32);
  update_user_meta($user->ID, 'reset_token', $reset_token);

  // Send an email or SMS message to the user containing a link to the password reset page.
  $reset_url = add_query_arg(array(
    'action' => 'reset_password',
    'reset_token' => $reset_token
  ), site_url('wp-login.php'));
  $message = "جهت بازیابی رمز عبور  از این لینک استفاده کنید: $reset_url";
  wp_mail($user->user_email, 'Password Reset', $message);
?>
 <button class="btn btn-primary mt-3 vercode position-absolute top-0 start-0 bg-white text-black shadow-lg vpa" id="vpa"> ورود با پیامک </button>
          <button class="btn btn-primary mt-3 vercode position-absolute top-0 end-0 bg-white text-black shadow-lg vma" id="vma"> ورود با رمز </button>
          <?php $options = get_option( 'kaveh_frame' ); ?>
<img src="<?php echo $options['kaveh_logo_up'] ?>" alt="">

          <h5 class="text-center mt-4" style="color:green">لینک بازیابی رمز برای شما ایمیل شد. پوشه اسپم را نیز چک کنید</h5>
         
          </form>
     
<?php
	}
  die();
}


add_action( 'wp_ajax_tab_fa_validsms', 'tab_fa_validsms_callback' );
add_action( 'wp_ajax_nopriv_tab_fa_validsms', 'tab_fa_validsms_callback' );
function tab_fa_validsms_callback(){
$phone = sanitize_text_field($_POST['phone']);
$user = get_users([
  'meta_key' => 'billing_phone',
  'meta_value' => $phone,
  'number' => 1,
]);
if (!$user) { 
  ?>
  <button class="btn btn-primary mt-3 vercode position-absolute top-0 start-0 bg-white text-black shadow-lg vpa" id="vpa"> ورود با پیامک </button>
          <button class="btn btn-primary mt-3 vercode position-absolute top-0 end-0 bg-white text-black shadow-lg vma" id="vma"> ورود با رمز </button>
          <?php $options = get_option( 'kaveh_frame' ); ?>
<img src="<?php echo $options['kaveh_logo_up'] ?>" alt="">
          <form class="logfapre">
          <h5 class="mt-3">شماره موبایل یا ایمیل شما</h5>
          <h5 class="text-center mb-4" style="color:red">چنین شماره ای وجود ندارد دوباره تلاش کنید</h5>
          <input class="form-control mt-3" type="text" id="fa_field" name="fa_field" required>
          <button class="w-100 btn btn-primary mt-3 barr" type="submit">بررسی</button>
          </form>
  <?php
}
elseif($user){
  $options = get_option( 'kaveh_frame' );
  global $vercode;
    $phone = sanitize_text_field($_POST['phone']);
  if($options['kaveh_sms_gateway'] == 'option-1'):
    
    $client     = new SoapClient("http://188.0.240.110/class/sms/wsdlservice/server.php?wsdl");
    $user       = $options['kaveh_username_sms'];
    $pass       = $options['kaveh_password_sms'];
    $fromNum    = $options['kaveh_number_sms'];
    $toNum      = $phone;
    $pattern_code = $options['kaveh_pattern_sms'];
    $input_data = array(
    "verification-code" => $vercode,
    );
    $client->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);
  elseif($options['kaveh_sms_gateway'] == 'option-2'):
    $code   	= $vercode;
    $mobile 	= $phone;
      $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.sms.ir/v1/send/verify',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
          "mobile": "'.$mobile.'",
          "templateId": '.$options['kaveh_pattern_sms'].',
          "parameters": [
              {
                "name": "CODE",
                "value": "'.$code.'"
              }
          ]
      }',
      CURLOPT_HTTPHEADER => array(
          'Content-Type: application/json',
          'Accept: text/plain',
          'x-api-key: '.$options['kaveh_password_api']
      ),
      ));
      curl_exec($curl);
      curl_close($curl);

  elseif($options['kaveh_sms_gateway'] == 'option-3'):
      $code   	= $vercode;
      $mobile 	= $phone;
      $bodyId 	= $options['kaveh_pattern_sms'];
      $username 	= $options['kaveh_username_sms'];
      $password 	= $options['kaveh_password_sms'];
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,"http://rest.payamak-panel.com/api/SendSMS/BaseServiceNumber");
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, 'username='.$username.'&password='.$password.'&to='.$mobile.'&bodyId='.$bodyId.'&text='.$code);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $server_output = curl_exec($ch);
      curl_close ($ch);
      elseif($options['kaveh_sms_gateway'] == 'option-4'):
        $api_key = $options['kaveh_password_api'];
        $receptor = $phone; // Replace with the actual phone number
        $token = $vercode; // Replace with the actual verification code
        $template = $options['kaveh_pattern_sms']; // Replace with the name of your actual template
        $url = "https://api.kavenegar.com/v1/$api_key/verify/lookup.json?receptor=$receptor&token=$token&template=$template";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
      endif;   
?>
<button class="btn btn-primary mt-3 vercode position-absolute top-0 start-0 shadow-xl vpa" id="vpa"> ورود با پیامک </button>
  <button class="btn btn-primary mt-3 vercode position-absolute top-0 end-0 bg-white text-black shadow-lg vma" id="vma"> ورود با رمز </button>
  <?php $options = get_option( 'kaveh_frame' ); ?>
<img src="<?php echo $options['kaveh_logo_up'] ?>" alt="">
  <p class="mb-0 mt-3 pnumber"><?php echo $phone; ?></p>
  <span class="returnback d-block">اصلاح شماره</span>
    <div class="divan">
            <form class="verifyform farbutton">
              <h5 class="text-center mb-1">کد پیامک شده را وارد کنید</h5>
              <div class="d-flex mb-3">
                <input id="boxv1" class="verifyinput form-control" type="tel" maxlength="1" pattern="[0-9]">
                <input id="boxv2" class="verifyinput form-control" type="tel" maxlength="1" pattern="[0-9]">
                <input id="boxv3" class="verifyinput form-control" type="tel" maxlength="1" pattern="[0-9]">
                <input id="boxv4" class="verifyinput form-control" type="tel" maxlength="1" pattern="[0-9]">
              </div>
              <button type="submit" class="w-100 btn btn-primary vercode">تایید کد</button>
            </form>
          </div>
<?php
}
  die();
}


add_action( 'wp_ajax_login_j_fa', 'login_j_fa_callback' );
add_action( 'wp_ajax_nopriv_login_j_fa', 'login_j_fa_callback' );
function login_j_fa_callback(){

  global $vercode;
  $phones = (int)sanitize_text_field( $_POST['phones'] );
  $uservcode = (int)sanitize_text_field( $_POST['uservcode'] );
  if( $vercode !== $uservcode) {
    ?>
    <button class="btn btn-primary mt-3 vercode position-absolute top-0 start-0 shadow-xl vpa" id="vpa"> ورود با پیامک </button>
    <button class="btn btn-primary mt-3 vercode position-absolute top-0 end-0 bg-white text-black shadow-lg vma" id="vma"> ورود با رمز </button>
    <?php $options = get_option( 'kaveh_frame' ); ?>
    <img src="<?php echo $options['kaveh_logo_up'] ?>" alt="">
    <p class="mb-0 pnumber"><?php echo $phones; ?></p>
    <span class="returnback d-block">اصلاح شماره</span>
      <div class="divan">
              <form class="verifyform logbutton">
              <h5 class="text-center mb-4" style="color:red">کد تایید معتبر نیست دوباره تلاش کنید</h5>
                <div class="d-flex mb-3">
                  <input id="boxv1" class="verifyinput form-control" type="tel" maxlength="1" pattern="[0-9]">
                  <input id="boxv2" class="verifyinput form-control" type="tel" maxlength="1" pattern="[0-9]">
                  <input id="boxv3" class="verifyinput form-control" type="tel" maxlength="1" pattern="[0-9]">
                  <input id="boxv4" class="verifyinput form-control" type="tel" maxlength="1" pattern="[0-9]">
                </div>
                <button type="submit" class="w-100 btn btn-primary vercode">تایید کد</button>
              </form>
            </div>
            <?php
  }
  else{
    ?>
       <button class="btn btn-primary mt-3 vercode position-absolute top-0 start-0 bg-white text-black shadow-lg vpa" id="vpa"> ورود با پیامک </button>
          <button class="btn btn-primary mt-3 vercode position-absolute top-0 end-0 bg-white text-black shadow-lg vma" id="vma"> ورود با رمز </button>
          <?php $options = get_option( 'kaveh_frame' ); ?>
          <img src="<?php echo $options['kaveh_logo_up'] ?>" alt="">
          <form class="lognewpass">
          <h5 class="mt-3">رمز عبور جدید را وارد کنید</h5>
          <input class="form-control mt-3" type="password" id="pas" name="pas" required placeholder="رمز جدید">
          <input class="form-control mt-3" type="password" id="pasv" name="pasv" required placeholder="تایید رمز جدید">
          <input type="hidden" id="ph" name="ph" value="<?php echo $phones; ?>">
          <button class="w-100 btn btn-primary mt-3" type="submit">ذخیره رمز جدید</button>
          </form>
    <?php
  }
  die();
}

add_action( 'wp_ajax_passchange_aj', 'passchange_aj_callback' );
add_action( 'wp_ajax_nopriv_passchange_aj', 'passchange_aj_callback' );
function passchange_aj_callback(){
  $fpass = sanitize_text_field( $_POST['fpass'] );
  $spass = sanitize_text_field( $_POST['spass'] );
  $phones = sanitize_text_field( $_POST['phone'] );
  
  if($fpass === $spass){
     // Check if user with this phone number already exists
   $user = get_users([
    'meta_key' => 'billing_phone',
    'meta_value' => $phones,
    'number' => 1,
  ]);
  wp_set_password($fpass, $user[0]->ID);
  ?>
  <img class="d-inline-block mx-auto" 
          src="<?php echo esc_url( get_template_directory_uri() ) . "/assets/images/tick-login.svg" ?>"
           alt="">
           <h5 class="d-block mt-3">رمز عبور شما با موفقیت تغییر کرد</h5>
           <script> 
            setTimeout(() => {
              if (typeof window !== 'undefined' && window.location && window.location.search) {
                const queryParams = new URLSearchParams(window.location.search);
                const redirectTo = queryParams.get('redirect_to');
                if (redirectTo) {
                  window.location.href = redirectTo;
                }
              }
              else{
                location.reload();
              }
            }, 2000);
          </script>
  <?php
  } 
  else{
    ?>
          <button class="btn btn-primary mt-3 vercode position-absolute top-0 start-0 bg-white text-black shadow-lg vpa" id="vpa"> ورود با پیامک </button>
          <button class="btn btn-primary mt-3 vercode position-absolute top-0 end-0 bg-white text-black shadow-lg vma" id="vma"> ورود با رمز </button>
          <?php $options = get_option( 'kaveh_frame' ); ?>
          <img src="<?php echo $options['kaveh_logo_up'] ?>" alt="">
          <form class="lognewpass">
          <h5 class="mt-3">رمز عبور جدید را وارد کنید</h5>
          <h5 class="text-center mb-4" style="color:red">تکرار رمز عبور با رمز عبور یکسان نیست</h5>
          <input class="form-control mt-3" type="password" id="pas" name="pas" required placeholder="رمز جدید">
          <input class="form-control mt-3" type="password" id="pasv" name="pasv" required placeholder="تایید رمز جدید">
          <button class="w-100 btn btn-primary mt-3" type="submit">ذخیره رمز جدید</button>
          </form>
    <?php
	  }
die();
}
session_write_close();

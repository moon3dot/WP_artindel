<?php /* Template Name: KLogin Template */ ?>

<?php get_header(); ?>

    <br>
    <br>
    <br>
    <br>
    <div class="logspage">
      <div id="popuplog" class="popuplog">
        <div class="polog"></div>
        <div class="popup-content">
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
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

<?php get_footer(); ?>

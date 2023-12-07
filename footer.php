	</div><!-- #content -->
	<section class="contact-content">
    <div class="content-inner">
        <div class="in-box">
            <h2 class="section-title"><span class="txt-e">CONTACT</span><span class="txt-j">お問い合わせ</span></h2>
            <p>
                お仕事のご依頼・ご相談、採用に<br class="sp">関するお問い合わせなど、<br class="sp">こちらからお気軽にお寄せください。<br>
                メールフォームまたはお電話・FAXにて<br class="sp">受け付けております。
            </p>
            <div class="button-box">
                <span><span>TEL.</span>03-6382-5535<br><span>FAX.</span>03-6382-5536</span>
                <a href="<?= esc_url(home_url()) ?>/contact"><img class="bg-img-2" src="<?= esc_url(get_template_directory_uri()) ?>/img/icon-mail.png" alt="">お問い合わせフォーム</a>
            </div>
        </div>
    </div>
	</section>

	<footer id="colophon" class="site-footer">
		<div class="in-box">
			<div class="footer-company">
				<h2 class="footer-title">
					<a href="<?= esc_url(home_url()) ?>/" rel="home">
						<img src="<?= esc_url(get_template_directory_uri()) ?>/img/footer-logo.png" alt="株式会社エクセレンス">
					</a>
					<span>株式会社エクセレンス<br><b>CAD専門</b>人材サービス</span>
				</h2>
				<p>
					株式会社エクセレンス<br>
					東京都豊島区東池袋2-62-10 池袋5thビル8F<br>
					TEL.03-6382-5535(代表) / FAX.03-6382-5536
				</p>
			</div>
			<div class="menu-box">
				<ul>
					<li><a href="<?= esc_url(home_url()) ?>/company">会社情報</a></li>
					<li><a href="<?= esc_url(home_url()) ?>/recruit">採用情報</a></li>
					<li><a href="<?= esc_url(home_url()) ?>/news">お知らせ</a></li>
					<li><a href="<?= esc_url(home_url()) ?>/contact">お問い合わせ</a></li>
				</ul>
			</div>
		</div>
		<div class="site-info">
			Copyright(C) 2023 Excellence Co., Ltd. ALL RIGHTS RESERVED.
		</div>
	</footer>
</div><!-- #page -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$('.click-on').click(function() {
	if($('.site-footer').hasClass("clicked")){
		$('.site-footer').removeClass("clicked");
	}else{
		$('.site-footer').addClass("clicked");
	}
	if($(this).hasClass("clicked")){
		$(this).removeClass("clicked");
	}else{
		$(this).addClass("clicked");
	}
	if($('body').hasClass("fixed")){
		$('body').removeClass("fixed");
	}else{
		$('body').addClass("fixed");
	}
});
</script>
<script>
$(function () {
  $(window).scroll(function () {
    const windowHeight = $(window).height();
    const scroll = $(window).scrollTop();

    $('.effect').each(function () {
      const targetPosition = $(this).offset().top;
      if (scroll > targetPosition - windowHeight + 100) {
        $(this).addClass("is-fadein");
      }
    });
	$('#page').each(function () {
      const targetPosition = $(this).offset().top;
      if (scroll > targetPosition + 10) {
        $(this).addClass("is-bgadd");
      }else{
        $(this).removeClass("is-bgadd");
	  }
    });
  });
});
</script>
<?php wp_footer(); ?>
<?php /*
<?php if(is_front_page()): ?>
<script>
var swiper = new Swiper(".swiper", {
	slidesPerView: 1,
	loop: true,
	autoplay: {
	    delay: 3000,
	},
	breakpoints: {
    	769: {
			slidesPerView: 1.75,
			centeredSlides: true,
      		spaceBetween: 100,
    	}
  	},
	pagination: {
    	el: ".swiper-pagination",
		clickable: true,
	},
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	}
});
var swiper2 = new Swiper(".swiper2", {
	slidesPerView: 1,
	loop: true,
	autoplay: {
	    delay: 3000,
	},
  	pagination: {
    	el: ".swiper-pagination",
		clickable: true,
	},
});
</script>
<script>
$('.pop-up-img').click(function() {
	if($(this).parent().hasClass("clicked")){
		$(this).parent().removeClass("clicked");
	}else{
		$(this).parent().addClass("clicked");
	}
	if($(this).parent().parent().hasClass("clicked")){
		$(this).parent().parent().removeClass("clicked");
	}else{
		$(this).parent().parent().addClass("clicked");
	}
});
</script>
<?php endif; ?>
*/ ?>

</body>
</html>

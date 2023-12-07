<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta name="description" content="<?= my_meta_description_set(); ?>">
	<meta name="keywords" content="<?= my_meta_keywords_set() ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if(!is_front_page()){$pg_class=' sub_page';}else{$pg_class='';} ?>
<?php if(is_page()){$pg_class.=' '.$post->post_name;} ?>
<?php $site="";if(get_the_category()){if(get_the_category()[0]->slug == 'recruit-cat'){$pg_class.=' recruit-cat';$site = 'recruit';}} ?>
<?php if(get_post_type() == 'joblist'){$pg_class.=' recruit-cat';$site = 'recruit';} ?>
<div id="page" class="site<?= $pg_class ?>">
	<header id="masthead" class="site-header">
		<div class="nav-box">
			<h1 class="site-title">
				<a href="<?= esc_url(home_url()) ?>/<?= $site ?>" rel="home">
					<img src="<?= esc_url(get_template_directory_uri()) ?>/img/top-logo.png" alt="株式会社エクセレンス">
				</a>
				<span>株式会社エクセレンス<br><b>CAD専門</b>人材サービス</span>
			</h1>
			<nav class="main-nav">
				<ul>
					<li><a href="<?= esc_url(home_url()) ?>/">トップページ</a></li>
					<li><a href="<?= esc_url(home_url()) ?>/service">サービス<span>紹介</span></a></li>
					<li><a href="<?= esc_url(home_url()) ?>/jobopenings">求人情報</a></li>
					<li><a href="<?= esc_url(home_url()) ?>/company">会社情報</a></li>
					<li><a href="<?= esc_url(home_url()) ?>/recruit">採用情報</a></li>
					<li><a href="<?= esc_url(home_url()) ?>/news">お知らせ</a></li>
					<li><a href="<?= esc_url(home_url()) ?>/contact">お問い合わせ</a></li>
					<li><a href="<?= esc_url(home_url()) ?>/privacy">プライバシーポリシー</a></li>
				</ul>
			</nav>
			<span class="menu-sp click-on"><span></span></span>
		</div>
		<?php if(is_front_page()): ?>
		<div class="mv-box">
		<?php /*
			<div class="mv-inner">
				<div class="swiper2-1">
    			    <div class="swiper-wrapper">
						<div class="swiper-slide">
							<img src="<?= esc_url(get_template_directory_uri()) ?>/img/mv-01.jpg" alt="">
			            </div>
						<div class="swiper-slide">
							<img src="<?= esc_url(get_template_directory_uri()) ?>/img/mv-01.jpg" alt="">
			            </div>
						<div class="swiper-slide">
							<img src="<?= esc_url(get_template_directory_uri()) ?>/img/mv-01.jpg" alt="">
			            </div>
						<div class="swiper-slide">
							<img src="<?= esc_url(get_template_directory_uri()) ?>/img/mv-01.jpg" alt="">
			            </div>
			        </div>
    			</div>
			</div>
*/ ?>
			<div class="mv-title">
				<h2 class="mv-title-txt">
					<img src="<?= esc_url(get_template_directory_uri()) ?>/img/mv-messege-e.png" alt="">
					<span>信頼と幸福の架け橋。<br>あなたの未来を共に創る。</span>
				</h2>
			</div>
		</div>
		<?php else:
			if(is_archive()):
				$txt_e = 'NEWS';$txt_j = 'お知らせ';
			else:
				$txt_e = get_post_meta(get_the_ID(), 'page_title_e', true);$txt_j = get_the_title();
			endif;
		 ?>
		<div class="mv-sub-box">
			<div class="in-box">
				<h1 class="section-title"><span class="txt-e"><?= $txt_e ?></span><span class="txt-j"><?= $txt_j ?></span></h1>
			</div>
		</div>		
		<?php endif; ?>
	</header>
	<?php if(!is_front_page()): ?>
	<div class="breadcrumb">
		<p><a href="<?= esc_url(home_url()) ?>/">top</a>&nbsp;&nbsp;>&nbsp;&nbsp;<span><?= get_the_title() ?></span></p>
	</div>
	<?php endif; ?>
	<div id="content" class="site-content">

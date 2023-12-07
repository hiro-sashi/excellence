<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php while(have_posts()):the_post(); ?>

<section class="works-single">
    <div class="in-box">
        <ul>
            <?php if(get_field('slide-01')){echo '<li><img src="'.get_field('slide-01').'" alt=""></li>';} ?>
            <li><img src="<?= $slide-01 ?>" alt=""></li>
            <li><img src="<?= $slide-01 ?>" alt=""></li>
            <li><img src="<?= $slide-01 ?>" alt=""></li>
            <li><img src="<?= $slide-01 ?>" alt=""></li>
        </ul>
        <h2 class="section-title">東尾張地区交通安全施設整備工事<span><a href="">愛知県</a> / <a href="">公共 土木工事</a></span></h2>
        <p>テキスト入ります。テキスト入ります。テキスト入ります。テキスト入ります。テキスト入ります。テキスト入ります。<br/>
        テキスト入ります。テキスト入ります。テキスト入ります。テキスト入ります。</p>
        <div class="in-date-box">
          <ul>
                <li>
                    <span>■所在地</span>
                    <span>名古屋国道維持第一<br>～第四出張所管内</span>
                </li>
                <li>
                    <span>■構造・規模</span>
                    <span>（仮）鉄骨造地上２階建<br>敷地面積 2626.37㎡<br>建築面積 998.63㎡<br>延床面積 1156.37㎡</span>
                </li>
                <li>
                    <span>■発注者</span>
                    <span>中部地方整備局　名古屋国道事務所</span>
                </li>
          </ul>
          <ul>
                <li>
                    <span>■設計管理</span>
                    <span>○○</span>
                </li>
                <li>
                    <span>■施工期間</span>
                    <span>令和2年9月　~　令和3年10月</span>
                </li>
                <li>
                    <span>■竣工</span>
                    <span>令和3年10月</span>
                </li>
          </ul>
        </div>
        <div class="button-box">
            <a href="">一覧に戻る</a>
        </div>
    </div>
</section>

		<?php endwhile; ?>

		</main>
	</div>

<?php
get_footer();

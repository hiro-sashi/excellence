<?php get_header(); ?>

 	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <section class="news-content">
                <div class="content-inner">
                    <div class="in-box">
                        <h2 class="in-box-title"><span class="txt-e">NEWS&TOPICS</span></h2>
                        <?php if ( have_posts() ) : while(have_posts()):the_post(); ?>
                            <p>
                                <span><?= get_the_date() ?></span>
                                <span>お知らせ</span>
                                <a href="<?= get_permalink() ?>"><?= get_the_title(); ?></a>
                            </p>
            			<?php endwhile; ?>
                            <?php wp_pagenavi(); ?>
                		<?php else : ?>
			                <p>お探しのコンテンツはありませんでした</p>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
		</main>
	</div>

<?php
get_footer();

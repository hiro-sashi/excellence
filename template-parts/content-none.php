<section class="page-content no-results not-found">
	<div class="in-box">
		<h2 class="section-title"><?php esc_html_e( 'Nothing Found', '_s' ); ?></h2>
		<?php if (is_home() && current_user_can( 'publish_posts' )): ?>

			<p>ログインしてコンテンツを作成してください</p>

		<?php elseif(is_search()): ?>

			<p>申し訳ありませんが、検索用語に一致するものはありませんでした。別のキーワードでもう一度お試しください。</p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p>別のキーワードでもう一度お試しください。</p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div>
</section>

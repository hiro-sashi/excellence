<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title">お探しのページは見つかりませんでした</h1>
				</header>

				<div class="page-content">
					<p>何も見つからなかったようです。検索してみてください。</p>

					<?php get_search_form(); ?>

					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

				</div>
			</section>

		</main>
	</div>

<?php
get_footer();

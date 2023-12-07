<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php while(have_posts()):the_post(); ?>

			<?php get_template_part( 'template-parts/content', $post->post_name ); ?>

		<?php endwhile; ?>

		</main>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

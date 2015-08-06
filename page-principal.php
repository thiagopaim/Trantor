<?php get_header(); ?>

<div class="row">

	<!-- main -->
	<div class="small-12 medium-12 large-12 columns">

		<main role="main">
			<!-- section -->
			<section>

				<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php the_content(); ?>
					<?php edit_post_link(); ?>

				</article>
				<!-- /article -->

				<?php endwhile; ?>

				<?php else: ?>

				<!-- article -->
				<article>

					<h2>Ops! Nenhum artigo encontrado.</h2>

				</article>
				<!-- /article -->

				<?php endif; ?>

			</section>
			<!-- /section -->

		</main>

	</div>
	<!-- /main -->

</div>

<?php get_footer(); ?>

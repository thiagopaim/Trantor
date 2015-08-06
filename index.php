<?php get_header(); ?>

<div class="row">

	<!-- main -->
	<div class="small-12 medium-8 large-8 columns">

		<main role="main">
			<!-- section -->
			<section>

				<h1><?php the_title(); ?></h1>

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
	
	<!-- sidebar -->
	<div class="small-12 medium-4 large-4 columns">
		<?php get_sidebar(); ?>
	</div>

</div>

<?php get_footer(); ?>

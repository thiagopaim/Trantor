<?php get_header(); ?>

<div class="row">

	<!-- main -->
	<div class="small-12 medium-8 large-8 columns">

		<main role="main">
			<!-- section -->
			<section>

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<!-- post title -->
					<h1><?php the_title(); ?></h1>
					<!-- /post title -->

					<!-- post details -->
					<div class="posts-metadata">
						<span class="date"><?php the_time('d/m/Y'); ?></span>
						<span class="author">Publicado por <?php the_author_posts_link(); ?></span>
						<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Deixe um comentário!', 'Polichinelo' ), __( '1 Comentário', 'Polichinelo' ), __( '% Comentários', 'Polichinelo' ) ); ?></span>
					</div>
					<!-- /post details -->

					<!-- content -->
					<?php the_content(); ?>
					<!-- /content -->
					
					<!-- edit -->
					<?php edit_post_link(); ?>
					<!-- /edit -->
					
					<!-- comments -->
					<?php comments_template(); ?>
					<!-- /comments -->

				</article>
				<!-- /article -->

			<?php endwhile; endif; ?>

			</section>
			<!-- /section -->
		</main>
		<!-- /main -->

	</div>
		
	<!-- sidebar -->
	<div class="small-12 medium-4 large-4 columns">
		<?php get_sidebar(); ?>
	</div>

</div>

<?php get_footer(); ?>

<?php get_header(); ?>

<div class="row">

	<!-- main -->
	<div class="small-12 medium-12 large-12 column">

		<main role="main">
			<!-- section -->
			<section>

			<h1><?php echo sprintf( __( '%s resultados para: ', 'Polichinelo' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>
			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'default' ); ?>
			<?php endwhile; ?>

			<p>Achou o que procura? Se não, use a busca novamente:</p>
			<?php get_template_part('searchform'); ?>

			<!-- pagination -->
			<div class="pagination">
				<?php pagination(); ?>
			</div>
			<!-- /pagination -->

			</section>
			<!-- /section -->

		</main>

	</div>
	<!-- /main -->

</div>

<?php get_footer(); ?>
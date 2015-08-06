<?php get_header(); ?>
<div class="row">
	<!-- main -->
	<div class="small-12 medium-12 large-12 column">
		<main role="main">
			<!-- section -->
			<section>
				<h1><?php the_title(); ?></h1>
				<!-- article -->
				<article>
					<h2>Ops! A página não existe... :(</h2>
					<p>Tente usar a busca!</p>
					<?php get_template_part('searchform'); ?>
				</article>
				<!-- /article -->
			</section>
			<!-- /section -->
		</main>
	</div>
	<!-- /main -->
</div>
<?php get_footer(); ?>
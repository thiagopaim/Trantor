<?php get_header(); ?>

<div class="row">

	<!-- main -->
	<div class="small-12 medium-8 large-8 columns">

		<main role="main">
			
			<!-- section -->
			<section>

				<h1>Arquivos</h1>

				<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

				<div class="inner-content">
					
					<a href="<?php the_permalink(); ?>">
						<?php if ( has_post_thumbnail() ) : the_post_thumbnail('medium', array('class' => 'img-responsive alignleft')); endif;  ?>
					</a>				

					<h2>
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h2>
					<?php echo substr(get_the_excerpt(), 0, 240); ?>...
					<p class="data-evento">
						<a href="<?php the_permalink(); ?>">saiba mais</a>
					</p>
				</div>

				<?php endwhile; endif; ?>
				
				<div class="navegacao">
					<div class="nav-ante alignleft"><?php next_posts_link( '&#171; Mais Antigas' ); ?></div>
					<div class="nav-prox alignright"><?php previous_posts_link( 'Mais Novas &#187;' ); ?></div>
				</div>

			</section>

		</main>

	</div>
	<!-- /main -->
	
	<!-- sidebar -->
	<div class="small-12 medium-4 large-4 columns">
		<?php get_sidebar(); ?>
	</div>

</div>

<?php get_footer(); ?>
<?php if ( have_comments() ) : if( (is_page() || is_single()) && (!is_home() && !is_front_page()) ) : ?>

<section id="comments">
	<ul class="comments-list">
	<?php 	
	wp_list_comments(
		
		array(
			'max_depth'         => '',
			'style'             => 'ol',
			'callback'          => null,
			'end-callback'      => null,
			'type'              => 'all',
			'reply_text'        => __('Reponder', 'Polichinelo'),
			'page'              => '',
			'per_page'          => '',
			'avatar_size'       => 48,
			'reverse_top_level' => null,
			'reverse_children'  => '',
			'format'            => 'html5', 
			'short_ping'        => false, 
			'echo'  	    => true,							
			'moderation' 	    => __('Seu comentário está aguardando moderação.', 'Polichinelo'),
		)
	); ?>
	</ul>
</section>

<?php endif; endif; ?>

<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die (__('Não carregue ess página diretamente. Obrigado!', 'Polichinelo'));

if ( post_password_required() ) : ?>
<section id="comments">
	<div class="notice">
		<p class="bottom"><?php _e('Este artigo é protegido por uma senha. Digite a senha!', 'Polichinelo'); ?></p>
	</div>
</section>
<?php return; endif; ?>

<?php if ( comments_open() ) : if( (is_page() || is_single()) && (!is_home() && !is_front_page()) ) : ?>

<div class="clearfix">
	<section id="respond">
		
		<h3><?php comment_form_title( __('Deixe um comentário', 'Polichinelo'), __('Deixe um comentário para %s', 'Polichinelo') ); ?></h3>

		<p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
		
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p><?php printf( __('Você deve estar <a href="%s">logado</a> para conseguir enviar seu comeentário.', 'Polichinelo'), wp_login_url( get_permalink() ) ); ?></p>
		<?php else : ?>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<?php if ( is_user_logged_in() ) : ?>
			<p><?php printf(__('Acessou como <a href="%s/wp-admin/profile.php">%s</a>.', 'Polichinelo'), get_option('siteurl'), $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php __('Log out of this account', 'Polichinelo'); ?>"><?php _e('Log out &raquo;', 'Polichinelo'); ?></a></p>
			<?php else : ?>
			<p>
				<label for="author"><?php _e('Nome', 'Polichinelo'); if ($req) _e(' (obrigatório)', 'Polichinelo'); ?></label>
				<input type="text" class="five" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?>>
			</p>
			<p>
				<label for="email"><?php _e('E-mail (Não será publicado)', 'Polichinelo'); if ($req) _e(' (required)', 'Polichinelo'); ?></label>
				<input type="text" class="five" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?>>
			</p>
			<p>
				<label for="url"><?php _e('Website', 'Polichinelo'); ?></label>
				<input type="text" class="five" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3">
			</p>
			<?php endif; ?>
			<p>
				<label for="comment"><?php _e('Comentário', 'Polichinelo'); ?></label>
				<textarea name="comment" id="comment" tabindex="4"></textarea>
			</p>
			<p id="allowed_tags" class="small"><strong>XHTML:</strong> <?php _e('Você pode utilizar as seguintes tags:','Polichinelo'); ?> <code><?php echo allowed_tags(); ?></code></p>
			<p><input name="submit" class="button" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e('Enviar Comentário', 'Polichinelo'); ?>"></p>
			<?php comment_id_fields(); ?>
			<?php do_action('comment_form', $post->ID); ?>
		</form>
		<?php endif; ?>
	</section>
</div>

<?php endif; endif; ?>

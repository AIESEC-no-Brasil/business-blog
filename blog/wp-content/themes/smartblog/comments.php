<?php
/**
* The template for displaying Comments.
*
* The area of the page that contains both current comments
* and the comment form. The actual display of comments is
* handled by a callback to themepixels_comment() which is
* located in the functions.php file.
 *
 * @package Smart Blog
 * @since 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php if ( have_comments() ) : ?>
	<div id="comments" class="comments-area clearfix">
		
		<h2 class="comments-title section-title">
			<span>
				<?php printf( _nx( '1 Comment', '%1$s Comments', get_comments_number(), 'comments title', 'themepixels' ), number_format_i18n( get_comments_number() ) ); ?>
			</span>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size'	=> 60,
					'callback'		=> 'themepixels_comment'
				) );
			?>
		</ol>

		<?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
			<p class="no-comments"><?php _e( 'Comments are closed.', 'themepixels' ); ?></p>
		<?php endif; ?>

	</div><!-- End #comments -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'themepixels' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'themepixels' ) ); ?></div>
		</nav><!-- End #comment-nav-below -->
	<?php endif; ?>
		
<?php endif; ?>

<div class="comment-form-wrapper">
	<?php
	$commenter = wp_get_current_commenter();
	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$fields   =  array(
		'author' => '<div class="row"><div class="form-group col-md-6">' . '<label for="author">' . __( 'Name', 'themepixels' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' . '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></div>',

		'email'  => '<div class="form-group col-md-6"><label for="email">' . __( 'Email', 'themepixels' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' . '<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" aria-describedby="email-notes"' . $aria_req . ' /></div>',

		'url'    => '<div class="form-group col-md-12"><label for="url">' . __( 'Website', 'themepixels' ) . '</label> ' . '<input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div>',
	);

	$fields = apply_filters( 'comment_form_default_fields', $fields );
	$defaults = array(
		'fields'               => $fields,
		'comment_field'        => '<div class="row"><div class="form-group col-md-12"><label for="comment">' . __( 'Your Comment', 'themepixels' ) . ' <span class="required">*</span></label> <textarea id="comment" class="form-control" name="comment" rows="8" aria-describedby="form-allowed-tags" aria-required="true"></textarea></div></div>',
		'comment_notes_after'  => '<p class="form-allowed-tags" id="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'themepixels' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
		'id_submit'            => 'submit',
		'class_submit'         => 'btn btn-squared btn-primary',
		'name_submit'          => 'submit',
		'title_reply'          => '<h2 class="section-title"><span>'. __( 'Leave a Reply', 'themepixels' ) .'</span></h2>',
		'title_reply_to'       => '<h2 class="section-title"><span>'. __( 'Leave a Reply to %s', 'themepixels' ) .'</span></h2>',
		'label_submit'         => __( 'Submit Comment', 'themepixels' ),
	);
	
	comment_form( $defaults ); ?>
</div><!-- End .comment-form-wrapper -->
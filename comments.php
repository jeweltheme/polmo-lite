<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Polmo
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

<div id="comments" class="comment-section">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php comments_number( '0 Comments', '1 Comment', '% Comments' );?>
		</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'polmo-lite' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'polmo-lite' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'polmo-lite' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>



		<ul class="comment-list media-list">
			<?php
				wp_list_comments( array(
					'style'      => 'li',
					'short_ping' => true,
					'callback' => 'polmo_lite_comment',
					'avatar_size' => 70
				) );
				paginate_comments_links();
			?>
		</ul><!-- .comment-list -->

		<?php the_comments_navigation(); ?>

		<?php
			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
			<p class="no-comments"><?php _e( 'Comments are closed.', 'polmo-lite' ); ?></p>
		<?php endif; ?>



	<?php endif; // have_comments() ?>

<?php //comment_form(); ?>

	<?php
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields =  array(
		'author' => '<input id="author" class="form-control" name="author" type="text" placeholder="Your name**" value="" size="30"' . $aria_req . '/>',
		'email'  => '<input id="email" class="form-control" name="email" type="email" placeholder="Your email**" value="" size="30"' . $aria_req . '/>',
	//	'subject'  => '<input id="subject" class="form-control" name="subject" type="subject" placeholder="Subject**" value="" size="30"' . $aria_req . '/>',
	//	'url'  => '<input id="url" class="form-control" name="url" type="url" placeholder="URL" value="">'
		);

	$comments_args = array(
		'fields' =>  $fields,
		'id_form'          			=> 'comment-form',
		'title_reply'       		=> esc_html__( 'Leave a Comment', 'polmo-lite' ),
		'title_reply_to'    		=> esc_html__( 'Leave a Comment to %s', 'polmo-lite' ),
		'cancel_reply_link' 		=> esc_html__( 'Cancel Comment', 'polmo-lite' ),
		'label_submit'      		=> esc_html__( 'Send Now', 'polmo-lite' ),
		'class_submit'      		=> 'btn btn-default',
		'comment_notes_before'      => '',
		//'comment_notes_after' 		=> '<button type="submit" id="submit" value="' . esc_html__( 'Send', 'polmo-lite' ) . '" class="submit-btn submit md-btn btn"> Send Now <i class="fa fa-angle-double-right"></i></button>',
		'id_submit'					=> 'submit',
		'comment_field'             => '<textarea id="comment" class="form-control" name="comment" placeholder="Your message**" cols="40" rows="10" required></textarea>',
		'label_submit'              => 'Submit'
		);


	ob_start();
	comment_form( $comments_args);
	//echo str_replace('id="commentform" class="comment-form"',ob_get_clean());
	echo str_replace('class="cbtn submit pull-right"','class="comment-form row"',ob_get_clean());
	echo str_replace('class="btn submit pull-right"','class="btn submit pull-right"',ob_get_clean());	
	?>




</div><!-- #comments -->


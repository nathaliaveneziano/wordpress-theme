<?php

/**
 * Template for displaying comments
 */

if (post_password_required()) {
  return;
}
?>

<hr>

<div id="comments" class="comments-area">
  <?php if (have_comments()) : ?>
    <h2 class="comments-title">
      <?php
      $comments_count = get_comments_number();
      if ($comments_count === '1') {
        printf(
          esc_html__('Comments (1)', 'basictheme'),
        );
      } else {
        printf(
          esc_html__('Comments (%1$s)', 'basictheme'),
          intval($comments_count)
        );
      }
      ?>
    </h2>

    <?php the_comments_navigation(); ?>
    <ol class="comment-list">
      <?php
      wp_list_comments(array(
        'style' => 'ol',
        'short_ping' => true,
      ));
      ?>
    </ol>
  <?php
    the_comments_navigation();

    // If the comments are closed the show this message.
    if (!comments_open()) {
      printf(
        '<p class="no-comments">%1$s</p>',
        esc_html__('Comments are closed', 'basictheme'),
      );
    }

  endif;

  // Show comments form
  comment_form();
  ?>
</div>
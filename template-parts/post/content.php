<?php

/**
 * Template part for displaying posts
 */
?>

<article id="post-<?php the_ID(); ?>">
  <header class="entry-header">
    <?php
    if (is_singular()) :
      the_title('<h1 class="entry-title">', '</h1>');
    else :
      the_title('<h2 class="entry-title"><a class="entry-link" href="' . esc_url(get_permalink()) . '">', '</a></h2>');
    endif;
    ?>
  </header>

  <!-- Post thumbnail -->
  <?php
  if (has_post_thumbnail()) :
    the_post_thumbnail('large');  // full, laarge, medium
  endif;
  ?>

  <!-- Post content -->
  <div class="entry-content">
    <?php
    if (is_home() || is_archive()) :
      the_excerpt();
    elseif (is_single()) :
      the_content();

      wp_link_pages(array(
        'before' => '<div class="page-links">' . esc_html__('Pages:', 'basictheme'),
        'after' => '</div>',
      ));
    endif;
    ?>
  </div>
</article>
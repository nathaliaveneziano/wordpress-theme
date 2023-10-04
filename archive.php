<?php

/**
 * The template for displaying archive pages
 */

get_header();
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <header class="archive-page-header">
      <?php
      the_archive_title('<h1 class="archive-title">', '</h1>');
      the_archive_description('<div class="archive-description">', '</div>');
      ?>
    </header>

    <?php
    if (have_posts()) :
      // Start the Loop
      while (have_posts()) :
        the_post();
        get_template_part('template-parts/post/content');
      endwhile;

      echo paginate_links(array(
        'prev_text' => esc_html__('Prev', 'basictheme'),
        'next_text' => esc_html__('Next', 'basictheme'),
      ));
    else :
      get_template_part('template-parts/page/content', 'none');
    endif;
    ?>
  </main>
</div>

<?php
get_footer();

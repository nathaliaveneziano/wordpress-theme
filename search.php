<?php

/**
 * The template for displaying search results
 */

get_header();
?>

<div id="primary" class="search-content-area">
  <main id="main" class="site-main">
    <header class="search-page-header">
      <?php printf('<h1 class="search-title">Pesquisa: %s</h1>', get_search_query()); ?>
    </header>

    <?php
    if (have_posts()) :
      // Start the Loop
      while (have_posts()) :
        the_post();
        get_template_part('template-parts/page/content', 'search');
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

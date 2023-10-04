<?php

/**
 * The template for displaying 04 pages (not found)
 * @package BasicTheme
 */

get_header();
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <section class="error-404 not-found">
      <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'basictheme'); ?></h1>
      </header>

      <div class="page-content">
        <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'basictheme'); ?></p>
        <?php get_search_form(); ?>
      </div>
    </section>
  </main>
</div>

<?php
get_footer();

<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>


<header class="header" role="banner">
  <div class="container">
    <div class="columns">
      <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image"/>
        </a>
      <?php endif; ?>

      <?php if ($site_name || $site_slogan): ?>
        <div class="header__name-and-slogan">
          <?php if ($site_name): ?>
            <h1 class="header__site-name">
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" class="header__site-link" rel="home">
                <span><?php print $site_name; ?></span>
              </a>
            </h1>
          <?php endif; ?>

          <?php if ($site_slogan): ?>
            <div class="header__site-slogan"><?php print $site_slogan; ?></div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <?php if ($page['header']): ?>
    <?php print render($page['header']); ?>
  <?php endif; ?>
</header>

<div class="navigation">
  <div class="container">
    <a href="#skip-link" class="visually-hidden visually-hidden--focusable" id="main-menu" tabindex="-1"><?php print t('Back to top'); ?></a>

    <?php if ($main_menu): ?>
      <nav class="main-menu" role="navigation">
        <?php
        // This code snippet is hard to modify. We recommend turning off the
        // "Main menu" on your sub-theme's settings form, deleting this PHP
        // code block, and, instead, using the "Menu block" module.
        // @see https://drupal.org/project/menu_block
        print theme('links__system_main_menu', [
          'links' => $main_menu,
          'attributes' => [
            'class' => ['navbar', 'clearfix'],
          ],
          'heading' => [
            'text' => t('Main menu'),
            'level' => 'h2',
            'class' => ['visually-hidden'],
          ],
        ]); ?>
      </nav>
    <?php endif; ?>

    <?php print render($page['navigation']); ?>
  </div>
</div>

<?php if ($page['highlighted']): ?>
  <?php print render($page['highlighted']); ?>
<?php endif; ?>

<main id="main" class="main" role="main">
  <div class="container">
    <div class="columns">
      <?php
      // Render the sidebars to see if there's anything in them.
      $sidebar_first = render($page['sidebar_first']);
      $sidebar_second = render($page['sidebar_second']);
      // Decide on layout classes by checking if sidebars have content.
      $content_class = 'main-content column col-12';
      $sidebar_first_class = $sidebar_second_class = 'sidebar column';
      if ($sidebar_first && $sidebar_second):
        $content_class = 'main-content column col-12 col-md-6';
        $sidebar_first_class = 'sidebar--left column col-12 col-md-3';
        $sidebar_second_class = 'sidebar--right column col-12 col-md-3';
      elseif ($sidebar_second):
        $content_class = 'main-content column col-12 col-md-7';
        $sidebar_second_class = 'sidebar--right column col-12 col-md-5';
      elseif ($sidebar_first):
        $content_class = 'main-content column col-12 col-md-7';
        $sidebar_first_class = 'sidebar--left column col-12 col-md-5';
      endif;
      ?>

      <?php if ($sidebar_first): ?>
        <aside class="<?php print $sidebar_first_class; ?>" role="complementary">
          <?php print $sidebar_first; ?>
        </aside>
      <?php endif; ?>

      <section class="<?php print $content_class; ?>">
        <?php print $breadcrumb; ?>
        <a href="#skip-link" class="visually-hidden visually-hidden--focusable" id="main-content"><?php print t('Back to top'); ?></a>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?>
          <h1><?php print $title; ?></h1>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php print $messages; ?>
        <?php print render($tabs); ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
        <?php print render($page['content']); ?>
        <?php print $feed_icons; ?>
      </section>

      <?php if ($sidebar_second): ?>
        <aside class="<?php print $sidebar_second_class; ?>" role="complementary">
          <?php print $sidebar_second; ?>
        </aside>
      <?php endif; ?>

    </div>
  </div>
</main>

<?php if ($page['footer']): ?>
  <?php print render($page['footer']); ?>
<?php endif; ?>

<?php if ($page['bottom']): ?>
  <?php print render($page['bottom']); ?>
<?php endif; ?>

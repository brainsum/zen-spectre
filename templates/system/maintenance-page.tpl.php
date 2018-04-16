<?php
/**
 * @file
 * Returns the HTML for a single Drupal page while offline.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728174
 */
?><!DOCTYPE html>
<html <?php print $html_attributes; ?>>
<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>

  <?php if ($default_mobile_metatags): ?>
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width">
  <?php endif; ?>

  <?php print $styles; ?>
  <?php print $scripts; ?>
  <?php if ($add_html5_shim): ?>
    <!--[if lt IE 9]>
    <script src="<?php print $base_path . $path_to_zen; ?>/js/html5.js"></script>
    <![endif]-->
  <?php endif; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>

<div class="page">

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
      <?php print $navigation; ?>
    </div>
  </div>

  <?php if ($highlighted): ?>
    <?php print $highlighted; ?>
  <?php endif; ?>

  <div class="main">

    <div class="container">
      <div class="columns">
        <div class="main-content" role="main">
          <a id="main-content"></a>
          <?php if ($title): ?>
            <h1><?php print $title; ?></h1>
          <?php endif; ?>
          <?php print $messages; ?>
          <?php print $content; ?>
        </div>
      </div>
    </div>

  </div>

</div>

<?php print $footer; ?>

<?php print $bottom; ?>

</body>
</html>

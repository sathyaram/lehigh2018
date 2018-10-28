tacos
<header class="header">
  <div class="lehigh-bar">
    <div class="logo" role="logo">
      <a href="https://lehigh.edu" target="_blank">
        <img src="/<?= drupal_get_path('theme', 'lehigh2018') . '/images/lehigh-logo.svg' ?>" alt="Lehigh University">
      </a>
    </div><!--Logo-->
    <div class="site-name">
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
        <?php if(drupal_is_front_page()): ?>
          <h1><?php print $site_name; ?></h1>
        <?php else: ?>
          <span><?php print $site_name; ?></span>
        <?php endif; ?>
      </a>
      <?php if ($site_slogan): ?>
          <div class="site-slogan"><?php print $site_slogan; ?></div>
      <?php endif; ?>
    </div><!--Site-Name-->
    <?php if ($secondary_menu_links): ?>
      <div class="quick-menu">
          <button class="quick-toggle" role="quick-menu-toggle">Quick Menu</button><!--Quick-Toggle-->
          <div class="secondary-menu">
              <?php print $secondary_menu_links; ?>
          </div>
      </div><!--Quick-Menu-->
    <?php endif; ?>
    <div id="search" role="search">
      <?php print $search; ?>
    </div><!--Search-->
  </div><!--Lehigh-Bar-->
  <div class="accent-bar"></div><!--Accent-Bar-->
  <nav class="main-menu">
    <button class="main-toggle" role="main-menu-toggle">
      <div class="hamburger">
        <div class="lines">
          <span class="line"></span>
          <span class="line"></span>
          <span class="line"></span>
        </div>
        <div class="menu-name">Main Menu</div>
      </div>
    </button><!--Main-Toggle-->
    <div class="primary-menu">
      <a class="home" href="<?php print $front_page; ?>">Home</a>
      <?php
        print render($primary_menu_tree);
      ?>
    </div><!--Menu-Wrapper-->
  </nav><!--Main-Menu-->
</header><!--Header-->
<?php if (!empty($page['header'])): ?>
  <div class="banner">
    <?php print render($page['header']);?>
  </div>
<?php endif; ?><!--Header Region-->
</div><!--Banner-->
<div class="main">
  <!--Drupal Related-->
  <?php if ($messages): print $messages; endif; ?>
  <?php if (!empty($page['help'])): print render($page['help']); endif; ?>
  <?php if ($title && !$is_front): ?>
  <?php endif; ?>
  <?php if (!empty($page['highlighted'])): ?>
    <div class="highlight panel callout">
      <?php print render($page['highlighted']); ?>
    </div>
  <?php endif; ?>
  <?php if (!empty($tabs)): ?>
    <?php print render($tabs); ?>
    <?php if (!empty($tabs2)): print render($tabs2); endif; ?>
  <?php endif; ?>
  <?php if ($action_links): ?>
    <ul class="action-links">
      <?php print render($action_links); ?>
    </ul>
  <?php endif; ?>
  <?php if ($title): ?>
    <h1 class="page-title"><?php print $title; ?></h1>
  <?php endif; ?>
  <?php if ($breadcrumb): print $breadcrumb; endif; ?><!--Breadcrumbs-->
  <!--Begin Content Area-->
  <main id="main-content" class="main-content" role="main">
    <?php if (!empty($section_menu_tree)) : ?>
    <nav class="left-nav" role="navigation" aria-label="In This Section">
      <button type="button" class="this-section"><h2>In This Section</h2></button>
      <?php print render($section_menu_tree); ?>
    </nav><!--Left Nav-->
    <?php endif; ?>
    <div class="content-wrapper">
      <div class="content">
        <?php print render($page['content']); ?>
      </div>
    </div>
  </main><!--Main Content-->
  <?php if (!empty($page['sidebar_second'])): ?>
      <div class="sidebar" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </div><!--Sidebar-->
  <?php endif; ?>
</div>

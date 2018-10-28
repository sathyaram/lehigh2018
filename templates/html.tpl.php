<!DOCTYPE html>

<html>
<head>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-5M7K36');</script>
  <!-- End Google Tag Manager -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://fonts.googleapis.com/css?family=Merriweather:400,400i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i" rel="stylesheet">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <!--UCPA Emergency Banner Alert-->
  <div id="emergencyalert"><script type="text/javascript" src="https://s3.amazonaws.com/widgets.omnilert.net/1397c767b627776244abee8c6f1e1f96-1691"></script></div>
  <!--End UCPA Emergency Banner Alert-->
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5M7K36"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php
    $file = './' . path_to_theme().'/includes/footer.php';
    if (is_file($file)) {
      include_once($file);
    }
  ?>
  <?php print $page_bottom; ?>
</body>
</html>

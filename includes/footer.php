<footer id="footer" class="footer">
  <div class="site-footer">
    <?php
      if (isset($page['footer'])) :
        print render($page['footer']);
      endif;
    ?>
  </div><!--Site-Footer-->
  <div class="accent-bar"></div><!--Accent-Bar-->
  <div class="lehigh-footer">
    <div class="logo" role="logo">
      <a href="https://lehigh.edu" target="_blank">
        <img src="/sites/all/themes/lehigh2018/images/lehigh-logo.svg" alt="Lehigh University">
      </a>
    </div>
    <div class="social-media">
      <a class="facebook" href="https://www.facebook.com/lehighu" target="_blank">
        <i class="fa fa-facebook" aria-hidden="true"></i>
      </a>
      <a class="twitter" href="https://twitter.com/lehighu" target="_blank">
        <i class="fa fa-twitter" aria-hidden="true"></i>
      </a>
      <a class="instagram" href="https://www.instagram.com/lehighu" target="_blank">
        <i class="fa fa-instagram" aria-hidden="true"></i>
      </a>
      <a class="youtube" href="https://www.youtube.com/user/lehighuofficial" target="_blank">
        <i class="fa fa-youtube" aria-hidden="true"></i>
      </a>
      <a class="snapchat" href="https://www1.lehigh.edu/communications/resources/socialmediadirectory#snapchat" target="_blank">
        <i class="fa fa-snapchat-ghost" aria-hidden="true"></i>
      </a>
      <a class="tumblr" href="http://lehighu.tumblr.com/" target="_blank">
        <i class="fa fa-tumblr" aria-hidden="true"></i>
      </a>
    </div>
    <div class="contact">
      <address>
        27 Memorial Drive West<br>
        Bethlehem, PA 18015, USA<br>
        <a href="tel:6107583000">610-758-3000</a>
      </address>
    </div>
    <div class="lehigh-menu">
      <ul>
        <li><a href="http://www1.lehigh.edu/insidelehigh?footer">Inside Lehigh</a></li>
        <li><a href="http://www.lehigh.edu/~www/directory/?footer">Directory</a></li>
        <li><a href="http://www1.lehigh.edu/about/maps?footer">Maps</a></li>
        <li><a href="http://www1.lehigh.edu/contactlehigh">Contact</a></li>
        <li><a href="http://www1.lehigh.edu/emergency">Emergency Info</a></li>
        <li><a href="http://www1.lehigh.edu/accessibility">Web Accessibility</a></li>
        <li><a href="http://www.lehigh.edu/~inprv/heoa/index.html">Higher Education Opportunity Act</a></li>
        <li><a href="http://www.lehigh.edu/nondiscrimination?footer">Non-Discrimination</a></li>
        <li><a href="http://www1.lehigh.edu/about/mobilefriendly?footer">Mobile Friendly</a></li>
        <li><a href="http://www.lehigh.edu/principlesequity?footer">Equitable Community</a></li>
        <li class="last"><a href="http://www.lehigh.edu/account">Account</a></li>
      </ul>
      <ul><li>© <?php print date('Y'); ?> Lehigh University. <a href="http://www1.lehigh.edu/about/copyright?footer">All Rights Reserved</a>
      </li><li><a href="http://www1.lehigh.edu/about/privacy?footer">Privacy</a></li>
      <li class="last"><a href="http://www1.lehigh.edu/about/serviceagreement?footer">Terms</a></li>
      </ul>
    </div>
  </div>
</footer>

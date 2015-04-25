  <footer>
    <div class="main-container">
      <div class="footer-box">
        <h3>Custom made blinds</h3>
        <ul>
          <li><a href="<?=base_url()?>infomation.html">Aluminium Venetian Blinds</a></li>
          <li><a href="<?=base_url()?>infomation.html">Athena Vertical Blinds</a></li>
          <li><a href="<?=base_url()?>infomation.html">Cellular Blinds</a></li>
          <li><a href="<?=base_url()?>infomation.html">DoubleView Roller Blinds</a></li>
          <li><a href="<?=base_url()?>infomation.html">DrapeFold Blinds</a></li>
          <li><a href="<?=base_url()?>infomation.html">Oma Electric Roller Blinds</a></li>
          <li><a href="<?=base_url()?>infomation.html">Panel Blinds</a></li>
          <li><a href="<?=base_url()?>infomation.html">Roller Blinds</a></li>
          <li><a href="<?=base_url()?>infomation.html">Roman Blinds</a></li>
          <li><a href="<?=base_url()?>infomation.html">Roman Californian Blinds</a></li>
          <li><a href="<?=base_url()?>infomation.html">Roman Kimono Blinds</a></li>
          <li><a href="<?=base_url()?>infomation.html">Roman Sorrento Blinds</a></li>
          <li><a href="<?=base_url()?>infomation.html">SheerFold Blinds</a></li>
          <li><a href="<?=base_url()?>infomation.html">SheerView Roller Blinds</a></li>

        </ul>
      </div>
      <div class="footer-box">
        <h3>Custom made curtains</h3>
        <ul>
          <li><a href="<?=base_url()?>infomation.html">Find out more</a></li>
        </ul>
        <div class="clr"></div>
        <h3>Custom made shutters</h3>
        <ul>
          <li><a href="<?=base_url()?>infomation.html">Alycore Plus PVC Shutters</a></li>
          <li><a href="<?=base_url()?>infomation.html">Premium Basswood Shutters</a></li>
        </ul>
        <div class="clr"></div>
        <h3>Custom made awnings</h3>
        <ul>
          <li><a href="<?=base_url()?>infomation.html">Fixed Guide Awning</a></li>
          <li><a href="<?=base_url()?>infomation.html">Folding Arm Awnings</a></li>
          <li><a href="<?=base_url()?>infomation.html">Monte Carlo Fixed Guide Awning</a></li>
          <li><a href="<?=base_url()?>infomation.html">Rio Automatic Sun Blind</a></li>
          <li><a href="<?=base_url()?>infomation.html">Santa Fe Crank Drop Awning</a></li>
          <li><a href="<?=base_url()?>infomation.html">Ziptrak Blinds</a></li>
        </ul>

      </div>
      <div class="footer-box">
        <h3>Showrooms</h3>
        <ul>
          <li><a href="<?=base_url()?>showrooms.html">Australian Capital Territory</a></li>
          <li><a href="<?=base_url()?>showrooms.html">New South Wales</a></li>
          <li><a href="<?=base_url()?>showrooms.html">Queensland</a></li>
          <li><a href="<?=base_url()?>showrooms.html">South Australia</a></li>
          <li><a href="<?=base_url()?>showrooms.html">Victoria</a></li>
          <li><a href="<?=base_url()?>showrooms.html">Western Australia</a></li>
        </ul>
        <div class="clr"></div>
        <h3>Other links</h3>
        <ul>
          <li><a href="<?=base_url()?>promotions.html">Promotions</a></li>
          <li><a href="<?=base_url()?>inspiration.html">Inspiration</a></li>
          <li><a href="<?=base_url()?>careers.html">Careers</a></li>
          <li><a href="<?=base_url()?>contact-us.html">Contact</a></li>
          <li><a href="<?=base_url()?>about-us.html">Privacy Policy</a></li>
          <li><a href="<?=base_url()?>about-us.html">About </a></li>
        </ul>
      </div>
      <div class="footer-box">
        <h3>Say Hello</h3>
        <p>WE'D LOVE HEARING  FROM YOU</p>
        <span class="scl-bg"><a href="<?=base_url()?>#"><img src="<?=base_url()?>images/fb.png" alt="facebook"></a></span>
        <span class="scl-bg"><a href="<?=base_url()?>#"><img src="<?=base_url()?>images/twitter.png" alt="twitter"></a></span>
        <span class="scl-bg"><a href="<?=base_url()?>#"><img src="<?=base_url()?>images/skype.png" alt="skype"></a></span>
        <div class="clr"></div>

        <p><i class="fa fa-map-marker font-awsm"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla aliquet...</p>
        <p><i class="fa fa-phone font-awsm"></i> + 999-000-0000</p>
        <p><i class="fa fa-envelope-o font-awsm"></i> demo@emailhere.com</p>

      </div>
    </div>
  </footer>
  <div class="footer-bottom">
    <div class="main-container">
      <span class="f-left">© Copyright @ 2015. 1st Call Staffing Solution. All rights reserved.</span>
      <span class="f-right">POWERED BY WEBZEST</span>
    </div>
  </div>
</div>
<script src="<?=base_url()?>js/jquery.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>js/script.js"></script>
<script src="<?=base_url()?>js/index.js"></script>

<script defer src="<?=base_url()?>js/jquery.flexslider.js"></script>
<script type="text/javascript">
$(function(){
  SyntaxHighlighter.all();
});
$(window).load(function(){
  $('.flexslider').flexslider({
    animation: "slide",
    start: function(slider){
      $('body').removeClass('loading');
    }
  });
});
</script>
</body>
</html>
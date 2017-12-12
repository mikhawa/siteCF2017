		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .site-content -->
	<div id="footer-area" class="container nopad">
		<div class="footer-inner nopad">
			<div class="row nomarge">
				<?php get_sidebar( 'footer' ); ?>
			</div>
		</div>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
				<div class="row nomarge">
				<div class="col-xs-12 above">
					<?php if( of_get_option('footer_social') ) sparkling_social_icons(); ?>
				</div>
					<div class="row">
					<div class="col-sm-6 pad-l-25">
						<h4>© 2016 | Centre de Formation 2 Mille </h4>
						<img alt="logo cf2m" src="<?=site_url();?>/wp-content/themes/pixelandco/images/icones/logo-simple-footer-.png">
					</div>
					<nav role="navigation" class="col-sm-6">
						<?php sparkling_footer_links(); ?>
					</nav>
					</div>
				</div>
				<div class="row">
				<div class="col-xs-8 col-xs-offset-2">
					<p class="text-center soutien">Avec le soutien de la <a href="http://www.spfb.brussels/">COCOF</a> et l'appui de <a href="http://www.abbet.be/">l'ABBET</a></p>
				</div>
			</div>
			</div><!-- .site-info -->
			<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
		</footer><!-- #colophon -->
		<div class="partners">

<div class="row">
	<div class="col-sm-2 col-sm-offset-2">
		<a href="http://www.bruxellesformation.be/">
			<img class="center-block" src="http://www.cf2m.be/wp-content/themes/pixelandco/images/icones/bf.jpg" alt="bruxelles-formation" width="" height="" />
		</a>
	</div>
	<div class="col-sm-2">
		<a href="http://www.actiris.be">
			<img class="center-block" style="margin-top:20px;" src="http://www.cf2m.be/wp-content/themes/pixelandco/images/icones/actiris_FR72.jpg" alt="actiris" width="" height="" />
		</a>
	</div>
	<div class="col-sm-2">
		<a href="https://www.loterie-nationale.be/fr">
			<img class="center-block" src="http://www.cf2m.be/wp-content/themes/pixelandco/images/icones/loterie.jpg" alt="loterie-nationale" width="" height="" />
		</a>
	</div>
	<div class="col-sm-2">
		<a href="http://www.spfb.brussels/">
			<img class="center-block" src="http://www.cf2m.be/wp-content/themes/pixelandco/images/icones/bxl-cocof.jpg" alt="fsc" width="" height="" />
		</a>
	</div>
</div>
<div class="lilspacer"></div>
<div class="row">
	<div class="col-sm-2 col-sm-offset-2">
		<a href="http://www.plushaut.be/porteurs-projets">
			<img class="center-block" style="margin-top:15px;" src="http://www.cf2m.be/wp-content/themes/pixelandco/images/icones/logo_FSE+COCOF.jpg" alt="Region-bruxelles" width="" height="" />
		</a>
	</div>
	<div class="col-sm-2 text-center dark">
		<a href="http://www.fse.be/index.php?id=239">
			<img class="center-block" src="http://www.cf2m.be/wp-content/themes/pixelandco/images/icones/iej.jpg" alt="Region-bruxelles" width="" height="" />
			<small>UNION EUROP&Eacute;NNE<br>Fonds social européen<br>Initiative pour l'emploi des jeunes.</small>
		</a>
	</div>
	<div class="col-sm-2 text-center dark">
		<a href="http://www.fse.be/index.php?id=239">
			<img class="center-block" src="http://www.cf2m.be/wp-content/themes/pixelandco/images/icones/iej.jpg" alt="Region-bruxelles" width="" height="" />
			<small>UNION EUROP&Eacute;NNE<br>Fonds social européen.</small>	
		</a>
	</div>
	<div class="col-sm-2">
		<a href="http://be.brussels/">
			<img class="center-block" src="http://www.cf2m.be/wp-content/themes/pixelandco/images/icones/brussels.jpg" alt="Region-bruxelles" width="" height="" />
		</a>
	</div>
</div>
				
	</div><!--.partners-->
</div><!-- #page -->

<?php wp_footer(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-909615-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
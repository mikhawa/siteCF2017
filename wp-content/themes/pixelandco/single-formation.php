<?php get_header(); ?>

<?php if(have_posts()): ?>
	<?php while(have_posts()): the_post();?>
		<?php
		$metas = get_post_meta(get_the_ID());
		$image = get_field('title_logo');
		$my = explode('/', $image);
		$img = end($my);
		$rgb = hex2rgb($metas['couleur'][0]);
		$rgba = 'rgba('.$rgb[0].','.$rgb[1].','.$rgb[2].',0.8)';
		?>

<style>
.f-box-title{
	color:<?=$metas['couleur'][0];?>;
	background: #313233; /* Old browsers */
	background: -moz-linear-gradient(45deg,  #313233 73%, <?=$metas['couleur'][0];?> 73%); /* FF3.6-15 */
	background: -webkit-gradient(linear, left bottom, right top, color-stop(73%,#313233), color-stop(73%,<?=$metas['couleur'][0];?>)); /* Chrome4-9,Safari4-5 */
	background: -webkit-linear-gradient(45deg,  #313233 73%,<?=$metas['couleur'][0];?> 73%); /* Chrome10-25,Safari5.1-6 */
	background: -o-linear-gradient(45deg,  #313233 73%,<?=$metas['couleur'][0];?> 73%); /* Opera 11.10-11.50 */
	background: -ms-linear-gradient(45deg,  #313233 73%,<?=$metas['couleur'][0];?> 73%); /* IE10 preview */
	background: linear-gradient(45deg,  #313233 73%,<?=$metas['couleur'][0];?> 73%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#313233', endColorstr=<?=$metas['couleur'][0];?>,GradientType=1 ); /* IE6-9 fallback on horizontal gradient */

}
.nav-tabs.nav-justified>.active>a, .nav-tabs.nav-justified>.active>a:focus, .nav-tabs.nav-justified>.active>a:hover {
    border: 2px solid <?=$metas['couleur'][0];?>;
}
@media (min-width: 768px){
	.nav-tabs.nav-justified>li>a {
	    border-bottom: 2px solid <?=$metas['couleur'][0];?>;
	}
	.nav-tabs.nav-justified>.active>a, .nav-tabs.nav-justified>.active>a:focus, .nav-tabs.nav-justified>.active>a:hover {
    	border-bottom:none;
	}
}
</style>
		<div class="row banner formation vertical-center">
			<div class="col-xs-12 post">
				<?php if(has_post_thumbnail()) { 
					$img_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'large');
					print '<img src="'.$img_src[0].'" alt="illustration" class="stretched-banner">';
				}

				?>
				<div class="row nomarge pad-top-10">
				<?php if($post->ID == 220):?>
					<?php $atouts_jeunes = TRUE; ?>
					<div class="col-md-4 col-md-offset-8 nopad">
				<?php else: ?>
					<div class="col-md-6 col-md-offset-6 nopad">
				<?php endif; ?>
						<h1 class="single-f-title" style="background: url(<?=$image;?>) no-repeat 2px 2px;background-color:<?=$rgba;?>;background-size:45px"><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<?=get_the_content(); ?>
			</div>
		</div>
		<div class="row nomarge">

			<div class="col-sm-4">
				<div class="f-box">
				  	<div class="f-box-heading">
				    	<h4 class="f-box-title"><?php if(isset($atouts_jeunes)){print 'Conditions d\'accès';}else{print 'Métier';} ?></h4>
				  	</div>
				  	<div class="f-box-body">
				    	<?php print $metas['metier'][0]; ?>
				  	</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="f-box">
				  	<div class="f-box-heading">
				    	<h4 class="f-box-title"><?php if(isset($atouts_jeunes)){print 'Formation de base';}else{print 'Qualités';} ?></h4>
				  	</div>
				  	<div class="f-box-body">
				    	<?php print $metas['qualites'][0]; ?>
				  	</div>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="f-box">
				  	<div class="f-box-heading">
				    	<h4 class="f-box-title"><?php if(isset($atouts_jeunes)){print 'Objectifs';}else{print 'Compétences';} ?></h4>
				  	</div>
				  	<div class="f-box-body">
				    	<?php print $metas['competences'][0]; ?>
				  	</div>
				</div>
			</div>

		</div>

		<div class="row nomarge">

			<div class="col-sm-4 marge-top-7">
				<div class="f-box">
				  	<div class="f-box-heading">
				    	<h4 class="f-box-title">Matières</h4>
				  	</div>
				  	<div class="f-box-body">
				    	<?php print $metas['programme_de_cours'][0]; ?>
				  	</div>
				</div>
			</div>

			<div class="col-sm-8">
				<div class="f-box row nomarge">

				  	<div class=" text-center">
<div class="f-box-heading">
				    	<ul class="nav nav-tabs nav-justified" role="tablist">
			    			<li role="presentation" class="active"><a href="#prefo" aria-controls="prefo" role="tab" data-toggle="tab" style="color:<?=$metas['couleur'][0];?>"><?php if(isset($atouts_jeunes)){print 'Tests d\'entrée';}else{print 'Préfo';} ?></a></li>
			    			<li role="presentation" class=""><a href="#fq" aria-controls="fq" role="tab" data-toggle="tab" style="color:<?=$metas['couleur'][0];?>"><?php if(isset($atouts_jeunes)){print 'Lieu de formation';}else{print 'Formation qualifiante';} ?></a></li>
			    			<li role="presentation" class=""><a href="#stage" aria-controls="stage" role="tab" data-toggle="tab" style="color:<?=$metas['couleur'][0];?>"><?php if(isset($atouts_jeunes)){print 'Contrat';}else{print 'Stage';} ?></a></li>
			  			</ul>
			  			</div>
				  	</div>
				  	<div class="f-box-body last">
				  		<div class="tab-content">
	    					<div role="tabpanel" class="tab-pane active" id="prefo"><?php print $metas['preformation'][0]; ?></div>
	    					<div role="tabpanel" class="tab-pane" id="fq"><?php print $metas['formation_qualifiante'][0]; ?></div>
	    					<div role="tabpanel" class="tab-pane" id="stage"><?php print $metas['stage'][0]; ?></div>
	  					</div>
				  	</div>

				</div>
			</div>

		</div>

		<div class="row">
			<div class="col-xs-12 text-center">
				<?php if ( function_exists( 'sharing_display' ) ) echo sharing_display(); ?>
			</div>
		</div>

		
	<?php endwhile; ?>
<?php else: ?>
	<p><?php __('Sorry, no posts matches your criteria'); ?></p>
<?php endif; ?>
	


<?php get_footer(); ?>
</div>
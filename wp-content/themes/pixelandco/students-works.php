<?php
/*
Template Name: Travaux des stagiaires par section
*/
get_header();

if(isset($wp_query->query_vars['section'])){
  $portfolio_domain = $wp_query->query_vars['section'];
}else{
  $portfolio_domain = 'pao';
}

?>
<div class="row nomarge">
	
		<?php 
		$i = 1;
    $domain = portfolios_by_year($portfolio_domain);

    if(!empty($domain)):
		foreach($domain as $year => $posts) : ?>
  		<div class="col-sm-4 col-md-3">
  		<h2 class="text-center"><?php echo $year; ?></h2>

  		<ul class="list-group">
    	<?php foreach($posts as $post) : setup_postdata($post); ?>
      		<li class="list-group-item">
        		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      		</li>
    	<?php endforeach; ?>
  		</ul>
  		</div>

  		<?php if ($i % 3 == 0) {
   			echo '</div><br><div class="row nomarge">';
		}?>

		<?php $i++;endforeach; ?>
  <?php else: ?>
    <img src="<?=site_url();?>/wp-content/themes/pixelandco/images/reload/nocontent-reload.png" alt="illustration">
  <?php endif; ?>
	
</div>
<?php get_footer(); ?> 
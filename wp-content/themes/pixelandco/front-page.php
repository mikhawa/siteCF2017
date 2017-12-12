<?php
/*
Template Name: Front page
*/
get_header(); 

$args1 = array(
    'post_type'  => 'post',
    'meta_key'   => 'featured_news',
    'posts_per_page' => '1',
    'meta_query' => array(
        array(
            'key'     => 'featured_news',
            'value'   => 1,
            'compare' => '=',
            ),
        ),
    );
    $featured_query = new WP_Query( $args1 );


if ( $featured_query->have_posts() ) : while ( $featured_query->have_posts() ) : $featured_query->the_post();?>

<div class="row nomarge">
<?php if ( has_post_thumbnail() ) : ?>
    <div class="col-xs-12 front-featured-image">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail('large', array('class'=>'aligncenter')); ?>
        </a>
    </div>
<?php endif; ?>
    <div class="col-xs-12 front-featured-news">
        <a class="read-more text-center" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_title('<h3>! ',' !</h3>');?>
            <!--<h1 class="text-center"><a href="https://youtu.be/6orLdpP3c-g" style="color:#fff;"><strong>Voir la vidéo sur YouTube</strong></a></h1>-->
        </a>
    </div>

</div>

<?php
endwhile; endif;
wp_reset_postdata(); // reset the query
?>

<div class="post-inner-content graph-paper">

<div class="row intro-two-bloc">

	<aside class="student col-sm-6 text-center">
        <article class="graph-sheet">
            <a href="<?=SITE_URL.'/formation/?part=stagiaires'?>"><h1>Demandeur d'emploi</h1>
            <span class="picto"></span>
            <p>Et vous cherchez une formation ...<br><span class="unvisible">...</span></p></a>
        </article>
        <div class="toggle t-1" style="display:none;">
            <p>Vous êtes demandeur d’emploi inscrit chez Actiris, vous n’avez pas terminé vos humanités et vous habitez la région bruxelloise ?</p>
        </div>
    </aside>

    <aside class="employer col-sm-6 text-center">
        <article class="graph-sheet">
            <a href="<?=SITE_URL.'/formation/?part=employeurs'?>"><h1>Employeur</h1>
            <span class="picto"></span>
            <p>Et vous recherchez des personnes <br>qualifiées pour un stage.</p></a>
        </article>
        <div class="toggle t-2" style="display:none;">
            <p>Vous êtes prêt à accueillir un de nos stagiaires pour une période de 6 semaines 
            dans votre entreprise ?</p>
        </div>
    </aside>

</div>

<div class="row front-about">
	<div class="col-xs-10 col-xs-offset-1">
		<?php
        $args2 = array(
    'post_type'  => 'page',
    'meta_key'   => 'homepage',
    'orderby'    => 'date',
    'order'      => 'ASC',
    'posts_per_page' => '1',
    'meta_query' => array(
        array(
            'key'     => 'homepage',
            'value'   => 1,
            'compare' => '=',
            ),
        ),
    );
    $featured_query = new WP_Query( $args2 );

if ( $featured_query->have_posts() ) : while ( $featured_query->have_posts() ) : $featured_query->the_post();
    // Loop output goes here
//var_dump($post);
//$text = apply_filters('the_content', $post->post_content);

print the_content();
?>
<a class="read-more" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Pour plus d’infos…[+]</a>

<?php
/*$p_url =  site_url() .'/'. $post->post_type .'/'. $post->post_name; 
$r_more ='<br><span><a class="liremore" href="'.$p_url.'">Pour plus d’infos... [+]</a></span>';
$trimmed = wp_trim_words( $text, $num_words = 80, $r_more );
print $trimmed;
var_dump(get_permalink());*/
endwhile; endif;
wp_reset_postdata(); // reset the query
        ?>
        

				
	</div>
</div>
<div class="spacer"></div>
       
<div class="row">
    <div class="col-xs-4">
        <a href="http://www.pedagotheque.be/">
            <img src="http://www.cf2m.be/wp-content/uploads/2016/02/logo-peda.jpg" alt="logo partenaire" class="center-block img-responsive">
        </a>
    </div>
    <div class="col-xs-4">
        <a href="http://www.pixelandco.be/">
            <img src="http://www.cf2m.be/wp-content/uploads/2016/02/logo-pixel.jpg" alt="logo partenaire" class="center-block img-responsive">
        </a>
    </div>
    <div class="col-xs-4">
        <a href="http://www.cf2d.be/">
            <img src="http://www.cf2m.be/wp-content/uploads/2016/02/CF2D_logo.jpg" alt="logo partenaire" class="center-block img-responsive">
        </a>
    </div>
</div>
</div>
<?php get_footer(); ?> 
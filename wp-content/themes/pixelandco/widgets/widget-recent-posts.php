<?php
/**
 * Pixel&Co Recent Posts Widget
 * Sparkling Theme
 */
class sparkling_recent_posts extends WP_Widget
{
	 function sparkling_recent_posts(){

        $widget_ops = array('classname' => 'sparkling-popular-posts','description' => esc_html__( "Pixel&Co recent Posts Widget", 'sparkling') );
		    parent::__construct('sparkling_recent_posts', esc_html__('Pixel&Co recent Posts Widget','sparkling'), $widget_ops);
    }

    function widget($args , $instance) {
    	extract($args);
        $title = isset($instance['title']) ? $instance['title'] : esc_html__('Recent Posts', 'sparkling');
        $limit = isset($instance['limit']) ? $instance['limit'] : 3;

      echo $before_widget;
      echo $before_title;
      echo $title;
      echo $after_title;

		/**
		 * Widget Content
		 */
    ?>

    <!-- popular posts -->
          <div class="popular-posts-wrapper">

                <?php

                  $featured_args = array(
                      'posts_per_page' => $limit ,
                      'orderby' => 'date',
                      'order' => 'DESC',
                      'ignore_sticky_posts' => 1
                    );

                  $featured_query = new WP_Query($featured_args);

                  /**
                   * Check if zilla likes plugin exists
                   */
                  if($featured_query->have_posts()) : while($featured_query->have_posts()) : $featured_query->the_post();

                    ?>

                        <?php $text = get_the_content();
                        if($text != '') : ?>

                        <!-- post -->
                        <div class="post">

                          <!-- image -->
                          <div class="post-image <?php echo get_post_format(); ?> text-center">

                                <a href="<?php echo get_permalink(); ?>"><?php
                                 if(get_post_format() != 'quote') {

                                  $thumb = get_the_post_thumbnail(get_the_ID() , 'tab-small');

                                  if(!empty($thumb)){
                                    print $thumb;
                                  }else{
                                    print '<i class="fa fa-newspaper-o fa-post-recent"></i>';
                                  }
                      
                                }
                                 ?></a>

                          </div> <!-- end post image -->

                          <!-- content -->
                          <div class="post-content">

                              <a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
                              <span class="date"><?php echo get_the_date('d M , Y'); ?></span>

                              <?php 
                              print wp_trim_words($text,20);?>
                          </div><!-- end content -->
                        </div><!-- end post -->

                        <?php endif; ?>

                    <?php

                  endwhile; endif; wp_reset_query();

                 ?>

          </div> <!-- end posts wrapper -->

		<?php

		echo $after_widget;
    }

    function form($instance) {

      if(!isset($instance['title'])) $instance['title'] = esc_html__('Recent Posts', 'sparkling');
      if(!isset($instance['limit'])) $instance['limit'] = 5;

    	?>

      <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title', 'sparkling') ?></label>

      <input  type="text" value="<?php echo esc_attr($instance['title']); ?>"
              name="<?php echo $this->get_field_name('title'); ?>"
              id="<?php $this->get_field_id('title'); ?>"
              class="widefat" />
      </p>

      <p><label for="<?php echo $this->get_field_id('limit'); ?>"><?php esc_html_e('Limit Posts Number', 'sparkling') ?></label>

      <input  type="text" value="<?php echo esc_attr($instance['limit']); ?>"
              name="<?php echo $this->get_field_name('limit'); ?>"
              id="<?php $this->get_field_id('limit'); ?>"
              class="widefat" />
      <p>

    	<?php
    }
}
?>
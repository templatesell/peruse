<?php 
/**
 * Peruse Slider Function
 * @since Peruse 1.0.0
 *
 * @param null
 * @return void
 *
 */
global $peruse_theme_options;
$slide_id = absint($peruse_theme_options['peruse-select-category']);
        $slick_args = array(
            'slidesToShow'      => 1,
            'slidesToScroll'    => 1,
            'dots'              => false,
            'arrows'            => false,
        );
      $args = array(
			'posts_per_page' => 3,
			'paged' => 1,
			'cat' => $slide_id,
			'post_type' => 'post'
		);
		$slider_query = new WP_Query($args);
		if ($slider_query->have_posts()): ?>
    <div class="container">
    <div class="modern-slider" data-slick='<?php echo $slick_args_encoded; ?>'>
				<?php while ($slider_query->have_posts()) : $slider_query->the_post(); 
          if(has_post_thumbnail()){
          $image_id = get_post_thumbnail_id();
          $image_url = wp_get_attachment_image_src( $image_id,'',true );
        ?>
				
          <div class="slide-post d-md-table">
            <div class="slide-image d-md-table-cell">
              <?php the_post_thumbnail('full'); ?>
            </div>
            <div class="slide-info d-md-table-cell">
              <div class="inner-wrapper">
                <div class="entry-meta">
                  <ul>
                    <li>
                        <?php
                          $categories = get_the_category();
                          if ( ! empty( $categories ) ) {
                          echo '<a class="s-cat" href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'">'.esc_html( $categories[0]->name ).'</a>';
                        }                                 
                        ?>
                    </li>
                  </ul>
                </div>
        		    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="entry-meta">
                  <ul>
                    <li><?php peruse_posted_on(); ?></li>
                    <li><?php peruse_read_time(); ?></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <?php } endwhile;
          wp_reset_postdata(); ?>
      </div>
  </div>
<?php endif; ?>
<?php
/**
 * Peruse post Slider Widget
 *
 * @since 1.0.0
 */
if (!class_exists('Peruse_Tabbed')) :

    /**
     * Highlight Post widget class.
     *
     * @since 1.0.0
     */
    class Peruse_Tabbed extends WP_Widget
    {

        function __construct()
        {
            $opts = array(
                'classname' => 'peruse-tabbed',
                'description' => esc_html__('It will help to display the popular and Recent Post Via Tabbed. Suitable on Sidebars.', 'peruse'),
            );

            parent::__construct('peruse-tabbed', esc_html__('Peruse Tabbed', 'peruse'), $opts);
        }


        function widget($args, $instance)
        {
            $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
            echo $args['before_widget'];


            if (!empty($title)) {
                echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
            }
            $popular_title = !empty($instance['popular_title']) ? $instance['popular_title'] : '';
            $recent_title = !empty($instance['recent_title']) ? $instance['recent_title'] : '';
            $post_number = !empty($instance['post-number']) ? $instance['post-number'] : '';

            ?>
            <ul class="tabs-nav">
                <?php if(!empty($recent_title)){ ?>
                <li class="tab-active"><i class="fa fa-clock-o"></i><a data-toggle="tab" href="#menu1"><?php echo esc_html($recent_title); ?></a></li>
                <?php } ?>
                <?php if(!empty($popular_title)){ ?>
                <li class=""><i class="fa fa-bookmark-o"></i><a data-toggle="tab" href="#home"><?php echo esc_html($popular_title); ?></a></li>
                <?php } ?>
            </ul>

            <div class="tab-content">
                <?php if(!empty($popular_title)) { ?>
                    <div id="home" class="active" style="display: block;">
                        <section class="tab-posts-block">
                            <?php
                            $p_query_args = array(
                                'post_type' => 'post',
                                'posts_per_page' => absint($post_number),
                                'ignore_sticky_posts' => true,
                                'orderby' => 'comment_count'
                            );
                            ?> 
                            <div class="row">
                            <?php
                            $i = 1;
                            $p_query = new WP_Query($p_query_args);
                            if ($p_query->have_posts()) :
                                while ($p_query->have_posts()) :
                                    ?>
                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                        <?php
                                        $p_query->the_post();
                                        if (has_post_thumbnail()) {
                                            ?>
                                            
                                            <figure class="widget_featured_thumbnail">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail('full'); ?>
                                                </a>
                                            </figure>
                                            <?php
                                        }
                                        ?>
                                        <span class="widget_featured_post_num"><?php echo $i; ?></span>
                                        <div class="widget_featured_content">
                                            <h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <div class="post-date">
                                                <span><?php echo get_the_date(); ?></span>
                                                <?php peruse_read_time(); ?>
                                            </div><!-- .entry-meta -->
                                        </div>
                                    </div>
                                    <?php
                                    $i++;
                                endwhile;
                                wp_reset_postdata();
                            endif;?>
                            </div><?php
                            ?>
                        </section>
                    </div>
                <?php } ?>
                <?php if(!empty($recent_title)) { ?>
                    <div id="menu1" class="" style="display: none;">
                        <section class="tab-posts-block">
                            <?php
                            $query_args = array(
                                'post_type' => 'post',
                                'posts_per_page' => absint($post_number),
                                'ignore_sticky_posts' => true
                            );
                            ?> 
                            <div class="row">
                            <?php
                            $query = new WP_Query($query_args);
                            $query = new WP_Query($query_args);
                            if ($query->have_posts()) :
                                while ($query->have_posts()) :
                                     ?>
                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                        <?php
                                        $query->the_post();
                                        if (has_post_thumbnail()) {
                                            ?>
                                                <figure class="widget_featured_thumbnail">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_post_thumbnail('full'); ?>
                                                    </a>
                                                </figure>
                                            <?php
                                        }
                                        ?>
                                        <div class="widget_featured_content">
                                            <h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <div class="post-date">
                                                <span><?php echo get_the_date(); ?></span>
                                                <?php peruse_read_time(); ?>
                                            </div><!-- .entry-meta -->
                                        </div>
                                    </div>
                                    <?php
                                endwhile;
                                wp_reset_postdata();
                            endif; ?>
                            </div><?php
                            ?>
                        </section>                    
                    </div>
                <?php } ?>
            </div>

            <?php     
            echo $args['after_widget'];            
        }

        function update($new_instance, $old_instance)
        {
            $instance = $old_instance;

            $instance['title'] = sanitize_text_field($new_instance['title']);
            $instance['popular_title'] = sanitize_text_field($new_instance['popular_title']);
            $instance['recent_title'] = sanitize_text_field($new_instance['recent_title']);
            $instance['post-number'] = absint($new_instance['post-number']);

            return $instance;
        }

        function form($instance)
        {
            // Defaults.
            $defaults = array(
                'title' => esc_html__('Recent Post', 'peruse' ),
                'popular_title'=> esc_html__('Popular', 'peruse' ),
                'recent_title'=> esc_html__('Recent', 'peruse' ),
                'post-number' => 5,
            );
            
            $instance = wp_parse_args((array)$instance, $defaults);
            ?>
            <p>
                <label
                for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Widget Title:', 'peruse'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                value="<?php echo esc_attr($instance['title']); ?>"/>
            </p>
            <p>
                <label
                for="<?php echo esc_attr($this->get_field_id('popular_title')); ?>"><?php esc_html_e('Popular Title:', 'peruse'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('popular_title')); ?>"
                name="<?php echo esc_attr($this->get_field_name('popular_title')); ?>" type="text"
                value="<?php echo esc_attr($instance['popular_title']); ?>"/>
            </p>
            <p>
                <label
                for="<?php echo esc_attr($this->get_field_id('recent_title')); ?>"><?php esc_html_e('Recent Title:', 'peruse'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('recent_title')); ?>"
                name="<?php echo esc_attr($this->get_field_name('recent_title')); ?>" type="text"
                value="<?php echo esc_attr($instance['recent_title']); ?>"/>
            </p>
            <p>
                <label
                for="<?php echo esc_attr($this->get_field_id('post-number')); ?>"><?php esc_html_e('Number of Posts to Display:', 'peruse'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('post-number')); ?>"
                name="<?php echo esc_attr($this->get_field_name('post-number')); ?>" type="number"
                value="<?php echo esc_attr($instance['post-number']); ?>"/>
            </p>
            <?php
        }
    }
endif;
<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Peruse
 */
global $peruse_theme_options;
$show_content_from = esc_attr($peruse_theme_options['peruse-content-show-from']);
$read_more = esc_html($peruse_theme_options['peruse-read-more-text']);
$masonry = esc_attr($peruse_theme_options['peruse-column-blog-page']);
$image_location = esc_attr($peruse_theme_options['peruse-blog-image-layout']);
$social_share = absint($peruse_theme_options['peruse-show-hide-share']);
$date = absint($peruse_theme_options['peruse-show-hide-date']);
$category = absint($peruse_theme_options['peruse-show-hide-category']);
$author = absint($peruse_theme_options['peruse-show-hide-author']);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($masonry); ?>>
    <div class="post-wrap <?php echo esc_attr($image_location); ?>">
        <?php if(has_post_thumbnail()) { ?>
            <div class="post-media">
                <?php 
                    $image_id = get_post_thumbnail_id();
                    $image_url = wp_get_attachment_image_src( $image_id,'',true );
                ?>

                <div class="img-cover" style="background-image: url(<?php echo esc_url($image_url[0]);?>)">

                    <?php 
                        if($image_location == 'full-image'){
                            peruse_post_thumbnail('full');
                        }
                     ?>
                     <a class="img-link" href="<?php the_permalink(); ?>"></a>
                </div>

                <?php 
                if( 1 == $social_share ){
                    do_action( 'peruse_social_sharing' ,get_the_ID() );
                }
                ?>
            </div>
        <?php } ?>
        <div class="post-content">
            <?php if($category == 1 ){ ?>
                <div class="post-cats">
                    <?php peruse_entry_meta(); ?>
                </div>
            <?php } ?>
            <div class="post_title">
                <?php
                if (is_singular()) :
                    the_title('<h1 class="post-title entry-title">', '</h1>');
                else :
                    the_title('<h2 class="post-title entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                    ?>
                <?php endif; ?>
            </div>
            <!-- .entry-content end -->
            <div class="post-meta">
                <?php
                if ('post' === get_post_type()) :
                    ?>
                    <div class="post-date">
                        <div class="entry-meta">
                            <?php
                            if($date == 1 ){
                                peruse_posted_on();
                            }
                            if($author == 1 ){
                                peruse_posted_by();
                            }
                            ?>
                        </div><!-- .entry-meta -->
                    </div>
                <?php endif; ?>
            </div>
            <div class="post-excerpt entry-content">
                <?php
                if (is_singular()) {
                    the_content();
                } else {
                    if ($show_content_from == 'excerpt') {
                        the_excerpt();
                    } else {
                        the_content();
                    }
                }
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'peruse'),
                    'after' => '</div>',
                ));
                ?>
                <!-- read more -->
                <?php if (!empty($read_more) && $show_content_from == 'excerpt'): ?>
                    <a class="more-link" href="<?php the_permalink(); ?>"><?php echo esc_html($read_more); ?> <i
                                class="fa fa-long-arrow-right"></i>
                    </a>
                <?php endif; ?>
            </div>
            
        </div>
    </div>
</article><!-- #post- -->
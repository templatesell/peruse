<?php
/**
 * Social Sharing Hook *
 * @since 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if (!function_exists('peruse_social_sharing')) :
    function peruse_social_sharing($post_id)
    {
        $peruse_url = get_the_permalink($post_id);
        $peruse_title = get_the_title($post_id);
        $peruse_image = get_the_post_thumbnail_url($post_id);
        
        //sharing url
        $peruse_twitter_sharing_url = esc_url('http://twitter.com/share?text=' . $peruse_title . '&url=' . $peruse_url);
        $peruse_facebook_sharing_url = esc_url('https://www.facebook.com/sharer/sharer.php?u=' . $peruse_url);
        $peruse_pinterest_sharing_url = esc_url('http://pinterest.com/pin/create/button/?url=' . $peruse_url . '&media=' . $peruse_image . '&description=' . $peruse_title);
        $peruse_linkedin_sharing_url = esc_url('http://www.linkedin.com/shareArticle?mini=true&title=' . $peruse_title . '&url=' . $peruse_url);
        
        ?>
        <div class="meta_bottom">
            <div class="post-share">
                <a data-tooltip="<?php esc_attr_e('Share it','peruse'); ?>" class="tooltip"  target="_blank" href="<?php echo $peruse_facebook_sharing_url; ?>"><i class="fa fa-facebook"></i><?php esc_html_e('Facebook','peruse'); ?></a>
                <a data-tooltip="<?php esc_attr_e('Tweet it','peruse'); ?>" class="tooltip"  target="_blank" href="<?php echo $peruse_twitter_sharing_url; ?>"><i
                            class="fa fa-twitter"></i> <?php esc_html_e('Twitter','peruse'); ?></a>
                <a data-tooltip="<?php esc_attr_e('Pin it','peruse'); ?>" class="tooltip"  target="_blank" href="<?php echo $peruse_pinterest_sharing_url; ?>"><i
                            class="fa fa-pinterest"></i><?php esc_html_e('Pinterest','peruse'); ?></a>
                <a data-tooltip="<?php esc_attr_e('Share Now','peruse'); ?>" class="tooltip"  target="_blank" href="<?php echo $peruse_linkedin_sharing_url; ?>"><i class="fa fa-linkedin"></i><?php esc_html_e('Linkedin','peruse'); ?></a>
            </div>
        </div>
        <?php
    }
endif;
add_action('peruse_social_sharing', 'peruse_social_sharing', 10);
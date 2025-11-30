<?php
/**
 * Nasqe Theme Widgets
 * ويدجت مخصصة للقالب
 *
 * @package Nasqe
 * @version 1.0.0
 */

// منع الوصول المباشر
if (!defined('ABSPATH')) {
    exit;
}

/**
 * تسجيل مناطق الويدجت
 */
function nasqe_widgets_init() {
    // Sidebar رئيسي
    register_sidebar(array(
        'name'          => __('الشريط الجانبي الرئيسي', 'nasqe'),
        'id'            => 'sidebar-1',
        'description'   => __('يظهر على صفحات المدونة والصفحات الفردية', 'nasqe'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    // منطقة Footer 1
    register_sidebar(array(
        'name'          => __('تذييل - منطقة 1', 'nasqe'),
        'id'            => 'footer-1',
        'description'   => __('منطقة التذييل الأولى', 'nasqe'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));

    // منطقة Footer 2
    register_sidebar(array(
        'name'          => __('تذييل - منطقة 2', 'nasqe'),
        'id'            => 'footer-2',
        'description'   => __('منطقة التذييل الثانية', 'nasqe'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));

    // منطقة Footer 3
    register_sidebar(array(
        'name'          => __('تذييل - منطقة 3', 'nasqe'),
        'id'            => 'footer-3',
        'description'   => __('منطقة التذييل الثالثة', 'nasqe'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'nasqe_widgets_init');

/**
 * ويدجت روابط التواصل الاجتماعي
 */
class Nasqe_Social_Links_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'nasqe_social_links',
            __('نسق - روابط التواصل الاجتماعي', 'nasqe'),
            array('description' => __('عرض روابط التواصل الاجتماعي', 'nasqe'))
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];

        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        $social_links = array(
            'facebook'  => array('icon' => 'facebook-f', 'label' => 'Facebook'),
            'twitter'   => array('icon' => 'twitter', 'label' => 'Twitter'),
            'instagram' => array('icon' => 'instagram', 'label' => 'Instagram'),
            'linkedin'  => array('icon' => 'linkedin-in', 'label' => 'LinkedIn'),
            'youtube'   => array('icon' => 'youtube', 'label' => 'YouTube'),
            'github'    => array('icon' => 'github', 'label' => 'GitHub'),
        );

        echo '<div class="social-links-widget">';

        foreach ($social_links as $key => $data) {
            $url = get_theme_mod("nasqe_social_{$key}", '');
            if (!empty($url)) {
                printf(
                    '<a href="%s" class="social-link social-link-%s" target="_blank" rel="noopener noreferrer" aria-label="%s">
                        <span class="dashicons dashicons-%s"></span>
                    </a>',
                    esc_url($url),
                    esc_attr($key),
                    esc_attr($data['label']),
                    esc_attr($key)
                );
            }
        }

        echo '</div>';

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('تابعنا', 'nasqe');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php _e('العنوان:', 'nasqe'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <small><?php _e('يمكنك إضافة روابط التواصل الاجتماعي من خلال: المظهر → تخصيص → روابط التواصل الاجتماعي', 'nasqe'); ?></small>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        return $instance;
    }
}

/**
 * ويدجت أحدث المقالات مع صورة
 */
class Nasqe_Recent_Posts_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'nasqe_recent_posts',
            __('نسق - أحدث المقالات', 'nasqe'),
            array('description' => __('عرض أحدث المقالات مع الصور', 'nasqe'))
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];

        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        $number = (!empty($instance['number'])) ? absint($instance['number']) : 5;

        $recent_posts = wp_get_recent_posts(array(
            'numberposts' => $number,
            'post_status' => 'publish'
        ));

        if ($recent_posts) {
            echo '<div class="nasqe-recent-posts-widget">';

            foreach ($recent_posts as $post) {
                $post_id = $post['ID'];
                $title = $post['post_title'];
                $permalink = get_permalink($post_id);
                $date = get_the_date('', $post_id);
                $thumbnail = get_the_post_thumbnail($post_id, 'thumbnail');

                echo '<div class="recent-post-item">';

                if ($thumbnail) {
                    echo '<div class="recent-post-thumbnail">';
                    echo '<a href="' . esc_url($permalink) . '">' . $thumbnail . '</a>';
                    echo '</div>';
                }

                echo '<div class="recent-post-content">';
                echo '<h5 class="recent-post-title"><a href="' . esc_url($permalink) . '">' . esc_html($title) . '</a></h5>';
                echo '<span class="recent-post-date">' . esc_html($date) . '</span>';
                echo '</div>';

                echo '</div>';
            }

            echo '</div>';
        }

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('أحدث المقالات', 'nasqe');
        $number = !empty($instance['number']) ? absint($instance['number']) : 5;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php _e('العنوان:', 'nasqe'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>">
                <?php _e('عدد المقالات:', 'nasqe'); ?>
            </label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" size="3">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['number'] = (!empty($new_instance['number'])) ? absint($new_instance['number']) : 5;
        return $instance;
    }
}

/**
 * ويدجت معلومات الاتصال
 */
class Nasqe_Contact_Info_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'nasqe_contact_info',
            __('نسق - معلومات الاتصال', 'nasqe'),
            array('description' => __('عرض معلومات الاتصال', 'nasqe'))
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];

        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        $phone = get_theme_mod('nasqe_phone', '');
        $email = get_theme_mod('nasqe_email', '');
        $address = get_theme_mod('nasqe_address', '');

        echo '<div class="contact-info-widget">';

        if ($phone) {
            echo '<div class="contact-item">';
            echo '<span class="dashicons dashicons-phone"></span>';
            echo '<a href="tel:' . esc_attr($phone) . '">' . esc_html($phone) . '</a>';
            echo '</div>';
        }

        if ($email) {
            echo '<div class="contact-item">';
            echo '<span class="dashicons dashicons-email"></span>';
            echo '<a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>';
            echo '</div>';
        }

        if ($address) {
            echo '<div class="contact-item">';
            echo '<span class="dashicons dashicons-location"></span>';
            echo '<span>' . esc_html($address) . '</span>';
            echo '</div>';
        }

        echo '</div>';

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('تواصل معنا', 'nasqe');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php _e('العنوان:', 'nasqe'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <small><?php _e('يمكنك إضافة معلومات الاتصال من خلال: المظهر → تخصيص → معلومات التواصل', 'nasqe'); ?></small>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        return $instance;
    }
}

/**
 * تسجيل الويدجت
 */
function nasqe_register_widgets() {
    register_widget('Nasqe_Social_Links_Widget');
    register_widget('Nasqe_Recent_Posts_Widget');
    register_widget('Nasqe_Contact_Info_Widget');
}
add_action('widgets_init', 'nasqe_register_widgets');

/**
 * CSS للويدجت
 */
function nasqe_widgets_css() {
    ?>
    <style>
    /* Social Links Widget */
    .social-links-widget {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }
    .social-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--wp--preset--color--primary-dark-green);
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    .social-link:hover {
        background: var(--wp--preset--color--primary-green);
        transform: translateY(-3px);
    }

    /* Recent Posts Widget */
    .nasqe-recent-posts-widget .recent-post-item {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #e5e7eb;
    }
    .nasqe-recent-posts-widget .recent-post-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    .recent-post-thumbnail {
        flex-shrink: 0;
    }
    .recent-post-thumbnail img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
    }
    .recent-post-content {
        flex: 1;
    }
    .recent-post-title {
        margin: 0 0 5px 0;
        font-size: 14px;
        line-height: 1.4;
    }
    .recent-post-title a {
        color: #1a1a1a;
        text-decoration: none;
    }
    .recent-post-title a:hover {
        color: var(--wp--preset--color--primary-dark-green);
    }
    .recent-post-date {
        font-size: 12px;
        color: #6b7280;
    }

    /* Contact Info Widget */
    .contact-info-widget .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 15px;
    }
    .contact-info-widget .contact-item:last-child {
        margin-bottom: 0;
    }
    .contact-info-widget .dashicons {
        color: var(--wp--preset--color--primary-dark-green);
        flex-shrink: 0;
        margin-top: 2px;
    }
    .contact-info-widget a {
        color: #1a1a1a;
        text-decoration: none;
    }
    .contact-info-widget a:hover {
        color: var(--wp--preset--color--primary-dark-green);
    }
    </style>
    <?php
}
add_action('wp_head', 'nasqe_widgets_css');

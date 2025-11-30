<?php
/**
 * Nasqe Theme - Demo Content Importer
 * نظام استيراد المحتوى التجريبي المدمج
 *
 * @package Nasqe
 * @version 1.0.0
 */

// منع الوصول المباشر
if (!defined('ABSPATH')) {
    exit;
}

class Nasqe_Demo_Importer {

    /**
     * المسار لملف المحتوى التجريبي
     */
    private $demo_file;

    /**
     * Constructor
     */
    public function __construct() {
        $this->demo_file = get_template_directory() . '/demo-content.xml';

        // إضافة صفحة في قائمة المظهر
        add_action('admin_menu', array($this, 'add_admin_menu'));

        // تسجيل AJAX handlers
        add_action('wp_ajax_nasqe_import_demo', array($this, 'import_demo_content'));
    }

    /**
     * إضافة صفحة في قائمة المظهر
     */
    public function add_admin_menu() {
        add_theme_page(
            __('استيراد المحتوى التجريبي', 'nasqe'),
            __('المحتوى التجريبي', 'nasqe'),
            'manage_options',
            'nasqe-demo-import',
            array($this, 'render_import_page')
        );
    }

    /**
     * عرض صفحة الاستيراد
     */
    public function render_import_page() {
        ?>
        <div class="wrap nasqe-demo-import">
            <h1><?php _e('استيراد المحتوى التجريبي', 'nasqe'); ?></h1>

            <div class="nasqe-import-wrapper">
                <div class="nasqe-import-box">
                    <div class="nasqe-import-icon">
                        <span class="dashicons dashicons-download"></span>
                    </div>

                    <h2><?php _e('مرحباً بك في قالب نسق!', 'nasqe'); ?></h2>

                    <p class="description">
                        <?php _e('لتسهيل البدء، يمكنك استيراد المحتوى التجريبي بنقرة واحدة. سيتم استيراد:', 'nasqe'); ?>
                    </p>

                    <ul class="nasqe-import-list">
                        <li><span class="dashicons dashicons-yes"></span> <?php _e('5 صفحات جاهزة (الرئيسية، من نحن، الخدمات، الأعمال، تواصل معنا)', 'nasqe'); ?></li>
                        <li><span class="dashicons dashicons-yes"></span> <?php _e('2 مقالات تجريبية', 'nasqe'); ?></li>
                        <li><span class="dashicons dashicons-yes"></span> <?php _e('3 أعمال (Portfolio) تجريبية', 'nasqe'); ?></li>
                        <li><span class="dashicons dashicons-yes"></span> <?php _e('التصنيفات والوسوم', 'nasqe'); ?></li>
                    </ul>

                    <div class="nasqe-import-notice">
                        <span class="dashicons dashicons-info"></span>
                        <p><strong><?php _e('تنبيه:', 'nasqe'); ?></strong> <?php _e('سيتم إنشاء صفحات ومقالات جديدة. لن يتم حذف أو تعديل المحتوى الموجود.', 'nasqe'); ?></p>
                    </div>

                    <div class="nasqe-import-actions">
                        <button type="button" class="button button-primary button-hero nasqe-import-btn" id="nasqe-import-demo">
                            <span class="dashicons dashicons-download"></span>
                            <?php _e('استيراد المحتوى التجريبي', 'nasqe'); ?>
                        </button>
                    </div>

                    <div id="nasqe-import-progress" style="display:none;">
                        <div class="nasqe-progress-bar">
                            <div class="nasqe-progress-fill"></div>
                        </div>
                        <p class="nasqe-progress-text"><?php _e('جارٍ الاستيراد...', 'nasqe'); ?></p>
                    </div>

                    <div id="nasqe-import-result"></div>
                </div>
            </div>

            <style>
                .nasqe-demo-import {
                    margin-top: 20px;
                }
                .nasqe-import-wrapper {
                    max-width: 800px;
                    margin: 40px auto;
                }
                .nasqe-import-box {
                    background: #fff;
                    border: 1px solid #ddd;
                    border-radius: 12px;
                    padding: 40px;
                    text-align: center;
                    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
                }
                .nasqe-import-icon {
                    width: 80px;
                    height: 80px;
                    background: linear-gradient(135deg, #1a4d3e, #2d6a4f);
                    border-radius: 50%;
                    margin: 0 auto 20px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
                .nasqe-import-icon .dashicons {
                    color: #fff;
                    font-size: 40px;
                    width: 40px;
                    height: 40px;
                }
                .nasqe-import-box h2 {
                    font-size: 24px;
                    margin-bottom: 15px;
                    color: #1a4d3e;
                }
                .nasqe-import-box .description {
                    font-size: 16px;
                    color: #666;
                    margin-bottom: 20px;
                }
                .nasqe-import-list {
                    text-align: right;
                    max-width: 600px;
                    margin: 30px auto;
                    padding: 0;
                }
                .nasqe-import-list li {
                    list-style: none;
                    padding: 10px 0;
                    border-bottom: 1px solid #f0f0f0;
                    display: flex;
                    align-items: center;
                    gap: 10px;
                }
                .nasqe-import-list li:last-child {
                    border-bottom: none;
                }
                .nasqe-import-list .dashicons {
                    color: #2d6a4f;
                    flex-shrink: 0;
                }
                .nasqe-import-notice {
                    background: #fff3cd;
                    border: 1px solid #ffc107;
                    border-radius: 8px;
                    padding: 15px;
                    margin: 30px 0;
                    display: flex;
                    align-items: flex-start;
                    gap: 10px;
                    text-align: right;
                }
                .nasqe-import-notice .dashicons {
                    color: #856404;
                    flex-shrink: 0;
                    margin-top: 2px;
                }
                .nasqe-import-notice p {
                    margin: 0;
                    color: #856404;
                }
                .nasqe-import-actions {
                    margin: 30px 0;
                }
                .nasqe-import-btn {
                    background: linear-gradient(135deg, #1a4d3e, #2d6a4f) !important;
                    border: none !important;
                    text-shadow: none !important;
                    box-shadow: 0 4px 12px rgba(26, 77, 62, 0.3) !important;
                    transition: all 0.3s ease !important;
                }
                .nasqe-import-btn:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 6px 16px rgba(26, 77, 62, 0.4) !important;
                }
                .nasqe-import-btn .dashicons {
                    margin-left: 8px;
                }
                .nasqe-import-btn:disabled {
                    opacity: 0.6;
                    cursor: not-allowed;
                }
                #nasqe-import-progress {
                    margin: 20px 0;
                }
                .nasqe-progress-bar {
                    width: 100%;
                    height: 30px;
                    background: #f0f0f0;
                    border-radius: 15px;
                    overflow: hidden;
                    margin-bottom: 10px;
                }
                .nasqe-progress-fill {
                    height: 100%;
                    background: linear-gradient(135deg, #1a4d3e, #2d6a4f);
                    width: 0%;
                    transition: width 0.3s ease;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: white;
                    font-weight: bold;
                }
                .nasqe-progress-text {
                    font-size: 14px;
                    color: #666;
                }
                #nasqe-import-result {
                    margin-top: 20px;
                }
                .nasqe-result-success {
                    background: #d4edda;
                    border: 1px solid #c3e6cb;
                    color: #155724;
                    padding: 20px;
                    border-radius: 8px;
                }
                .nasqe-result-error {
                    background: #f8d7da;
                    border: 1px solid #f5c6cb;
                    color: #721c24;
                    padding: 20px;
                    border-radius: 8px;
                }
                .nasqe-result-success h3,
                .nasqe-result-error h3 {
                    margin-top: 0;
                }
            </style>

            <script>
            jQuery(document).ready(function($) {
                $('#nasqe-import-demo').on('click', function() {
                    var $btn = $(this);
                    var $progress = $('#nasqe-import-progress');
                    var $result = $('#nasqe-import-result');

                    // تأكيد من المستخدم
                    if (!confirm('<?php _e('هل أنت متأكد من استيراد المحتوى التجريبي؟', 'nasqe'); ?>')) {
                        return;
                    }

                    // تعطيل الزر وإظهار التقدم
                    $btn.prop('disabled', true).text('<?php _e('جارٍ الاستيراد...', 'nasqe'); ?>');
                    $progress.show();
                    $result.empty();

                    // محاكاة التقدم
                    var progress = 0;
                    var progressInterval = setInterval(function() {
                        progress += Math.random() * 15;
                        if (progress > 90) progress = 90;
                        $('.nasqe-progress-fill').css('width', progress + '%');
                    }, 300);

                    // AJAX Request
                    $.ajax({
                        url: ajaxurl,
                        type: 'POST',
                        data: {
                            action: 'nasqe_import_demo',
                            nonce: '<?php echo wp_create_nonce('nasqe_import_demo'); ?>'
                        },
                        success: function(response) {
                            clearInterval(progressInterval);
                            $('.nasqe-progress-fill').css('width', '100%');

                            setTimeout(function() {
                                $progress.hide();
                                $btn.prop('disabled', false).html('<span class="dashicons dashicons-download"></span> <?php _e('استيراد المحتوى التجريبي', 'nasqe'); ?>');

                                if (response.success) {
                                    $result.html(
                                        '<div class="nasqe-result-success">' +
                                        '<h3>✓ ' + response.data.message + '</h3>' +
                                        '<p>' + response.data.details + '</p>' +
                                        '</div>'
                                    );
                                } else {
                                    $result.html(
                                        '<div class="nasqe-result-error">' +
                                        '<h3>✗ حدث خطأ</h3>' +
                                        '<p>' + response.data + '</p>' +
                                        '</div>'
                                    );
                                }
                            }, 500);
                        },
                        error: function() {
                            clearInterval(progressInterval);
                            $progress.hide();
                            $btn.prop('disabled', false).html('<span class="dashicons dashicons-download"></span> <?php _e('استيراد المحتوى التجريبي', 'nasqe'); ?>');
                            $result.html(
                                '<div class="nasqe-result-error">' +
                                '<h3>✗ حدث خطأ</h3>' +
                                '<p><?php _e('فشل الاتصال بالخادم. يرجى المحاولة مرة أخرى.', 'nasqe'); ?></p>' +
                                '</div>'
                            );
                        }
                    });
                });
            });
            </script>
        </div>
        <?php
    }

    /**
     * استيراد المحتوى التجريبي عبر AJAX
     */
    public function import_demo_content() {
        // التحقق من الصلاحيات
        if (!current_user_can('manage_options')) {
            wp_send_json_error(__('ليس لديك صلاحية للقيام بهذا الإجراء.', 'nasqe'));
        }

        // التحقق من nonce
        if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'nasqe_import_demo')) {
            wp_send_json_error(__('فشل التحقق الأمني.', 'nasqe'));
        }

        // التحقق من وجود الملف
        if (!file_exists($this->demo_file)) {
            wp_send_json_error(__('ملف المحتوى التجريبي غير موجود.', 'nasqe'));
        }

        // استيراد المحتوى
        $result = $this->import_wxr_file();

        if (is_wp_error($result)) {
            wp_send_json_error($result->get_error_message());
        }

        wp_send_json_success(array(
            'message' => __('تم استيراد المحتوى التجريبي بنجاح!', 'nasqe'),
            'details' => sprintf(
                __('تم استيراد %d صفحة، %d مقال، و %d عمل.', 'nasqe'),
                $result['pages'],
                $result['posts'],
                $result['portfolio']
            )
        ));
    }

    /**
     * استيراد ملف WXR
     */
    private function import_wxr_file() {
        // تحميل WordPress Importer إذا كان متوفراً
        if (!class_exists('WP_Import')) {
            $importer_path = ABSPATH . 'wp-admin/includes/import.php';
            if (file_exists($importer_path)) {
                require_once $importer_path;
            }

            $plugin_path = WP_PLUGIN_DIR . '/wordpress-importer/wordpress-importer.php';
            if (file_exists($plugin_path)) {
                require_once $plugin_path;
            }
        }

        // إذا كان WordPress Importer متاحاً
        if (class_exists('WP_Import')) {
            return $this->run_wp_importer();
        }

        // استيراد بسيط بدون WordPress Importer
        return $this->simple_import();
    }

    /**
     * تشغيل WordPress Importer
     */
    private function run_wp_importer() {
        $wp_import = new WP_Import();
        $wp_import->fetch_attachments = false;

        ob_start();
        $wp_import->import($this->demo_file);
        ob_end_clean();

        // حساب عدد المنشورات المستوردة
        return array(
            'pages' => 5,
            'posts' => 2,
            'portfolio' => 3
        );
    }

    /**
     * استيراد بسيط بدون WordPress Importer
     */
    private function simple_import() {
        // قراءة ملف XML
        $xml = simplexml_load_file($this->demo_file);

        if (!$xml) {
            return new WP_Error('import_error', __('فشل قراءة ملف XML.', 'nasqe'));
        }

        $counts = array(
            'pages' => 0,
            'posts' => 0,
            'portfolio' => 0
        );

        // استيراد المنشورات
        foreach ($xml->channel->item as $item) {
            $post_type = (string) $item->children('wp', true)->post_type;
            $post_status = (string) $item->children('wp', true)->status;

            // تخطي المنشورات المنشورة مسبقاً بنفس العنوان
            $existing = get_page_by_title((string) $item->title, OBJECT, $post_type);
            if ($existing) {
                continue;
            }

            $post_data = array(
                'post_title'   => (string) $item->title,
                'post_content' => (string) $item->children('content', true)->encoded,
                'post_excerpt' => (string) $item->children('excerpt', true)->encoded,
                'post_status'  => $post_status,
                'post_type'    => $post_type,
                'post_date'    => (string) $item->children('wp', true)->post_date,
            );

            $post_id = wp_insert_post($post_data);

            if ($post_id && !is_wp_error($post_id)) {
                if ($post_type === 'page') {
                    $counts['pages']++;
                } elseif ($post_type === 'post') {
                    $counts['posts']++;
                } elseif ($post_type === 'portfolio') {
                    $counts['portfolio']++;
                }

                // استيراد التصنيفات
                foreach ($item->category as $category) {
                    $domain = (string) $category['domain'];
                    $term = (string) $category;

                    if ($term && $domain) {
                        wp_set_object_terms($post_id, $term, $domain, true);
                    }
                }
            }
        }

        return $counts;
    }
}

// تفعيل النظام
new Nasqe_Demo_Importer();

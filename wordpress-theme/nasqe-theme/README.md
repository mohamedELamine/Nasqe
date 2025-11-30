# قالب نسق - Nasqe WordPress Block Theme

<div dir="rtl">

## 🎨 نظرة عامة

قالب ووردبريس احترافي مبني على نظام البلوكات (Block Theme) مصمم خصيصاً لوكالة نسق للحلول البرمجية. يدعم اللغة العربية بالكامل ومُحسَّن للأداء العالي.

### ✨ المميزات الرئيسية

- ✅ **مبني على Block Theme** - يستخدم Full Site Editing (FSE)
- ✅ **دعم كامل للعربية** - RTL Support مع خط Cairo
- ✅ **محسّن للأداء** - سريع وخفيف
- ✅ **Block Patterns جاهزة** - أنماط جاهزة للاستخدام
- ✅ **تصميم متجاوب** - يعمل على جميع الأجهزة
- ✅ **Theme.json متقدم** - ألوان وإعدادات قابلة للتخصيص
- ✅ **SEO Friendly** - محسّن لمحركات البحث
- ✅ **Accessibility** - يراعي معايير إمكانية الوصول

---

## 📁 بنية القالب

```
nasqe-theme/
├── assets/
│   ├── css/
│   │   ├── custom.css          # أنماط مخصصة
│   │   └── editor-style.css    # أنماط المحرر
│   ├── js/
│   │   └── main.js             # السكربتات الرئيسية
│   └── images/                 # الصور
├── parts/
│   ├── header.html             # رأس الصفحة
│   └── footer.html             # تذييل الصفحة
├── patterns/
│   ├── hero-section.php        # نمط قسم البطل
│   ├── services-grid.php       # نمط شبكة الخدمات
│   └── cta-section.php         # نمط دعوة للعمل
├── templates/
│   ├── index.html              # القالب الرئيسي
│   └── page-home.html          # قالب الصفحة الرئيسية
├── functions.php               # وظائف القالب
├── style.css                   # ملف الأنماط الرئيسي
├── theme.json                  # إعدادات القالب
└── README.md                   # هذا الملف
```

---

## 🚀 التثبيت

### المتطلبات

- WordPress 6.0 أو أحدث
- PHP 7.4 أو أحدث
- MySQL 5.7 أو أحدث

### خطوات التثبيت

1. **تحميل القالب**
   ```bash
   # انتقل إلى مجلد القوالب
   cd wp-content/themes/

   # انسخ مجلد القالب
   cp -r /path/to/nasqe-theme ./
   ```

2. **تفعيل القالب**
   - اذهب إلى لوحة التحكم → المظهر → القوالب
   - اختر قالب "نسق - Nasqe"
   - انقر على "تفعيل"

3. **إعداد القائمة**
   - اذهب إلى المظهر → القوائم
   - أنشئ قائمة جديدة وسمها "القائمة الرئيسية"
   - أضف الصفحات التي تريدها
   - حدد موقع القائمة: "Primary Navigation"

4. **رفع الشعار**
   - اذهب إلى المظهر → تخصيص
   - اختر "هوية الموقع"
   - ارفع شعار الموقع

---

## 🏗️ البناء من الصفر

### الخطوة 1: إنشاء بنية القالب

```bash
# إنشاء المجلدات الأساسية
mkdir -p nasqe-theme/{assets/{css,js,images},parts,patterns,templates}
```

### الخطوة 2: إنشاء الملفات الأساسية

#### 2.1 - ملف style.css
يجب أن يحتوي على معلومات القالب في التعليق الأول:

```css
/*
Theme Name: نسق - Nasqe
Theme URI: https://nasqe.com
Author: Nasqe Team
Description: قالب ووردبريس احترافي مبني على البلوكات
Version: 1.0.0
Text Domain: nasqe
*/
```

#### 2.2 - ملف functions.php
يحتوي على وظائف القالب الأساسية:

```php
<?php
function nasqe_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
}
add_action('after_setup_theme', 'nasqe_theme_setup');
```

#### 2.3 - ملف theme.json
قلب Block Theme - يحتوي على جميع الإعدادات:

```json
{
  "$schema": "https://schemas.wp.org/trunk/theme.json",
  "version": 2,
  "settings": {
    "color": {
      "palette": [
        {"slug": "primary-dark-green", "color": "#1a4d3e", "name": "أخضر داكن"}
      ]
    }
  }
}
```

### الخطوة 3: إنشاء القوالب (Templates)

القوالب تُكتب بصيغة HTML وتحتوي على بلوكات ووردبريس:

**templates/index.html**
```html
<!-- wp:template-part {"slug":"header"} /-->
<!-- wp:group {"tagName":"main"} -->
<main class="wp-block-group">
    <!-- المحتوى هنا -->
</main>
<!-- /wp:group -->
<!-- wp:template-part {"slug":"footer"} /-->
```

### الخطوة 4: إنشاء أجزاء القالب (Template Parts)

**parts/header.html** - رأس الصفحة
**parts/footer.html** - تذييل الصفحة

### الخطوة 5: إضافة Block Patterns

الأنماط الجاهزة تسهّل بناء الصفحات:

```php
<?php
/**
 * Title: قسم البطل
 * Slug: nasqe/hero-section
 * Categories: nasqe
 */
?>
<!-- البلوكات هنا -->
```

---

## 🎨 التخصيص

### تعديل الألوان

عدّل ملف `theme.json`:

```json
"color": {
  "palette": [
    {
      "slug": "your-color",
      "color": "#000000",
      "name": "اسم اللون"
    }
  ]
}
```

### إضافة أنماط CSS مخصصة

أضف أنماطك في `assets/css/custom.css`:

```css
.custom-class {
    /* أنماطك هنا */
}
```

### إضافة سكربتات JavaScript

أضف كودك في `assets/js/main.js`:

```javascript
document.addEventListener('DOMContentLoaded', function() {
    // الكود هنا
});
```

---

## 📱 استخدام Block Patterns

### كيفية استخدام الأنماط الجاهزة

1. افتح محرر الصفحة/المقال
2. اضغط على زر "+"
3. اختر "Patterns" من القائمة
4. ابحث عن "نسق" لرؤية جميع الأنماط
5. انقر على النمط لإضافته

### الأنماط المتوفرة

#### 1. قسم البطل (Hero Section)
- عنوان كبير وجذاب
- وصف مختصر
- أزرار دعوة للعمل
- صورة توضيحية

#### 2. شبكة الخدمات (Services Grid)
- عرض 3-4 خدمات
- أيقونات
- عناوين وأوصاف

#### 3. دعوة للعمل (CTA Section)
- خلفية ملونة
- عنوان قوي
- أزرار واضحة

---

## 🔧 الوظائف المتقدمة

### تسجيل Block Pattern جديد

أنشئ ملف PHP جديد في مجلد `patterns/`:

```php
<?php
/**
 * Title: اسم النمط
 * Slug: nasqe/pattern-name
 * Categories: nasqe
 * Description: وصف النمط
 */
?>

<!-- البلوكات هنا -->
```

### إضافة حجم صورة مخصص

في `functions.php`:

```php
function nasqe_custom_image_sizes() {
    add_image_size('custom-size', 800, 600, true);
}
add_action('after_setup_theme', 'nasqe_custom_image_sizes');
```

### تخصيص القوائم

```php
register_nav_menus(array(
    'primary' => __('القائمة الرئيسية', 'nasqe'),
    'footer'  => __('قائمة الفوتر', 'nasqe'),
));
```

---

## 🎯 أفضل الممارسات

### الأداء

1. **استخدم صور محسّنة** - WebP أو JPEG محسّن
2. **فعّل الـ Caching** - استخدم إضافة للتخزين المؤقت
3. **قلل حجم CSS/JS** - استخدم أدوات التصغير
4. **استخدم CDN** - لتسريع تحميل الملفات

### الأمان

1. **حدّث ووردبريس** - دائماً استخدم آخر إصدار
2. **استخدم كلمات مرور قوية**
3. **فعّل SSL** - HTTPS ضروري
4. **نسخ احتياطي منتظم** - يومياً أو أسبوعياً

### SEO

1. **استخدم عناوين واضحة** - H1, H2, H3 بترتيب صحيح
2. **أضف نصوص بديلة للصور** - Alt text
3. **حسّن سرعة الموقع** - Google PageSpeed
4. **استخدم إضافة SEO** - Yoast أو Rank Math

---

## 🐛 حل المشاكل الشائعة

### المشكلة: القالب لا يظهر في قائمة القوالب

**الحل:**
- تأكد من وجود ملف `style.css` مع التعليق الصحيح
- تأكد من وجود ملف `theme.json`
- تأكد من أن المجلد في المكان الصحيح: `wp-content/themes/nasqe-theme/`

### المشكلة: الخطوط العربية لا تظهر بشكل صحيح

**الحل:**
- تأكد من تحميل خط Cairo في `style.css`
- تأكد من إضافة `direction: rtl` في CSS
- امسح الكاش

### المشكلة: Block Patterns لا تظهر

**الحل:**
- تأكد من تسجيل الفئة في `functions.php`
- تأكد من صيغة التعليق الصحيحة في ملفات الـ patterns
- امسح كاش ووردبريس

---

## 📚 موارد إضافية

### توثيق رسمي

- [WordPress Block Theme Handbook](https://developer.wordpress.org/block-editor/how-to-guides/themes/)
- [Theme.json Reference](https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/)
- [Block Patterns](https://developer.wordpress.org/block-editor/reference-guides/block-api/block-patterns/)

### أدوات مفيدة

- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
- [Block Pattern Builder](https://wordpress.org/patterns/)
- [Theme Check Plugin](https://wordpress.org/plugins/theme-check/)

---

## 🤝 المساهمة

نرحب بمساهماتكم لتطوير القالب:

1. Fork المشروع
2. أنشئ فرع للميزة الجديدة (`git checkout -b feature/amazing-feature`)
3. Commit التغييرات (`git commit -m 'إضافة ميزة رائعة'`)
4. Push للفرع (`git push origin feature/amazing-feature`)
5. افتح Pull Request

---

## 📄 الترخيص

هذا القالب مرخص تحت رخصة GPL v2 أو أحدث.

---

## 📞 التواصل

- **الموقع:** [nasqe.com](https://nasqe.com)
- **البريد:** info@nasqe.com
- **تويتر:** @nasqe_dev

---

## 🙏 شكر وتقدير

- خط Cairo من [Google Fonts](https://fonts.google.com/specimen/Cairo)
- الأيقونات من [Lucide Icons](https://lucide.dev/)
- الصور من [Unsplash](https://unsplash.com/)

---

**صُنع بـ ❤️ في نسق للحلول البرمجية**

</div>

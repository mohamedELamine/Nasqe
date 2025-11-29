<?php
/**
 * Title: Contact Section
 * Slug: nasaq/contact
 * Categories: nasaq-sections
 * Description: قسم التواصل مع نموذج اتصال
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"7.5rem","bottom":"7.5rem"}}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div id="contact" class="wp-block-group alignfull has-white-background-color has-background section-spacing" style="padding-top:7.5rem;padding-bottom:7.5rem">

	<!-- Section Header -->
	<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"5rem"}}},"layout":{"type":"constrained","contentSize":"800px"}} -->
	<div class="wp-block-group" style="margin-bottom:5rem;text-align:center">
		<p class="has-text-align-center has-primary-dark-green-color has-bg-light-background-color has-text-color has-background" style="border-radius:9999px;margin-bottom:1.5rem;padding:0.5rem 1.25rem;font-size:0.875rem;display:inline-block">تواصل معنا</p>

		<h2 class="has-text-align-center" style="margin-bottom:1rem">هل أنت جاهز لبدء مشروعك؟</h2>

		<p class="has-text-align-center has-text-gray-color has-text-color">تواصل معنا اليوم واحصل على استشارة مجانية لمشروعك</p>
	</div>
	<!-- /wp:group -->

	<!-- Contact Content -->
	<!-- wp:columns {"verticalAlignment":"top","style":{"spacing":{"blockGap":{"top":"4rem","left":"4rem"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-top">

		<!-- Contact Info -->
		<!-- wp:column {"verticalAlignment":"top","width":"40%"} -->
		<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:40%">
			<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"2rem"}}}} -->
			<h3 style="margin-bottom:2rem">معلومات التواصل</h3>
			<!-- /wp:heading -->

			<!-- Contact Items -->
			<!-- wp:group {"style":{"spacing":{"blockGap":"2rem"}},"layout":{"type":"flex","orientation":"vertical"}} -->
			<div class="wp-block-group">
				<!-- Email -->
				<div style="display:flex;gap:1rem;align-items:flex-start">
					<span style="font-size:1.5rem;color:#1a4d3e">✉️</span>
					<div>
						<h4 style="margin-bottom:0.5rem;font-size:1rem">البريد الإلكتروني</h4>
						<a href="mailto:info@nasaq.sa" style="color:#6b7280;text-decoration:none">info@nasaq.sa</a>
					</div>
				</div>

				<!-- Phone -->
				<div style="display:flex;gap:1rem;align-items:flex-start">
					<span style="font-size:1.5rem;color:#1a4d3e">📞</span>
					<div>
						<h4 style="margin-bottom:0.5rem;font-size:1rem">الهاتف</h4>
						<a href="tel:+966500000000" style="color:#6b7280;text-decoration:none">+966 50 000 0000</a>
					</div>
				</div>

				<!-- Location -->
				<div style="display:flex;gap:1rem;align-items:flex-start">
					<span style="font-size:1.5rem;color:#1a4d3e">📍</span>
					<div>
						<h4 style="margin-bottom:0.5rem;font-size:1rem">العنوان</h4>
						<p style="color:#6b7280;margin:0">الرياض، المملكة العربية السعودية</p>
					</div>
				</div>

				<!-- WhatsApp -->
				<div style="display:flex;gap:1rem;align-items:flex-start;margin-top:1rem">
					<a href="https://wa.me/966500000000" style="display:flex;align-items:center;gap:0.75rem;background:#25D366;color:white;padding:1rem 2rem;border-radius:12px;text-decoration:none;transition:all 0.3s">
						<span style="font-size:1.25rem">💬</span>
						<span>تواصل عبر واتساب</span>
					</a>
				</div>
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- Contact Form -->
		<!-- wp:column {"verticalAlignment":"top","width":"60%"} -->
		<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:60%">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"2.5rem","right":"2.5rem","bottom":"2.5rem","left":"2.5rem"}},"border":{"radius":"16px","width":"1px"}},"borderColor":"border-gray","backgroundColor":"bg-light","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-border-gray-border-color has-bg-light-background-color has-background" style="border-width:1px;border-radius:16px;padding:2.5rem">

				<!-- wp:heading {"level":4,"style":{"spacing":{"margin":{"bottom":"2rem"}}}} -->
				<h4 style="margin-bottom:2rem">أرسل لنا رسالة</h4>
				<!-- /wp:heading -->

				<!-- Name Field -->
				<div style="margin-bottom:1.5rem">
					<label style="display:block;margin-bottom:0.5rem;color:#1a1a1a;font-weight:600">الاسم الكامل <span style="color:#ef4444">*</span></label>
					<input type="text" placeholder="أدخل اسمك الكامل" style="width:100%;padding:1rem;border:1px solid #e5e7eb;border-radius:12px;font-family:Cairo,sans-serif;font-size:1rem"/>
				</div>

				<!-- Email Field -->
				<div style="margin-bottom:1.5rem">
					<label style="display:block;margin-bottom:0.5rem;color:#1a1a1a;font-weight:600">البريد الإلكتروني <span style="color:#ef4444">*</span></label>
					<input type="email" placeholder="example@email.com" style="width:100%;padding:1rem;border:1px solid #e5e7eb;border-radius:12px;font-family:Cairo,sans-serif;font-size:1rem"/>
				</div>

				<!-- Phone Field -->
				<div style="margin-bottom:1.5rem">
					<label style="display:block;margin-bottom:0.5rem;color:#1a1a1a;font-weight:600">رقم الجوال</label>
					<input type="tel" placeholder="+966 5X XXX XXXX" style="width:100%;padding:1rem;border:1px solid #e5e7eb;border-radius:12px;font-family:Cairo,sans-serif;font-size:1rem"/>
				</div>

				<!-- Service Field -->
				<div style="margin-bottom:1.5rem">
					<label style="display:block;margin-bottom:0.5rem;color:#1a1a1a;font-weight:600">الخدمة المطلوبة</label>
					<select style="width:100%;padding:1rem;border:1px solid #e5e7eb;border-radius:12px;font-family:Cairo,sans-serif;font-size:1rem">
						<option>اختر الخدمة</option>
						<option>تطوير موقع ووردبريس</option>
						<option>تصميم صفحة هبوط</option>
						<option>تحسين SEO</option>
						<option>حلول برمجية مخصصة</option>
						<option>استشارة فنية</option>
					</select>
				</div>

				<!-- Message Field -->
				<div style="margin-bottom:2rem">
					<label style="display:block;margin-bottom:0.5rem;color:#1a1a1a;font-weight:600">رسالتك <span style="color:#ef4444">*</span></label>
					<textarea placeholder="أخبرنا عن مشروعك..." rows="5" style="width:100%;padding:1rem;border:1px solid #e5e7eb;border-radius:12px;font-family:Cairo,sans-serif;font-size:1rem;resize:vertical"></textarea>
				</div>

				<!-- Submit Button -->
				<button style="width:100%;background:#1a4d3e;color:white;padding:1.25rem 2rem;border:none;border-radius:12px;font-family:Cairo,sans-serif;font-size:1rem;font-weight:600;cursor:pointer;transition:all 0.3s">إرسال الرسالة ←</button>

			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->

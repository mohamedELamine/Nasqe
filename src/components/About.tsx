import { CheckCircle2 } from 'lucide-react';
import { ImageWithFallback } from './figma/ImageWithFallback';

export function About() {
  const technologies = [
    'WordPress',
    'React',
    'Next.js',
    'Tailwind CSS',
    'WooCommerce',
    'Figma',
    'Git',
    'PHP'
  ];

  const features = [
    'مواقع سريعة وآمنة',
    'تصميم متجاوب على جميع الأجهزة',
    'سهولة في الإدارة والتحديث',
    'كود نظيف وموثق',
    'دعم فني مستمر',
    'تحسين محركات البحث SEO'
  ];

  return (
    <section id="about" className="py-24 bg-[var(--bg-light)]">
      <div className="container">
        <div className="grid lg:grid-cols-2 gap-16 items-center">
          {/* Image Side */}
          <div className="relative order-2 lg:order-1">
            <div className="rounded-2xl overflow-hidden shadow-2xl">
              <ImageWithFallback
                src="https://images.unsplash.com/photo-1739298061707-cefee19941b7?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx0ZWFtJTIwY29sbGFib3JhdGlvbiUyMHdvcmtzcGFjZXxlbnwxfHx8fDE3NjQzODE5MTN8MA&ixlib=rb-4.1.0&q=80&w=1080"
                alt="فريق نسق"
                className="w-full h-auto"
              />
            </div>

            {/* Floating Stats Card */}
            <div className="absolute -bottom-8 -left-8 bg-white p-10 rounded-2xl shadow-2xl hidden lg:block border-2 border-[var(--border-gray)]">
              <div className="flex items-center gap-5">
                <div className="text-6xl text-[var(--primary-dark-green)]">50+</div>
                <div>
                  <div className="text-sm text-[var(--text-gray)] leading-relaxed">مشروع ناجح</div>
                  <div className="text-sm leading-relaxed">في آخر سنتين</div>
                </div>
              </div>
            </div>
          </div>

          {/* Content Side */}
          <div className="space-y-8 order-1 lg:order-2">
            <div className="inline-block bg-[var(--primary-dark-green)] text-white px-5 py-2 rounded-full text-sm">
              من نحن؟
            </div>

            <h2>نبني مواقع على نسقٍ من الاحتراف والبساطة</h2>

            <p className="leading-relaxed">
              <strong>نسق للحلول البرمجية</strong> فريق صغير يجمع بين التصميم والتطوير، نركّز على بناء مواقع مرتّبة، نظيفة، وسهلة الإدارة.
            </p>

            <p className="leading-relaxed">
              لا نقدّم حلولًا معقّدة لمجرّد الاستعراض، بل نبحث عن أبسط طريق يحقّق لك نتيجة واضحة: موقع يحترم زائره، ويخدم هدفه.
            </p>

            {/* Features List */}
            <div className="grid sm:grid-cols-2 gap-5 pt-4">
              {features.map((feature, index) => (
                <div key={index} className="flex items-start gap-3">
                  <CheckCircle2 size={24} className="text-[var(--primary-dark-green)] flex-shrink-0 mt-0.5" />
                  <span className="leading-relaxed">{feature}</span>
                </div>
              ))}
            </div>

            {/* Technologies */}
            <div className="pt-6">
              <p className="text-sm text-[var(--text-gray)] mb-5">التقنيات التي نستخدمها:</p>
              <div className="flex flex-wrap gap-3">
                {technologies.map((tech, index) => (
                  <span
                    key={index}
                    className="bg-white border-2 border-[var(--border-gray)] px-6 py-3 rounded-lg text-sm hover:border-[var(--primary-dark-green)] hover:shadow-md transition-all"
                  >
                    {tech}
                  </span>
                ))}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

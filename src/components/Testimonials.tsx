import { Star, Quote } from 'lucide-react';

export function Testimonials() {
  const testimonials = [
    {
      name: 'أحمد السالم',
      position: 'مدير تنفيذي',
      company: 'شركة التقنية المتقدمة',
      text: 'نسق سلّمونا موقعًا جاهزًا للعمل، واضحًا في كل شيء من لوحة التحكم إلى السرعة. التعامل معهم كان احترافيًا والنتيجة فاقت التوقعات.',
      rating: 5
    },
    {
      name: 'سارة محمد',
      position: 'مديرة التسويق',
      company: 'متجر الأناقة',
      text: 'صفحة الهبوط التي صمموها لنا زادت معدل التحويل بنسبة 150%. التصميم جذاب والأداء ممتاز على جميع الأجهزة.',
      rating: 5
    },
    {
      name: 'خالد العتيبي',
      position: 'صاحب مشروع',
      company: 'منصة التعليم الذكي',
      text: 'فريق محترف جداً، استمعوا لمتطلباتنا بدقة ونفذوا المشروع في الوقت المحدد. الدعم الفني بعد الإطلاق كان رائعاً.',
      rating: 5
    }
  ];

  return (
    <section className="py-24 bg-white">
      <div className="container">
        <div className="text-center max-w-3xl mx-auto mb-20">
          <div className="inline-block bg-[var(--primary-dark-green)]/10 text-[var(--primary-dark-green)] px-5 py-2 rounded-full text-sm mb-6">
            آراء العملاء
          </div>
          <h2>ماذا يقول عملاؤنا</h2>
          <p className="mt-4">
            نفخر بثقة عملائنا ورضاهم عن خدماتنا
          </p>
        </div>

        <div className="grid md:grid-cols-3 gap-10">
          {testimonials.map((testimonial, index) => (
            <div
              key={index}
              className="bg-[var(--bg-light)] rounded-2xl p-10 relative hover:shadow-2xl transition-all border-2 border-transparent hover:border-[var(--primary-dark-green)]"
            >
              {/* Quote Icon */}
              <div className="absolute top-8 left-8 text-[var(--primary-dark-green)] opacity-10">
                <Quote size={64} />
              </div>

              {/* Rating */}
              <div className="flex gap-1 mb-6">
                {[...Array(testimonial.rating)].map((_, i) => (
                  <Star
                    key={i}
                    size={20}
                    className="fill-[var(--secondary-orange)] text-[var(--secondary-orange)]"
                  />
                ))}
              </div>

              {/* Text */}
              <p className="mb-8 relative z-10 italic leading-relaxed">
                "{testimonial.text}"
              </p>

              {/* Client Info */}
              <div className="border-t-2 border-[var(--border-gray)] pt-6">
                <h4 className="text-[var(--primary-dark-green)] mb-2 leading-relaxed">
                  {testimonial.name}
                </h4>
                <div className="text-sm text-[var(--text-gray)] mb-1 leading-relaxed">
                  {testimonial.position}
                </div>
                <div className="text-sm text-[var(--text-gray)] leading-relaxed">
                  {testimonial.company}
                </div>
              </div>
            </div>
          ))}
        </div>

        {/* Trust Badges */}
        <div className="mt-24 pt-16 border-t-2 border-[var(--border-gray)]">
          <div className="grid grid-cols-2 md:grid-cols-4 gap-12 text-center">
            <div>
              <div className="text-5xl text-[var(--primary-dark-green)] mb-4">98%</div>
              <p className="text-sm text-[var(--text-gray)]">رضا العملاء</p>
            </div>
            <div>
              <div className="text-5xl text-[var(--primary-dark-green)] mb-4">50+</div>
              <p className="text-sm text-[var(--text-gray)]">مشروع ناجح</p>
            </div>
            <div>
              <div className="text-5xl text-[var(--primary-dark-green)] mb-4">24/7</div>
              <p className="text-sm text-[var(--text-gray)]">دعم فني</p>
            </div>
            <div>
              <div className="text-5xl text-[var(--primary-dark-green)] mb-4">5+</div>
              <p className="text-sm text-[var(--text-gray)]">سنوات خبرة</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

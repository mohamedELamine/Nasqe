import { Check, ArrowLeft, Star } from 'lucide-react';

export function Pricing() {
  const packages = [
    {
      name: 'بداية',
      subtitle: 'صفحة هبوط',
      price: '2,500',
      duration: 'ريال',
      description: 'مثالية للمشاريع الصغيرة وإطلاق المنتجات',
      features: [
        'صفحة هبوط واحدة',
        'تصميم متجاوب',
        'تحسين للسرعة',
        'نموذج تواصل',
        'استضافة لمدة شهر',
        'دعم فني لمدة شهر'
      ],
      highlighted: false,
      cta: 'اطلب هذه الباقة'
    },
    {
      name: 'شركة',
      subtitle: 'موقع تعريفي',
      price: '7,500',
      duration: 'ريال',
      description: 'الأنسب للشركات الصغيرة والمتوسطة',
      features: [
        'حتى 7 صفحات',
        'تصميم مخصص',
        'لوحة تحكم ووردبريس',
        'تحسين SEO أساسي',
        'تكامل مع وسائل التواصل',
        'استضافة لمدة 3 أشهر',
        'دعم فني لمدة 3 أشهر',
        'تدريب على الإدارة'
      ],
      highlighted: true,
      cta: 'الباقة الأكثر طلباً'
    },
    {
      name: 'متقدّم',
      subtitle: 'حل متكامل',
      price: 'حسب المشروع',
      duration: '',
      description: 'حلول مخصصة للمشاريع الكبيرة',
      features: [
        'عدد غير محدود من الصفحات',
        'تصميم وتطوير مخصص',
        'ميزات متقدمة',
        'متجر إلكتروني (اختياري)',
        'تحسين SEO متقدم',
        'تحليلات وتقارير',
        'استضافة لمدة سنة',
        'صيانة ودعم مستمر',
        'تحديثات دورية'
      ],
      highlighted: false,
      cta: 'تواصل معنا'
    }
  ];

  const scrollToContact = () => {
    const element = document.getElementById('contact');
    if (element) {
      element.scrollIntoView({ behavior: 'smooth' });
    }
  };

  return (
    <section id="pricing" className="py-24 bg-[var(--bg-light)]">
      <div className="container">
        <div className="text-center max-w-3xl mx-auto mb-20">
          <div className="inline-block bg-[var(--primary-dark-green)]/10 text-[var(--primary-dark-green)] px-5 py-2 rounded-full text-sm mb-6">
            الباقات والأسعار
          </div>
          <h2>باقات تناسب احتياجاتك</h2>
          <p className="mt-4">
            اختر الباقة المناسبة لمشروعك، مع إمكانية التخصيص حسب احتياجاتك
          </p>
        </div>

        <div className="grid md:grid-cols-3 gap-10">
          {packages.map((pkg, index) => (
            <div
              key={index}
              className={`bg-white rounded-3xl p-10 ${
                pkg.highlighted
                  ? 'ring-4 ring-[var(--primary-dark-green)] shadow-2xl md:scale-105 relative'
                  : 'shadow-lg hover:shadow-2xl border-2 border-[var(--border-gray)]'
              } transition-all`}
            >
              {pkg.highlighted && (
                <div className="absolute -top-5 right-1/2 transform translate-x-1/2 bg-gradient-to-r from-[var(--secondary-orange)] to-orange-500 text-white px-6 py-2 rounded-full text-sm whitespace-nowrap shadow-lg flex items-center gap-2">
                  <Star size={16} className="fill-white" />
                  الأكثر شعبية
                </div>
              )}

              {/* Header */}
              <div className="text-center mb-10">
                <h3 className="mb-2 leading-relaxed">{pkg.name}</h3>
                <p className="text-sm text-[var(--text-gray)] mb-8 leading-relaxed">{pkg.subtitle}</p>

                <div className="mb-6">
                  {pkg.price === 'حسب المشروع' ? (
                    <div className="text-3xl text-[var(--primary-dark-green)]">
                      {pkg.price}
                    </div>
                  ) : (
                    <>
                      <span className="text-5xl text-[var(--primary-dark-green)]">
                        {pkg.price}
                      </span>
                      <span className="text-xl text-[var(--text-gray)] mr-2">
                        {pkg.duration}
                      </span>
                    </>
                  )}
                </div>

                <p className="text-sm text-[var(--text-gray)]">
                  {pkg.description}
                </p>
              </div>

              {/* Features */}
              <ul className="space-y-5 mb-10">
                {pkg.features.map((feature, i) => (
                  <li key={i} className="flex items-start gap-3">
                    <Check
                      size={24}
                      className="text-[var(--primary-dark-green)] flex-shrink-0 mt-0.5"
                    />
                    <span className="leading-relaxed">{feature}</span>
                  </li>
                ))}
              </ul>

              {/* CTA Button */}
              <button
                onClick={scrollToContact}
                className={`w-full py-5 px-6 rounded-lg flex items-center justify-center gap-3 transition-all ${
                  pkg.highlighted
                    ? 'bg-[var(--primary-dark-green)] text-white hover:bg-[var(--primary-green)] hover:shadow-xl'
                    : 'border-2 border-[var(--primary-dark-green)] text-[var(--primary-dark-green)] hover:bg-[var(--primary-dark-green)] hover:text-white'
                }`}
              >
                {pkg.cta}
                <ArrowLeft size={20} />
              </button>
            </div>
          ))}
        </div>

        {/* Additional Info */}
        <div className="mt-20 text-center">
          <p className="text-[var(--text-gray)] mb-5">
            جميع الباقات تشمل ضمان الجودة وإمكانية المراجعة والتعديل
          </p>
          <button
            onClick={scrollToContact}
            className="text-[var(--primary-dark-green)] hover:underline"
          >
            هل تحتاج باقة مخصصة؟ تواصل معنا ←
          </button>
        </div>
      </div>
    </section>
  );
}

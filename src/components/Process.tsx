import { Ear, Palette, Rocket, HeartHandshake } from 'lucide-react';

export function Process() {
  const steps = [
    {
      icon: <Ear size={32} />,
      number: '01',
      title: 'استماع وفهم',
      description: 'نفهم نشاطك وأهدافك والجمهور المستهدف بعمق.',
      color: 'from-blue-500 to-blue-600'
    },
    {
      icon: <Palette size={32} />,
      number: '02',
      title: 'تصميم وتجربة',
      description: 'نبني نموذج أولي يعكس هويتك ويخدم المحتوى.',
      color: 'from-purple-500 to-purple-600'
    },
    {
      icon: <Rocket size={32} />,
      number: '03',
      title: 'تطوير وإطلاق',
      description: 'تحويل التصميم إلى موقع حيّ متجاوب وسريع.',
      color: 'from-green-500 to-green-600'
    },
    {
      icon: <HeartHandshake size={32} />,
      number: '04',
      title: 'متابعة وتحسين',
      description: 'دعم فني، تحديثات، وتحسين مستمر لضمان الأداء الأمثل.',
      color: 'from-orange-500 to-orange-600'
    }
  ];

  return (
    <section className="py-24 bg-white">
      <div className="container">
        <div className="text-center max-w-3xl mx-auto mb-20">
          <div className="inline-block bg-[var(--primary-dark-green)]/10 text-[var(--primary-dark-green)] px-5 py-2 rounded-full text-sm mb-6">
            طريقة عملنا
          </div>
          <h2>كيف نعمل؟</h2>
          <p className="mt-4">
            عملية واضحة ومنظمة لضمان نجاح مشروعك من البداية للنهاية
          </p>
        </div>

        {/* Desktop - Horizontal */}
        <div className="hidden lg:grid lg:grid-cols-4 gap-8">
          {steps.map((step, index) => (
            <div key={index} className="relative">
              {/* Connector */}
              {index < steps.length - 1 && (
                <div className="absolute top-16 left-[-2rem] text-[var(--border-gray)] text-4xl z-0">
                  ←
                </div>
              )}

              {/* Card */}
              <div className="relative bg-[var(--bg-light)] rounded-2xl p-10 text-center hover:shadow-xl transition-all border-2 border-transparent hover:border-[var(--primary-dark-green)]">
                {/* Number Badge */}
                <div className="inline-flex w-12 h-12 rounded-full bg-[var(--primary-dark-green)] text-white items-center justify-center mb-6">
                  <span>{step.number}</span>
                </div>

                {/* Icon */}
                <div className={`inline-flex w-16 h-16 rounded-xl bg-gradient-to-br ${step.color} items-center justify-center mb-6 text-white shadow-lg`}>
                  {step.icon}
                </div>

                {/* Content */}
                <h4 className="mb-4 leading-relaxed">{step.title}</h4>
                <p className="leading-relaxed">
                  {step.description}
                </p>
              </div>
            </div>
          ))}
        </div>

        {/* Mobile/Tablet - Vertical */}
        <div className="lg:hidden space-y-6">
          {steps.map((step, index) => (
            <div key={index} className="flex gap-6 bg-[var(--bg-light)] p-10 rounded-2xl border-2 border-transparent hover:border-[var(--primary-dark-green)] transition-all">
              <div className="flex-shrink-0">
                <div className="w-12 h-12 rounded-full bg-[var(--primary-dark-green)] text-white flex items-center justify-center mb-4">
                  <span>{step.number}</span>
                </div>
                <div className={`w-16 h-16 rounded-xl bg-gradient-to-br ${step.color} flex items-center justify-center text-white shadow-lg`}>
                  {step.icon}
                </div>
              </div>
              <div className="flex-1 pt-2">
                <h4 className="mb-4 leading-relaxed">{step.title}</h4>
                <p className="leading-relaxed">
                  {step.description}
                </p>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

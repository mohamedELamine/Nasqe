import { Globe, Zap, TrendingUp, Code } from 'lucide-react';

export function Services() {
  const services = [
    {
      icon: <Globe size={36} />,
      title: 'تطوير مواقع ووردبريس',
      description: 'مواقع شركات، متاجر، ومدونات مبنية على قوالب مخصّصة، سريعة وسهلة الإدارة.',
      color: 'from-blue-500 to-blue-600'
    },
    {
      icon: <Zap size={36} />,
      title: 'تصميم صفحات هبوط',
      description: 'صفحات هبوط مدروسة، تركّز على تحويل الزائر إلى عميل، مع نسق بصري واضح ومسار مستخدم بسيط.',
      color: 'from-orange-500 to-orange-600'
    },
    {
      icon: <TrendingUp size={36} />,
      title: 'تحسين الأداء والـSEO',
      description: 'تسريع الموقع، تحسين ظهوره في محركات البحث، وضبط البنية التقنية.',
      color: 'from-green-500 to-green-600'
    },
    {
      icon: <Code size={36} />,
      title: 'حلول برمجية مخصّصة',
      description: 'ربط أنظمة، تطوير إضافات ووردبريس، ولوحات تحكم تناسب عملك.',
      color: 'from-purple-500 to-purple-600'
    }
  ];

  return (
    <section id="services" className="py-24 bg-white">
      <div className="container">
        <div className="text-center max-w-3xl mx-auto mb-20">
          <div className="inline-block bg-[var(--primary-dark-green)]/10 text-[var(--primary-dark-green)] px-5 py-2 rounded-full text-sm mb-6">
            خدماتنا
          </div>
          <h2>ماذا نُقدّم في نسق؟</h2>
          <p className="mt-4">
            نركّز على الحلول التي تحتاجها فعلاً، بدون تعقيد أو إضافات لا داعي لها
          </p>
        </div>

        <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
          {services.map((service, index) => (
            <div
              key={index}
              className="group bg-white border-2 border-[var(--border-gray)] rounded-2xl p-10 hover:border-[var(--primary-dark-green)] hover:shadow-2xl transition-all duration-300"
            >
              {/* Icon */}
              <div className={`w-16 h-16 bg-gradient-to-br ${service.color} rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform text-white shadow-lg`}>
                {service.icon}
              </div>
              
              {/* Title */}
              <h4 className="mb-4 leading-relaxed">{service.title}</h4>
              
              {/* Description */}
              <p className="leading-relaxed mb-6">
                {service.description}
              </p>

              <button className="text-[var(--primary-dark-green)] flex items-center gap-2 hover:gap-3 transition-all group-hover:underline px-1">
                اعرف المزيد
                <span>←</span>
              </button>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}

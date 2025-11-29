import { ExternalLink } from 'lucide-react';
import { ImageWithFallback } from './figma/ImageWithFallback';

export function Portfolio() {
  const projects = [
    {
      image: 'https://images.unsplash.com/photo-1675717501638-ed22b73e7155?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxtb2Rlcm4lMjB3ZWJzaXRlJTIwZGVzaWdufGVufDF8fHx8MTc2NDQyNDcyNnww&ixlib=rb-4.1.0&q=80&w=1080',
      title: 'موقع شركة التقنية المتقدمة',
      type: 'موقع شركة',
      description: 'موقع تعريفي متكامل مع لوحة تحكم مخصصة'
    },
    {
      image: 'https://images.unsplash.com/photo-1762341119317-fb5417c18407?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxidXNpbmVzcyUyMG9mZmljZSUyMHByb2Zlc3Npb25hbHxlbnwxfHx8fDE3NjQ0MTc2ODl8MA&ixlib=rb-4.1.0&q=80&w=1080',
      title: 'منصة استشارات الأعمال',
      type: 'صفحة هبوط',
      description: 'صفحة هبوط بتحويل عالٍ للخدمات الاستشارية'
    },
    {
      image: 'https://images.unsplash.com/photo-1688561807971-728cd39eb71c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxlY29tbWVyY2UlMjBvbmxpbmUlMjBzdG9yZXxlbnwxfHx8fDE3NjQzNDE0OTh8MA&ixlib=rb-4.1.0&q=80&w=1080',
      title: 'متجر الإلكترونيات',
      type: 'متجر إلكتروني',
      description: 'متجر ووكومرس متكامل مع نظام دفع آمن'
    },
    {
      image: 'https://images.unsplash.com/photo-1560202582-a391c31ec300?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxsYW5kaW5nJTIwcGFnZSUyMGRlc2lnbnxlbnwxfHx8fDE3NjQzMjMzNDR8MA&ixlib=rb-4.1.0&q=80&w=1080',
      title: 'منصة التعليم الإلكتروني',
      type: 'منصة تعليمية',
      description: 'نظام تعليمي متكامل مع إدارة المستخدمين'
    },
    {
      image: 'https://images.unsplash.com/photo-1739298061707-cefee19941b7?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx0ZWFtJTIwY29sbGFib3JhdGlvbiUyMHdvcmtzcGFjZXxlbnwxfHx8fDE3NjQzODE5MTN8MA&ixlib=rb-4.1.0&q=80&w=1080',
      title: 'موقع الخدمات الاحترافية',
      type: 'موقع خدمات',
      description: 'موقع متعدد الصفحات مع نظام حجز مواعيد'
    },
    {
      image: 'https://images.unsplash.com/photo-1699004642562-63a26850d89f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxsYXB0b3AlMjBtb2NrdXAlMjB3b3Jrc3BhY2V8ZW58MXx8fHwxNzY0MzU3NDkzfDA&ixlib=rb-4.1.0&q=80&w=1080',
      title: 'بوابة الأخبار والمحتوى',
      type: 'موقع إخباري',
      description: 'مدونة ومنصة محتوى مع نظام إدارة متقدم'
    }
  ];

  return (
    <section id="portfolio" className="py-24 bg-[var(--bg-light)]">
      <div className="container">
        <div className="text-center max-w-3xl mx-auto mb-20">
          <div className="inline-block bg-[var(--primary-dark-green)]/10 text-[var(--primary-dark-green)] px-5 py-2 rounded-full text-sm mb-6">
            أعمالنا
          </div>
          <h2>أعمال على نسقٍ واحد: الإتقان</h2>
          <p className="mt-4">
            كل مشروع نطلقه يعكس التزامنا بالجودة والاهتمام بالتفاصيل
          </p>
        </div>

        <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
          {projects.map((project, index) => (
            <div
              key={index}
              className="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 border border-[var(--border-gray)]"
            >
              <div className="relative overflow-hidden h-64">
                <ImageWithFallback
                  src={project.image}
                  alt={project.title}
                  className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                />
                <div className="absolute top-4 right-4 bg-white px-5 py-2.5 rounded-full text-sm shadow-md">
                  {project.type}
                </div>
              </div>

              <div className="p-10">
                <h4 className="mb-4 leading-relaxed">{project.title}</h4>
                <p className="leading-relaxed mb-6">
                  {project.description}
                </p>

                <button className="flex items-center gap-2 text-[var(--primary-dark-green)] hover:gap-3 transition-all group-hover:underline px-1">
                  عرض التفاصيل
                  <ExternalLink size={16} />
                </button>
              </div>
            </div>
          ))}
        </div>

        <div className="text-center mt-16">
          <button className="border-2 border-[var(--primary-dark-green)] text-[var(--primary-dark-green)] px-12 py-5 rounded-lg hover:bg-[var(--primary-dark-green)] hover:text-white transition-all hover:shadow-lg">
            عرض جميع المشاريع
          </button>
        </div>
      </div>
    </section>
  );
}

import { ArrowLeft, CheckCircle } from 'lucide-react';
import { ImageWithFallback } from './figma/ImageWithFallback';

export function Hero() {
  const scrollToSection = (id: string) => {
    const element = document.getElementById(id);
    if (element) {
      element.scrollIntoView({ behavior: 'smooth' });
    }
  };

  return (
    <section className="pt-32 pb-20 bg-gradient-to-b from-[var(--bg-light)] to-white">
      <div className="container">
        <div className="grid lg:grid-cols-2 gap-16 items-center">
          {/* Content */}
          <div className="space-y-8">
            <div className="inline-flex items-center gap-2 bg-white px-5 py-2 rounded-full shadow-sm border border-[var(--border-gray)]">
              <CheckCircle size={18} className="text-[var(--primary-dark-green)]" />
              <span className="text-sm">نبني حلولاً رقمية احترافية</span>
            </div>

            <h1 className="leading-tight">
              <span className="text-[var(--primary-dark-green)]">نسق</span> للحلول البرمجية
              <span className="block mt-4 text-[var(--text-dark)]">
                نبني حضورك الرقمي على نسقٍ من الإتقان
              </span>
            </h1>
            
            <p className="leading-relaxed max-w-2xl">
              مواقع ووردبريس مخصّصة، وصفحات هبوط عالية التحويل، وحلول برمجية تُبنى على نظام واضح، لا عشوائية فيه.
            </p>

            <div className="flex flex-wrap gap-5 pt-4">
              <button 
                onClick={() => scrollToSection('contact')}
                className="bg-[var(--primary-dark-green)] text-white px-10 py-5 rounded-lg hover:bg-[var(--primary-green)] transition-all hover:shadow-xl flex items-center gap-3 group"
              >
                ابدأ مشروعك الآن
                <ArrowLeft size={20} className="group-hover:-translate-x-1 transition-transform" />
              </button>
              
              <button 
                onClick={() => scrollToSection('portfolio')}
                className="border-2 border-[var(--primary-dark-green)] text-[var(--primary-dark-green)] px-10 py-5 rounded-lg hover:bg-[var(--primary-dark-green)] hover:text-white transition-all"
              >
                استعرض أعمالنا
              </button>
            </div>

            {/* Stats */}
            <div className="flex flex-wrap gap-12 pt-10">
              <div>
                <div className="text-4xl text-[var(--primary-dark-green)] mb-2">50+</div>
                <p className="text-sm text-[var(--text-gray)]">مشروع منجز</p>
              </div>
              <div>
                <div className="text-4xl text-[var(--primary-dark-green)] mb-2">98%</div>
                <p className="text-sm text-[var(--text-gray)]">رضا العملاء</p>
              </div>
              <div>
                <div className="text-4xl text-[var(--primary-dark-green)] mb-2">5+</div>
                <p className="text-sm text-[var(--text-gray)]">سنوات خبرة</p>
              </div>
            </div>
          </div>

          {/* Hero Image */}
          <div className="relative lg:order-last">
            <div className="relative rounded-2xl overflow-hidden shadow-2xl">
              <ImageWithFallback
                src="https://images.unsplash.com/photo-1699004642562-63a26850d89f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxsYXB0b3AlMjBtb2NrdXAlMjB3b3Jrc3BhY2V8ZW58MXx8fHwxNzY0MzU3NDkzfDA&ixlib=rb-4.1.0&q=80&w=1080"
                alt="نسق - موقع على لابتوب"
                className="w-full h-auto"
              />
            </div>
            
            {/* Floating Card */}
            <div className="absolute -bottom-6 -right-6 bg-white p-8 rounded-xl shadow-2xl border border-[var(--border-gray)] hidden lg:block">
              <div className="flex items-center gap-4">
                <div className="w-14 h-14 bg-gradient-to-br from-[var(--primary-dark-green)] to-[var(--primary-green)] rounded-xl flex items-center justify-center">
                  <span className="text-white text-2xl">✓</span>
                </div>
                <div>
                  <div className="text-[var(--primary-dark-green)] mb-1 leading-relaxed">مواقع سريعة</div>
                  <p className="text-sm text-[var(--text-gray)] leading-relaxed">وتجربة مستخدم متقنة</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

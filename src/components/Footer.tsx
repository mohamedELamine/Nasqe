import { Mail, Phone, MapPin, Facebook, Twitter, Instagram, Linkedin, Github, Heart } from 'lucide-react';

export function Footer() {
  const currentYear = new Date().getFullYear();

  const scrollToSection = (id: string) => {
    const element = document.getElementById(id);
    if (element) {
      element.scrollIntoView({ behavior: 'smooth' });
    }
  };

  const scrollToTop = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  return (
    <footer className="bg-gradient-to-b from-[var(--primary-dark-green)] to-[#0f3329] text-white">
      <div className="container py-16">
        {/* Main Footer Content */}
        <div className="grid md:grid-cols-4 gap-12 mb-12">
          {/* Company Info */}
          <div className="md:col-span-1">
            <div className="flex items-center gap-3 mb-6 cursor-pointer" onClick={scrollToTop}>
              <div className="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-lg">
                <span className="text-[var(--primary-dark-green)] text-2xl">ن</span>
              </div>
              <span className="text-2xl">نسق</span>
            </div>
            <p className="text-white/80 leading-relaxed mb-8">
              للحلول البرمجية - نبني حضورك الرقمي على نسقٍ من الإتقان والاحتراف
            </p>
            {/* Social Media */}
            <div className="flex gap-3">
              <a
                href="#"
                className="w-11 h-11 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition-all hover:scale-110"
                aria-label="Facebook"
              >
                <Facebook size={20} />
              </a>
              <a
                href="#"
                className="w-11 h-11 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition-all hover:scale-110"
                aria-label="Twitter"
              >
                <Twitter size={20} />
              </a>
              <a
                href="#"
                className="w-11 h-11 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition-all hover:scale-110"
                aria-label="Instagram"
              >
                <Instagram size={20} />
              </a>
              <a
                href="#"
                className="w-11 h-11 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition-all hover:scale-110"
                aria-label="LinkedIn"
              >
                <Linkedin size={20} />
              </a>
              <a
                href="#"
                className="w-11 h-11 bg-white/10 hover:bg-white/20 rounded-lg flex items-center justify-center transition-all hover:scale-110"
                aria-label="GitHub"
              >
                <Github size={20} />
              </a>
            </div>
          </div>

          {/* Quick Links */}
          <div>
            <h4 className="mb-6 text-white">روابط سريعة</h4>
            <ul className="space-y-4">
              <li>
                <button
                  onClick={scrollToTop}
                  className="text-white/80 hover:text-white hover:translate-x-1 transition-all inline-block"
                >
                  الرئيسية
                </button>
              </li>
              <li>
                <button
                  onClick={() => scrollToSection('services')}
                  className="text-white/80 hover:text-white hover:translate-x-1 transition-all inline-block"
                >
                  الخدمات
                </button>
              </li>
              <li>
                <button
                  onClick={() => scrollToSection('portfolio')}
                  className="text-white/80 hover:text-white hover:translate-x-1 transition-all inline-block"
                >
                  الأعمال
                </button>
              </li>
              <li>
                <button
                  onClick={() => scrollToSection('about')}
                  className="text-white/80 hover:text-white hover:translate-x-1 transition-all inline-block"
                >
                  عن نسق
                </button>
              </li>
              <li>
                <button
                  onClick={() => scrollToSection('pricing')}
                  className="text-white/80 hover:text-white hover:translate-x-1 transition-all inline-block"
                >
                  الباقات
                </button>
              </li>
            </ul>
          </div>

          {/* Services */}
          <div>
            <h4 className="mb-6 text-white">خدماتنا</h4>
            <ul className="space-y-4 text-white/80">
              <li>تطوير مواقع ووردبريس</li>
              <li>تصميم صفحات هبوط</li>
              <li>تحسين الأداء والـSEO</li>
              <li>حلول برمجية مخصصة</li>
              <li>متاجر إلكترونية</li>
              <li>صيانة ودعم فني</li>
            </ul>
          </div>

          {/* Contact Info */}
          <div>
            <h4 className="mb-6 text-white">تواصل معنا</h4>
            <ul className="space-y-5">
              <li className="flex items-start gap-3">
                <Mail size={20} className="flex-shrink-0 mt-1 text-white/60" />
                <a
                  href="mailto:info@nasaq.sa"
                  className="text-white/80 hover:text-white transition-colors"
                >
                  info@nasaq.sa
                </a>
              </li>
              <li className="flex items-start gap-3">
                <Phone size={20} className="flex-shrink-0 mt-1 text-white/60" />
                <a
                  href="tel:+966500000000"
                  className="text-white/80 hover:text-white transition-colors"
                >
                  +966 50 000 0000
                </a>
              </li>
              <li className="flex items-start gap-3">
                <MapPin size={20} className="flex-shrink-0 mt-1 text-white/60" />
                <span className="text-white/80">
                  الرياض، المملكة العربية السعودية
                </span>
              </li>
            </ul>
          </div>
        </div>

        {/* Bottom Bar */}
        <div className="border-t border-white/20 pt-8">
          <div className="flex flex-col md:flex-row justify-between items-center gap-6 text-sm text-white/70">
            <p className="flex items-center gap-2">
              © {currentYear} نسق للحلول البرمجية. جميع الحقوق محفوظة. صُنع بـ
              <Heart size={16} className="fill-red-500 text-red-500 inline-block" />
            </p>
            <div className="flex gap-8">
              <a href="#" className="hover:text-white transition-colors">
                سياسة الخصوصية
              </a>
              <a href="#" className="hover:text-white transition-colors">
                الشروط والأحكام
              </a>
              <a href="#" className="hover:text-white transition-colors">
                سياسة الاستخدام
              </a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  );
}

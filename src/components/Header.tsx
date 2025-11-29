import { Menu, X } from 'lucide-react';
import { useState } from 'react';

export function Header() {
  const [isMenuOpen, setIsMenuOpen] = useState(false);

  const scrollToSection = (id: string) => {
    const element = document.getElementById(id);
    if (element) {
      element.scrollIntoView({ behavior: 'smooth' });
      setIsMenuOpen(false);
    }
  };

  return (
    <header className="fixed top-0 w-full bg-white/95 backdrop-blur-sm z-50 shadow-sm">
      <div className="container">
        <div className="flex items-center justify-between py-5">
          {/* Logo */}
          <div className="flex items-center gap-3 cursor-pointer" onClick={() => window.scrollTo({ top: 0, behavior: 'smooth' })}>
            <div className="w-12 h-12 bg-gradient-to-br from-[var(--primary-dark-green)] to-[var(--primary-green)] rounded-xl flex items-center justify-center shadow-md">
              <span className="text-white text-2xl">ن</span>
            </div>
            <span className="text-2xl text-[var(--primary-dark-green)]">نسق</span>
          </div>

          {/* Desktop Navigation */}
          <nav className="hidden md:flex items-center gap-8">
            <button onClick={() => scrollToSection('services')} className="text-[var(--text-gray)] hover:text-[var(--primary-dark-green)] transition-colors py-2">
              الخدمات
            </button>
            <button onClick={() => scrollToSection('portfolio')} className="text-[var(--text-gray)] hover:text-[var(--primary-dark-green)] transition-colors py-2">
              الأعمال
            </button>
            <button onClick={() => scrollToSection('about')} className="text-[var(--text-gray)] hover:text-[var(--primary-dark-green)] transition-colors py-2">
              عن نسق
            </button>
            <button onClick={() => scrollToSection('pricing')} className="text-[var(--text-gray)] hover:text-[var(--primary-dark-green)] transition-colors py-2">
              الباقات
            </button>
            <button onClick={() => scrollToSection('contact')} className="text-[var(--text-gray)] hover:text-[var(--primary-dark-green)] transition-colors py-2">
              تواصل
            </button>
          </nav>

          {/* CTA Button */}
          <button 
            onClick={() => scrollToSection('contact')}
            className="hidden md:block bg-[var(--secondary-orange)] text-white px-9 py-4 rounded-lg hover:bg-[var(--secondary-orange)]/90 transition-all hover:shadow-lg"
          >
            احصل على عرض سعر
          </button>

          {/* Mobile Menu Button */}
          <button
            onClick={() => setIsMenuOpen(!isMenuOpen)}
            className="md:hidden p-2 text-[var(--primary-dark-green)]"
          >
            {isMenuOpen ? <X size={28} /> : <Menu size={28} />}
          </button>
        </div>

        {/* Mobile Navigation */}
        {isMenuOpen && (
          <nav className="md:hidden py-6 border-t border-[var(--border-gray)] space-y-4">
            <button onClick={() => scrollToSection('services')} className="block w-full text-right py-3 text-[var(--text-gray)] hover:text-[var(--primary-dark-green)]">
              الخدمات
            </button>
            <button onClick={() => scrollToSection('portfolio')} className="block w-full text-right py-3 text-[var(--text-gray)] hover:text-[var(--primary-dark-green)]">
              الأعمال
            </button>
            <button onClick={() => scrollToSection('about')} className="block w-full text-right py-3 text-[var(--text-gray)] hover:text-[var(--primary-dark-green)]">
              عن نسق
            </button>
            <button onClick={() => scrollToSection('pricing')} className="block w-full text-right py-3 text-[var(--text-gray)] hover:text-[var(--primary-dark-green)]">
              الباقات
            </button>
            <button onClick={() => scrollToSection('contact')} className="block w-full text-right py-3 text-[var(--text-gray)] hover:text-[var(--primary-dark-green)]">
              تواصل
            </button>
            <button 
              onClick={() => scrollToSection('contact')}
              className="w-full bg-[var(--secondary-orange)] text-white px-8 py-4 rounded-lg mt-4"
            >
              احصل على عرض سعر
            </button>
          </nav>
        )}
      </div>
    </header>
  );
}

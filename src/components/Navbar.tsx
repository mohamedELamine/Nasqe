import { useState } from 'react';
import { Menu, X } from 'lucide-react';

export function Navbar() {
  const [isMenuOpen, setIsMenuOpen] = useState(false);

  const menuItems = [
    { label: 'الخدمات', href: '#services' },
    { label: 'الأعمال', href: '#portfolio' },
    { label: 'عن نسق', href: '#about' },
    { label: 'المدونة', href: '#blog' },
    { label: 'تواصل', href: '#contact' },
  ];

  return (
    <nav className="bg-white shadow-sm fixed w-full top-0 z-50">
      <div className="container-custom">
        <div className="flex items-center justify-between h-20">
          {/* Logo */}
          <div className="flex items-center">
            <div className="flex items-center gap-2">
              <div className="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
                <span className="text-white text-xl">ن</span>
              </div>
              <span className="text-2xl text-primary">نسق</span>
            </div>
          </div>

          {/* Desktop Menu */}
          <div className="hidden md:flex items-center gap-8">
            {menuItems.map((item) => (
              <a
                key={item.href}
                href={item.href}
                className="text-gray-700 hover:text-primary transition-colors"
              >
                {item.label}
              </a>
            ))}
            <a
              href="#quote"
              className="bg-secondary text-white px-6 py-2 rounded-lg hover:bg-secondary-light transition-colors"
            >
              احصل على عرض سعر
            </a>
          </div>

          {/* Mobile Menu Button */}
          <button
            className="md:hidden text-gray-700"
            onClick={() => setIsMenuOpen(!isMenuOpen)}
          >
            {isMenuOpen ? <X size={24} /> : <Menu size={24} />}
          </button>
        </div>

        {/* Mobile Menu */}
        {isMenuOpen && (
          <div className="md:hidden py-4 border-t">
            {menuItems.map((item) => (
              <a
                key={item.href}
                href={item.href}
                className="block py-3 text-gray-700 hover:text-primary transition-colors"
                onClick={() => setIsMenuOpen(false)}
              >
                {item.label}
              </a>
            ))}
            <a
              href="#quote"
              className="block mt-4 bg-secondary text-white px-6 py-3 rounded-lg text-center hover:bg-secondary-light transition-colors"
              onClick={() => setIsMenuOpen(false)}
            >
              احصل على عرض سعر
            </a>
          </div>
        )}
      </div>
    </nav>
  );
}

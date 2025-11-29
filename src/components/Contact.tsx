import { Mail, Phone, MapPin, Send, MessageCircle, CheckCircle } from 'lucide-react';
import { useState } from 'react';

export function Contact() {
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    projectType: '',
    message: ''
  });

  const [isSubmitted, setIsSubmitted] = useState(false);

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    setIsSubmitted(true);
    setTimeout(() => {
      setIsSubmitted(false);
      setFormData({ name: '', email: '', projectType: '', message: '' });
    }, 3000);
  };

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement | HTMLSelectElement>) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value
    });
  };

  return (
    <section id="contact" className="py-24 bg-gradient-to-b from-[var(--bg-light)] to-white">
      <div className="container">
        <div className="text-center max-w-3xl mx-auto mb-20">
          <div className="inline-block bg-[var(--primary-dark-green)]/10 text-[var(--primary-dark-green)] px-5 py-2 rounded-full text-sm mb-6">
            تواصل معنا
          </div>
          <h2>جاهز لبدء مشروعك؟</h2>
          <p className="mt-4">
            أرسل فكرتك، وسنعود إليك بخطة واضحة وزمن تقديري
          </p>
        </div>

        <div className="grid lg:grid-cols-2 gap-16 max-w-6xl mx-auto">
          {/* Contact Info */}
          <div className="space-y-10">
            <div>
              <h3 className="mb-6">معلومات التواصل</h3>
              <p className="text-[var(--text-gray)] leading-relaxed">
                نحن هنا للإجابة على أسئلتك ومساعدتك في تحقيق أهدافك الرقمية. تواصل معنا بالطريقة التي تناسبك.
              </p>
            </div>

            {/* Contact Methods */}
            <div className="space-y-6">
              <div className="flex items-start gap-5 p-10 bg-white rounded-2xl shadow-md border-2 border-[var(--border-gray)] hover:border-[var(--primary-dark-green)] transition-all">
                <div className="w-14 h-14 bg-gradient-to-br from-[var(--primary-dark-green)] to-[var(--primary-green)] rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                  <Mail size={26} className="text-white" />
                </div>
                <div>
                  <h4 className="mb-2 leading-relaxed">البريد الإلكتروني</h4>
                  <a
                    href="mailto:info@nasaq.sa"
                    className="text-[var(--primary-dark-green)] hover:underline"
                  >
                    info@nasaq.sa
                  </a>
                </div>
              </div>

              <div className="flex items-start gap-5 p-10 bg-white rounded-2xl shadow-md border-2 border-[var(--border-gray)] hover:border-[var(--primary-dark-green)] transition-all">
                <div className="w-14 h-14 bg-gradient-to-br from-[var(--primary-dark-green)] to-[var(--primary-green)] rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                  <Phone size={26} className="text-white" />
                </div>
                <div>
                  <h4 className="mb-2 leading-relaxed">الهاتف</h4>
                  <a
                    href="tel:+966500000000"
                    className="text-[var(--primary-dark-green)] hover:underline"
                  >
                    +966 50 000 0000
                  </a>
                </div>
              </div>

              <div className="flex items-start gap-5 p-10 bg-white rounded-2xl shadow-md border-2 border-[var(--border-gray)] hover:border-[var(--primary-dark-green)] transition-all">
                <div className="w-14 h-14 bg-gradient-to-br from-[var(--primary-dark-green)] to-[var(--primary-green)] rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                  <MapPin size={26} className="text-white" />
                </div>
                <div>
                  <h4 className="mb-2 leading-relaxed">الموقع</h4>
                  <p className="text-[var(--text-gray)] leading-relaxed">الرياض، المملكة العربية السعودية</p>
                </div>
              </div>
            </div>

            {/* Quick Actions */}
            <div className="pt-8 border-t-2 border-[var(--border-gray)]">
              <p className="text-sm text-[var(--text-gray)] mb-6">
                تفضل التواصل السريع؟
              </p>
              <div className="flex gap-4">
                <a
                  href="https://wa.me/966500000000"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="flex items-center gap-3 bg-[#25D366] text-white px-9 py-5 rounded-lg hover:bg-[#22c55e] transition-all shadow-md hover:shadow-xl"
                >
                  <MessageCircle size={22} />
                  واتساب
                </a>
                <a
                  href="tel:+966500000000"
                  className="flex items-center gap-3 border-2 border-[var(--primary-dark-green)] text-[var(--primary-dark-green)] px-9 py-5 rounded-lg hover:bg-[var(--primary-dark-green)] hover:text-white transition-all"
                >
                  <Phone size={22} />
                  اتصل الآن
                </a>
              </div>
            </div>
          </div>

          {/* Contact Form */}
          <div className="bg-white rounded-3xl shadow-xl p-12 border-2 border-[var(--border-gray)]">
            <h3 className="mb-8 leading-relaxed">أرسل رسالة</h3>

            {isSubmitted ? (
              <div className="bg-green-50 border-2 border-green-200 text-green-800 p-12 rounded-2xl text-center">
                <div className="text-6xl mb-6">
                  <CheckCircle size={64} className="inline-block text-green-600" />
                </div>
                <h4 className="mb-4 text-green-900 leading-relaxed">تم إرسال رسالتك بنجاح!</h4>
                <p className="leading-relaxed">سنتواصل معك في أقرب وقت ممكن.</p>
              </div>
            ) : (
              <form onSubmit={handleSubmit} className="space-y-6">
                <div>
                  <label htmlFor="name" className="block text-sm mb-3 text-[var(--text-dark)]">
                    الاسم الكامل *
                  </label>
                  <input
                    type="text"
                    id="name"
                    name="name"
                    value={formData.name}
                    onChange={handleChange}
                    required
                    className="w-full px-6 py-5 bg-[var(--bg-light)] border-2 border-[var(--border-gray)] rounded-lg focus:outline-none focus:border-[var(--primary-dark-green)] transition-colors"
                    placeholder="أدخل اسمك"
                  />
                </div>

                <div>
                  <label htmlFor="email" className="block text-sm mb-3 text-[var(--text-dark)]">
                    البريد الإلكتروني *
                  </label>
                  <input
                    type="email"
                    id="email"
                    name="email"
                    value={formData.email}
                    onChange={handleChange}
                    required
                    className="w-full px-6 py-5 bg-[var(--bg-light)] border-2 border-[var(--border-gray)] rounded-lg focus:outline-none focus:border-[var(--primary-dark-green)] transition-colors"
                    placeholder="example@email.com"
                  />
                </div>

                <div>
                  <label htmlFor="projectType" className="block text-sm mb-3 text-[var(--text-dark)]">
                    نوع المشروع *
                  </label>
                  <select
                    id="projectType"
                    name="projectType"
                    value={formData.projectType}
                    onChange={handleChange}
                    required
                    className="w-full px-6 py-5 bg-[var(--bg-light)] border-2 border-[var(--border-gray)] rounded-lg focus:outline-none focus:border-[var(--primary-dark-green)] transition-colors"
                  >
                    <option value="">اختر نوع المشروع</option>
                    <option value="موقع شركة">موقع شركة</option>
                    <option value="صفحة هبوط">صفحة هبوط</option>
                    <option value="متجر إلكتروني">متجر إلكتروني</option>
                    <option value="حل مخصص">حل مخصص</option>
                    <option value="أخرى">أخرى</option>
                  </select>
                </div>

                <div>
                  <label htmlFor="message" className="block text-sm mb-3 text-[var(--text-dark)]">
                    رسالتك *
                  </label>
                  <textarea
                    id="message"
                    name="message"
                    value={formData.message}
                    onChange={handleChange}
                    required
                    rows={5}
                    className="w-full px-6 py-5 bg-[var(--bg-light)] border-2 border-[var(--border-gray)] rounded-lg focus:outline-none focus:border-[var(--primary-dark-green)] transition-colors resize-none"
                    placeholder="أخبرنا عن مشروعك وأهدافك..."
                  />
                </div>

                <button
                  type="submit"
                  className="w-full bg-[var(--primary-dark-green)] text-white px-10 py-6 rounded-lg hover:bg-[var(--primary-green)] transition-all hover:shadow-xl flex items-center justify-center gap-3 mt-4"
                >
                  إرسال الرسالة
                  <Send size={22} />
                </button>

                <p className="text-xs text-[var(--text-gray)] text-center pt-2">
                  بإرسالك هذا النموذج، فإنك توافق على سياسة الخصوصية الخاصة بنا
                </p>
              </form>
            )}
          </div>
        </div>
      </div>
    </section>
  );
}

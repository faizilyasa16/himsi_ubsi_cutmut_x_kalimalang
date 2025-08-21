// Animasi Typing untuk Subtitle di Beranda
document.addEventListener('DOMContentLoaded', function () {
    const subtitleElement = document.getElementById('typing-subtitle');
    if (subtitleElement) {
        const textToType = "Cut Mutia x Kalimalang";
        let i = 0;
        let isDeleting = false;

        function typeWriter() {
            const currentText = subtitleElement.innerHTML;

            if (isDeleting) {
                // Hapus teks
                subtitleElement.innerHTML = textToType.substring(0, currentText.length - 1);
            } else {
                // Tambah teks
                subtitleElement.innerHTML = textToType.substring(0, currentText.length + 1);
            }

            // Cek kondisi
            if (!isDeleting && currentText === textToType) {
                // Selesai mengetik, tunggu sebelum menghapus
                isDeleting = true;
                setTimeout(typeWriter, 2000); // Jeda sebelum menghapus
            } else if (isDeleting && currentText === '') {
                // Selesai menghapus, mulai mengetik lagi
                isDeleting = false;
                setTimeout(typeWriter, 500); // Jeda sebelum mengetik lagi
            } else {
                // Lanjutkan mengetik/menghapus
                const typingSpeed = isDeleting ? 50 : 150; // Kecepatan
                setTimeout(typeWriter, typingSpeed);
            }
        }

        // Mulai animasi
        typeWriter();
    }
});
// Carousel functionality
class ResponsiveCarousel {
    constructor() {
        this.track = document.getElementById('carouselTrack');
        this.slides = document.querySelectorAll('.carousel-slide');
        this.prevBtn = document.getElementById('prevBtn');
        this.nextBtn = document.getElementById('nextBtn');
        this.indicators = document.getElementById('carouselIndicators');
        
        this.currentIndex = 0;
        this.slidesPerView = this.getSlidesPerView();
        this.totalSlides = this.slides.length;
        this.maxIndex = Math.max(0, this.totalSlides - this.slidesPerView);
        
        this.init();
    }
    
    getSlidesPerView() {
        if (window.innerWidth <= 768) return 1;
        if (window.innerWidth <= 1024) return 2;
        return 3;
    }
    
    init() {
        this.updateCarousel();
        this.bindEvents();
    }
    
    updateCarousel() {
        const slideWidth = 100 / this.slidesPerView;
        const translateX = -this.currentIndex * slideWidth;
        
        this.track.style.transform = `translateX(${translateX}%)`;
        
        // Button selalu aktif karena carousel infinite loop
        this.prevBtn.disabled = false;
        this.nextBtn.disabled = false;
    }
    
    next() {
        if (this.currentIndex < this.maxIndex) {
            this.currentIndex++;
        } else {
            // Kembali ke awal jika sudah di akhir
            this.currentIndex = 0;
        }
        this.updateCarousel();
    }
    
    prev() {
        if (this.currentIndex > 0) {
            this.currentIndex--;
        } else {
            // Ke slide terakhir jika sudah di awal
            this.currentIndex = this.maxIndex;
        }
        this.updateCarousel();
    }
    
    goToSlide(index) {
        this.currentIndex = Math.max(0, Math.min(index, this.maxIndex));
        this.updateCarousel();
    }
    
    bindEvents() {
        this.nextBtn.addEventListener('click', () => this.next());
        this.prevBtn.addEventListener('click', () => this.prev());
        
        // Touch/swipe support
        let startX = 0;
        let endX = 0;
        
        this.track.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        }, { passive: true });
        
        this.track.addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].clientX;
            const diff = startX - endX;
            
            if (Math.abs(diff) > 50) {
                if (diff > 0) {
                    this.next();
                } else {
                    this.prev();
                }
            }
        }, { passive: true });
        
        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.target.closest('.carousel-container')) {
                if (e.key === 'ArrowLeft') {
                    e.preventDefault();
                    this.prev();
                } else if (e.key === 'ArrowRight') {
                    e.preventDefault();
                    this.next();
                }
            }
        });
        
        // Responsive handling
        window.addEventListener('resize', () => {
            const newSlidesPerView = this.getSlidesPerView();
            if (newSlidesPerView !== this.slidesPerView) {
                this.slidesPerView = newSlidesPerView;
                this.maxIndex = Math.max(0, this.totalSlides - this.slidesPerView);
                this.currentIndex = Math.min(this.currentIndex, this.maxIndex);
                this.updateCarousel();
            }
        });
    }
}

// Initialize carousel
const carousel = new ResponsiveCarousel();
// Counter Animation Script
document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk animasi counter
    function animateCounter(element, target, duration = 2000) {
        let start = 0;
        const originalTarget = target;
        
        // Cek apakah ini counter untuk "Anggota yang Bergabung"
        const isAnggotaBergabung = element.closest('.card').querySelector('h3').textContent.includes('Anggota yang Bergabung');
        const shouldShowPlus = isAnggotaBergabung && originalTarget > 50;
        const displayTarget = shouldShowPlus ? 50 : originalTarget;
        const increment = displayTarget / (duration / 16); // 60 FPS
        
        element.classList.add('counter-animating');
        
        const timer = setInterval(() => {
            start += increment;
            if (start >= displayTarget) {
                if (shouldShowPlus) {
                    element.textContent = '40+';
                } else {
                    element.textContent = originalTarget;
                }
                clearInterval(timer);
                element.classList.remove('counter-animating');
            } else {
                element.textContent = Math.floor(start);
            }
        }, 16);
    }

    // Intersection Observer untuk trigger animasi saat scroll
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counterElements = entry.target.querySelectorAll('.counter-number');
                
                counterElements.forEach((counter, index) => {
                    const target = parseInt(counter.getAttribute('data-count'));
                    
                    // Delay untuk setiap counter agar tidak bersamaan
                    setTimeout(() => {
                        animateCounter(counter, target);
                    }, index * 300);
                });
                
                // Unobserve setelah animasi berjalan
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe section anggota kepengurusan
    const counterSection = document.querySelector('section[aria-labelledby="heading-anggota"]');
    if (counterSection) {
        observer.observe(counterSection);
    }

    // Fallback jika Intersection Observer tidak didukung
    if (!window.IntersectionObserver) {
        setTimeout(() => {
            const counters = document.querySelectorAll('.counter-number');
            counters.forEach((counter, index) => {
                const target = parseInt(counter.getAttribute('data-count'));
                setTimeout(() => {
                    animateCounter(counter, target);
                }, index * 300);
            });
        }, 1000);
    }
});


// Dropdown toggle untuk mobile
document.addEventListener('DOMContentLoaded', function () {
    function handleMobileDropdowns() {
        // Ambil semua nav-link dalam dropdown
        const dropdownToggles = document.querySelectorAll('.dropdown .nav-link');

        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', function (e) {
                // Hanya untuk viewport < 992px (mobile/tablet)
                if (window.innerWidth < 992) {
                    e.preventDefault();

                    const parent = this.parentElement;

                    if (parent.classList.contains('show')) {
                        parent.classList.remove('show');
                    } else {
                        // Tutup semua dropdown lain terlebih dahulu
                        document.querySelectorAll('.dropdown.show').forEach(openDropdown => {
                            openDropdown.classList.remove('show');
                        });

                        parent.classList.add('show');
                    }
                }
            });
        });

        // Tutup dropdown jika klik di luar
        document.addEventListener('click', function (e) {
            if (window.innerWidth < 992 && !e.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown.show').forEach(openDropdown => {
                    openDropdown.classList.remove('show');
                });
            }
        });
    }

    // Jalankan saat pertama kali
    handleMobileDropdowns();

    // Re-bind saat window resize (jika diperlukan)
    window.addEventListener('resize', handleMobileDropdowns);
});

//Splash screen logic
window.addEventListener('DOMContentLoaded', function() {
    const splashScreen = document.getElementById('splash-screen');
    const mainContent = document.getElementById('main-content');
    
    // Set a minimum display time for the splash screen
    const minimumDisplayTime = 1000; // 1 second minimum
    const startTime = Date.now();
    
    // Function to hide splash screen
    function hideSplashScreen() {
        const currentTime = Date.now();
        const elapsedTime = currentTime - startTime;
        
        if (elapsedTime >= minimumDisplayTime) {
            // If minimum time has passed, hide immediately
            splashScreen.style.opacity = '0';
            splashScreen.style.visibility = 'hidden';
            mainContent.style.visibility = 'visible';
        } else {
            // Otherwise, wait for the remaining time
            const remainingTime = minimumDisplayTime - elapsedTime;
            setTimeout(() => {
                splashScreen.style.opacity = '0';
                splashScreen.style.visibility = 'hidden';
                mainContent.style.visibility = 'visible';
            }, remainingTime);
        }
    }
    
    // Check if the page has already loaded
    if (document.readyState === 'complete') {
        hideSplashScreen();
    } else {
        // Listen for when the page finishes loading
        window.addEventListener('load', hideSplashScreen);
    }
});

// Scroll to Top Button Script
document.addEventListener('DOMContentLoaded', function() {
    const scrollBtn = document.getElementById("scrollToTopBtn");
    
    // Check if button exists
    if (scrollBtn) {
        // Show/hide button based on scroll position
        window.addEventListener("scroll", function() {
            if (window.scrollY > 200) {
                scrollBtn.style.display = "block";
                scrollBtn.classList.add('visible');
            } else {
                scrollBtn.style.display = "none";
                scrollBtn.classList.remove('visible');
            }
        });
        
        // Scroll to top when button is clicked
        scrollBtn.addEventListener("click", function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            // Method 1: First try smooth scrolling
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
            
            // Method 2: Fallback using direct scrollTop
            if (window.scrollY > 0) {
                setTimeout(function() {
                    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
                    document.body.scrollTop = 0; // For Safari
                }, 100);
            }
            
            return false;
        });
        
        // Force check scroll position on page load
        if (window.scrollY > 200) {
            scrollBtn.style.display = "block";
            scrollBtn.classList.add('visible');
        }
    }
});




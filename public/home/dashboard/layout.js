// JavaScript dioptimasi untuk Bootstrap - sederhana dan minimal

document.addEventListener('DOMContentLoaded', function() {
    initializeSidebar();
    setupEventListeners();
    setupNavigation();
});

// DOM Elements
const sidebar = document.getElementById('sidebar');
const mainContent = document.getElementById('mainContent');
const menuToggle = document.getElementById('menuToggle');
const overlay = document.getElementById('overlay');

// State management
let isMobile = window.innerWidth < 768;
let sidebarVisible = !isMobile;

// Initialize sidebar
function initializeSidebar() {
    updateSidebarState();
}

// Setup event listeners
function setupEventListeners() {
    // Sidebar toggle
    if (menuToggle) {
        menuToggle.addEventListener('click', toggleSidebar);
    }
    
    // Window resize handler (debounced)
    window.addEventListener('resize', debounce(handleResize, 250));
    
    // Close sidebar on mobile when clicking outside
    document.addEventListener('click', function(e) {
        if (isMobile && sidebarVisible && 
            !sidebar.contains(e.target) && 
            !menuToggle.contains(e.target)) {
            closeSidebar();
        }
    });
}

// Toggle sidebar visibility
function toggleSidebar() {
    if (sidebarVisible) {
        closeSidebar();
    } else {
        openSidebar();
    }
}

// Open sidebar
function openSidebar() {
    if (isMobile) {
        sidebar.classList.add('show');
        overlay.classList.add('show');
        document.body.style.overflow = 'hidden';
        menuToggle.classList.add('show'); // Untuk mobile
    } else {
        sidebar.classList.remove('collapsed');
        mainContent.classList.remove('expanded');
        menuToggle.classList.remove('collapsed'); // Untuk desktop
    }
    sidebarVisible = true;
    updateToggleIcon();
}

// Close sidebar
function closeSidebar() {
    if (isMobile) {
        sidebar.classList.remove('show');
        overlay.classList.remove('show');
        document.body.style.overflow = '';
        menuToggle.classList.remove('show'); // Untuk mobile
    } else {
        sidebar.classList.add('collapsed');
        mainContent.classList.add('expanded');
        menuToggle.classList.add('collapsed'); // Untuk desktop
    }
    sidebarVisible = false;
    updateToggleIcon();
}

// Update sidebar state based on screen size
function updateSidebarState() {
    if (isMobile) {
        sidebar.classList.remove('show');
        sidebar.classList.add('collapsed');
        mainContent.classList.add('expanded');
        overlay.classList.remove('show');
        document.body.style.overflow = '';
        menuToggle.classList.remove('show'); // Reset mobile class
        menuToggle.classList.add('collapsed');
        sidebarVisible = false;
    } else {
        sidebar.classList.remove('show', 'collapsed');
        mainContent.classList.remove('expanded');
        overlay.classList.remove('show');
        document.body.style.overflow = '';
        menuToggle.classList.remove('show', 'collapsed'); // Reset semua class
        sidebarVisible = true;
    }
    updateToggleIcon();
}

// Handle window resize
function handleResize() {
    const wasMobile = isMobile;
    isMobile = window.innerWidth < 768;
    
    if (wasMobile !== isMobile) {
        updateSidebarState();
    }
}

// Update toggle button icon
function updateToggleIcon() {
    const icon = menuToggle?.querySelector('i');
    if (icon) {
        if (sidebarVisible && isMobile) {
            icon.className = 'bi bi-list'; // Gunakan icon Bootstrap untuk mobile
        }
    }
}

// Setup navigation functionality
function setupNavigation() {
    // Handle regular nav links (tidak ada data-bs-toggle)
    const navLinks = document.querySelectorAll('.sidebar .nav-link:not([data-bs-toggle])');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Remove active class from all links
            document.querySelectorAll('.sidebar .nav-link').forEach(l => {
                l.classList.remove('active');
            });
            
            // Add active class to clicked link
            this.classList.add('active');
            
            // Close sidebar on mobile after navigation
            if (isMobile) {
                setTimeout(() => closeSidebar(), 300);
            }
            
            // Add ripple effect
            addRippleEffect(this, e);
        });
    });
    
    // Handle dropdown nav links (submenu items)
    const dropdownLinks = document.querySelectorAll('.collapse .nav-link');
    dropdownLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Remove active from all nav links
            document.querySelectorAll('.sidebar .nav-link').forEach(l => {
                l.classList.remove('active');
            });
            
            // Add active to clicked submenu item ONLY (tidak ke parent dropdown)
            this.classList.add('active');
            
            // Close sidebar on mobile
            if (isMobile) {
                setTimeout(() => closeSidebar(), 300);
            }
        });
    });
    
    // Handle dropdown toggles dengan Bootstrap Collapse
    const collapseElements = document.querySelectorAll('[data-bs-toggle="collapse"]');
    collapseElements.forEach(element => {
        element.addEventListener('click', function(e) {
            addRippleEffect(this, e);
        });
    });
    
    // Handle overlay click
    if (overlay) {
        overlay.addEventListener('click', closeSidebar);
    }
}

// Utility functions
function addRippleEffect(element, event) {
    const ripple = document.createElement('span');
    const rect = element.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = event.clientX - rect.left - size / 2;
    const y = event.clientY - rect.top - size / 2;
    
    ripple.style.width = ripple.style.height = size + 'px';
    ripple.style.left = x + 'px';
    ripple.style.top = y + 'px';
    ripple.classList.add('ripple');
    
    element.appendChild(ripple);
    
    setTimeout(() => {
        ripple.remove();
    }, 600);
}

function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}
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
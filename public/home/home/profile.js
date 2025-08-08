// Typing animations for various sections
document.addEventListener('DOMContentLoaded', function() {
// Typing animation for Struktur Kepengurusan
const titleElement = document.getElementById('typing-title');
if (titleElement) {
    const currentYear = new Date().getFullYear();
    const textToType = `Struktur Kepengurusan Periode ${currentYear}`;
    let i = 0;

    function typeWriter() {
        if (i < textToType.length) {
            titleElement.innerHTML += textToType.charAt(i);
            i++;
            setTimeout(typeWriter, 75);
        } else {
            titleElement.style.borderRight = 'none';
        }
    }

    setTimeout(() => {
        typeWriter();
    }, 1000);
}

// Typing animation for Tentang Kami
const aboutElement = document.getElementById('typing-about');
if (aboutElement) {
    const textToType = "Tentang Kami";
    let i = 0;

    function typeWriterAbout() {
        if (i < textToType.length) {
            aboutElement.innerHTML += textToType.charAt(i);
            i++;
            setTimeout(typeWriterAbout, 100);
        } else {
            aboutElement.style.borderRight = 'none';
        }
    }

    setTimeout(() => {
        typeWriterAbout();
    }, 500);
}

// Typing animation for Program Kerja
const programElement = document.getElementById('typing-program');
if (programElement) {
    const textToType = "Program Kerja";
    let i = 0;

    function typeWriterProgram() {
        if (i < textToType.length) {
            programElement.innerHTML += textToType.charAt(i);
            i++;
            setTimeout(typeWriterProgram, 90);
        } else {
            programElement.style.borderRight = 'none';
        }
    }

    setTimeout(() => {
        typeWriterProgram();
    }, 800);
}

// Typing animation for Struktur Organisasi
const strukturElement = document.getElementById('typing-struktur');
if (strukturElement) {
    const textToType = "Struktur Organisasi";
    let i = 0;

    function typeWriterStruktur() {
        if (i < textToType.length) {
            strukturElement.innerHTML += textToType.charAt(i);
            i++;
            setTimeout(typeWriterStruktur, 85);
        } else {
            strukturElement.style.borderRight = 'none';
        }
    }

    setTimeout(() => {
        typeWriterStruktur();
    }, 1200);
}
});

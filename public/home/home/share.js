function shareArticle() {
if (navigator.share) {
    navigator.share({
        title: '{{ $artikel->judul }}',
        text: '{{ $artikel->deskripsi }}',
        url: window.location.href
    });
} else {
    // Fallback: copy URL to clipboard
    navigator.clipboard.writeText(window.location.href).then(function() {
        alert('Link artikel telah disalin ke clipboard!');
    });
}
}

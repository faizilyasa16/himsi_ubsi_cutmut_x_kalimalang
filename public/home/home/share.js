function shareArticle(options) {
    try {
        var url = (options && options.url) || window.location.href;
        var title = (options && options.title) || '';
    // Only share the title by default (no author/description)
    var text = (options && typeof options.text === 'string') ? options.text : '';

        // Try to infer a reasonable title if not provided
        if (!title) {
            var h1 = document.querySelector('h1');
            title = (h1 && h1.innerText && h1.innerText.trim()) || document.title || 'Bagikan';
        }

        // Do not auto-infer description text; we want title-only by default

        if (navigator.share) {
            var payload = text ? { title: title, text: text, url: url } : { title: title, url: url };
            navigator.share(payload);
        } else if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(url).then(function () {
                alert('Tautan telah disalin ke clipboard!');
            }).catch(function () {
                window.prompt('Salin tautan ini:', url);
            });
        } else {
            window.prompt('Salin tautan ini:', url);
        }
    } catch (e) {
        var fallbackUrl = window.location.href;
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(fallbackUrl).then(function () {
                alert('Tautan telah disalin ke clipboard!');
            }).catch(function () {
                window.prompt('Salin tautan ini:', fallbackUrl);
            });
        } else {
            window.prompt('Salin tautan ini:', fallbackUrl);
        }
    }
}

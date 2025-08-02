document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.card');

    cards.forEach((card) => {
        card.addEventListener('click', function (e) {
            const target = e.target;
            const action = target.dataset.action;

            // Jika klik bukan tombol hadir/izin, atau jika tombol disabled, biarkan default behavior jalan
            if (!action || target.classList.contains('disabled')) return;

            e.preventDefault(); // hanya prevent jika tombol hadir/izin diklik dan tidak disabled

            const keteranganHadir = card.querySelector('[data-keterangan="hadir"]');
            const keteranganIzin = card.querySelector('[data-keterangan="izin"]');

            // Sembunyikan semua keterangan terlebih dahulu
            keteranganHadir.classList.remove('show');
            keteranganIzin.classList.remove('show');

            // Reset form jika ada
            const formHadir = keteranganHadir.querySelector('form');
            const formIzin = keteranganIzin.querySelector('form');
            if (formHadir) formHadir.reset();
            if (formIzin) formIzin.reset();

            // Tampilkan form yang sesuai
            setTimeout(() => {
                if (action === 'hadir') {
                    keteranganHadir.classList.add('show');
                    setTimeout(() => {
                        const keteranganInput = keteranganHadir.querySelector('textarea');
                        if (keteranganInput) keteranganInput.focus();
                    }, 300);
                } else if (action === 'izin') {
                    keteranganIzin.classList.add('show');
                    setTimeout(() => {
                        const keteranganInput = keteranganIzin.querySelector('textarea');
                        if (keteranganInput) keteranganInput.focus();
                    }, 300);
                }
            }, 50);
        });
    });
});

document.getElementById('nama').addEventListener('input', function () {
    const nama = this.value;
    const slug = nama.toLowerCase()
        .replace(/[^\w\s-]/g, '')     // hapus karakter aneh
        .replace(/\s+/g, '-')         // ganti spasi jadi tanda -
        .replace(/--+/g, '-')         // hilangkan double -
        .trim();
    document.getElementById('slug').value = slug;
});


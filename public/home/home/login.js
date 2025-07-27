document.addEventListener('DOMContentLoaded', function() {
  const togglePassword = document.getElementById('togglePassword');
  const password = document.getElementById('password');

  if (togglePassword && password) {
    togglePassword.addEventListener('click', function () {
      // Toggle type
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);

      // Toggle icon
      this.classList.toggle('bi-eye');
      this.classList.toggle('bi-eye-slash');
    });
  }
});
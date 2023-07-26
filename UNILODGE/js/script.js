document.getElementById('register').addEventListener('submit', function(event) {
  const passwordField = document.getElementById('password');
  const confirmPasswordField = document.getElementById('confirmPassword');
  const errorMessage = document.getElementById('errorMessage');
  const emailField = document.getElementById('email');
  errorMessage.style.display = 'none';

  if (passwordField.value !== confirmPasswordField.value) {
    errorMessage.innerText = 'Passwords do not match!';
    errorMessage.style.display = 'block';
    event.preventDefault();
  }

  const mobileField = document.getElementById('mobile');
  const mobilePattern = /^[0-9]{10}$/;

  if (!mobilePattern.test(mobileField.value)) {
    errorMessage.innerText = 'Please enter a valid mobile number!';
    errorMessage.style.display = 'block';
    event.preventDefault();
  }

  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(emailField.value)) {
      errorMessage.innerText = 'Please enter a valid email address!';
      errorMessage.style.display = 'block';
      event.preventDefault();
    }
});
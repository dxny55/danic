document.addEventListener('DOMContentLoaded', () => {
  const emailInput = document.getElementById('email');
  const feedback = document.getElementById('emailFeedback');

  if (emailInput) {
    emailInput.addEventListener('input', () => {
      const email = emailInput.value.trim();
      if (email.length < 5) {
        feedback.textContent = '';
        return;
      }
      fetch(`resource_ajax.php?email=${encodeURIComponent(email)}`)
        .then(res => res.json())
        .then(data => {
          if (data.valid) {
            feedback.textContent = data.in_use ? 'Correo ya registrado' : 'Correo disponible';
            feedback.style.color = data.in_use ? 'red' : 'green';
          } else {
            feedback.textContent = 'Correo inválido';
            feedback.style.color = 'orange';
          }
        });
    });
  }
});

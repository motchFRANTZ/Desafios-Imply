document.addEventListener('DOMContentLoaded', function() {
    const checkbox = document.querySelector('input[name="checkbox"]');
    const emailField = document.getElementById('email-field');

    checkbox.addEventListener('change', function() {
        if (checkbox.checked) {
            emailField.style.display = 'block';
        } else {
            emailField.style.display = 'none';
        }
    });
});

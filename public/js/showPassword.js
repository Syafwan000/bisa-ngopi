function showPasswordHandler() {
    const checkBox = document.getElementById('show-password');
    const passwordField = document.getElementById('password');

    if(checkBox.checked == true) {
        passwordField.type = 'text';
    } else {
        passwordField.type = 'password';
    }
}
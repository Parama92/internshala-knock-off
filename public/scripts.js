const eye = document.querySelector('#show-password')
const loginType = document.querySelector('.login-modal-title')
const error = document.querySelector('.error')

function togglePassword () {
    const passwordField = document.querySelector('#login-password')
    const type = passwordField.getAttribute('type')
    if(type !== 'text') {
        passwordField.setAttribute('type', 'text')
        eye.innerHTML = '<i class="fas fa-eye"></i>'
        return
    }
    passwordField.setAttribute('type', 'password')
    eye.innerHTML = '<i class="fas fa-eye-slash"></i>'
}

function selectLoginType (e) {
    const type = e.target.classList
    const loginInput = document.querySelector('#login-type')
    if (type.contains('student-login') && !type.contains('active')){
        document.querySelector('.employer-login').classList.remove('active')
        type.add('active')
        loginInput.setAttribute('value', 'student')
    }
    else {
        document.querySelector('.student-login').classList.remove('active')
        type.add('active')
        loginInput.setAttribute('value', 'employer')
    }
}

function close (e) {
    if (e.target.classList.contains('close')) {
        error.remove()
    }
}

loginType.addEventListener('click', selectLoginType)
eye.addEventListener('click', togglePassword)
error.addEventListener('click', close)
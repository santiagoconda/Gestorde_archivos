function formsDinamicos(formType) {
    console.log('desde vite la funcion a sido llamada' );
    if (formType === 'login') {
        document.getElementById('loginForm').style.display = 'block';
        document.getElementById('registerForm').style.display = 'none';
        document.getElementById('toggleButton').innerText = '¿No tienes cuenta? Regístrate';
    } else if (formType === 'register') {
        document.getElementById('loginForm').style.display = 'none';
        document.getElementById('registerForm').style.display = 'block';
        document.getElementById('toggleButton').innerText = '¿Ya tienes cuenta? Inicia sesión';
    }
}
console.log('funciona js y css')


var email_login = document.getElementById('floatingInput');
console.log(email_login);

function validateEmail(email_login) {
    const re = /\S+@\S+\.\S+/;
    return re.test(String(email_login).toLowerCase());
  }

function testeemail(){
    if (validateEmail(email_login)) {
        console.log("Email válido");
    } else {
        console.log("Email inválido");
    }
}

// Función para guardar el estado del checkbox en el local storage
function rememberMe() {
    if (document.getElementById("remember").checked) {
      localStorage.setItem("remember", "true");
    } else {
      localStorage.removeItem("remember");
    }
  }
  
  // Función para cargar el estado del checkbox en el formulario
  function loadRememberMe() {
    if (localStorage.getItem("remember") === "true") {
      document.getElementById("remember").checked = true;
      console.log("Login salvo")
    }
  }
  
  // Llamar a la función loadRememberMe al cargar la página
  window.onload = loadRememberMe;
  
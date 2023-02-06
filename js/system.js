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
  function rememberMe(remember) {
      if (remember.checked) {
          localStorage.username = document.getElementById("exampleInputEmail").value;
          localStorage.password = document.getElementById("exampleInputPassword").value;
          localStorage.remember = true;
      } else {
          localStorage.username = "";
          localStorage.password = "";
          localStorage.remember = false;
      }
  }

  window.onload = function() {
      if (localStorage.remember == "true") {
          document.getElementById("exampleInputEmail").value = localStorage.username;
          document.getElementById("exampleInputPassword").value = localStorage.password;
          document.getElementById("remember").checked = true;
      }
  }; 
  // Chama as funçoes ao carregar a página
  //window.onload = loadRememberMe;


  
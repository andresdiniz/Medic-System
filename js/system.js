

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

// Ocultar e mostrar a senha
  document.getElementById('olho').addEventListener('mousedown', function() {
    document.getElementById('exampleInputPassword').type = 'text';
  });
  
  document.getElementById('olho').addEventListener('mouseup', function() {
    document.getElementById('exampleInputPassword').type = 'password';
  });
  
  // Para que o password não fique exposto apos mover a imagem.
  document.getElementById('olho').addEventListener('mousemove', function() {
    document.getElementById('exampleInputPassword').type = 'password';
  });
  
  document.getElementById('exampleInputEmail').addEventListener('blur', function() {
    var email_login = document.getElementById("exampleInputEmail").value;
    console.log(email_login);
    var url = 'https://api.emailvalidation.io/v1/info?apikey=wvNSR0m0ZB39TK9npzVf9Iex2tGO2iwQjoqZlhPY&email='+email_login; 
    
    fetch(url)
      .then(response => response.json())
      .then(data => {
        console.log(data);
        var checkd = data['smtp_check'];
        console.log(checkd);
        if (checkd == true){ 
          let check = window.document.getElementsByClassName('valid');
          check.classList.add('lnr-smile');
        }
      })
      .catch(error => {
        console.error(error);
      });
  });

  
  // Chama as funçoes ao carregar a página
  //window.onload = loadRememberMe;


  
//alert('Bem vindo ao login')

function mascara(src,mask){
  var i = src.value.length;
  var saida = mask.substring(0,1);
  var texto = mask.substring(i);
  if (texto.substring(0,1) != saida){
      src.value += texto.substring(0,1);
  }
}
//Função para formatar telefone
function mascara2(telefone, evento) {
  var tecla = (!evento) ? window.event.keyCode : evento.which;
  var valor = telefone.value.replace(/\D/g, '');
  var novoValor = "";
  var tel = '';

  if (tecla !== 8) {
    switch (valor.length) {
      case 1:
        novoValor = "(" + valor;
        break;
      case 2:
        novoValor = "(" + valor[0] + valor[1] + ")";
        break;
      case 3:
        novoValor = "(" + valor[0] + valor[1] + ")" + valor[2];
        break;
      case 4:
        novoValor = "(" + valor[0] + valor[1] + ")" + valor[2] + "." + valor[3];
        break;
      case 5:
        novoValor = "(" + valor[0] + valor[1] + ")" + valor[2] + "." + valor[3] + valor[4] ;
        break;
      case 6:
        novoValor = "(" + valor[0] + valor[1] + ")" + valor[2] + "." + valor[3]  + valor[4] + valor[5];
        break;
      case 7:
        novoValor = "(" + valor[0] + valor[1] + ")" + valor[2] + "." + valor[3] + valor[4] + valor[5] + valor[6] + "-" ;
        break;
      case 8:
        novoValor = "(" + valor[0] + valor[1] + ")" + valor[2] + "." + valor[3] + valor[4] + valor[5] + valor[6] + "-" + valor[7];
        break;
      case 9:
        novoValor = "(" + valor[0] + valor[1] + ")" + valor[2] + "." + valor[3] + valor[4] + valor[5] + valor[6] + "-" + valor[7] + valor[8];
        break;
      case 10:
        novoValor = "(" + valor[0] + valor[1] + ")" + valor[2] + "." + valor[3] + valor[4] + valor[5] + valor[6] + "-" + valor[7] + valor[8] + valor[9];
        break;
    case 11:
        novoValor = "(" + valor[0] + valor[1] + ")" + valor[2] + "." + valor[3] + valor[4] + valor[5] + valor[6] + "-"  + valor[7] + valor[8] + valor[9] + valor[10];
        break;
    }
    telefone.value = novoValor;
}
}
function validaCPF(e){if("string"!=typeof e||11!==(e=e.replace(/[^\d]+/g,"")).length||"00000000000"===e||"11111111111"===e||"22222222222"===e||"33333333333"===e||"44444444444"===e||"55555555555"===e||"66666666666"===e||"77777777777"===e||"88888888888"===e||"99999999999"===e)return!1;let l=0;for(let t=0;t<9;t++)l+=parseInt(e.charAt(t))*(10-t);let a=11-l%11;if((10===a||11===a)&&(a=0),a!==parseInt(e.charAt(9)))return!1;l=0;for(let r=0;r<10;r++)l+=parseInt(e.charAt(r))*(11-r);return(10==(a=11-l%11)||11===a)&&(a=0),a===parseInt(e.charAt(10))}function cpf(e){validaCPF(e)?console.log("CPF v\xe1lido"):(console.log("CPF inv\xe1lido"),alert("Verifique o CPF"))}function formatarTelefone(){let e=document.getElementById("telefone").value,l=e.replace(/\D/g,"");if(11===l.length){let t=l.replace(/^(\d{2})(\d{5})(\d{4})$/,"($1) $2-$3");document.getElementById("telefone").value=t}else alert("O n\xfamero de telefone deve ter 11 d\xedgitos.")}function limpa_formulário_cep(){document.getElementById("rua").value="",document.getElementById("bairro").value="",document.getElementById("cidade").value="",document.getElementById("uf").value=""}function meu_callback(e){"erro"in e?(limpa_formulário_cep(),alert("CEP n\xe3o encontrado.")):(document.getElementById("rua").value=e.logradouro,document.getElementById("bairro").value=e.bairro,document.getElementById("cidade").value=e.localidade,document.getElementById("uf").value=e.uf)}

  
function pesquisacep(e){var a=e.replace(/\D/g,"");if(""!=a){if(/^[0-9]{8}$/.test(a)){document.getElementById("rua").value="...",document.getElementById("bairro").value="...",document.getElementById("cidade").value="...",document.getElementById("uf").value="...";var l=document.createElement("script");l.src="https://viacep.com.br/ws/"+a+"/json/?callback=meu_callback",document.body.appendChild(l)}else limpa_formulário_cep(),alert("Formato de CEP inv\xe1lido.")}else limpa_formulário_cep()}

//Busca os estados
  window.onload = function estados() {
    const selectEstados = document.getElementById('uf');
    const url = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados';
    fetch(url)
      .then(response => response.json())
      .then(data => {
        data.sort((a, b) => (a.nome > b.nome) ? 1 : -1) // sorting function
        data.forEach(estado => {
          const option = document.createElement('option');
          option.value = estado.sigla;
          option.textContent = estado.nome;
          selectEstados.appendChild(option);
        });
      })
      .catch(error => console.error(error));
  };
  
  function refresh() {
    var confirmed = confirm("Essa ação irá apagar todos os dados digitados!");
    if (confirmed) {
      location.reload();
    }
  }

  function capitalize(event) {
    var input = event.target;
    input.value = input.value.toUpperCase();
  }
  
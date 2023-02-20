//alert('Bem vindo ao login')
function mascara(src,mask){
  var i = src.value.length;
  var saida = mask.substring(0,1);
  var texto = mask.substring(i);
  if (texto.substring(0,1) != saida){
     src.value += texto.substring(0,1);
     var cep = document.getElementById('cep').value;
      if (cep.length <= 0) {
        checarcpf(src);
      }}
}

document.getElementById('CPFCliente').addEventListener('onkeydown',  checarcpf());


function mascara2(telefone, evento) {
  var tecla = (!evento) ? window.event.keyCode : evento.which;
  var valor = telefone.value.replace(/\D/g, '');
  var novoValor = "";

  if (valor.length >= 10) {
    novoValor = "(" + valor.substring(0, 2) + ") " + valor.substring(2, 7) + "-" + valor.substring(7, 11);
  } else if (valor.length >= 6) {
    novoValor = "(" + valor.substring(0, 2) + ") " + valor.substring(2, 6) + "-" + valor.substring(6, 10);
  } else if (valor.length >= 2) {
    novoValor = "(" + valor.substring(0, 2) + ") " + valor.substring(2, valor.length);
  } else {
    novoValor = valor;
  }

  telefone.value = novoValor;
  validaTelefone(novoValor);
}

function validaTelefone() {
  var telefone = document.getElementById('telefone').value;
  var botao = document.getElementById('submeter');
  var tm = telefone.length;
  console.log(tm);
  if (!(tm == 13 || tm == 14)) {
    document.getElementById('telefone').style.border = "2px solid red";
    botao.disabled = true;
    return false;
  } else {
    document.getElementById('telefone').style.border = "2px solid green";
    botao.disabled = false;
    return true;
  }
}


function checarcpf() {
  var cpf = document.getElementById('CPFCliente').value;
  //var cpf = cpf.value.replace(/\D/g, '');
  console.log(cpf);
  var cor = document.getElementById('CPFCliente');
  var botao = document.getElementById('submeter');
  if (validarCPF(cpf)) {
    cor.style.border="2px solid green";
    //console.log("CPF válido");
    botao.disabled = false;
  } else {
    cor.style.border="2px solid red";
    //console.log("CPF inválido");
    botao.disabled = true;
  }
}

function validarCPF(cpf) {	
  cpf = String(cpf);
  //console.log(cpf);
	cpf = cpf.replace(/[^\d]+/g,'');	
	if(cpf == '') return false;	
	// Elimina CPFs invalidos conhecidos	
	if (cpf.length != 11 || 
		cpf == "00000000000" || 
		cpf == "11111111111" || 
		cpf == "22222222222" || 
		cpf == "33333333333" || 
		cpf == "44444444444" || 
		cpf == "55555555555" || 
		cpf == "66666666666" || 
		cpf == "77777777777" || 
		cpf == "88888888888" || 
		cpf == "99999999999")
			return false;		
	// Valida 1o digito	
	add = 0;	
	for (i=0; i < 9; i ++)		
		add += parseInt(cpf.charAt(i)) * (10 - i);	
		rev = 11 - (add % 11);	
		if (rev == 10 || rev == 11)		
			rev = 0;	
		if (rev != parseInt(cpf.charAt(9)))		
			return false;		
	// Valida 2o digito	
	add = 0;	
	for (i = 0; i < 10; i ++)		
		add += parseInt(cpf.charAt(i)) * (11 - i);	
	rev = 11 - (add % 11);	
	if (rev == 10 || rev == 11)	
		rev = 0;	
	if (rev != parseInt(cpf.charAt(10)))
		return false;		
	return true;   
}

function limpa_formulário_cep() {
	document.getElementById("rua").value = "", document.getElementById("bairro").value = "", document.getElementById("cidade").value = "", document.getElementById("uf").value = ""
}

function meu_callback(e) {
	"erro" in e ? (limpa_formulário_cep(), alert("CEP n\xe3o encontrado.")) : (document.getElementById("rua").value = e.logradouro, document.getElementById("bairro").value = e.bairro, document.getElementById("cidade").value = e.localidade, document.getElementById("uf").value = e.uf)
}
  
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
  function calcularIdade(e){var t=new Date,a=t.getFullYear(),l=t.getMonth()+1,n=t.getDate(),r=e.split("-"),g=parseInt(r[0]),u=Number(r[1]),c=parseInt(r[2]),o=a-g;return(l<u||l==u&&n<c)&&(o-=1),console.log(o),o}


  
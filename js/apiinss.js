function in100(){
const cpf = '33959390734'; // CPF do beneficiário
const url = `https://api.portaldatransparencia.gov.br/api-de-dados/consignacoes/margem/${cpf}`;

fetch(url, {
  headers: {
    'chave-api-dados': '65191aa3d37024dd6c8b17c5968dfd73'
  }
})
.then(response => response.json())
.then(data => {
  console.log(data);
})
}

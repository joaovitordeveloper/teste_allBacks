function listarTorcedores() {

  var url = './controlador.php'


  let _data = {

  }

  fetch(url, {
    method: "POST",
    body: JSON.stringify(_data),
    headers: { "Content-type": "application/json; charset=UTF-8" }
  })
    .then(response => response.json())
    .then(json => {

      var htmlTorcedores = json.lista.map(Lista =>
        `<tr>
            <td class="text-center">${maskCPF(Lista.DOCUMENTO)}</td>
            <td class="text-center">${Lista.NOME}</td>
            <td class="text-center">${Lista.TELEFONE}</td>
            <td class="text-center">${Lista.EMAIL}</td>
            <td class="text-center">${Lista.CEP}</td>
            <td class="text-center">${Lista.ENDERECO}</td>
            <td class="text-center">${Lista.BAIRRO}</td>
            <td class="text-center">${Lista.CIDADE}</td>
            <td class="text-center">${Lista.UF}</td>
            <td class="text-center">${verificarAtivo(Lista.ATIVO)}</td>
          </tr>`
      )

      $('#listaTorcedores').append(htmlTorcedores)
      return;
    })
}

function verificarAtivo(dados) {
  if (dados == true ) {
    return 'Sim';
  }

  return 'Não';
}

function maskCPF(CPF) {
  var newStr;
  if (CPF.length > 11) {
    newStr = CPF.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/g, "\$1.\$2.\$3\/\$4\-\$5");
  } else {
    newStr = CPF.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/g, "\$1.\$2.\$3\-\$4");

  }

  return newStr;

}
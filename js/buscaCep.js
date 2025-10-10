$(document).ready(function () {
  $("#cep").blur(function () {
    let cep = $(this).val().replace(/\D/g, ''); //numeros

    if (cep.length === 8) {
      $.ajax({
        url: "https://viacep.com.br/ws/" + cep + "/json/",
        dataType: "json",
        success: function (dados) {
          if (!("erro" in dados)) {
            $("#endereco").val(dados.logradouro);
            $("#bairro").val(dados.bairro);
            $("#cidade").val(dados.localidade);
            $("#estado").val(dados.uf);
          } else {
            alert("CEP não encontrado.");
          }
        },
        error: function () {
          alert("Erro ao consultar o CEP.");
        }
      });
    } else if (cep.length > 0) {
      alert("CEP inválido! Digite 8 números.");
    }
  });
});

$(document).ready(function () {
  $.ajax({
    url: "PHP/listarcarroEmpresa.php",
    method: "GET",
    dataType: "json",
    success: function (data) {
      let conteudo = "";

      data.forEach(function (carro) {
        let imagensHTML = "";
        if (carro.imagens && carro.imagens.length > 0) {
          carro.imagens.forEach(img => { //mostra todas as imagens do vetor imagens feita no php do listar
            imagensHTML += `<img src="PHP/${img}" class="img-fluid mb-2 rounded" alt="${carro.modelo}">`;
          });
        }

        conteudo += `
  <div class="col-md-4 mb-4">
    <div class="card shadow-sm border-0 h-100 veiculo-card">
      <div class="card-img-top p-2">
        ${imagensHTML}
      </div>
      <div class="card-body">
        <h5 class="card-title">${carro.fabricante} ${carro.modelo}</h5>
        <p class="card-text text-muted small">
          <strong>Placa:</strong> ${carro.placa}<br>
          <strong>Cor:</strong> ${carro.cor}<br>
          <strong>Ano:</strong> ${carro.ano}<br>
          <strong>Valor:</strong> <span class="text-success fw-bold">R$ ${carro.valor}</span>
        </p>
      </div>
      <div class="card-footer d-flex justify-content-between align-items-center bg-white border-0">
        <span class="badge bg-${carro.statusveiculo === 'Disponível' ? 'success' : 'secondary'}">
          ${carro.statusveiculo}
        </span>
        <button class="btn btn-sm btn-outline-danger" onclick="exclusaoVeiculo(this, ${carro.id_veiculo})">
          <i class="fa-solid fa-trash"></i> Excluir
        </button>
      </div>
    </div>
  </div>
`;

      });

      $("#localVeiculos").html(conteudo);
    },
    error: function (xhr, status, error) {
      console.error("Erro ao buscar carros:", status, error);
      $("#localVeiculos").html(`<div class="col-12 text-danger">Erro ao carregar veículos.</div>`);
    }
  });
});


function exclusaoVeiculo(btn, idVeiculo) {
  if (!confirm("Deseja realmente excluir este veículo?")) return;

  $.ajax({
    url: "PHP/excluirVeiculo.php",
    method: "POST",
    data: { id_veiculo: idVeiculo },
    success: function (res) {
      alert("Veículo excluído com sucesso!");
      $(btn).closest('.col-md-4').remove();
    },
    error: function (xhr, status, error) {
      console.error("Erro ao excluir veículo:", status, error);
      alert("Não foi possível excluir o veículo.");
    }
  });
}
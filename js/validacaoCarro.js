document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector("form");

 
  const campos = [
    "ano", "placa", "status", "fabricante", "modelo", "carroceria",
    "cor", "cambio", "combustivel", "km", "valor", "custos_extra", "imagens"
  ];

 
  campos.forEach(id => {
    const campo = document.getElementById(id);
    const span = document.createElement("small");
    span.style.color = "red";
    span.className = "error-message";
    campo.parentNode.appendChild(span);
  });

  form.addEventListener("submit", function (e) {
    let erros = [];

    
    document.querySelectorAll(".error-message").forEach(el => el.textContent = "");

   
    const ano = document.getElementById("ano").value;
    if (!ano || ano < 1900 || ano > 2099) {
      erros.push("ano");
      document.querySelector("#ano + .error-message").textContent = "Informe um ano válido entre 1900 e 2099.";
    }

    
    const placa = document.getElementById("placa").value.trim().toUpperCase();
    const regexPlaca = /^(?:[A-Z]{3}-\d{4}|[A-Z]{3}\d[A-Z]\d{2})$/;
    
    if (!regexPlaca.test(placa)) {
      erros.push("placa");
      document.querySelector("#placa + .error-message").textContent = 
        "Informe uma placa válida no formato ABC-1234 ou ABC1D23.";
    }
    
    const selects = ["status","fabricante","modelo","carroceria","cor","cambio","combustivel"];
    selects.forEach(id => {
      const val = document.getElementById(id).value;
      if (!val) {
        erros.push(id);
        document.querySelector(`#${id} + .error-message`).textContent = "Campo obrigatório.";
      }
    });

    const km = document.getElementById("km").value.trim();
    if (!km || isNaN(km) || Number(km) < 0) {
      erros.push("km");
      document.querySelector("#km + .error-message").textContent = "Informe uma quilometragem válida.";
    }

    
    const valor = document.getElementById("valor").value;
    if (!valor || Number(valor) < 0) {
      erros.push("valor");
      document.querySelector("#valor + .error-message").textContent = "Informe um valor válido.";
    }


    const custos = document.getElementById("custos_extra").value;
    if (!custos || Number(custos) < 0) {
      erros.push("custos_extra");
      document.querySelector("#custos_extra + .error-message").textContent = "Informe um valor válido.";
    }

  
    const imagens = document.getElementById("imagens").files;
    if (imagens.length === 0) {
      erros.push("imagens");
      document.querySelector("#imagens + .error-message").textContent = "Envie pelo menos uma imagem.";
    }

    
    if (erros.length > 0) {
      e.preventDefault();
      alert("Por favor, corrija os erros destacados nos campos.");
    }
  });
});

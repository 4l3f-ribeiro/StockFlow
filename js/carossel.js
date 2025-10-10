(function () {
    function scrollCarrossel(direction) {
      const carrossel = document.getElementById("carrossel");
      if (!carrossel) return;
  
      const scrollAmount = carrossel.clientWidth; 
      const delta = direction === "left" ? -scrollAmount : scrollAmount;
  
      carrossel.scrollBy({ left: delta, behavior: "smooth" });
    }
  
    // Torna acessível ao HTML inline
    window.scrollCarrossel = scrollCarrossel;
  })();
  
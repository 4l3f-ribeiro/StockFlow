<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/pagina-inicial.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@0;1&family=Special+Gothic+Expanded+One&display=swap" rel="stylesheet">
    <script src="js/carossel.js"></script>


    <title>Stock Flow</title>
  </head>
  <body>

    <!-- NAVBAR -->
    <nav class="navbar">
      <img src="imagens/logo-sembgrecortada.png" class="logo">
      <ul class="buttons">
        <li><a href="pagina-cadastro.html" class="links">Sobre nós</a></li>
        <li><a href="pagina-cadastro.html" class="links">Recursos</a></li>
        <li><a href="pagina-login.php" class="links">Login</a></li>
        <li><a href="pagina-cadastro-empresa.php" class="login">Cadastrar</a></li>
      </ul>
    </nav>



    <!-- INICIO/AREA DE LOGIN INICIAL -->
    <section class="inicio">
      <div class="carrossel-container">
        <h2 class="carrossel-title">Carros mais buscados</h2>
    
        <button class="btn btn-left" onclick="scrollCarrossel('left')">&#8249;</button>
    
        <!-- Container rolável -->
        <div class="carrossel" id="carrossel">

          <div class="card">
            <img src="imagens/.png" alt="Corolla">
            <p class="marca">Toyota</p>
            <p class="modelo">Corolla</p>
          </div>

          <div class="card">
            <img src="imagens/.png" alt="Fit">
            <p class="marca">Honda</p>
            <p class="modelo">Fit</p>
          </div>

          <div class="card">
            <img src="imagens/.png" alt="Gol">
            <p class="marca">Volkswagen</p>
            <p class="modelo">Gol</p>
          </div>

          <div class="card">
            <img src="imagens/.png" alt="Jetta">
            <p class="marca">Volkswagen</p>
            <p class="modelo">Jetta</p>
          </div>

          <div class="card">
            <img src="imagens/.png" alt="S10">
            <p class="marca">Chevrolet</p>
            <p class="modelo">S10</p>
          </div>
        </div>
    
        <button class="btn btn-right" onclick="scrollCarrossel('right')">&#8250;</button>
      </div>
    </section>
    



    <!-- SOBRE NÓS/INFORMAÇÔES DO STOCK FLOW -->
    <section class="sobreNos">
      <video class="videocarro" autoplay loop muted playsinline>
        <source src="videos/carrofundo.mp4" type="video/mp4">
      </video>
      <div class="content">
        <h2 class="hSobre">Controle seu estoque, <span> acelere </span>seus resultados.</h2>
        <p class="descricao">
          O Stock Flow é uma ferramenta desenvolvida com foco na modernização, praticidade e eficiência da gestão de estoque de veículos, voltada especialmente para concessionárias e revendedoras. Criamos uma solução tecnológica completa, que busca automatizar e simplificar os processos diários de controle de veículos — desde a entrada no pátio até a finalização da venda.
        </p>
      </div>
    </section>
    
    

    <!-- RECURSOS OFERECIDOS -->
    <section class="recursos">
      <h2>Fun<span>ções</span></h2>
      <div class="rec">
        <!-- info 1 -->
        <div class="info">
          <h3>Equ<span>ipe</span></h3>
          <div class="list-content">
            <img src="videos/teamwork.gif" alt="">
            <ul>
              <li>O escapamento assobiava jazz enquanto o volante filosofava sobre a existência dos faróis.</li>
              <li>O pneu sonhava em virar volante numa tarde de domingo.</li>
              <li>O farol piscava em código morse tentando conversar com o para-brisa distraído.</li>
              <li>O escapamento assobiava jazz enquanto o volante filosofava sobre a existência dos faróis.</li>
            </ul>
          </div>
        </div>

      <!-- info 2 -->
        <div class="info" id="inf2">
          <h3><span>Otimização</span> e Eficiência</h3>
          <div class="list-content">
            <img src="videos/productivity.gif" alt="">
            <ul>
              <li>O farol piscava em código morse tentando conversar com o para-brisa distraído.</li>
              <li>O escapamento assobiava jazz enquanto o volante filosofava sobre a existência dos faróis.</li>
              <li>O pneu sonhava em virar volante numa tarde de domingo.</li>
              <li>O farol piscava em código morse tentando conversar com o para-brisa distraído.</li>
            </ul>
          </div>
        </div>

      <!-- info 3 -->
        <div class="info">
          <h3>Controle de <span>Estoque</span></h3>
          <div class="list-content">
            <img src="videos/task-management.gif" alt="">
            <ul>
              <li>O escapamento assobiava jazz enquanto o volante filosofava sobre a existência dos faróis.</li>
              <li>O pneu sonhava em virar volante numa tarde de domingo.</li>
              <li>O escapamento assobiava jazz enquanto o volante filosofava sobre a existência dos faróis.</li>
              <li>O farol piscava em código morse tentando conversar com o para-brisa distraído.</li>
            </ul>
          </div>
        </div>

      </div>
    </section>



   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="carrossel.js"></script>
  </body>
</html>

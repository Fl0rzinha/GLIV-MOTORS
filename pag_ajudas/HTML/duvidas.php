<?php
    // tenta iniciar a sessão com o "session_start()".
    session_start(); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GLIV MOTORS</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon">
    <!-- CSS BS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- JAVA BS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- ICONS BS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- CSS PERS. -->
    <link rel="stylesheet" href="../CSS/style.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="../../assets/favicon.png" type="image/x-icon">
</head>
<body>
    <?php
        ob_start();

        if(isset($_GET['msg-success'])) {
            $msg = $_GET['msg-success'];

            echo '<div class="alert alert-success" id="success-alert" role="alert">' . $msg . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close" onclick="resetUrl()"></button></div>';
        }

        if(isset($_GET['msg-error'])) {
            $msg = $_GET['msg-error'];

            echo '<div class="alert alert-danger" role="alert">' . $msg . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close" onclick="resetUrl()"></button></div>';
        }

    ?>
    <header>
        <div class="container" id="container-logo">
            <img src="../../assets/logo site.png" alt="Logo">
            <a href="../../index.php" class="title-logo">GLIV MOTORS</a>
        </div>

        <!-- links das opções -->
        <nav class="links-opcoes">
            <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle botao-menuzinho" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                  Comprar
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../../pag_veiculos/HTML/sedan.php">Sedans</a></li>
                    <li><a class="dropdown-item" href="../../pag_veiculos/HTML/suv.php">SUVs</a></li>
                    <li><a class="dropdown-item" href="../../pag_veiculos/HTML/hatch.php">Hatch</a></li>
                    <li><a class="dropdown-item" href="../../pag_veiculos/HTML/esportivo.php">Esportivo</a></li>
                    <li><a class="dropdown-item" href="../../pag_veiculos/HTML/eletrico.php">Elétrico</a></li>
                    <li><a class="dropdown-item" href="../../pag_veiculos/HTML/picape.php">Picape</a></li>
                    <li><a class="dropdown-item" href="../../pag_veiculos/HTML/luxo.php">Luxo</a></li>
                    <li><a class="dropdown-item" href="../../pag_veiculos/HTML/drift.php">Drift</a></li>
                </ul>
              </div>
    
              <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle botao-menuzinho" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                  Autopeças
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Filtro de ar</a></li>
                    <li><a class="dropdown-item" href="#">Bateria</a></li>
                    <li><a class="dropdown-item" href="#">Lâmpadas</a></li>
                    <li><a class="dropdown-item" href="#">Retrovisor</a></li>
                    <li><a class="dropdown-item" href="#">Freios</a></li>
                </ul>
              </div>
    
              <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle botao-menuzinho" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                  Serviços
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Seguro</a></li>
                    <li><a class="dropdown-item" href="#">Troca de óleo</a></li>
                    <li><a class="dropdown-item" href="#">Troca de filtro de ar</a></li>
                    <li><a class="dropdown-item" href="#">Instalação de acessório</a></li>
                    <li><a class="dropdown-item" href="#">Troca de Bateria</a></li>
                </ul>
              </div>
    
              <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle botao-menuzinho" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                  Ajuda
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Suporte</a></li>
                    <li><a class="dropdown-item" href="contato.php">Contato</a></li>
                </ul>
              </div>
        </nav>

        <nav class="container" id="icones-direita">
            <!-- icon perfil -->
            <!-- <div class="icon-perfil">
                <i class="bi bi-person-circle"></i>
            </div> -->
            <div class="btn-group">
                <button class="icon-perfil" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle"></i>
                </button>
                <?php
                    // verifica se a sessão está ativa ou não com as variáveis passadas com o isset (mesmo esquema de quando usamos o formulário no method post).
                    if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION['user']) && isset($_SESSION['email']) && isset($_SESSION['id'])) {
                        // define as variáveis da sessão com os parâmetros da mesma, como user, email e id
                        $user = $_SESSION['user'];
                        $email = $_SESSION['email'];
                        $id = $_SESSION['id'];

                        // exibe as informações da sessão usando as variáveis
                        echo "<ul class='dropdown-menu'>
                                <li><a class='dropdown-item' href='#'>Logado como $user</a></li>
                                <li><a class='dropdown-item' href='../../tela_de_vizualizacao.php'>Ver perfil</a></li>
                                <form action='duvidas.php' method='post'>
                                    <input class='dropdown-item' type='submit' value='Sair' name='submit_button'>
                                </form>
                              </ul>";

                        // cria um mini formulário com um botão que serve para disparar o comando de logout
                        
                        // verifica se o botão foi pressionado
                        if(isset($_POST['submit_button'])) {
                            // destrói a sessão já iniciada
                            session_destroy();
                            // muda a localização para o index.php para atualizar a página automaticamente já com a sessão encerrada
                            
                            echo "<script>location.reload();</script>";

                        }
                    } else {
                        echo '<ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../login_e_registro/login.php">Login</a></li>
                                <li><a class="dropdown-item" href="../../login_e_registro/registro.php">Registro</a></li>
                              </ul>';
                    }
                ?>
              </div>

            <!-- icon coração -->
            <div class="icon-coracao">
                <i class="bi bi-heart-fill"></i>
                <label for="heart">5</label>
            </div>

            <!-- icon carrinho -->
            <div class="icon-carrinho">
                <label for="heart">14</label>
                <i class="bi bi-cart4"></i>
            </div>
        </nav>
    </header>

    <main>
        <!-- slide -->
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="text-box-slide">
                    <h1>Carros de luxo</h1>
                    <p>A estrada chama, e o carro responde com a liberdade da velocidade.</p>
                </div>
                <img src="../../assets/slides-home/slide-1.jpeg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <div class="text-box-slide">
                    <h1>Emoção nas Pistas</h1>
                    <p>Mais do que metal e motor, um carro é a promessa de aventuras sem limites.</p>
                </div>
                <img src="../../assets/slides-home/slide-2.jpeg" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

          <div class="scrool-abas">

            <div class="rolagem">
                <a href="#" class="caixa">
                    <div>
                        <h1>Dano a terceiros</h1>

                        <p>Imprevistos acontecem. Por isso, em caso de dados a terceiros, nós te ajudamos com os reparos, reposições e até mesmo com um advogado, caso seja necessário. Na hora de contratar, escolha o valor que deseja para este seguro e dirija sem preocupações..</p>
                    </div>
                </a>
                <a href="#" class="caixa">
                    <div>
                        <h1>Roubo e furto</h1>

                        <p>Conte com a gente se o seu veículo for roubado ou furtado. Caso isso aconteça, você receberá uma indenização para cobrir o prejuízo.</p>
                    </div>
                </a>
                <a href="#" class="caixa">
                    <div>
                        <h1>Perda Total</h1>
                        <p>Em caso de perda total, vamos te pagar o valor do seu carro segurado, de acordo com a apólice.Chamamos esse pagamento de indenização integral. Consideramos como perda total, o momento em que o custo do conserto do veículo ultrapassa o percentual do valor estipulado na apólice. Isso acontece geralmente em casos de colisão, incêndio, roubo, furto ou alagamento.</p>
                    </div>
                </a>
                <a href="#" class="caixa">
                    <div>
                        <h1>Colisão</h1>
                        <p>Alguém bateu no seu carro? Não se preocupe! Com essa cobertura, você está seguro em caso de colisão parcial ou total. E, se quiser o seguro para terceiros, também temos esse serviço para você adicionar.</p>
                    </div>
                </a>
                <a href="#" class="caixa">
                    <div>
                        <h1>Incendios</h1>
                        <p>Essa situação é muito desagradável, ainda mais quando acontece uma explosão. Mas, nessas horas, estamos com você também. Cobrimos qualquer tipo de incêndio interno ou externo. Seja provocado por um problema mecânico ou até mesmo por raios.</p>
                    </div>
                </a>
            </a>
            <a href="#" class="caixa">
                <div>
                    <h1>Proteção Completa</h1>
                    <p>Conte com uma proteção completa para o seu carro, além de benefícios exclusivos como desconto em estacionamentos parceiros, serviço de assistência para residência, crédito em APP de transporte em caso de emergência e muito mais!</p>
                </div>
            </a>
            </div>
          </div>

  
    </main>
    
    <footer>
        <section class="elementos-up">
            <div class="redes-sociais">
                <h3>Acesse nossas redes sociais</h3>
                <nav class="icons-redes">
                    <a href="https://www.youtube.com/"><i class="bi bi-youtube" id="youtube-icon"></i> GLIV MOTORS</a>
                    <a href="https://www.facebook.com/?locale=pt_BR"><i class="bi bi-facebook" id="face-icon"></i> GLIV MOTORS</a>
                    <a href="https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoicHQifQ%3D%3D%22%7D"><i class="bi bi-twitter" id="twitter-icon"></i> GLIV_MOTORS</a>
                    <a href="https://www.instagram.com/"><i class="bi bi-instagram" id="instagram-icon"></i> @GLIV_MOTORS</a>
                </nav>
            </div>

            <div class="info-footer">
                <h3>Comprar</h3>

                <div class="div-info-footer">
                    <a href="#">Carros usados</a>
                    <a href="#">Carros novos</a>
                    <a href="#">Vistoriado</a>
                </div>
            </div>

            <div class="info-footer">
                <h3>Serviços</h3>

                <div class="div-info-footer">
                    <a href="#">Financiamento</a>
                    <a href="#">Catálogo 0km</a>
                    <a href="#">Vistoriado</a>
                    <a href="#">Seguro veículo</a>
                    <a href="#">Publicidade</a>
                    <a href="#">Multas e débitos</a>
                </div>
            </div>

            <div class="info-footer">
                <h3>Autopeças</h3>

                <div class="div-info-footer">
                    <a href="#">Peças novas</a>
                    <a href="#">Peças internacionais</a>
                    <a href="#">Peças nacionais</a>
                </div>
            </div>

            <div class="info-footer">
                <h3>Ajuda</h3>

                <div class="div-info-footer">
                    <a href="#">Suporte</a>
                    <a href="#">Fale conosco</a>
                    <a href="#">Contato</a>
                </div>
            </div>
        </section>

        <section class="elementos-down">
            <p>Todos os direitos reservados <i class="bi bi-c-circle" id="copy-simble"></i> 2023 - GLIV MOTORS</p>
        </section>
    </footer>
</body>
</html>
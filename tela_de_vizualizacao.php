<?php
    // tenta iniciar a sessão com o "session_start()".
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon">
<link rel="stylesheet" href="vizualizacao.css">
<title>Página de veículos</title>

</head>
<body>
<header>
        <div class="container" id="container-logo">
            <img src="assets/logo site.png" alt="Logo">
            <a href="index.php" class="title-logo">GLIV MOTORS</a>
        </div>
        <!-- links das opções -->
        <nav class="links-opcoes">
            <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle botao-menuzinho" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                  Comprar
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="pag_veiculos/HTML/sedan.php">Sedans</a></li>
                    <li><a class="dropdown-item" href="pag_veiculos/HTML/suv.php">SUVs</a></li>
                    <li><a class="dropdown-item" href="pag_veiculos/HTML/hatch.php">Hatch</a></li>
                    <li><a class="dropdown-item" href="pag_veiculos/HTML/esportivo.php">Esportivo</a></li>
                    <li><a class="dropdown-item" href="pag_veiculos/HTML/eletrico.php">Elétrico</a></li>
                    <li><a class="dropdown-item" href="pag_veiculos/HTML/picape.php">Picape</a></li>
                    <li><a class="dropdown-item" href="pag_veiculos/HTML/luxo.php">Luxo</a></li>
                    <li><a class="dropdown-item" href="pag_veiculos/HTML/drift.php">Drift</a></li>
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
                    <li><a class="dropdown-item" href="pag_servicos/HTML/oleo.php">Troca de óleo</a></li>
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
                    <li><a class="dropdown-item" href="pag_ajudas/HTML/duvidas.php">Suporte</a></li>
                    <li><a class="dropdown-item" href="pag_ajudas/HTML/contato.php">Contato</a></li>
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
                                <li><a class='dropdown-item' href='#'>Ver perfil</a></li>
                                <form action='index.php' method='post'>
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
                                <li><a class="dropdown-item" href="login_e_registro/login.php">Login</a></li>
                                <li><a class="dropdown-item" href="login_e_registro/registro.php">Registro</a></li>
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
        
    <h1 id="titulo">Vizualização de perfil</h1>

    <br><br><br>
    <?php
    
        $user = $_SESSION['user'];
        $email = $_SESSION['email'];
        $id = $_SESSION['id'];

        echo "<form>

                <label for='nome'>Id:</label>
                <input type='text' id='nome' name='id' value='$id' disabled>

                <label for='sobrenome'>Usuário:</label>
                <input type='text' id='sobrenome' name='usuario' value='$user' disabled>

                <label for='email'>Email:</label>
                <input type='email' id='email' name='email' value='$email' disabled>
        
                <div class='entrar-div'>
            
                    <a href='index.php' id='button-home-form'>Voltar</a>
                </div>
            </form>";
    ?>
    
    <!--  -->
    <footer>
        <section class="elementos-up">
            <div class="redes-sociais">
                <h3>Acesse nossas redes sociais</h3>
                <nav class="icons-redes">
                    <a href="#"><i class="bi bi-youtube" id="youtube-icon"></i> GLIV MOTORS</a>
                    <a href="#"><i class="bi bi-facebook" id="face-icon"></i> GLIV MOTORS</a>
                    <a href="#"><i class="bi bi-twitter" id="twitter-icon"></i> GLIV_MOTORS</a>
                    <a href="#"><i class="bi bi-instagram" id="instagram-icon"></i> @GLIV_MOTORS</a>
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
                    <a href="#">Para você</a>
                    <a href="#">Para sua loja</a>
                    <a href="#">Segurança</a>
                    <a href="#">Sobre nós</a>
                </div>
            </div>
        </section>

        <section class="elementos-down">
            <p>Todos os direitos reservados <i class="bi bi-c-circle" id="copy-simble"></i> 2023 - GLIV MOTORS</p>
        </section>
    </footer>
</body>
</html>
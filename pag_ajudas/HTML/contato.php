<?php
    include("../../login_e_registro/config/connect.php");
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
    <link rel="stylesheet" href="../CSS/contatos.css">
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
                    <li><a class="dropdown-item" href="../../pag_servicos/HTML/oleo.php">Troca de óleo</a></li>
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
                    <li><a class="dropdown-item" href="duvidas.php">Suporte</a></li>
                    <li><a class="dropdown-item" href="#">Contato</a></li>
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
                                <form action='contato.php' method='post'>
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

    <form action="contato.php" method='POST' class="formulario-contato">
        <h2 class="texto-formulario">Formulário de contato</h2>
        <br>

        <label for="">Nome</label>
        <div>
            <input class="inputcontato" type="text" id="nomeid" placeholder="Digite seu nome" id="username" name='name'>
        </div>

        <br>

        <label for="">E-mail</label>
        <div>  
            <input class="inputcontato" type="email" id="emailid" placeholder="Digite um endereço de email válido" id="email" name='email'>
        </div>

       
        <br>

        <label for="">Mensagem</label> 
        <div>
            <input class="inputcontato" id="mensagemid"  placeholder="Digite sua mensagem aqui" type="text" name='msg'>
        </div>
        
        
        

        <br>
        <br>

         <!-- Botão de envio -->
         <div>
            <button type='submit' class="botaocontato">Enviar</button>
        </div>
    </form>

    <?php
        if(isset($_POST['name'], $_POST['email'], $_POST['msg'])) {
            $nameForm = $_POST['name'];
            $emailForm = $_POST['email'];
            $msgForm = $_POST['msg'];

            $sql = "INSERT INTO `contato`(`id`, `nome`, `email`, `report`) VALUES (NULL, '$nameForm', '$emailForm', '$msgForm')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("location: contato.php?msg-success=Report enviado com sucesso!");
            } else {
                echo "Failed: " . mysqli_error($conn);
            }
        }
    ?>

   
     <div class="mapa">
        <h2 class="titulo1">Localização</h2><br>
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3654.544179933458!2d-46.52969852474568!3d-23.65648977873462!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce428f7179df4b%3A0x61e27ba93ba31f8!2sR.%20Cel.%20Oliveira%20Lima%20-%20Centro%2C%20Santo%20Andr%C3%A9%20-%20SP%2C%2009010-000!5e0!3m2!1spt-BR!2sbr!4v1685100987897!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <br>
    <br>
    <br>
  

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
<?php
    include("config/connect.php");
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- CSS PERSONALIZADO -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
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
    <!-- header -->
    <header>
        <div class="container" id="container-logo">
            <img src="../assets/logo site.png" alt="Logo">
            <a href="../index.php" class="title-logo">GLIV MOTORS</a>
        </div>

        <!-- links das opções -->
        <nav class="links-opcoes">
            <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle botao-menuzinho" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                  Comprar
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../pag_veiculos/HTML/sedan.php">Sedans</a></li>
                    <li><a class="dropdown-item" href="../pag_veiculos/HTML/suv.php">SUVs</a></li>
                    <li><a class="dropdown-item" href="../pag_veiculos/HTML/hatch.php">Hatch</a></li>
                    <li><a class="dropdown-item" href="../pag_veiculos/HTML/esportivo.php">Esportivo</a></li>
                    <li><a class="dropdown-item" href="../pag_veiculos/HTML/eletrico.php">Elétrico</a></li>
                    <li><a class="dropdown-item" href="../pag_veiculos/HTML/picape.php">Picape</a></li>
                    <li><a class="dropdown-item" href="../pag_veiculos/HTML/luxo.php">Luxo</a></li>
                    <li><a class="dropdown-item" href="../pag_veiculos/HTML/drift.php">Drift</a></li>
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
                    <li><a class="dropdown-item" href="../pag_servicos/HTML/oleo.php">Troca de óleo</a></li>
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
                    <li><a class="dropdown-item" href="../pag_ajudas/HTML/duvidas.php">Suporte</a></li>
                    <li><a class="dropdown-item" href="../pag_ajudas/HTML/contato.php">Contato</a></li>
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
                                <form action='drift.php' method='post'>
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
                                <li><a class="dropdown-item" href="#">Login</a></li>
                                <li><a class="dropdown-item" href="registro.php">Registro</a></li>
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

    <div class="container col-11 col-md-9" id="form-container">
        <div class="row align-items-center gx-5">
            <div class="col-md-6 order-md-2">
                <h2>Faça seu login</h2>
                <form action="login.php" method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="userEmail" id="email" placeholder="Digite o seu email">
                        <label for="email" class="form-label">Digite seu email ou usuário</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control passwordInput" name="password" id="password" placeholder="Digite sua senha">
                        <label for="password" class="form-label">Digite sua senha</label>
                        <i class="bi bi-lock icone-cadeado" id="icon-lock" onclick="togglePassword('icon-lock','.passwordInput')"></i>
                    </div>
                    <input type="submit" class="btn btn-primary butao" value="Entrar">
                </form>
            </div>
            <div class="col-md-6 order-md-1">
                <div class="col-12">
                    <img src="../assets/logo site.png" alt="logo" class="img-fluid">
                </div>
                <div class="col-12" id="link-container">
                    <a href="registro.php"><i class="bi bi-exclamation-circle-fill"></i>Ainda não tenho cadastro</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    
            if(isset($_POST['userEmail'], $_POST['password'])) {
                $userEmail = $_POST['userEmail'];
                $password = $_POST['password'];

                $sql = "SELECT * FROM `contas` WHERE (user = '$userEmail' OR email = '$userEmail') AND password = '$password'";

                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();

                if($result->num_rows == 0) {
                    header("location: login.php?msg-error=Usuário não encontrado, verifique o email ou a senha e tente novamente.");
                } else {
                    $row = $result->fetch_assoc();
                    session_start();
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['user'] = $row['user'];
                    $id = $_SESSION['user'];

                    header("Location: ../index.php?msg-success=Logado com sucesso como $id");
                    exit;
                }
            }
    
    ?>
    <!-- footer -->
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
                    <a href="#">Suporte</a>
                    <a href="#">Contato</a>
                </div>
            </div>
        </section>

        <section class="elementos-down">
            <p>Todos os direitos reservados <i class="bi bi-c-circle" id="copy-simble"></i> 2023 - GLIV MOTORS</p>
        </section>
    </footer>

    <script src="script.js"></script>
</body>
</html>
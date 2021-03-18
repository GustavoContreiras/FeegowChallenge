<?php require_once("constants.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Feegow Challenge</title>
    <meta name="twitter:title" content="Feegow Challenge">
    <meta name="twitter:image" content="assets/img/favicon.jpg">
    <meta name="description" content="Developed by Gustavo Contreiras">
    <meta property="og:image" content="assets/img/favicon.jpg">
    <meta name="twitter:description" content="Developed by Gustavo Contreiras">
    <link rel="icon" type="image/jpeg" sizes="512x512" href="assets/img/favicon.jpg">
    <link rel="icon" type="image/jpeg" sizes="192x192" href="assets/img/favicon.jpg">
    <link rel="icon" type="image/jpeg" sizes="180x180" href="assets/img/favicon.jpg">
    <link rel="icon" type="image/jpeg" sizes="32x32" href="assets/img/favicon.jpg">
    <link rel="icon" type="image/jpeg" sizes="16x16" href="assets/img/favicon.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- Popup messages -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.all.min.js" integrity="sha256-RRb75FFB4bqHpBTVaEua+QNVpKSI5m4HBvQKgY1E8S4=" crossorigin="anonymous"></script>
</head>

<body>

    <?php require_once("feegow_api.php"); ?>
    <?php include("elems/nav_bar.php"); ?>

    <!-- Main content -->
    <header class="masthead" style="background: url('assets/img/bg-masthead.jpg')no-repeat center center;background-size: cover;">

        <?php include("elems/search_container.php") ?>

        <!-- Search results container (should be created dynamically) -->
        <div class="container mt-5">

            <!-- Doctors cards -->
            <div class="row results">

                <?php foreach (get_professionals() as $professional) { 
                    $professional_id = $professional['profissional_id']; 
                    $specialties = $professional['especialidades'][0] ?? null;
                    if ($specialties) {
                        $specialty_id = $specialties['especialidade_id']; 
                        $nome = $professional['nome'];
                        $crm = $professional['documento_conselho'];
                        if ($nome && $crm && $specialty_id) {
                            include('elems/search_result.php');
                        }
                    }
                } ?>

            </div>

            <!-- No results message -->
            <div class="row d-none" id="no-results">
                <div class="col text-center">
                    <span>Nenhum médico encontrado</span>
                </div>
            </div>
        </div>
    </header>
    
    <?php include("elems/footer.php"); ?>
    <?php include("elems/modal.php"); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta2/js/bootstrap.bundle.min.js"></script>
    <script src="index.js"></script>
</body>

</html>
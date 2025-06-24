<?php 
require_once(__DIR__ . '/../banco.php');
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    

<!-- CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    
    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            margin-top:
        }

        td {
        border: 4px solid #333;
        width: 200px;
        }

        thead,
        tfoot {
        background-color: #333;
        color: #fff;
        }

        main {
            flex: 1; 
        }

        .nav-link:hover {
            color:rgb(116, 117, 119) !important; 
        }

        select {
        color:#333 /* Cor da fonte dentro do select */
        
        }

        .select2-results {
            background:#333 !important;
        }

        .scFormPage .select2-container .select2-dropdown {
            border-color:rgb(116, 117, 119) !important;
        }

        .select2-dropdown {
            background:#333 !important;
            border-radius: 0 0 10px 10px !important;
            overflow: hidden !important;
        }

        .select2-container--default .select2-search--dropdown .select2-search__field {
            border-color:rgb(116, 117, 119) !important;
            border-radius: 10px !important;
        }

        .select2-search--dropdown {
        }


    </style>

</head>
            <header class="p-3 text-bg-dark border-bottom">
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                        
                        <a href="/crud/index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-house me-2" viewBox="0 0 16 16">
                                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                            </svg>
                            <span class="fs-4 fw-bold">Home</span>
                        </a>
                        
                        <ul class="nav gap-3 mx-auto">
                            <li class="nav-item">
                                <a href="/crud/src/carro/index.php" class="nav-link px-2 text-white d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-car-front-fill me-1" viewBox="0 0 16 16">
                                        <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
                                    </svg>
                                    Carros
                                </a>
                            </li>
                            

                            
                            <li class="nav-item">
                                <a href="/crud/src/proprietario/index.php" class="nav-link px-2 text-white d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-people-fill me-1" viewBox="0 0 16 16">
                                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                                    </svg>
                                    Proprietarios
                                </a>
                            </li>

                        </ul>
                        
                        
                        
                        <div class="text-end">
                            <!-- <button type="button" class="btn btn-outline-light me-2">Login</button>
                            <button type="button" class="btn btn-warning">Sign-up</button> -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                            </svg>
                        </div>
                    
                    </div>
                </div>
                    
                    </div>
                </div>
            </header> 

    <body class="d-flex text-center text-bg-dark">


    <?php
    require_once 'alert.php';
    ?>


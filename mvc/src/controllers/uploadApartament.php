<?php
function ctrlUploadApartament($request, $response, $container){

    $response->setTemplate("uploadApartamentView.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['titol']) && isset($_POST['adreca']) && isset($_POST['longitud']) && isset($_POST['latitud']) && isset($_POST['descripcio']) && isset($_POST['metresQuadrats']) && isset($_POST['numHabitacions']) && isset($_POST['preuDiaTemporadaBaixa']) && isset($_POST['preuDiaTemporadaAlta']) && isset($_POST['numPersones'])) {
            $titol = $_POST['titol'];
            $adreca = $_POST['adreca'];
            $longitud = $_POST['longitud'];
            $latitud = $_POST['latitud'];
            $descripcio = $_POST['descripcio'];
            $metresQuadrats = $_POST['metresQuadrats'];
            $numHabitacions = $_POST['numHabitacions'];
            $preuDiaTemporadaBaixa = $_POST['preuDiaTemporadaBaixa'];
            $preuDiaTemporadaAlta = $_POST['preuDiaTemporadaAlta'];
            $numPersones = $_POST['numPersones'];

            // $rolsAllowed = ['Usuari', 'Gestor', 'Administrador'];
            // if (!in_array($rol, $rolsAllowed)) {
            //     echo "Rol no permès.";
            //     return $response;
            // }

            // Check if the current user is an admin 
            $currentUserDb = $container->users()->getById($_SESSION['user']['Id']);
            if (($currentUserDb['Rol'] === 'Gestor') || ($currentUserDb['Rol'] === 'Administrador')) {    
                // Admin user, allow user creation
                $RegisterModel = $container->apartaments();

                    // Proceed with registration
                    $result = $RegisterModel->uploadApartament($titol, $adreca, $longitud, $latitud, $descripcio, $metresQuadrats, $numHabitacions, $preuDiaTemporadaBaixa, $preuDiaTemporadaAlta, $numPersones);

                    if ($result) {
                        // Registration successful
                        echo "successful!";
                    } else {
                        // Registration failed
                        echo "failed.";
                        
                    }
                }
            }
        }
        return $response;
    }

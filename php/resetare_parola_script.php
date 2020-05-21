<?php

if(isset($_POST["resetare-parola"])){
    //verifica parolele
    //sesion_start();
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $parolaNoua = $_POST['parola'];

    if($selector != NULL || $validator !=NULL){
          $oraCurenta = date("U");
          require 'db.php';

          $sql="SELECT * FROM resetare_parola WHERE resetareParolaSelector=? AND resetareParolaExpirareToken >= ?";                             //pentru mine
          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql)){
            //echo "Eroare la extragerea ora/selector";
            header("Location: parola_uitata.php?error=ELEXOS");
            exit();
          }else {
            mysqli_stmt_bind_param($stmt, "ss", $selector, $oraCurenta);
            mysqli_stmt_execute($stmt);
                                                                    //verifica daca selectorul e bun si timpul nu a expirat
            $result = mysqli_stmt_get_result($stmt);
            if(!$row = mysqli_fetch_assoc($result)){
              //echo "Data a expirat / Validatorul nu e bun!";
              header("Location: parola_uitata.php?error=DAEVNUB");
              exit();
            }else{
                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $row["resetareParolaToken"]);

                if($tokenCheck === false){                                                          //Verific daca token-urile (validatoarele) sunt identice
                  //echo "Eroare token-uri diferite!";
                  header("Location: parola_uitata.php?error=ETD");
                  exit();
                }else if($tokenCheck === true){
                  $resetEmail = $row['resetareParolaEmail'];

                  $sql = "SELECT * FROM user WHERE mail=?";
                  $stmt = mysqli_stmt_init($conn);
                  if(!mysqli_stmt_prepare($stmt,$sql)){                                               //verific daca se leaga bine la baza de date
                    //echo "Eroare baza de date ==> tabela user!";
                    header("Location: parola_uitata.php?error=EBDDSTU");
                    exit();
                  }else{
                    mysqli_stmt_bind_param($stmt, "s", $resetEmail);
                    mysqli_stmt_execute($stmt);

                    $result = mysqli_stmt_get_result($stmt);
                    if(!$row = mysqli_fetch_assoc($result)){                                                 //verific daca a luat date din baza de date
                      //echo "Nu are ce lua din tabela user? why?";
                      header("Location: parola_uitata.php?error=NACLDTUW");
                      exit();
                    }else{
                        $sql = "UPDATE user SET password=? WHERE mail=?";
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql)){
                          //echo "Eroare baza de date ==> Update password";
                          header("Location: parola_uitata.php?error=SGLSP");
                          exit();
                        }else{
                          $hashParolaNoua = hash ("sha512",$parolaNoua);
                          mysqli_stmt_bind_param($stmt, "ss", $hashParolaNoua, $resetEmail);
                          mysqli_stmt_execute($stmt);

                          $sql = "DELETE FROM resetare_parola WHERE resetareParolaEmail=?";
                          $stmt = mysqli_stmt_init($conn);
                          if(!mysqli_stmt_prepare($stmt, $sql)){
                            //echo "Eroare la delete row din tabela resetare_parola!";
                            header("Location: parola_uitata.php?error=ELDRDTR_P");
                            exit();
                          }else{
                            mysqli_stmt_bind_param($stmt, "s", $resetEmail);
                            mysqli_stmt_execute($stmt);
                            $conn->close();
                            header("Location: ../html/login.php?m=7");
                        }
                    }
                  }
                }
              }

          }

          }

    }else {
      echo "null selector";
      echo "null valdiator";
    }
 } else{
    header("Location:../../index.php");
 }

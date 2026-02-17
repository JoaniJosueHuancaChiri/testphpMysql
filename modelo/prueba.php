<?php
$password = "123456";
$hash = '$2y$10$nkDzhVrpG98t92A94XMvpOAb1ObekYDRHx9i8sdEpLnuUrsxDIdbi';

if (password_verify($password, $hash)) {
    echo "La contraseña es correcta.";
} else {
    echo "La contraseña es incorrecta.";
}
?>

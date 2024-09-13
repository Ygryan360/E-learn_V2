<?php
session_start();
require_once './functions.php';
verifyLoggedStatus();
if (!isAnAdmin()) {
    redirectToDashboard();
}
require_once 'dbconnect.php';

if (!empty($_POST)) {
    if ($_POST['password'] === $_POST['confirmPassword']){
        $newUsername = $_POST['username'];
        $newEmail = $_POST['email'];
        $newNumber = $_POST['number'];
    $newRole = $_POST['role'];
    $newPassword = $_POST['password'];
    $updateProfileQuery = "INSERT INTO `users` (`id`, `username`, `phone`, `email`, `password`, `role`, `register_date`) VALUES (NULL, :username, :phone, :email, :password, :role, :register_date)";
    $updateStatment = $pdo->prepare($updateProfileQuery);
    $updateStatment->execute([
        'username' => $newUsername,
        'phone' => $newNumber,
        'email' => $newEmail,
        'password' => $newPassword,
        'role' => $newRole,
        'register_date' => date('Y-m-d')
    ]);
    $updateStatment->closeCursor();
    } else {
        $error = 'Les mots de passe ne correspondent pas !';
        exit;
    }
}

// Header
$title = "Ajouter un utilisateur ";
require_once 'dashboard_header.php';
// sideBar
$adminpanel = true;
require_once 'sidebar.php';
?>
<div class="album py-3">
    <div class="container">
        <?php if (isset($error)) : ?>
            <div class="succes-div p-3 my-3">
                <?= $error ?>
            </div>
        <?php endif ?>
        <div class="bg-blanc p-3 course-shadow rounded-0">
            <div class="fs-1 mb-3 d-flex align-item-center">
                <i class="bi bi-person-fill me-5"></i>
                <p class="fw-semibold ">Ajouter un utilisateur :</p>
            </div>

            <form action="" method="post">
                <label for="username" class="form-label">Nom d'utilisateur :</label>
                <br>
                <input type="text" name="username" id="username" class="form-control rounded-0">
                <br>
                <label for="email" class="form-label">E-Mail :</label>
                <br>
                <input type="email" name="email" id="email" class="form-control rounded-0">
                <br>
                <label for="number" class="form-label">Numéro :</label>
                <br>
                <input type="tel" name="number" id="number" class="form-control rounded-0">
                <br>
                <label for="role" class="form-label">Type de compte :</label>
                <br>
                <select name="role" id="role" class="form-control rounded-0">
                    <?php foreach ($roles as $role) : ?>
                        <option value="<?= $role ?>"><?= $role ?></option>
                    <?php endforeach ?>
                </select>
                <br>
                <label for="password" class="form-label">Mot de passe :</label>
                <br>
                <input type="password" name="password" id="password" class="form-control rounded-0">
                <br>
                <label for="confirmPassword" class="form-label">Confirmer Mot de passe :</label>
                <br>
                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control rounded-0">
                <br>
                <button type="submit" class="btn btn-primary rounded-0">Modifier</button>
            </form>
        </div>
    </div>
</div>
</main>
</div>
</div>
<?php require_once "./footer.php"; ?>
<?php
session_start();
require_once './functions.php';
verifyLoggedStatus();
if (!isAnAdmin() || !isset($_GET['u'])) {
    redirectToDashboard();
}
$userId = $_GET['u'];
require_once 'dbconnect.php';

if (!empty($_POST)) {
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];
    $newNumber = $_POST['number'];
    $newRole = $_POST['role'];
    $updateProfileQuery = "UPDATE users SET username = :username, email = :email, phone = :phone, role = :role WHERE users.id = " . $userId . " ;";
    $updateStatment = $pdo->prepare($updateProfileQuery);
    $updateStatment->execute([
        'username' => $newUsername,
        'email' => $newEmail,
        'phone' => $newNumber,
        'role' => $newRole,
    ]);
    $updateStatment->closeCursor();
    $succes = "Profil Modifié avec succès !";
}

// requette pour recup les infos du profil
$getProfilQuery = "SELECT * FROM users WHERE users.id = " . $userId . " ;";
$profilInfos = pdoFetchAssocWithQuery($getProfilQuery, $pdo);
// Header
$title = "Modification : " . $profilInfos[0]['username'];
require_once 'dashboard_header.php';
// sideBar
$adminpanel = true;
require_once 'sidebar.php';
?>
<div class="album py-3">
    <div class="container">
        <?php if (isset($succes)) : ?>
            <div class="succes-div p-3 my-3">
                <?= $succes ?>
            </div>
        <?php endif ?>
        <div class="bg-blanc p-3 course-shadow rounded-0">
            <div class="fs-1 mb-3 d-flex align-item-center">
                <i class="bi bi-person-fill me-5"></i>
                <p class="fw-semibold ">Modification :</p>
            </div>
            <form action="" method="post">
                <label for="user_id" class="form-label">ID du compte :</label>
                <br>
                <input type="text" name="user_id" id="user_id" disabled value="<?= strtoupper($profilInfos[0]['id']) ?>" class="form-control rounded-0">
                <br>
                <label for="username" class="form-label">Nom d'utilisateur :</label>
                <br>
                <input type="text" name="username" id="username" value="<?= $profilInfos[0]['username'] ?>" class="form-control rounded-0">
                <br>
                <label for="email" class="form-label">E-Mail :</label>
                <br>
                <input type="email" name="email" id="email" value="<?= $profilInfos[0]['email'] ?>" class="form-control rounded-0">
                <br>
                <label for="number" class="form-label">Numéro :</label>
                <br>
                <input type="tel" name="number" id="number" value="<?= $profilInfos[0]['phone'] ?>" class="form-control rounded-0">
                <br>
                <label for="role" class="form-label">Type de compte :</label>
                <br>
                <select name="role" id="role" class="form-control rounded-0">
                    <?php foreach ($roles as $role) : ?>
                        <option value="<?= $role ?>" <?php echo ($profilInfos[0]['role'] === $role) ? "selected" : "" ?> ><?= $role ?></option>
                    <?php endforeach ?>
                </select>
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
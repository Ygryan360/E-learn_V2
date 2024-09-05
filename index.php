<?php require_once 'header.php'; ?>
<main>
    <!-- Bienvenue -->
    <div class="welcome d-flex p-5 fade-in-up">
        <h1 class="welcome__title mb-3">Bienvenue sur le site d'apprentissage en ligne <span>Version 2.</span></h1>
        <p class="welcome__text mt-2">
            Apprendre n'as jamais été si simplee :-)
        </p>
    </div>

    <!-- gotologin -->
    <div class="gotologin d-flex p-4 fade-in-up">
        <h1 class="gotologin__title fs-1 mt-5">Accedez aux cours</h1>
        <p class="gotologin__text">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus reprehenderit eius vitae.
        </p>
        <div class="container">
            <div class="gotologin__box d-flex row">
                <div class="gotologin__box__item m-2 col pt-5 pb-5 ps-3 fade-in-up pe-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-left"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z" />
                        <path fill-rule="evenodd"
                            d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                    </svg>
                    <h2>Connectez vous</h2>
                    <p class="m-2">Vous êtes déjà inscrit à l'université de lomé ? Connectez-vous à votre compte</p>
                    <a class="btn btn-primary" href="./login.php">Se connecter</a>
                </div>
                <div class="gotologin__box__item fade-in-up m-2 pt-5 pb-5 col">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add"
                        viewBox="0 0 16 16">
                        <path
                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
                    </svg>
                    <h2>Inscrivez vous</h2>
                    <p class="m-2">Vous êtes nouveau à l'université de lomé ? Connectez-vous à votre compte</p>
                    <a class="btn btn-primary" href="./register.php">S'inscrire</a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
require_once 'footer.php';
?>
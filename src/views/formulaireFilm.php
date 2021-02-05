<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="dist/css/style.css">
    <title>Movie Venger</title>
</head>

<body>
    <!--HEADER--->
    <div class="container-fluid p-4 header">
        <h1 class="text-center text-light"><a href="/" class="nav-link">MOVIE VENGER</a></h1>
    </div>
    <!---->
    <!--MENU-->
    <div class="container">
        <nav class="container navbar navbar-expand-lg">
            <!--menu mobile-->
            <div class="pos-f-t menu">
                <div class="collapse" id="navbarToggleExternalContent">
                    <ul class="navbar-nav">
                        <li class="text-white nav-item active">
                            <a href="/" class="nav-link">Accueil</a>
                        </li>
                        <?php if (!empty($_SESSION["pseudo"])) : ?>
                            <li class="text-white nav-item active">
                                <span href="#" class="nav-link">Bonjour, <?= $_SESSION["pseudo"] ?> !</span>
                            </li>
                        <?php else : ?>
                            <li class="text-white nav-item active">
                                <a href="#" class="nav-link">Inscription</a>
                            </li>
                            <li class="text-white nav-item active">
                                <a href="login" class="nav-link">Connexion</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <a class="btn d-lg-none" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                Catégories
            </a>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <?php foreach ($category_list as $category) : ?>
                        <p>
                            <a href="/?category=<?= $category['slug'] ?>" role="button"><?= $category['name'] ?></a>
                        </p>
                    <?php endforeach; ?>
                </div>
            </div>
            <!--bouton hamburger-->
            <nav class="navbar navbar-dark " id="bouttonMobile">
                <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" id="icon"></span>
                </button>
            </nav>
            <!--fin menu mobile--->
            <!--menu bureau-->
            <div class="collapse navbar-collapse menu" id="navbarNav">
                <ul class="navbar-nav  mx-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Accueil<span class="sr-only"></span></a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse menu" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <?php if (!empty($_SESSION["pseudo"])) : ?>
                        <li class="text-white nav-item active">
                            <span href="#" class="nav-link">Bonjour, <?= $_SESSION["pseudo"] ?> !</span>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Inscription</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login">Connexion</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </div>
    <!--fin menu bureau--->
    <!----FIN MENU---->
    <!--BLOC BOUTON CATEGORIES bureau-->
    <div class="container d-none d-lg-block d-xl-block">
        <nav class="container navbar navbar-expand-lg ">
            <ul class="navbar-nav mx-auto align-items-center">
                <?php foreach ($category_list as $category) : ?>
                    <li class="nav-item active p-2 m-2 bouton">
                        <a class="nav-link btn" href="/?category=<?= $category['slug'] ?>" role="button"><?= $category['name'] ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>

    <!--Contenu-->
    <div class="container carte my-5">
        <form class="row justify-content-center flex-column g-5 bg-light p-2 rounded-lg">
            <div class="mb-3 col-4 ml">
                <label class="form-label">Nom:</label>
                <input type="name" class="form-control" id="pseudo">
            </div>
            <div class="mb-3 col-4">
                <label class="form-label">Acteur(s):</label>
                <input type="name" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3 col-4">
                <label class="form-label">Réalisateur(s):</label>
                <input type="name" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3 col-1">
                <label class="form-label">Durée:</label>
                <input type="time" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3 col-1">
                <label class="form-label">Note (/5):</label>
                <input type="number" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3 col-4">
                <label class="form-label">Catégorie(s):</label>
                <input type="text" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="form-floating col-7">
                <label for="floatingTextarea2">Résumé:</label>
                <textarea class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
            </div>
            <div class="mb-3 col-3">
                <label class="form-label">Image:</label>
                <input type="file" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3 col-4">
                <label class="form-label">Lien:</label>
                <input type="text" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mt-2 col-4">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </form>
    </div>
    <!---FOOTER---->
    <div class="container-fluid footer p-2">
        <ul class="navbar-nav text-center">
            <li class="nav-item active">
                <a class="nav-link" href="#">DMCA<span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Contact<span class="sr-only"></span></a>
            </li>
        </ul>
        <p class="text-center text-light ">Copyright</p>
    </div>







    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
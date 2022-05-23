<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/zephyr/bootstrap.min.css">
    <link rel="stylesheet" href="./css/accueil.css">
    <title>Manga4all</title>
</head>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= URL ?>accueil"><img src="./public/images/logo.jpg" alt="Logo" width="150vw" height="50vh"></a>            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto align-middle">
                    <li class="nav-item ">
                    <a class="nav-link" href="<?= URL ?>accueil">Accueil</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>mangas">Mes Mangas</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>inscription">Inscription</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>connexion">Connexion</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-sm-2" type="text" placeholder="Search">
                    <!-- <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button> -->
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-primary"><?= $titre ?></h1>
        <?= $content ?>
    </div>
    
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<body>
    
</body>
</html>
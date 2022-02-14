<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
    <title>Manga4all</title>
</head>
    <nav class="navbar">
        <img class="logo" src="" alt="">
        <div>
            <ul class="nav-ul">
                <li class="nav-li">
                    <a class="nav-li-a" href="accueil">Accueil</a>
                </li>
                <li class="nav-li">
                    <a class="nav-li-a" href="mangas">Mes mangas</a>
                </li>
                <li class="nav-li">
                    <a class="nav-li-a" href="inscription">Inscription</a>
                </li>
                <li class="nav-li">
                    <a class="nav-li-a" href="#">Connexion</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1><?= $titre ?></h1>
        <?= $content ?>
    </div>
    

<body>
    
</body>
</html>
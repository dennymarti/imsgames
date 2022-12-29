<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/style.css">

    <!-- JS -->
    <script src="/js/validator.js"></script>
    <script src="/js/nav.js"></script>
    <script src="/js/function.js"></script>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/js/jquery.autoresize.js"></script>

    <title><?= $title; ?> | imsgames</title>
</head>
<body>

<header class="header">
    <nav class="nav">
        <a class="nav-title" href="/">imsgames</a>

        <ul class="nav-list">
            <a class="nav-link" href="/game">Games</a>
            <a class="nav-link" href="/game/request">Requests</a>

            <?php if (!$this->isLoggedIn): ?>
                <a href="/authentication" class="nav-authentication">Einloggen</a>
            <?php else: ?>
                <a href="/authentication/logout" class="nav-authentication">Logout</a>
            <?php endif; ?>
        </ul>

        <button class="nav-button" type="button" onclick="toggleNavMenu(event)">
            <i class='bx bxs-grid-alt'></i>
        </button>
    </nav>
    <?php
    if (isset($_SESSION['notification'])) {
        $message = $_SESSION['notification'];
        echo "
        <div class='toast' id='toast'>
            <div class='toast-content'>
                <h4 class='toast-title'>Authentifizierung</h4>
                <p class='toast-message'>$message</p>
            </div>
            <i class='bx bx-x close-icon' onclick='closeToast();'></i>
        </div>";
        unset($_SESSION['notification']);
    }
    ?>
</header>

<main class="container">
    <div class="wrapper">
        <!-- Ab hier wird HTML-Code von der View übernommen -->
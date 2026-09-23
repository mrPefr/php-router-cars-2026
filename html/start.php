<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARS</title>
    <script src="assets/client.js" defer></script>
    <style>
        * {
            box-sizing: border-box;
            text-decoration: none;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
        }

        header,
        main,
        nav,
        footer,
        .car {
            border: 1px solid;
            padding: 5%;
        }

        nav a {
            color: black;
        }

        input {
            width: 100%;
            padding: 1%;
        }

        .error {
            color: red;
        }

        .message {
            color: green;
        }

        .hidden{
            display:none;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <a href="/">HOME</a>
            <a href="/cars">CARS</a>
            <a href="/cars/create">CREATE CAR</a>
            <a href="/register">REGISTER</a>
            <a href="/login">LOGIN</a>
        </nav>

        <section class="messages">
            <h3 class="error">

                <?php
                if (!empty($_GET['error'])) {
                    echo $_GET['error'];
                }
                ?>
            </h3>

            <h3 class="message">

                <?php
                if (!empty($_GET['message'])) {
                    echo $_GET['message'];
                }
                ?>
            </h3>
        </section>

    </header>
    <main>
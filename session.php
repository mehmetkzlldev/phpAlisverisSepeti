<?php
session_start();
if(isset($_SESSION["LoggedIn"]) && $_SESSION["LoggedIn"] === true){
    header("Location: urunler.php");
    exit;
}
if(isset(($_POST ["KullaniciAdi"])) && isset(($_POST ["Password"]))){
    $kullaniciAdi = $_POST ["KullaniciAdi"];
    $password = $_POST ["Password"];

    if($kullaniciAdi === "admin" && $password === "12345"){
        $_SESSION["LoggedIn"] = true;
        $_SESSION["KullaniciAdi"] = "Mehmet ali";
        header("Location: urunler.php");
        
        exit;
    } else {
        echo "Kullanıcı adı veya şifre yanlış.";
    }
}
?>







<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main></main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Giriş Yap</h5>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="kullaniciAdi" class="form-label">Kullanıcı Adı</label>
                            <input type="text" class="form-control" id="kullaniciAdi" name="KullaniciAdi" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Şifre</label>
                            <input type="password" class="form-control" id="password" name="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Giriş Yap</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
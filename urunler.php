<?php
    $urunler=["Domates"=>"Sırık Domates Çok Sulu Güzel",
              "Patates"=>"Ödemiş Patates",
              "Salatalık"=>"Yayladan Bol Sulu",
              "Ananas"=>"Çok Taze",
              "Karpuz"=>"Çekirdeksiz",
              "Çilek"=>"En Olgun Ve sertleri"];

if(!isset($_COOKIE["sepet"])){
    setcookie("sepet","",time()+60*60*24);
    $_COOKIE["sepet"]="";
}
if(isset($_POST["urun"])){
   $sepet=$_COOKIE["sepet"];
   $sepet=$sepet.$_POST["urun"].",";
   setcookie("sepet",$sepet,time()+60*60*24);
}

$itemCount = count(array_filter(explode(',', rtrim($_COOKIE["sepet"], ','))));
$cartItems = array_filter(explode(',', rtrim($_COOKIE["sepet"], ',')));

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 text-end">
                <button class="btn btn-secondary position-relative" data-bs-toggle="modal" data-bs-target="#cartModal">
                    Sepet <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?= $itemCount ?></span>
                </button>
            </div>
        </div>
        <div class="row mt-3">
            <?php 
                foreach($urunler as $key => $value) {?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h4 class="card-title"><?= $key ?></h4>
                        <p class="card-text"><?= $value ?></p>
                        <form action="#" method="post">
                            <input type="hidden" name="urun" value="<?= $key ?>">
                            <button type="submit" class="btn btn-primary">Sepete ekle</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <!-- Cart Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sepet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <?php if(count($cartItems) > 0): ?>
                        <ul class="list-group">
                            <?php foreach($cartItems as $item): ?>
                                <li class="list-group-item"><?= $item ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>Sepetiniz boş</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
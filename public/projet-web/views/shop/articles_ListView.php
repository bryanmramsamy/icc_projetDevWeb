<?php
$title = "Boutique | Page " . $actual_page;
ob_start();

if (checkPermissions('modo', false)){
?>

<section class="pb-2">
    <a class="btn btn-info btn-lg btn-block" href="index.php?action=article_create">Ajouter un article</a>
</section>

<?php } ?>

<section>
    <?php
    require('views/static/pagination.php');
    echo "<h1>" . $categorie . "</h1>";

    while ($article = $articles->fetch()){
        if ((empty($category) || $article['categorieID'] == $category) && ($article['availability'] || checkPermissions('modo', false))) {
            $bg_color = $article['availability'] ? "dark" : "danger";
    ?>
        <div class="alert alert-<?= $bg_color; ?>">
            <h4 class="alert-heading d-flex justify-content-center"><?= htmlspecialchars($article['article_name']) ?></h4>
            <div class="text-center"><a href="index.php?action=shop&category=<?= $article['categorieID']; ?>" class="badge badge-pill badge-secondary"><?= htmlspecialchars($article['categorie_name']) ?></a></div>
            <p class="text-justify"><?= nl2br(htmlspecialchars($article['description'])) ?></p>

            <hr>

            <div class="d-flex justify-content-center">
                <div class="border border-secondary rounded p-1 mx-2">Prix unitaire: <?= htmlspecialchars($article['unit_price']) ?></div>

                <div class="border border-secondary rounded p-1 mx-2">Quantité restante: <?= htmlspecialchars($article['quantity_left']) ?></div>
            </div>
            <div class="text-right">
                <?php require('views/shop/article_admin_options.php') ?>
                <a class="btn btn-primary" href="index.php?action=article&articleID=<?= $article['articleID'] ?>">Voir plus...</a>
            </div>

        </div>
    <?php
        }
    }
    require('views/static/pagination.php');
    ?>

</section>

<?php
$main_section = ob_get_clean();

require('views/static/base.php');
?>

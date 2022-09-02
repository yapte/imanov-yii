<h1> Categories </h1>

<div class="list">
    <?php foreach($categories as $c): ?>
        <a href="/site/products?category_id=<?= $c->id ?>" class="card"> 
            <p class="title"><?= $c->name ?> (<?= $c->id ?>) </p>           
        </a>
    <?php endforeach; ?>
</div>
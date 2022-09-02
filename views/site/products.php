<h2> Продукты категории <?= $category->name ?> </h2>

<div class="list">
    <?php foreach($products as $p): ?>
        <div p class="card"> 
            <p class="title"><?= $p->name ?> (<?= $p->id ?>) </p>
            <p class="title"><?= $p->description ?></p>
        </div>
    <?php endforeach; ?>

    <?php if (!count($products)): ?>
        <p class="warning"> Нет товаров  </p>
    <?php endif; ?>
</div>
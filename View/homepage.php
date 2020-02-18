<?php require 'includes/header.php' ?>
<body>
<form action="#" method="post">
    <section>
        <label for="users">Choose a person:</label>

        <select id="users" name="users">

            <?php for ($i = 0; $i < count($userArray); $i++): ?>
                <option value= <?php echo $userArray[$i]->getId() ?>> <?php echo $userArray[$i]->getName() ?></option>
            <?php endfor; ?>
        </select>
    </section>
    <section>
        <label for="product">Choose a product:</label>
        <select name="product" id="product">
            <?php for ($i = 0; $i < count($productArray); $i++): ?>
                <option value= <?php echo $productArray[$i]->getProductId() ?>> <?php echo $productArray[$i]->getProductName() ?></option>
            <?php endfor; ?>
        </select>
    </section>
</form>
    <input type="submit" value="require" name="submitButton">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
    <p>You are <?php echo $userArray[$userId]->getName() ?> and you have choosen: </p>
            <h5 class="card-title">
                <?php echo $productArray[$productId]->getProductName(); ?>
            </h5>
            <p class="card-text">
                <?php echo $productArray[$productId]->getProductDescription()?></p>
    <H3><?php echo $productArray[$productId]->getProductPrice() ?>€</H3>
        </div>
    </div>

<?php require 'includes/footer.php' ?>

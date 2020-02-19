<?php require 'includes/header.php' ?>
<div class="form-group">
<form action="#" method="post" class="pl-5">
    <div class="row">
    <section>
        <div class="form-group" class="col">
        <label for="users" class="ml-3">Choose a person:</label>

        <select id="users" name="users" class="form-control ml-3">

            <?php for ($i = 0; $i < count($userArray); $i++): ?>
                <option value= <?php echo $userArray[$i]->getId() ?>> <?php echo $userArray[$i]->getName() ?></option>
            <?php endfor; ?>
        </select>
        </div>
    </section>
    <section>
        <div class="form-group" class="col">
        <label for="product" class="ml-4">Choose a product:</label>
        <select name="product" id="product" class="form-control ml-4">
            <?php for ($i = 0; $i < count($productArray); $i++): ?>
                <option value= <?php echo $productArray[$i]->getProductId() ?>> <?php echo $productArray[$i]->getProductName() ?></option>
            <?php endfor; ?>
        </select>
        </div>
    </section>
    <section>
        <div class="form-group" class="col">
            <label for="quantity" class="ml-5">Qty:</label>
        <select id="quantity" name="quantity" class="form-control ml-5">
            <?php for($z=0; $z<51; $z++){
                echo '<option value=".$z.">'.$z.'</option>';
    }
            ?>
        </select>
        </div>
    </section>
    </div>
    <input type="submit" value="require" name="submitButton" class="btn btn-secondary">
</form>
</div>
<div class="card ml-5" style="width: 18rem;">
    <div class="card-body">
    <p>You are <?php echo $userArray[$userId]->getName() ?> and you have chosen: </p>
        <h5 class="card-title"><?php echo $productArray[$productId]->getProductName(); ?></h5>
        <p class="card-text"><?php echo $productArray[$productId]->getProductDescription()?></p>
        <H3><?php echo $finalResult ?>€ </H3><small>(price with reduction)</small>
    </div>
</div>
<section class="pl-5 pr-5">
<table class="table mt-4">
    <thead>
    <tr>
        <th scope="col">#client-id</th>
        <th scope="col">client-name</th>
        <th scope="col">product-name</th>
        <th scope="col">original price</th>
        <th scope="col">fixed-discount</th>
        <th scope="col">variable-discount</th>
        <th scope="col">reduced price</th>
        <th scope="col">quantity</th>
        <th scope="col">quantityPrice</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row"><?php echo $userArray[$userId]->getId() ?></th>
        <td><?php echo $userArray[$userId]->getName() ?></td>
        <td><?php echo $productArray[$productId]->getProductName() ?></td>
        <td><?php echo $productArray[$productId]->getProductPrice()." €"; ?></td>
        <td><?php echo $countFixed ?></td>
        <td><?php echo $maxVariable."%" ?></td>
        <td><?php echo $finalResult ?></td>
        <td><?php echo ""; ?></td> // moet nog gemaakt worden op de homecontrollerpage
        <td><?php echo ""; ?></td> // moet nog gemaakt worden op de homecontrollerpage
    </tr>
    </tbody>
</table>
</section>
<?php require 'includes/footer.php' ?>
</body>
</html>
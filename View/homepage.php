<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Becode - Boiler plate MVC</title>
</head>
<body>
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
    </div>
    <input type="submit" value="require" name="submitButton" class="btn btn-primary">
</form>
</div>
<div class="card ml-5" style="width: 18rem;">
    <div class="card-body">
    <p>You are <?php echo $userArray[$userId]->getName() ?> and you have chosen: </p>
        <h5 class="card-title"><?php echo $productArray[$productId]->getProductName(); ?></h5>
        <p class="card-text"><?php echo $productArray[$productId]->getProductDescription()?></p>
    <H3><?php echo $productArray[$productId]->getProductPrice() ?>€</H3>
    </div>
</div>
<table class="table mt-4">
    <thead>
    <tr>
        <th scope="col">#client-id</th>
        <th scope="col">client-name</th>
        <th scope="col">product-name</th>
        <th scope="col">original price</th>
        <th scope="col">client-discount</th>
        <th scope="col">fixed-discount</th>
        <th scope="col">variable-discount</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
    </tr>
    <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
    </tr>
    <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
    </tr>
    </tbody>
</table>
<?php require 'includes/footer.php' ?>
</body>
</html>
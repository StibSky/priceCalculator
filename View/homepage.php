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
<section>
    <p>Put your content here.</p>
    <p> <?php var_dump($everyone[1]['name']); ?></p>
    <label for="users">Choose a person:</label>

    <select id="users">

        <?php for ($i = 0;
        $i < count($everyone);
        $i++): ?>
        <option value= <?php echo $everyone[$i]['id'] ?>> <?php echo $everyone[$i]['name'] ?></option>
        <?php endfor; ?>


    </select>
</section>
<?php require 'includes/footer.php' ?>
</body>
</html>
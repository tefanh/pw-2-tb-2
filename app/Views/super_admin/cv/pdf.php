<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Curriculum Vitae</title>
</head>

<body>
    <div>
        <h2><?= $cv['name'] ?></h2>
        <h4><?= $cv['title'] ?></h4>
    </div>

    <div>
        <ul class="list-group">
            <li class="list-group">No. HP: <?= $cv['phone'] ?></li>
            <li class="list-group">Email: <?= $cv['email'] ?></li>
            <li class="list-group">Alamat: <?= $cv['address'] ?></li>
            <li class="list-group">Tentang: <?= $cv['about'] ?></li>
        </ul>
    </div>
</body>

</html>
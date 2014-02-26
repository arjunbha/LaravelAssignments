<!doctype html>
<html>
<head>
    <title>Genres</title>

    <style>
        body {
            text-align: center;
        }
        table {
            margin:auto;
        }
        td {
            border: 1px solid black;
            margin: 5px;
        }
    </style>
</head>
<body>

<h1><?php echo $genre->genre_name; ?></h1>

<table>
    <tr>
        <td>
            <h4>Title</h4>
        </td>
    </tr>
    <?php foreach ($dvds as $dvd) : ?>
        <tr class="dvd">
            <td>
                <h4>
                    <?php echo $dvd->title; ?>
                </h4>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
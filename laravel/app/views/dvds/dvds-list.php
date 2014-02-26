<!doctype html>
<html>
<head>
    <title>DVD Results</title>

    <style>
        body {
            text-align: center;
        }
        table {
            margin: auto;
        }
        td {
            border: 1px solid black;
            margin: 5px;
        }
    </style>
</head>
<body>

<h1>DVD Results</h1>

<table>
    <tr>
        <td>
            <h4>Title</h4>
        </td>
        <td>
            Rating
        </td>
        <td>
            Genre
        </td>
        <td>
            Label
        </td>
        <td>
            Sound
        </td>
        <td>
            Format
        </td>
        <td>
            Release Date
        </td>
    </tr>
    <?php foreach ($dvds as $dvd) : ?>
        <tr class="dvd">
            <td>
                <h4>
                <?php echo $dvd->title; ?>
                </h4>
            </td>
            <td><?php echo $dvd->rating_name; ?></td>
            <td><a href="/genres/<?php echo $dvd->genre_id; ?>/dvds"><?php echo $dvd->genre_name; ?></a></td>
            <td><?php echo $dvd->label_name; ?></td>
            <td><?php echo $dvd->sound_name; ?></td>
            <td><?php echo $dvd->format_name; ?></td>
            <td><?php echo $dvd->release_date; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
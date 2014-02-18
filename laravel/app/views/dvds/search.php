<!doctype html>
<html>
<head>
    <title>DVD Search</title>
</head>
<body>

<form method="get" action="/dvds">
    <h1>DVD Search</h1>
    <div>
        DVD Title:
        <input type="text" name="dvd_title">
    </div>
    <div>
        Genre:
        <select name="genre" id="genre">
            <option value="all">Select All</option>
            <?php foreach ($genres as $genre) : ?>
                <option value="<?php echo $genre->genre_name; ?>"><?php echo $genre->genre_name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        Rating:
        <select name="rating" id="rating">
            <option value="all">Select All</option>
            <?php foreach ($ratings as $rating) : ?>
                <option value="<?php echo $rating->rating_name; ?>"><?php echo $rating->rating_name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <input type="submit" name="Search">
    </div>
</form>


</body>
</html>
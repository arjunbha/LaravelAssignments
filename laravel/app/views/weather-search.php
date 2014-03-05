<!doctype html>
<html>
<head>
    <title>Weather Search</title>
</head>
<body>

<h1>Weather Search</h1>
<br />
<h3>Enter in your location. If errors occur, replace spaces with "+" and comma separating city and state. (E.G. San+Jose,CA or Los+Angeles,CA or London,UK but "San Jose" or "San Francisco" should work)</h3>
<form method="post" action="/weather/results">

    <div>
        Location:
        <input type="text" name="location">
    </div>
    <div>
        <input type="submit" name="Search">
    </div>
</form>


</body>
</html>
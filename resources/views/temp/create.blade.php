<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{ route('temp.store') }}" method="post">
    @csrf
    <input type="text" name="portfolio[0][name]" id="">
    <input type="text" name="portfolio[0][link]" id="">
    <input type="text" name="portfolio[0][test]" id="">
    <input type="text" name="portfolio[1][name]" id="">
    <input type="text" name="portfolio[1][link]" id="">
    <input type="text" name="portfolio[1][test]" id="">
    <input type="text" name="portfolio[2][name]" id="">
    <input type="text" name="portfolio[2][link]" id="">
    <input type="text" name="portfolio[2][test]" id="">
    <button type="submit">Submit</button>
</form>
</body>
</html>
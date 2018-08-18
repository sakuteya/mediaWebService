<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>投稿ページ</title>
</head>
<body>

  <ul>
    @foreach($data as $d)
      <li>{{$d->title}}</li>
    @endforeach
  </ul>

</body>
</html>
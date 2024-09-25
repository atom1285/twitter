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
    <h1> Dashboard </h1>

    @foreach($users as $user)
        <h2> {{ $user->name }} </h2>
        <h3> Age: {{ floor($user->date_of_birth->diffInYears()) }} </h3>

        @if($user->date_of_birth->diffInYears() > 18)
            <p> User can drive </p>
        @else
            <p> User cannot drive yet </p>
        @endif
    @endforeach
</body>
</html>

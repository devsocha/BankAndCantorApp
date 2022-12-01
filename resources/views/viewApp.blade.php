
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DevSocha - </title>
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('style.css')}}" type="text/css" />
</head>

<body>


<div class="all">
    <p>Cały kod aplikacji dostępny na GitHub: <a class="devsocha" href="#">DevSocha</a></p>
    <section>

        <a class="button" href="{{Route('accountView',['id'=>1])}}">Konto demo nr 1</a>
        <a class="button" href="{{Route('accountView',['id'=>2])}}">Konto demo nr 2</a>
        <a class="button" href="{{Route('accountView',['id'=>3])}}">Konto demo nr 3</a>
    </section>
</div>
@yield('content')

</body>

</html>

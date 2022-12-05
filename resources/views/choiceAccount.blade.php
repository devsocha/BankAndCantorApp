<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DevSocha - {{$tittle}}</title>
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('style.css')}}" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>


<div class="all">
    <header><p>Cały kod aplikacji dostępny na GitHub: <a class="devsocha" href="#">DevSocha</a></p></header>
    <section>

            <a class="button" href="{{Route('accountView',['id'=>1])}}">Konto demo nr 1</a>
            <a class="button" href="{{Route('accountView',['id'=>2])}}">Konto demo nr 2</a>
            <a class="button" href="{{Route('accountView',['id'=>3])}}">Konto demo nr 3</a>
    </section>
</div>

</body>

</html>

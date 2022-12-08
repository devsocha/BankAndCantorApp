@extends('viewApp')
@section('content')
    <div class="all top-margin">
        <div class="content all">
            <div class="tittle">
                <b>DEMO {{$idUser}}</b>
            </div>
            <div class="half">
                <table>
                    <tr>
                        <td>
                            Imie Nazwisko:
                        </td>
                        <td>
                            {{$demo->Osoba->imie}} {{$demo->Osoba->nazwisko}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Numer konta:
                        </td>
                        <td>
                            {{$demo->konto_id}}
                        </td>
                    </tr>
                </table>
            </div>
            <div class="half">
                <table>
                    <tr>
                        <td>
                            Waluta USD:
                        </td>
                        <td>
                            {{$demo->konto->kontoUSD}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Waluta EUR:
                        </td>
                        <td>
                            {{$demo->konto->kontoEUR}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Waluta PLN:
                        </td>
                        <td>
                            {{$demo->konto->kontoPLN}}
                        </td>
                    </tr>
                </table>
            </div>
            <div class="all top-margin">
                Kurs dolara: {{$currencyUsd['content'][0]['mid']}}<br>
                Kurs euro: {{$currencyEur['content'][0]['mid']}}<br><br>
                <form method="post" action="#">
                    Wymieniana waluta:
                    <select>
                        <option VALUE="usd">USD - $</option>
                        <option VALUE="pln">PLN - zł</option>
                        <option VALUE="eur">EUR - &euro;</option>
                    </select>
                    <input type="number" placeholder="Kwota"/></br>
                    Na jaką walutę chcesz wymienić:
                    <select>
                        <option VALUE="usd">USD - $</option>
                        <option VALUE="pln">PLN - zł</option>
                        <option VALUE="eur">EUR - &euro;</option>
                    </select></br></br>
                    <input type="submit" value="Wymień"/>
                </form>
            </div>
            <div class="all top-margin">
                <a  href="{{Route('accountView',['id'=>$idUser])}}">Cofnij</a></br>
            </div>

        </div>
    </div>
@endsection

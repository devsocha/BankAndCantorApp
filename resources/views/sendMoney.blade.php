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
                <form method="post" action="#">
                    <input type="number" placeholder="Numer konta do przelewu"/>
                    <input type="number" placeholder="Kwota przelewu"/>
                    <select>
                        <option VALUE="usd">USD - $</option>
                        <option VALUE="pln">PLN - zł</option>
                        <option VALUE="eur">EUR - &euro;</option>
                    </select>
                    <input type="submit" value="Przelej"/>
                </form>
            </div>
            <div class="all top-margin">
                <a  href="{{Route('accountView',['id'=>$idUser])}}">Cofnij</a></br>
            </div>

        </div>
    </div>
@endsection

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
                <form method="post" action="{{Route('moneySenderApp')}}">
                    @csrf
                    <label>
                        <input name="numberAccount" type="number" placeholder="Numer konta do przelewu" required/>
                    </label>
                    <label>
                        <input name="money" type="number" placeholder="Kwota przelewu" required/>
                    </label>
                    <label>
                        <select name="currency" required>
                            <option VALUE="kontoUSD">USD - $</option>
                            <option VALUE="kontoPLN">PLN - zł</option>
                            <option VALUE="kontoEUR">EUR - &euro;</option>
                        </select>
                    </label>
                    <input type="submit" name="sendMoney"/>
                </form>
            </div>
            <div class="all top-margin">
                <a  href="{{Route('accountView',['id'=>$idUser])}}">Cofnij</a>
            </div>

        </div>
    </div>
@endsection

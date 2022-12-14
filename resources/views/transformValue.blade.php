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
                Kurs dolara: {{round($currencyUsd['content'][0]['mid'],4)}}</br>
                Kurs euro: {{round($currencyEur['content'][0]['mid'],4)}}</br></br>
                <form method="post" action="{{Route('changeCurrency')}}">
                    @csrf
                    Wymieniana waluta:
                    <label>
                        <select name="currencyFrom" required>
                            <option value="kontoPLN">PLN - z??</option>
                            <option value="kontoUSD">USD - $</option>
                            <option value="kontoEUR">EUR - &euro;</option>
                        </select>
                    </label>
                    <label>
                        <input type="number" name="money" placeholder="Kwota" required/>
                    </label></br>
                    Na jak?? walut?? chcesz wymieni??:
                    <label>
                        <select name="currencyTo" required>
                            <option value="kontoUSD">USD - $</option>
                            <option value="kontoPLN">PLN - z??</option>
                            <option value="kontoEUR">EUR - &euro;</option>
                        </select>
                    </label></br></br>
                    <input type="submit" value="Wymie??"/>
                </form>
            </div>
            <div class="all top-margin">
                <a  href="{{Route('accountView',['id'=>$idUser])}}">Cofnij</a></br></br>
            </div>

        </div>
    </div>
@endsection

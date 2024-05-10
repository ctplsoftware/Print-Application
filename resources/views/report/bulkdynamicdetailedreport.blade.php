@extends('layouts.app')
@section('content')
<div class="container-fluid">
   <table class="table table-bordered tablefix_mtop" id='detailed_table'>
    <thead>
        <th>Sl no</th>
        <th>{{explode(':',$dynamicreport[0]->Freefield1_value)[0]}}</th>
        <th>{{explode(':',$dynamicreport[0]->Freefield2_value)[0]}}</th>
        <th>{{explode(':',$dynamicreport[0]->Freefield3_value)[0]}}</th>
        <th>{{explode(':',$dynamicreport[0]->Freefield4_value)[0]}}</th>
        <th>{{explode(':',$dynamicreport[0]->Freefield5_value)[0]}}</th>
        <th>{{explode(':',$dynamicreport[0]->Freefield6_value)[0]}}</th>
    </thead>
    <tbody>
        @php
        $i = 1;
        @endphp
        @foreach($dynamicreport as $detail)
        <tr>
        <td style="white-space: nowrap;">{{$i}}</td>
        <td>{{explode(':',$detail->Freefield1_value)[1]}}</td>
        <td>{{explode(':',$detail->Freefield2_value)[1]}}</td>
        <td>{{explode(':',$detail->Freefield3_value)[1]}}</td>
        <td>{{explode(':',$detail->Freefield4_value)[1]}}</td>
        <td>{{explode(':',$detail->Freefield5_value)[1]}}</td>
        <td>{{explode(':',$detail->Freefield6_value)[1]}}</td>
        </tr>
        @php
        $i++;
        @endphp
        @endforeach
    </tbody>

   </table>
</div>
@endsection
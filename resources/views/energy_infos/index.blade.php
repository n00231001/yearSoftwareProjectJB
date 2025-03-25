@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Energy Infos</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Electricity Usage</th>
                <th>Heating Usage</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($energyInfos as $info)
            <tr>
                <td>{{ $info->id }}</td>
                <td>{{ $info->electricityUsage }}</td>
                <td>{{ $info->heatingUsage }}</td>
                <td>{{ $info->created_at }}</td>
                <td>{{ $info->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
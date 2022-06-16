@extends('layouts.app')

@section('content')
    @foreach ($arrayReserved as $fullname => $reserved)
        <span>{{ $fullname }}</span>
        <table border=1>
            <thead>
                <tr>
                    <th>L</th>
                    <th>M</th>
                    <th>M</th>
                    <th>J</th>
                    <th>V</th>
                    <th>S</th>
                    <th>D</th>
                </tr>
            </thead>
            <tbody>
                <tr>
        @foreach ($reserved as $day)
                    <td>{{ $day }}</td>
        @endforeach
                </tr>
            </tbody>
            </table>
    @endforeach
@endsection
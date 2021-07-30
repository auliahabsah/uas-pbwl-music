@extends('layouts.app')

@section('content')

    <div class="container">

        <h3>
            NAMA ARTIST
            <a href="{{ url('/artist/create') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a>
        </h3>

        <table class="table table-bordered">
            <tr>
                <th>NAMA</th>
                <th>NEGARA</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            @foreach ($rows as $row)
                <tr>
                    <td>{{ $row->artist_name }}</td>
                    <td>{{ $row->artist_country }}</td>
                    <td><a href="{{ url('artist/' . $row->artist_id . '/edit') }}" class="btn btn-primary btn-sm">Edit</a></td>
                    <td>
                        <form action="{{ url('/artist/' . $row->artist_id) }}" method="POST">
                            <input name="_method" type="hidden" value="DELETE">
                            @csrf 
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
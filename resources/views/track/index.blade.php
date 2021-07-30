@extends('layouts.app')

@section('content')

    <div class="container">

        <h3>
            DAFTAR TRACK
            <a href="{{ url('/track/create') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a>
        </h3>

        <table class="table table-bordered">
            <tr>
                <th>NAMA TRACK</th>
                <th>ID ARTIST</th>
                <th>ID ALBUM</th>
                <th>WAKTU TRACK</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            @foreach ($rows as $row)
                <tr>
                    <td>{{ $row->track_name }}</td>
                    <td>{{ $row->artist_id }}</td>
                    <td>{{ $row->album_id }}</td>
                    <td>{{ $row->track_time }}</td>
                    <td><a href="{{ url('track/' . $row->track_id . '/edit') }}" class="btn btn-primary btn-sm">Edit</a></td>
                    <td>
                        <form action="{{ url('/track/' . $row->track_id) }}" method="POST">
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

@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('assets/uploads/category/' . $item->image) }}"
                                                alt="image-here">
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="{{ url() }}" class="btn btn-outline-warning">edit</a>
                                            <a href="{{ url() }}" class="btn btn-outline-danger">delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="d-flex mb-3">
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Product" aria-label="Search Product"
                                aria-describedby="Search Product">
                            <button class="btn btn-secondary" type="button">Search</button>
                        </div>
                    </div>
                    <div class="ms-auto">
                        <a href="{{ route('add-product') }}" class="btn btn-secondary">Add Product</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <td class="d-flex justify-content-center column">
                                            <div style="width: 100px;">
                                                <img src="{{ asset('uploads/products/' . $item->photo) }}" class="img-fluid"
                                                    alt="image-here">
                                            </div>

                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="{{ route('edit-product', ['id' => $item->id]) }}"
                                                class="btn btn-outline-warning">edit</a>
                                            <a href="{{ route('delete-product', ['id' => $item->id]) }}"
                                                class="btn btn-outline-danger">delete</a>
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

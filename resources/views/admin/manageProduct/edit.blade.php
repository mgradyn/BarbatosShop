@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-5 col-xl-5">
                <div class="d-flex justify-content-start mb-3">
                    <a href="{{ route('manageProduct') }}" class="btn btn-secondary">Back</a>
                </div>
                <div class="card">
                    <h5 class="card-header">{{ __('Update Product') }}</h5>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update-product', ['id' => $product->id]) }}"
                            id="add_product_form" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="mb-1">{{ __('Name') }}</label>

                                <div>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $product->name }}" autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="category_name" class="mb-1 form-label">{{ __('Category') }}</label>
                                <div>
                                    <div class="input-group @error('category_name') is-invalid @enderror">
                                        <input class="form-select" name="category_name" autocomplete="category_name"
                                            form="add_product_form" list="datalistOptions" placeholder="Select a Category"
                                            value="{{ $category_name }}">

                                        <datalist id="datalistOptions">


                                            @foreach ($categories as $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach

                                        </datalist>
                                        </input>
                                    </div>
                                    @error('category_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="detail" class="mb-1">{{ __('Detail') }}</label>
                                <div>
                                    <textarea class="form-control @error('detail') is-invalid @enderror" id="detail" rows="6" name="detail"
                                        autocomplete="detail" autofocus>{{ $product->detail }}</textarea>

                                    @error('detail')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="price" class="mb-1">{{ __('Price') }}</label>

                                <div>
                                    <input id="price" type="text"
                                        class="form-control @error('price') is-invalid @enderror" name="price"
                                        value="{{ $product->price }}" autocomplete="price" autofocus>
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div>
                                    <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                        id="photo" placeholder="No file chosen" name="photo">
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <button type="submit" class="btn btn-outline-secondary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

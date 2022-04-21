@extends('template.layout')
@section('content')
    <div class="px-4 py-5 my-5">
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{ route('company.index') }}" type="button" class="btn btn-primary btn-lg px-4 gap-3">Back to company list</a>
        </div>
        <div class="d-grid gap-2 d-sm-flex justify-content-center pt-5">
            <form class="add-company" action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-2">
                    <label for="name">Name</label>
                    <input value="{{ old('name') }}" type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                    @foreach($errors->get('name') as $error)
                        <small class="form-text text-danger">{{ $error }}</small>
                    @endforeach
                </div>
                <div class="form-group mt-2">
                    <label for="email">Email address</label>
                    <input value="{{ old('email') }}" type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                    @foreach($errors->get('email') as $error)
                        <small class="form-text text-danger">{{ $error }}</small>
                    @endforeach
                </div>
                <div class="form-group mt-2">
                    <label for="phone">Phone number</label>
                    <input value="{{ old('phone') }}" type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone">
                    @foreach($errors->get('phone') as $error)
                        <small class="form-text text-danger">{{ $error }}</small>
                    @endforeach
                </div>
                <div class="form-group mt-2">
                    <label for="website">Website</label>
                    <input value="{{ old('website') }}" type="text" class="form-control" name="website" id="website" placeholder="Enter website">
                    @foreach($errors->get('website') as $error)
                        <small class="form-text text-danger">{{ $error }}</small>
                    @endforeach
                </div>
                <div class="form-group mt-2">
                    <label for="logo">Logo</label>
                    <input type="file" class="form-control" name="logo" id="logo" placeholder="Select logo">
                    @foreach($errors->get('logo') as $error)
                        <small class="form-text text-danger">{{ $error }}</small>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary mt-4">Add company</button>
            </form>
        </div>
    </div>
@endsection

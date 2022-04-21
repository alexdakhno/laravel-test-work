@extends('template.layout')
@section('content')

    <div class="px-4 py-5 my-5">
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{ route('company.index') }}" type="button" class="btn btn-primary btn-lg px-4 gap-3">Back to company list</a>
        </div>
        <div class="d-grid gap-2 d-sm-flex justify-content-center pt-5">
            <form class="add-company" action="{{ route('company.update', $company) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                @if(session('status') == 'ok')
                    <p class="text-success">Saved company</p>
                @endif
                <div class="form-group mt-2">
                    <label for="name">Name</label>
                    <input value="{{ $company->name }}" type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                    @foreach($errors->get('name') as $error)
                        <small class="form-text text-danger">{{ $error }}</small>
                    @endforeach
                </div>
                <div class="form-group mt-2">
                    <label for="email">Email address</label>
                    <input value="{{ $company->email }}" type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                    @foreach($errors->get('email') as $error)
                        <small class="form-text text-danger">{{ $error }}</small>
                    @endforeach
                </div>
                <div class="form-group mt-2">
                    <label for="phone">Phone number</label>
                    <input value="{{ $company->phone }}" type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone">
                    @foreach($errors->get('phone') as $error)
                        <small class="form-text text-danger">{{ $error }}</small>
                    @endforeach
                </div>
                <div class="form-group mt-2">
                    <label for="website">Website</label>
                    <input value="{{ $company->website }}" type="text" class="form-control" name="website" id="website" placeholder="Enter website">
                    @foreach($errors->get('website') as $error)
                        <small class="form-text text-danger">{{ $error }}</small>
                    @endforeach
                </div>
                <div class="form-group mt-2">
                    <label for="logo">Logo</label>
                    <div class="edit-image-wrap">
                        <span class="edit-image-delete"></span>
                        <img class="edit-image" src="{{ asset($company->logo) }}" />
                    </div>
                    <input type="file" class="form-control" name="logo" id="logo" placeholder="Select logo">
                    <input type="checkbox" name="update-image" id="update-image" class="d-none">
                    @foreach($errors->get('logo') as $error)
                        <small class="form-text text-danger">{{ $error }}</small>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary mt-4">Edit company</button>
            </form>
        </div>
    </div>
@endsection

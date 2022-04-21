@extends('template.layout')
@section('content')
    <div class="px-4 py-5 my-5">
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{ route('employee.index') }}" type="button" class="btn btn-primary btn-lg px-4 gap-3">Back to employee list</a>
        </div>
        <div class="d-grid gap-2 d-sm-flex justify-content-center pt-5">
            <form class="add-company" action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-2">
                    <label for="first_name">First name</label>
                    <input value="{{ old('first_name') }}" type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter first name">
                    @foreach($errors->get('first_name') as $error)
                        <small class="form-text text-danger">{{ $error }}</small>
                    @endforeach
                </div>
                <div class="form-group mt-2">
                    <label for="last_name">Last name</label>
                    <input value="{{ old('last_name') }}" type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter last name">
                    @foreach($errors->get('last_name') as $error)
                        <small class="form-text text-danger">{{ $error }}</small>
                    @endforeach
                </div>
                @if($companyList->count())
                    <div class="form-group mt-2">
                        <label for="last_name">Company</label>
                        <select name="company_id" class="form-control">
                            <option value="">Select company</option>
                            @foreach($companyList as $company)
                                <option @if(old('company_id') == $company->id) selected @endif value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                        @foreach($errors->get('company_id') as $error)
                            <small class="form-text text-danger">{{ $error }}</small>
                        @endforeach
                    </div>
                @endif
                <div class="form-group mt-2">
                    <label for="email">Email</label>
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
                <button type="submit" class="btn btn-primary mt-4">Add employee</button>
            </form>
        </div>
    </div>
@endsection

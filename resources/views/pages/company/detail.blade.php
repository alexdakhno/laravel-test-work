@extends('template.layout')
@section('content')
    @if($company)
        <div class="px-4 py-5 my-5 text-center">
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="{{ route('company.create') }}" type="button" class="btn btn-primary btn-lg px-4 gap-3">Add company</a>
                <a href="{{ route('company.edit', $company) }}" type="button" class="btn btn-primary btn-lg px-4 gap-3">Edit company</a>
                <a href="{{ route('company.index') }}" type="button" class="btn btn-primary btn-lg px-4 gap-3">Company list</a>
            </div>
        </div>

        <div class="px-4 py-5 my-5 text-center">
            <ul class="list-group">
                @foreach($company->getAttributes() as $colName => $value)
                    <li class="list-group-item">
                        @if($colName == 'logo')
                            <img style="max-width: 200px" src="{{ asset($value) }}" />
                        @else
                            {{ $value }}
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

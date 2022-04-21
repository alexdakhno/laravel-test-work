@extends('template.layout')
@section('content')
    @if($employee)
        <div class="px-4 py-5 my-5 text-center">
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="{{ route('employee.create') }}" type="button" class="btn btn-primary btn-lg px-4 gap-3">Add employee</a>
                <a href="{{ route('employee.edit', $employee) }}" type="button" class="btn btn-primary btn-lg px-4 gap-3">Edit employee</a>
                <a href="{{ route('employee.index') }}" type="button" class="btn btn-primary btn-lg px-4 gap-3">employee list</a>
            </div>
        </div>

        <div class="px-4 py-5 my-5 text-center">
            <ul class="list-group">
                @foreach($employee->getAttributes() as $colName => $value)
                    <li class="list-group-item">
                        @if($colName == 'company_id')
                            <a href="{{ route('company.show', $employee->company) }}">{{ $employee->company->name }}</a>
                        @else
                            {{ $value }}
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

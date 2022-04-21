@extends('template.layout')
@section('content')
    <div class="px-4 py-5 my-5 text-center">
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{ route('employee.create') }}" type="button" class="btn btn-primary btn-lg px-4 gap-3">Add employee</a>
        </div>
    </div>

    @if($employees->count())
        @php
            $cols = array_merge(array_keys($employees->first()->getAttributes()), ['actions']);
        @endphp
        <div class="px-4 py-5 my-5 text-center">
            <table class="table">
                <thead>
                    <tr>
                        @foreach($cols as $colName)
                            <th scope="col">{{ $colName }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            @foreach($employee->getAttributes() as $colName => $value)
                                <th>
                                    <a href="{{ route('employee.show', $employee) }}">{{ $value }}</a>
                                </th>
                            @endforeach
                            <th>
                                <div class="display-5 justify-content-around">
                                    <a href="{{ route('employee.edit', $employee) }}" class="btn btn-info">Update</a>
                                    <form method="post" action="{{ route('employee.destroy', $employee) }}">
                                        @method('delete')
                                        @csrf
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                </div>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection

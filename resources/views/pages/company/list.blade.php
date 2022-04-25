@extends('template.layout')
@section('content')
    <div class="px-4 py-5 my-5 text-center">
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{ route('company.create') }}" type="button" class="btn btn-primary btn-lg px-4 gap-3">Add company</a>
        </div>
    </div>

    @if($companies->count())
        @php
            $cols = array_merge(array_keys($companies->first()->getAttributes()), ['actions']);
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
                    @foreach($companies as $company)
                        <tr>
                            @foreach($company->getAttributes() as $colName => $value)
                                <th>
                                    @if($colName == 'logo')
                                        <img style="max-width: 200px" src="{{ asset($value) }}" />
                                    @elseif($colName == 'name')
                                        <a href="{{ route('company.show', $company) }}">{{ $value }}</a>
                                    @else
                                        {{ $value }}
                                    @endif
                                </th>
                            @endforeach
                            <th>
                                <div class="display-5 justify-content-around">
                                    <a href="{{ route('company.edit', $company) }}" class="btn btn-info">Update</a>
                                    <form method="post" action="{{ route('company.destroy', $company) }}">
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
            {{ $companies->links() }}
        </div>
    @endif
@endsection

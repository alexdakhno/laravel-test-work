@extends('template.layout')
@section('content')
<div class="container px-4 py-5" id="icon-grid">
    <h2 class="pb-2 border-bottom text-center">Menu</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5 justify-content-center">
        <div class="col d-flex align-items-start">
            <div>
                <a href="{{ route('company.index') }}" class="nav-link text-muted p-0 text-decoration-underline"><h4 class="fw-bold mb-0">Company</h4></a>
                <p>CRUD for company section</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <div>
                <a href="{{ route('employee.index') }}" class="nav-link text-muted p-0 text-decoration-underline"><h4 class="fw-bold mb-0">Employees</h4></a>
                <p>CRUD for employees section</p>
            </div>
        </div>
    </div>
</div>
@endsection

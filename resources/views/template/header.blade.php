<!DOCTYPE html>
<html>
<head>
    <title>My test work</title>

    <link rel="stylesheet" href="/css/all.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/js/app.js"></script>
</head>
<body>

<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
                <use xlink:href="#bootstrap">
                    <symbol id="bootstrap" viewBox="0 0 118 94">
                        <title>Bootstrap</title>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
                    </symbol>
                </use>
            </svg>
            <span class="fs-4">Simple header</span>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{ route('company.index') }}" class="nav-link px-2 link-{{ request()->is(substr(route('company.index', [], false) . '*', 1)) ? 'secondary' : 'dark' }}">Companies</a></li>
            <li><a href="{{ route('employee.index') }}" class="nav-link px-2 link-{{ request()->is(substr(route('employee.index', [], false) . '*', 1)) ? 'secondary' : 'dark' }}">Employees</a></li>
        </ul>

        <div class="col-md-3 text-end">
            @auth
                <span>Hello, <strong>{{ Auth::user()->name }}</strong></span>
                <form class="d-inline-block" method="post" action="{{ route('logout') }}">
                    @csrf
                    <a onclick="$(this).parent().submit(); return false;" href="{{ route('logout') }}" class="btn btn-primary">Logout</a>
                </form>
            @elseauth
                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Sign-up</a>
            @endauth
        </div>
    </header>
</div>

<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>
        @yield('headTitle')
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="{{ mix('/build/main.css') }}">
    @stack('css')
    @stack('scripts')
</head>
<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <div id="main">
        <div class="inner">

            <!-- Header -->
            <header id="header">
                <a href="/" class="logo"><strong>Dynamic Forms</strong>  - PHP Package</a>
                <ul class="icons">
                    <li>User Guide</li>
                </ul>
            </header>

            <!-- Content -->
            <section>
                @yield('content')
            </section>

        </div>
    </div>

    <!-- Sidebar -->
    <div id="sidebar">
        <div class="inner">

            <!-- Menu -->
            <nav id="menu">
                <header class="major">
                    <h2>Menu</h2>
                </header>
                <ul>
                    <li><a href="/" accesskey="o">Overview</a></li>
                    <li><a href="{{ route('compare.list') }}" accesskey="e">Experience List</a></li>
                    <li><a href="{{ route('compare.dynamicForms.add', ['locale'=>'en_US']) }}" accesskey="d">Dynamic Forms Example</a></li>
                    <li><a href="{{ route('compare.laravel.create', ['locale'=>'en_US']) }}" accesskey="l">Laravel Collective Example</a></li>
                </ul>
            </nav>

            <!-- Section -->


            <!-- Section -->
            <section>

            </section>

            <!-- Footer -->
            <footer id="footer">

            </footer>

        </div>
    </div>

</div>

<!-- Scripts -->
<script src="{{ mix('/build/main.js') }}"></script>

</body>
</html>

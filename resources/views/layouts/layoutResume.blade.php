<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>
        @yield('headTitle')
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="robots" content="noindex">
    <link rel="stylesheet" href="{{ mix('/build/main.css') }}">
</head>
<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->
    <div id="main">
        <div class="inner">

            <!-- Header -->
            <header id="header">
                <a href="index.html" class="logo"><strong>Gregor Brabyn</strong>  - Personal Profile</a>
                <ul class="icons">
                    <li>Full Stack PHP Developer</li>
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
                    <li><a href="index.php" accesskey="i">Introduction</a></li>
                    <li><a href="web.php"  class="opener" accesskey="w">Websites</a>
                        <ul>
                            <li><a href="hnz.php">Hiking New Zealand</a></li>
                            <li><a href="ceg.php">Corporate Events Guide</a></li>
                            <li><a href="ezyfit.php">Ezyfit</a></li>
                            <li><a href="capella.php">Capella</a></li>
                            <li><a href="delice.php">Delice</a></li>
                        </ul>
                    </li>
                    <li><a href="coding-style.php" accesskey="c">Coding Style</a></li>
                    <li><a href="marketing.php" accesskey="o">Online Marketing</a></li>
                    <li><a href="quals.php" accesskey="q">Qualifications</a></li>
                    <li><a href="ref.php" accesskey="f">Referees</a></li>
                    <li><a href="me.php" accesskey="a">About Me</a></li>
                </ul>
            </nav>

            <!-- Section -->


            <!-- Section -->
            <section>
                <header class="major">
                    <h2>Contact</h2>
                </header>
                <ul class="contact">
                    <li class="icon solid fa-envelope"><a href="#">gregorbrabyn@yahoo.co.uk</a></li>
                    <li class="icon solid fa-phone">+64 022 093 4252</li>
                    <li class="icon solid fa-home">
                        7 Checketts Avenue<br>
                        Halswell<br>
                        Christchurch<br>
                        New Zealand
                    </li>
                </ul>
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

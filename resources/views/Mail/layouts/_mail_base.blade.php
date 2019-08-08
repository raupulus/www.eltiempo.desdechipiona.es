@include('Mail.layouts._mail_head')

<body>
    @yield('content')

    <br /> <hr /> <br />

    @include('Mail.layouts._mail_footer')

    <br /> <hr /> <br />

    @include('Mail.layouts._mail_legal')
</body>

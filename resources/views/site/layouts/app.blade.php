<!DOCTYPE html>
<html>
<head>
    @include('site.layouts.frontend.style')
</head>
<body>
    @include('site.layouts.parts.header')
   @yield('content')
    @include('site.layouts.parts.footer')

    @include('site.layouts.frontend.script')
</body>
</html>

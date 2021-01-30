<!DOCTYPE html>
<html>
  @include('draw_template.head')
<body>
  <!-- sidebar -->
  @include('draw_template.sidebar')

  <!-- content -->
  @yield('content')

  @yield('script')
</body>
</html>
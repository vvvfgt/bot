<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop (Admin panel)</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ route('admin.main') }}" class="brand-link">
            <span class="brand-text font-weight-light">Shop</span>
        </a>

        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="{{ route('product.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-laptop"></i>
                            <p>Products</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('group.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-list-ul"></i>
                            <p>Groups</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('category.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-list-ul"></i>
                            <p>Categories</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('tag.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-hashtag"></i>
                            <p>Tags</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('color.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-palette"></i>
                            <p>Colors</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('order.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>Orders</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('hook') }}" class="nav-link">
                            <i class="nav-icon"></i>
                            <p>Hook Registration</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('checkHook') }}" class="nav-link">
                            <i class="nav-icon"></i>
                            <p>Check Webhook</p>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $caption }}</h1>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2022-{{ now()->year }} <a href="#">Shop</a>.</strong>
        All rights reserved.
    </footer>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>

<script src="/plugins/jquery/jquery.min.js"></script>
<script src="/plugins/jquery-ui/jquery-ui.min.js}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="/dist/js/adminlte.js"></script>
<script src="/plugins/select2/js/select2.full.min.js"></script>

<script>
    $('.tags').select2()
    $('.colors').select2()
</script>
</body>
</html>


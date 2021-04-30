<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.head_gen')
</head>

<body id="page-top" style="color: black;" class="text-dark">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('include.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('include.topbar')
                @include('include.alerts')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid"  style="color: black;">
                    <!-- Page Heading -->
                    <h3 class=" mb-4" style="color: black;"> @yield('content-title')</h3>
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        <!-- Footer -->
        @include('include.footer')
        <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


@include('include.scripts_gen')

</body>

</html>

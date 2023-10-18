<!DOCTYPE html>
<html lang="en">

@include('admin.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('admin.navbar')

        @include('admin.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box {{ 'bg-secondary' }}">
                    <div class="inner">
                        <h3>coba</h3>
                        <p>Total Antrean</p>
                    </div>
                    <div class="icon">
                        <i class="{{   'ion ion-person' }}"></i>
                    </div>
                    <a href="/antrean" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box {{  'bg-secondary' }}">
                    <div class="inner">
                        <h3> coba2</h3>
                        <p>Poli Umum</p>
                    </div>
                    <div class="icon">
                    <i class="{{  'ion ion-person' }}"></i>
                    </div>
                    <a href="/poliumum" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box {{  'bg-secondary' }}">
                    <div class="inner">
                        <h3>coba</h3>
                        <p>Poli Gigi</p>
                    </div>
                    <div class="icon">
                    <i class="{{  'ion ion-person' }}"></i>
                    </div>
                    <a href="/poligigi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box {{  'bg-secondary' }}">
                    <div class="inner">
                        <h3>coba</h3>
                        <p>Pasien THT</p>
                    </div>
                    <div class="icon">
                        <i class="{{  'ion ion-person' }}"></i>
                    </div>
                    <a href="/politht" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

                    <!-- ./col -->
                </div>
            </div>
        </div>
    </div>

    @include('admin.footer')

    @include('admin.script')
</body>

</html>

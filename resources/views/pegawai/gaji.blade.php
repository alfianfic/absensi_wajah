@extends('master')
@section('title','Gaji')
@section('isi')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Gaji</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Gaji</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Bulan</th>
                            <th>Total Presensi</th>
                            <th>Nominal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                        <tr>
                            <th>Bulan</th>
                            <th>Total Presensi</th>
                            <th>Nominal</th>
                            <th>Action</th>
                        </tr>
                    <tfoot>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
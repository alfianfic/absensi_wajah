@extends('admin.home')
@section('title','Lembur')
@section('isi')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Gaji Lembur</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Gaji Lembur</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Lembur</th>
                            <th>Nominal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                        <tr>
                            <th>Nama</th>
                            <th>Lembur</th>
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
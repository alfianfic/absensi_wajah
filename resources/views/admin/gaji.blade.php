@extends('admin.home')
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
                            <th>Nama</th>
                            <th>Total Presensi</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $users  as $user)
                        <tr>
                            <td>
                                @if ($user->bulan == 1)
                                   <span style="visibility: hidden">1</span> Januari
                                @elseif ($user->bulan ==2)
                                   <span style="visibility: hidden">2</span> Februari
                                @elseif ($user->bulan ==3)
                                   <span style="visibility: hidden">3</span> Maret
                                @elseif ($user->bulan ==4)
                                   <span style="visibility: hidden">4</span> April
                                @elseif ($user->bulan ==5)
                                   <span style="visibility: hidden">5</span> Mei
                                @elseif ($user->bulan ==6)
                                   <span style="visibility: hidden">6</span> Juni
                                @elseif ($user->bulan ==7)
                                   <span style="visibility: hidden">7</span> Juli
                                @elseif ($user->bulan ==8)
                                   <span style="visibility: hidden">8</span> Agustus
                                @elseif ($user->bulan ==9)
                                   <span style="visibility: hidden">9</span> September
                                @elseif ($user->bulan ==10)
                                   <span style="visibility: hidden">10</span> Oktober
                                @elseif ($user->bulan ==11)
                                   <span style="visibility: hidden">11</span> November
                                @elseif ($user->bulan ==12)
                                   <span style="visibility: hidden">12</span> Desember
                                @else
                                    I don't have any records!
                                @endif
                            </td>
                            <td>{{ $user->user->nama }} </td>
                            <td>{{ $user->jam_kerja_bulan }} Jam / Bulan</td>
                            <td>Rp {{ number_format($user->total_gaji , 0, ',', '.')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Bulan</th>
                            <th>Nama</th>
                            <th>Total Presensi</th>
                            <th>Nominal</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

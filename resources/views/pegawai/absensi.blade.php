<!-- resources/views/attendances/index.blade.php -->

@extends('master')
@section('title', 'Absensi Karyawan')
@section('isi')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Presensi Karyawan</h1>
    {{-- <p>Tanggal: {{ $date }}</p> --}}
    
    <button id="checkInBtn" class="btn btn-primary" onclick="openWebcam('check-in')">Check In</button>
    <button id="checkOutBtn" class="btn btn-secondary" onclick="openWebcam('check-out')">Check Out</button>

    <div id="webcamModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Webcam</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <video id="webcam" autoplay></video>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="capturePhoto()">Capture</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function openWebcam(action) {
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(function(stream) {
                var video = document.getElementById('webcam');
                video.srcObject = stream;
                $('#webcamModal').modal('show');

                window.currentAction = action;
            })
            .catch(function(err) {
                console.error("Error accessing webcam: ", err);
            });
    }

</script>
@endsection

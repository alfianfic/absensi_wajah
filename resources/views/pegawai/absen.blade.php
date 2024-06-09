@extends('master')
@section('title', 'Absensi Karyawan')
@section('isi')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Absensi Karyawan</h1>

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
                    <iframe src="http://127.0.0.1:5000/video_feed" style="width: 100%; height: 480px; border: none;"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    let detectedUserId = null;

    function openWebcam(action) {
        $('#webcamModal').modal('show');
        setTimeout(() => {
            if (action === 'check-in') {
                checkInUser();
            } else if (action === 'check-out') {
                checkOutUser();
            }
        }, 5000); // Wait for 5 seconds to simulate face detection and recognition
    }

    function checkInUser() {
        $.ajax({
            url: 'http://127.0.0.1:5000/check_in',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ user_id: detectedUserId }),
            success: function(response) {
                console.log(response.message);
            },
            error: function(error) {
                console.error('Error during check-in');
            }
        });
    }

    function checkOutUser() {
        $.ajax({
            url: 'http://127.0.0.1:5000/check_out',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ user_id: detectedUserId }),
            success: function(response) {
                console.log(response.message);
            },
            error: function(error) {
                console.error('Error during check-out');
            }
        });
    }
</script>
@endsection

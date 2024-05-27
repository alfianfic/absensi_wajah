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
    function openWebcam(action) {
        $('#webcamModal').modal('show');
        window.currentAction = action;

        if (action === 'check-in') {
            checkInUser();
        } else if (action === 'check-out') {
            checkOutUser();
        }
    }

    function checkInUser() {
        $.ajax({
            url: 'http://127.0.0.1:5000/check_in',
            type: 'POST',
            data: {
                user_id: 1  // Replace with dynamic user ID as needed
            },
            success: function(response) {
                alert(response.message);
            },
            error: function(error) {
                alert('Error during check-in');
            }
        });
    }

    function checkOutUser() {
        $.ajax({
            url: 'http://127.0.0.1:5000/check_out',
            type: 'POST',
            data: {
                user_id: 1  // Replace with dynamic user ID as needed
            },
            success: function(response) {
                alert(response.message);
            },
            error: function(error) {
                alert('Error during check-out');
            }
        });
    }
</script>
@endsection

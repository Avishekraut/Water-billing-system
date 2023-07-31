<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
    echo '
    <script>
    window.onload = function(){
        Swal.fire({
            title: "Are you sure?",
            text: "Go back to home screen.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#5388eb",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes",
            cancelButtonText: "No"
          }).then((result) => {
            if (result.isConfirmed) {
              window.location = "./confirmLogout.php";
            } else {
                window.location = "./dashboard.php";
            }
        });
    };
    </script>';
?>
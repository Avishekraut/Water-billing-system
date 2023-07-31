window.onload = function() {
  confirmLogout = function() {
    Swal.fire({
      title: 'Are you sure?',
      text: "Go back to home screen.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#5388eb',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes',
      cancelButtonText: 'No'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "../index.php";
      }
    });
  };

  redirectPage = function(option) {
    if (option == 'nmb') {
      Swal.fire({
        title: 'Thank You!',
        text: "You are being re-directed to NMB Bank Website.",
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#5388eb',
        confirmButtonText: 'OK',
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = "https://www.nmb.com.np/";
        }
      });
    } else if (option == 'prabhu') {
      Swal.fire({
        title: 'Thank You!',
        text: "You are being re-directed to Prabhu Bank Website.",
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#5388eb',
        confirmButtonText: 'OK',
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = "https://www.prabhubank.com/";
        }
      });
    } else if (option == 'globalime') {
      Swal.fire({
        title: 'Thank You!',
        text: "You are being re-directed to Global IME website.",
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#5388eb',
        confirmButtonText: 'OK',
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = "https://globalimebank.com/";
        }
      });
    } else if (option == 'esewa') {
      Swal.fire({
        title: 'Thank You!',
        text: "You are being re-directed to Esewa website.",
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#5388eb',
        confirmButtonText: 'OK',
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = "https://esewa.com.np/";
        }
      });
    } else if (option == 'khalti') {
      Swal.fire({
        title: 'Thank You!',
        text: "You are being re-directed to Khalti website.",
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#5388eb',
        confirmButtonText: 'OK',
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = "https://khalti.com/";
        }
      });
    } else if (option == 'imepay') {
      Swal.fire({
        title: 'Thank You!',
        text: "You are being re-directed to IMEpay website.",
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#5388eb',
        confirmButtonText: 'OK',
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = "https://www.imepay.com.np/";
        }
      });
    };
  }

  // Activate tooltip
  $('[data-toggle="tooltip"]').tooltip();
            
  // Select/Deselect checkboxes
  var checkbox = $('table tbody input[type="checkbox"]');
  $("#selectAll").click(function () {
      if (this.checked) {
          checkbox.each(function () {
              this.checked = true;
          });
      } else {
          checkbox.each(function () {
              this.checked = false;
          });
      }
  });
  checkbox.click(function () {
      if (!this.checked) {
          $("#selectAll").prop("checked", false);
      }
  });

  //menuToggle
  let toggle = document.querySelector('.toggle');
  let navigation = document.querySelector('.navigation');
  let main = document.querySelector('.main');
  
  toggle.onclick = function () {
    navigation.classList.toggle('active');
    main.classList.toggle('active');
  }
  
  //add hovered class
  let list = document.querySelectorAll('.navigation li');
  activeLink = function() {
    list.forEach((item) => item.classList.remove('hovered'));
    this.classList.add('hovered');
  }

  list.forEach((item) => item.addEventListener('mouseover', activeLink));

  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }

  var closebtn = document.getElementById('closebtn');
  closeNow = function() {
      closebtn.style.display = 'none';
  };
}
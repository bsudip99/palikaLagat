  @include('admin.includes.partials.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- Custom Utils js -->

  <script src="{{asset('js/palikaUtils.js')}}"></script>
  <!-- jQuery -->
  <script src="{{asset('admin/assets/plugins/jquery/jquery.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('admin/assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- DataTables  & Plugins -->
  <script src="{{asset('admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('admin/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('admin/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{asset('admin/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('admin/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{asset('admin/assets/plugins/jszip/jszip.min.js')}}"></script>
  <script src="{{asset('admin/assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('admin/assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('admin/assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
  <!-- Select2 -->
  <script src="{{asset('admin/assets/plugins/select2/js/select2.full.min.js')}}"></script>
  <script>
    $(function() {
      // $("#example1").DataTable({
      //   "responsive": true, "lengthChange": false, "autoWidth": false,
      //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

      $('.select2').select2();

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      });

      $('#datatable-buttons').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  <!-- Summernote -->
  <script src="{{asset('admin/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{asset('admin/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- bs-custom-file-input -->
  <script src="{{asset('admin/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
  <!-- AdminLTE App -->
  <script src="{{asset('admin/assets/dist/js/adminlte.js')}}"></script>
  <!-- Toastr -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
    @if(Session::has('success'))
    toastr.options = {
      "closeButton": true,
      "progressBar": true
    }
    toastr.success("{{ session('success') }}");
    @endif

    @if(Session::has('error'))
    toastr.options = {
      "closeButton": true,
      "progressBar": true
    }
    toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options = {
      "closeButton": true,
      "progressBar": true
    }
    toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options = {
      "closeButton": true,
      "progressBar": true
    }
    toastr.warning("{{ session('warning') }}");
    @endif
  </script>
  <script>
    $('#mark-all').on('click', function() {
      var processing = false;
      var _token = "{{csrf_token() }}";
      var formData = {
        _token: _token,
      };
      var delay = 5000;
      var type = "POST";
      var url = "{{ route('admin.markNotification') }}";
      var timeout;
      timeout = setTimeout(function() {
        if (!processing) {
          processing = true;
          request = $.ajax({
            type: type,
            url: url,
            data: formData,
            dataType: 'json',
            success: function(data) {
              processing = false;
              var unreadNotificationCount = 0;
              for (var i = 0; i < data.notification.length; i++) {
                if (data.notification[i].read_at == null) {
                  unreadNotificationCount++;
                }
              }
              $('.notification-item').css("background", '#fff');
              $('#unread-notification-count').text(unreadNotificationCount);
            },
          });
        }
      }, 1000);
    });

    //Functions to format Date in YYYY-MM-DD HH:MM:SS
    function padTo2Digits(num) {
      return num.toString().padStart(2, '0');
    }

    function formatDate(date) {
      return (
        [
          date.getFullYear(),
          padTo2Digits(date.getMonth() + 1),
          padTo2Digits(date.getDate()),
        ].join('-') +
        ' ' + [
          padTo2Digits(date.getHours()),
          padTo2Digits(date.getMinutes()),
          padTo2Digits(date.getSeconds()),
        ].join(':')
      );
    }
  </script>

  @yield('javascript')
  </body>

  </html>
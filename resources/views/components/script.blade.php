<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>

<!-- prismjs plugin -->
<script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>

<!-- gridjs js -->
<script src="{{ asset('assets/libs/gridjs/gridjs.umd.js') }}"></script>
<!-- gridjs init -->
<script src="{{ asset('assets/js/pages/gridjs.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/app.js') }}"></script>

<!-- JavaScript -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

<!-- Thêm CSS cho DateRangePicker -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<!-- Thêm jQuery và DateRangePicker JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.js"></script>


<script>
  $(document).ready(function() {
    $('#date-range').daterangepicker({
      autoUpdateInput: false, // Không tự động cập nhật input
      locale: {
        format: 'YYYY-MM-DD', // Định dạng ngày
        cancelLabel: 'Clear' // Thêm nút Clear
      },
      ranges: {  // Định nghĩa một số khoảng thời gian phổ biến
        'Hôm nay': [moment(), moment()],
        'Hôm qua': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        '7 ngày trước': [moment().subtract(6, 'days'), moment()],
        '30 ngày trước': [moment().subtract(29, 'days'), moment()],
        'Tháng này': [moment().startOf('month'), moment().endOf('month')],
        'Tháng trước': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
      }
    });

    // Sự kiện khi người dùng chọn khoảng thời gian
    $('#date-range').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
    });

    // Sự kiện khi người dùng xóa lựa chọn
    $('#date-range').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
    });
  });


</script>


<script>
  // Xử lý sự kiện khi click vào nút "Xóa"
  document.getElementById('clear-date-range').addEventListener('click', function() {
    // Reset trường "Ngày tạo"
    document.getElementById('date-range').value = '';

    // Reset các trường khác nếu cần
    document.querySelector('select[name="status"]').value = '';
    document.querySelector('select[name="sort_by"]').value = '';
    document.querySelector('input[name="search"]').value = '';

    // Submit form (nếu cần) để cập nhật trạng thái URL
    document.querySelector('form').submit();
  });
</script>

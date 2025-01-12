(function ($) {
    "use strict";
    var QA = {}

    // arrow function
    QA.setupDateRangePicker = () => {
        if($('#date-range').length){
          $('#date-range').daterangepicker({
            autoUpdateInput: false, // Ban đầu không tự động cập nhật giá trị
            locale: {
                cancelLabel: 'Clear',
                applyLabel: 'Apply',
                format: 'DD/MM/YYYY',
            }
          });

          // Cập nhật giá trị vào input khi chọn ngày
            $('#date-range').on('apply.daterangepicker', function (ev, picker) {
              $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
          });

          // Xóa giá trị khi nhấn nút "Clear"
          $('#date-range').on('cancel.daterangepicker', function (ev, picker) {
              $(this).val('');
          });
        }
    }

    QA.setupSelect2 = () => {
      if($('.select2').length){
        $('.select2').select2({
          placeholder: "Chọn một tùy chọn",
          allowClear: true
        });
      }

    }


    $(document).on('ready', function(){
      QA.setupDateRangePicker()
      QA.setupSelect2()
    })



})(jQuery);

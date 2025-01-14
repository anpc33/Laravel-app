(function ($) {
  "use strict";
  var QA = {};

  QA.setupDateRangeFilter = () => {
    if ($("#date-range").length) {
      $("#date-range").daterangepicker({
        autoUpdateInput: false, // Không tự động cập nhật input
        locale: {
          format: "YYYY-MM-DD", // Định dạng ngày
          cancelLabel: "Clear", // Thêm nút Clear
        },
        ranges: {
          // Định nghĩa một số khoảng thời gian phổ biến
          "Hôm nay": [moment(), moment()],
          "Hôm qua": [
            moment().subtract(1, "days"),
            moment().subtract(1, "days"),
          ],
          "7 ngày trước": [moment().subtract(6, "days"), moment()],
          "30 ngày trước": [moment().subtract(29, "days"), moment()],
          "Tháng này": [moment().startOf("month"), moment().endOf("month")],
          "Tháng trước": [
            moment().subtract(1, "month").startOf("month"),
            moment().subtract(1, "month").endOf("month"),
          ],
        },
      });

      // Sự kiện khi người dùng chọn khoảng thời gian
      $("#date-range").on("apply.daterangepicker", function (ev, picker) {
        $(this).val(
          picker.startDate.format("YYYY-MM-DD") +
            " to " +
            picker.endDate.format("YYYY-MM-DD")
        );
      });

      // Sự kiện khi người dùng xóa lựa chọn
      $("#date-range").on("cancel.daterangepicker", function (ev, picker) {
        $(this).val("");
      });
    }
  };

  QA.setupSelect2 = () => {
    if ($(".select2").length) {
      $(".select2").select2({
        placeholder: "Chọn một tùy chọn",
        allowClear: true,
      });
    }
  };
  QA.setupDestroy = () => {
    if ($("#clear-date-range").length) {
      document
        .getElementById("clear-date-range")
        .addEventListener("click", function () {
          // Reset trường "Ngày tạo"
          document.getElementById("date-range").value = "";

          // Reset các trường khác nếu cần
          document.querySelector('select[name="status"]').value = "";
          document.querySelector('select[name="sort_by"]').value = "";
          document.querySelector('input[name="search"]').value = "";

          // Submit form (nếu cần) để cập nhật trạng thái URL
          document.querySelector("form").submit();
        });
    }
  };

  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
  });

  QA.updateByTableField = () => {
    if ($(".updateByField").length) {
      $(document).on("click", ".updateByField", function () {
        let _this = $(this);
        let option = _this.data();
        // console.log(option);

        $.ajax({
          url: "/ajax/ajaxUpdateByField", // URL của endpoint trên server
          type: "POST", // Phương thức HTTP
          data: option, // Dữ liệu gửi đi (được lấy từ data-* của phần tử)
          dataType: "json", // Kiểu dữ liệu mong đợi từ server
          beforeSend: function () {
            // Xử lý trước khi gửi request
          },
          success: function (res) {
            // Xử lý khi server phản hồi thành công
          },
          error: function (xhr, status, error) {
            console.error("ERROR: " + xhr.responseText);
          },
          complete: function () {
            // Xử lý sau khi hoàn thành (thành công hoặc thất bại)
          },
        });
      });
    }
  };

  QA.hanldeCheckBox = () => {
    if ($("#checkAll").length) {
      $(document).on("change", "#checkAll", function () {
        let isChecked = $(this).is(":checked");
        $(".record-checkbox").prop("checked", isChecked);
        QA.updateToolbarVisibility();
      });

      $(document).on("change", ".record-checkbox", function () {
        let allChecked =
          $(".record-checkbox").length === $(".record-checkbox:checked").length;
        $("#checkAll").prop("checked", allChecked);
        QA.updateToolbarVisibility();
      });
    }
  };

  QA.updateToolbarVisibility = () => {
    const checkedBoxes = $(".record-checkbox:checked").length;
    $("#smart-toolbar").toggle(checkedBoxes > 0);
  };

  QA.setupSmartToolbar = () => {
    $("#delete-selected").on("click", function () {
      const option = $(this).data();
      const selectedIds = $(".record-checkbox:checked")
        .map(function () {
          return $(this).val();
        })
        .get();

      const model = $(".record-checkbox:checked")
        .first() // Chỉ cần lấy giá trị từ phần tử đầu tiên nếu các checkbox thuộc cùng một mô hình
        .data("model"); // Lấy data-model

      if (selectedIds.length === 0) {
        alert("Vui lòng chọn ít nhất một bản ghi để xóa.");
        return;
      }

      $.ajax({
        url: "/ajax/deleteRecords", // Endpoint xử lý xóa nhiều bản ghi
        type: "POST",
        data: {
          ids: selectedIds,
          model,
          _token: $('meta[name="csrf-token"]').attr("content"), // CSRF token
        },
        dataType: "json",
        beforeSend: function () {
          // Xử lý trước khi gửi request
          confirm("Bạn có chắc chắn muốn xóa các bản ghi đã chọn không?");
          $("#delete-selected").prop("disabled", true);
        },
        success: function (res) {
          // Xử lý khi server phản hồi thành công
          alert("Xóa thành công các bản ghi");
          location.reload(); // Refresh lại bảng nếu cần
        },
        error: function (xhr, status, error) {
          console.error("ERROR: " + xhr.responseText);
        },
        complete: function () {
          $("#delete-selected").prop("disabled", false);
        },
      });
    });

    $("#update-status").on("click", function () {
      console.log(12345);
    });
  };

  jQuery(function () {
    QA.setupDateRangeFilter();
    QA.setupDestroy();
    QA.setupSelect2();
    QA.updateByTableField();
    QA.hanldeCheckBox();
    QA.setupSmartToolbar();
    QA.updateToolbarVisibility();
  });
})(jQuery);

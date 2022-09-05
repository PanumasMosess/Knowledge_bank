(function ($) {
  "use strict";
  $("#data_1 .input-group.date").datepicker({
    todayBtn: "linked",
    keyboardNavigation: false,
    forceParse: false,
    calendarWeeks: true,
    autoclose: true,
  });

  $("#data_year .input-group.date")
    .datepicker({
      keyboardNavigation: false,
      forceParse: false,
      autoclose: true,
      format: " yyyy",
      viewMode: "years",
      minViewMode: "years",
    })
    .on("changeDate", function (e) {
      by_year();
    });

  $("#data_year_target .input-group.date").datepicker({
    keyboardNavigation: false,
    forceParse: false,
    autoclose: true,
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years",
  });

  $("#year_picker_chart_ .input-group.date")
    .datepicker({
      keyboardNavigation: false,
      forceParse: false,
      autoclose: true,
      format: "yyyy",
      viewMode: "years",
      minViewMode: "years",
    })
    .on("changeDate", function (e) {
      by_year_chart();
    });

  $("#data_2 .input-group.date").datepicker({
    startView: 1,
    todayBtn: "linked",
    keyboardNavigation: false,
    forceParse: false,
    autoclose: true,
    format: "dd/mm/yyyy",
  });

  $("#data_3 .input-group.date").datepicker({
    startView: 2,
    todayBtn: "linked",
    keyboardNavigation: false,
    forceParse: false,
    autoclose: true,
  });

  $("#data_4 .input-group.date").datepicker({
    minViewMode: 1,
    keyboardNavigation: false,
    forceParse: false,
    forceParse: false,
    autoclose: true,
    todayHighlight: true,
  });

  $("#data_5 .input-daterange").datepicker({
    keyboardNavigation: false,
    forceParse: false,
    autoclose: true,
  });
  
})(jQuery);

// Call the dataTables jQuery plugin
$(document).ready(function () {
  $("#dataTable").DataTable( {
    dom: 'Bfrtip',
    buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
    ]
  }  );


});

$(document).ready(function () {
  $("#dataTable2").DataTable({});

  $("#example_filter").hide(); // Hide default search datatables where example is the ID of table

  $("#topic").on("keyup", function () {
    $("#dataTable2")
      .DataTable()
      .column(1)
      .search($("#topic").val(), false, true)
      .draw();
  });

  $("#divisiinput").on("keyup", function () {
    $("#dataTable2")
      .DataTable()
      .column(4)
      .search($("#divisiinput").val(), false, true)
      .draw();
  });

  $("#jenis").on("keyup", function () {
    $("#dataTable2")
      .DataTable()
      .column(2)
      .search($("#jenis").val(), false, true)
      .draw();
  });
});
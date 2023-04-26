    <script src="{{asset('admin/assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/simplebar/simplebar.min.js')}}"></script>
 
    <script src="{{asset('admin/assets/plugins/charts/Chart.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart.js')}}"></script>

    <script src="{{asset('admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js')}}"></script>
    <script src="{{asset('admin/assets/js/vector-map.js')}}"></script>

    <script src="{{asset('admin/assets/plugins/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('admin/assets/js/date-range.js')}}"></script>

    <!-- <script src="{{asset('admin/assets/plugins/toastr/toastr.min.js')}}"></script> -->
    <script src="{{asset('admin/assets/js/sleek.js')}}"></script>
    <script src="{{asset('admin/assets/options/optionswitcher.js')}}"></script>
    <!-- datatble -->
    <script src="{{asset('admin/assets/plugins/data-tables/jquery.datatables.min.js')}}">
    <script src="{{asset('admin/assets/plugins/data-tables/datatables.bootstrap4.min.js')}}">
    <script>
        jQuery(document).ready(function() {
            jQuery('#hoverable-data-table').DataTable({
                "aLengthMenu": [[20, 30, 50, 75, -1], [20, 30, 50, 75, "All"]],
                "pageLength": 20,
                "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">'
            });
        });
    </script>

    <script>
        /* Formatting function for row details - modify as you need */
        function format () {
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                '<tr>'+
                    '<td>Full name:</td>'+
                    '<td>Name...</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Extension number:</td>'+
                    '<td>123</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Extra info:</td>'+
                    '<td>And any further details here (images etc)...</td>'+
                '</tr>'+
            '</table>'; 
        }
 
        $(document).ready(function() {
            var table = $('#expendable-data-table').DataTable( {
            "className":      'details-control',
            "order": [[0, 'asc']],
            "aLengthMenu": [[20, 30, 50, 75, -1], [20, 30, 50, 75, "All"]],
            "pageLength": 20,
            "dom": '<"row align-items-center justify-content-between top-information"lf>rt<"row align-items-center justify-content-between bottom-information"ip><"clear">'
            });

            // Add event listener for opening and closing details
            $('#expendable-data-table tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );
        
            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
            });
        });
    </script>

    <script>
        $(document).ready(function (){
            $('#msg').click(function (){
                $(this).text(' ');
            });
        });
    </script>
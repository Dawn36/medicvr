<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset('theme/assets/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('theme/assets/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('theme/assets/js/app-style-switcher.js')}}"></script>
<script src="{{ asset('theme/assets/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

<!--Wave Effects -->
<script src="{{ asset('theme/assets/js/waves.js')}}"></script>

<!--Menu sidebar -->
<script src="{{ asset('theme/assets/js/sidebarmenu.js')}}"></script>

<!--Custom JavaScript -->
<script src="{{ asset('theme/assets/js/custom.js')}}"></script>

<!--chartis chart-->
<script src="{{ asset('theme/assets/plugins/bower_components/chartist/dist/chartist.min.js')}}"></script>
<script src="{{ asset('theme/assets/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>
<script src="{{ asset('theme/assets/js/pages/dashboards/dashboard1.js')}}"></script>

<!-- DataTable Script -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<!-- Custom Chart Js -->
<script src="{{ asset('theme/assets/js/charts.js')}}"></script>

<script>
    // DataTable
    $(document).ready(function() {
        $('#myTable').DataTable();
        $('#myTable2').DataTable();
    });

</script>
</body>

</html>
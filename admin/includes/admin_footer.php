<!-- jQuery -->
<script src="js/jquery.js"></script>

    <script src="js/scripts.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
    $(document).ready( function () {
        $('#myTable').DataTable(
            {
            "ordering": false
            }
        );
        $('#myTablep').DataTable(
            {
            "ordering": false,
            "scrollX": true
            }
        );
    } );
    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        jQuery( function() {
            jQuery( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
    } );
    </script>
</body>

</html>
</div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>






<!-- Bootstrap core JavaScript-->
<script src=<?php echo base_url("assets_2/vendor/jquery/jquery.min.js") ?>></script>
<script src=<?php echo base_url("assets_2/vendor/bootstrap/js/bootstrap.bundle.min.js") ?>></script>

<!-- Core plugin JavaScript-->
<script src=<?php echo base_url("assets_2/vendor/jquery-easing/jquery.easing.min.js") ?>></script>

<!-- Custom scripts for all pages-->
<script src=<?php echo base_url("assets_2/js/sb-admin-2.min.js") ?>></script>

<!-- Page level plugins -->
<script src=<?php echo base_url("assets_2/vendor/chart.js/Chart.min.js") ?>></script>

<!-- Page level custom scripts -->
<script src=<?php echo base_url("assets_2/js/demo/chart-area-demo.js") ?>></script>
<script src=<?php echo base_url("assets_2/js/demo/chart-pie-demo.js") ?>></script>

<!-- Page level tables plugins -->
<script src=<?php echo base_url("assets_2/vendor/datatables/jquery.dataTables.min.js") ?>></script>
<script src=<?php echo base_url("assets_2/vendor/datatables/dataTables.bootstrap4.min.js") ?>></script>

<!-- jQuery -->
<script src="<?= base_url('assets_3/tamplate') ?>/plugins/jquery/jquery.min.js"></script>



<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets_3/tamplate') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets_3/tamplate') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets_3/tamplate') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets_3/tamplate') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets_3/tamplate') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets_3/tamplate') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets_3/tamplate') ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets_3/tamplate') ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets_3/tamplate') ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets_3/tamplate') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets_3/tamplate') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets_3/tamplate') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- bootsrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

</body>

</html>
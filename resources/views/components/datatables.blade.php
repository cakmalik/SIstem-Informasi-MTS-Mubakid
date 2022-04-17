<div>
    @push('head')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.2/css/fixedHeader.dataTables.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" />
    @endpush
    @push('foot')
        {{-- disini awalnya jquery, tp saya pindah ke awal aja. karena menu collapse harus pake jquery jg
            sementara kita tidak bisa double jquery (bentrok) --}}
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        {{-- <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> --}}
        <script src="https://cdn.datatables.net/fixedheader/3.2.2/js/dataTables.fixedHeader.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>

        <script script script script>
            $(document).ready(function() {
                var table = $('#datatable').DataTable({
                    // serverSide: true,
                    responsive: true,
                    lengthChange: false,
                    lengthMenu: [10, 25, 50, 100],
                    pageLength: 50,
                    "ordering": false,
                    "oLanguage": {
                        "sSearch": ""
                    },
                });
                new $.fn.dataTable.FixedHeader(table);
            });
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
        <script type="text/javascript">
            $('.show_confirm').click(function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                        title: `Kamu yakin`,
                        text: "Menghapus kenangan kita ?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        confirmButtonText: "Ya, hapus",
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        }
                    });
            });
        </script>
    @endpush
</div>

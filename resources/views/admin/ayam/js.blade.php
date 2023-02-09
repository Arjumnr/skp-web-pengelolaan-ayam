<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('ayam.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'user_id.name',
                    name: 'user_id.name'
                },
                {
                    data: 'nomor',
                    name: 'nomor'
                },
                {
                    data: 'nama_pembeli',
                    name: 'nama_pembeli'
                },
                {
                    data: 'jumlah',
                    name: 'jumlah'
                },
                {
                    data: 'total_berat',
                    name: 'total_berat'
                },
                {
                    data: 'umur',
                    name: 'umur'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                
            ],
        });
    });
</script>

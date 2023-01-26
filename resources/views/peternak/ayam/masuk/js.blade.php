 <script>
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
 </script>

 <script>
     $(document).ready(function() {
         $(document).on('click', '.addData', function(e) {
             e.preventDefault();
             let nomor = $('#nomor').val();
             let jumlah = $('#jumlah').val();
             let total_berat = $('#total_berat').val();
             let umur = $('#umur').val();

             $.ajax({
                 type: 'POST',
                 url: "{{ route('ayamMasuk.store') }}",
                 data: {
                     nomor: nomor,
                     jumlah: jumlah,
                     total_berat: total_berat,
                     umur: umur
                 },
                 success: function(res) {},
                 error: function(err) {
                     let error = err.responseJSON;
                     $.each(error.errors, function(index, value) {
                         $('.errMsgContainer').append('<span class="text-danger">' +
                             value + '</span>' + '<br>');
                     })
                 }
             });
         })
         // $('#mediumModal').on('show.bs.modal', function (e) {
         //     var button = $(e.relatedTarget);
         //     var url = button.data('attr');
         //     var modal = $(this);
         //     $.ajax({
         //         url: url,
         //         type: 'GET',
         //         success: function (data) {
         //             modal.find('.modal-body').html(data);
         //         }
         //     });
         // });
     });
 </script>
 <script>
     // var btnUpdate = document.getElementById('btnUpdate');
     // btnUpdate.addEventListener('click', function() {
     //             //upadte data
     //             var jumlah = document.getElementById('jumlah').value;
     //             var total_berat = document.getElementById('total_berat').value;
     //             var umur = document.getElementById('umur').value;
     //             //get id 
     //             var id = document.getElementById('ID').value;


     //             console.log(id);
     // var url = "{{ route('updateAyamMasuk', ':id') }}";
     //put data




     // });
 </script>

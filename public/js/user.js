   $(".alert-success").fadeTo(3000, 0.2).slideUp(500);
   // Every time a modal is shown, if it has an autofocus element, focus on it.
   $('.modal').on('shown.bs.modal', function () {
       $(this).find('[autofocus]').focus();
   });

   //format number

   function formatNumberIna(angka, prefix) {
       var number_string = angka.replace(/[^,\d]/g, '').toString(),
           split = number_string.split(','),
           sisa = split[0].length % 3,
           rupiah = split[0].substr(0, sisa),
           ribuan = split[0].substr(sisa).match(/\d{3}/gi);

       // tambahkan titik jika yang di input sudah menjadi angka ribuan
       if (ribuan) {
           separator = sisa ? '.' : '';
           rupiah += separator + ribuan.join('.');
       }

       rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
       return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
   }

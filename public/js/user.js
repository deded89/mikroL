   $(".alert-success").fadeTo(3000, 0.2).slideUp(500);
   // Every time a modal is shown, if it has an autofocus element, focus on it.
   $('.modal').on('shown.bs.modal', function () {
       $(this).find('[autofocus]').focus();
   });

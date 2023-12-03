<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


@if(Session::has('success'))
  <script type="text/javascript">
     swal("Success", "{{Session::get('success')}}", "success").then((value) => {
       //location.reload();
     }).catch(swal.noop);
 </script>
@endif



@if(Session::has('error'))
    <script type="text/javascript">
     swal("error", "{{Session::get('error')}}", "error").then((value) => {
       //location.reload();
     }).catch(swal.noop);
 </script>
 @endif

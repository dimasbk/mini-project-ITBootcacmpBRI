<!-- If you prefer jQuery these are the required scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script src="{{ asset('AdminX/dist/js/vendor.js') }}"></script>
<script src="{{ asset('AdminX/dist/js/adminx.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- If you prefer vanilla JS these are the only required scripts -->
<!-- script src="{{ asset('AdminX/dist/js/vendor.js') }}"></script>
<script src="{{ asset('AdminX/dist/js/adminx.vanilla.js') }}"></script-->
@yield('script')

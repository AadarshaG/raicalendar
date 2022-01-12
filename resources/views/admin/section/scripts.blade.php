<script src="{{asset('js/manifest.js')}}"></script>
<script src="{{asset('js/vendor.js')}}"></script>
<script src="{{asset('js/admin.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

@yield('scripts')
@yield('js')


<script>
    setTimeout(function () {
        $('.alert').slideUp();
    },2000);
</script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
</body>

</html>

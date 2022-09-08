
<footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © <?php echo date("Y"); ?> Copyright.
    <a class="text-dark" href="#">Kuwait University</a>
  </div>
  <!-- Copyright -->
</footer>

<script type="text/javascript" src="{{asset('public/assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/bootstrap/js/jquery.js')}}"></script>
<script src="{{ asset('public/assets/js/jquery.validate.min.js')}}"></script>
<script src="{{ asset('public/assets/js/alumni.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/assets/js/toastr.min.js')}}"></script>

<script type="text/javascript">
	var APP_URL = {!! json_encode(url('/')) !!}
</script>

</body>
</html>
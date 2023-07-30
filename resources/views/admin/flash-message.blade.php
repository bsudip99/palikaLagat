@if ($message = Session::get('flash_success'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" id="close-button" onclick="div_remove()" data-dismiss="alert">×</button>
  {{ $message }}
</div>
@endif


@if ($message = Session::get('flash_error'))
<div class="alert alert-danger alert-block">
  <button type="button" class="close" id="close-button" onclick="div_remove()" data-dismiss="alert">×</button>
  {{ $message }}
</div>
@endif


@if ($message = Session::get('flash_warning'))
<div class="alert alert-warning alert-block">
  <button type="button" class="close" id="close-button" onclick="div_remove()" data-dismiss="alert">×</button>
  {{ $message }}
</div>
@endif


@if ($message = Session::get('flash_info'))
<div class="alert alert-info alert-block">
  <button type="button" class="close" id="close-button" onclick="div_remove()" data-dismiss="alert">×</button>
  {{ $message }}
</div>
@endif

@if (Session::get('expiring_in_warning'))
<div class="alert alert-warning alert-block">
  <button type="button" class="close" id="close-button" onclick="div_remove()" data-dismiss="alert">×</button>
  {{ Session::get('expiring_in_warning') }}
</div>
@endif

{{-- @if ($errors->any())
<div class="alert alert-danger">
	<button type="button" class="close" id="close-button" onclick="div_remove()" data-dismiss="alert">×</button>
	Please check the form below for errors
</div>
@endif --}}
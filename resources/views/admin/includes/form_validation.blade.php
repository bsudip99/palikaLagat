@if($errors->has($fieldname))
<p class="text text-danger">{!! $errors->first($fieldname) !!}</p>
@endif
@if ($errors->any())
    <div class="alert alert-danger" style="color:red">
        @foreach ($errors->all() as $key => $error)
         {{ $error }}  <br/>
        @endforeach
    </div>
    <br/>
@endif
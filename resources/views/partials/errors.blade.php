@if($errors->any())
    <div class="alert">
        @foreach($errors->all() as $error)
            <p style="color:red;font-weight: bold" >
                * {{$error}}
            </p>
        @endforeach
    </div>
@endif

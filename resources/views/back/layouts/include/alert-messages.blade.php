@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger msj" role="alert" style="background: lightcoral">
            {{$error}}
        </div>
    @endforeach
@endif


@if(session()->has('mesaj'))
    <div class="alert alert-{{session('type')}} msj" role="alert">
        {{session('mesaj')}}
    </div>
@endif


@if(session()->has('swal'))
    @php
        $icon='';
        if(session('type')=='success') {
            $icon='Ok!';
        }

        if(session('type')=='warning') {
            $icon='Ups!';
        }

        if(session('type')=='info') {
            $icon='!';
        }
    @endphp
    <script>
        swal("{{$icon}}", "{{session('swal')}}", "{{session('type')}}");
    </script>
@endif
@extends('admin.main')

@section('section', 'Update '.$server->name)
<style>
    #webmin{
        height: 100%;
        width: 100%;
        border: none;
    }
</style>
<script>
    console.log("{{ $server->webmin_url }}}");
</script>
@section('content')
<iframe id="webmin" src="{{ $server->webmin_url }}"></iframe>
@endsection

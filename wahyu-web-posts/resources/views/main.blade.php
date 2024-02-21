@extends('particles.body')

@section('contain')
@include('dashboard.resources')

<div class="container flex flex-col justify-center items-center align-middle p-5 gap-10">
    <img id="previewImage" src="" alt="" class="rounded-full h-32 aspect-square overflow-hidden border-0 outline-none">
    <input type="file" id="inputFile" name="inputFile" class="bg-slate-100 shadow-md rounded-sm">
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var inputFile = $('#inputFile');
        var previewImage = $('#previewImage');

        inputFile.on('change', function(event) {
            const input = event.target;
            if(input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    previewImage.attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        })   
    })
</script>
@endsection
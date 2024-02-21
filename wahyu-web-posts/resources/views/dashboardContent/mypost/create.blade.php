@extends('dashboard.index')

@section('content')

<head>
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
</head>

<body class="dark:bg-slate-700">
  <div id="container" class="flex flex-col gap-3 w-full max-w-full">
  <h2 class="text-2xl dark:text-slate-300">Create a new Post!</h2>
  @if (session('message'))
    hello dunia
  @endif
  <form action="/dashboard/posts" enctype="multipart/form-data" method="post" class="grid max-sm:grid-flow-row md:grid-flow-col lg:grid-flow-col md:grid-cols-12 max-sm:grid-cols-1 mx-auto w-full gap-5">
    @csrf
    <div id="leftSideForm" class="md:col-span-4 overflow-y-scroll h-[30rem] px-2">
      <div class="mb-5">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900  dark:text-white">Title</label>
        <input type="title" name="title" id="title" class="shadow-sm bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500   block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  placeholder="cinta itu buta" value="{{ old('title') }}">
        @error('title')
          <span class="text-sm text-red-600 flex flex-row gap-1"><i data-feather="info" class="w-4"></i> {{ $message }}</span>
        @enderror
      </div>

      <div class="mb-5">
        <label for="slug" class="block mb-2 text-sm font-medium text-gray-900   dark:text-white">Slug</label>
        <input type="slug" name="slug" id="slug" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  placeholder="slug" value="{{ old('slug') }}">
        @error('slug')
          <span class="text-sm text-red-600 flex flex-row gap-1"><i data-feather="info" class="w-4"></i> {{ $message }}</span>
        @enderror
      </div>

      <div class="mb-5">
        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an Category   name</label>
        <select id="category" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg   focus:ring-blue-500      focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600   dark:placeholder-gray-400      dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-5" id="inputImageBox">
        <label for="inputImage" class="block mb-2 text-sm font-medium text-gray-900   dark:text-white">Image</label>
        <img id="previewImage" src="" alt="" class="rounded-sm mb-2">
        <input type="file" name="image" id="inputImage" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  placeholder="slug" value="{{ old('slug') }}">
        @error('image')
          <span class="text-sm text-red-600 flex flex-row gap-1"><i data-feather="info" class="w-4"></i> {{ $message }}</span>
        @enderror
      </div>

      <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Excerpt</label>
      <textarea id="message" name="excerpt" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50  rounded-lg border   border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700   dark:border-gray-600   dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-32" placeholder="write a excerpt!">{{ old('excerpt') }}</textarea>
      @error('excerpt')
          <span class="text-sm text-red-600 flex flex-row gap-1"><i data-feather="info" class="w-4"></i> {{ $message }}</span>
      @enderror
      
      <button type="submit" class="p-2 bg-sky-300 hover:bg-sky-400 text-white dark:bg-slate-400 duration-150 transition-all font-light w-full max-w-full my-3 dark:hover:bg-slate-500 dark:text-white rounded-md">save!</button>
    </div>

    <div id="rightSideForm" class="md:col-span-8 dark:text-slate-200">
      {{-- trix editor --}}
      <input id="x" type="hidden" name="body" class="" value="{{ old('body') }}">
      <trix-editor input="x" class="h-[25rem]"></trix-editor>
    </div>
  </form>
  </div>
</body>

<style type="text/css">
.trix-toolbar {
  color: blue;
}
</style>

<script type="text/javascript">
$(document).ready(function() {
  $('button.trix-button--icon-attach').hide()

  var inputImage = $('#inputImage');
  var previewImage = $('#previewImage');

  inputImage.on('change', function(event) {
    const input = event.target;
    if(input.files && input.files[0]) {
      if(input.files[0].type.startsWith('image/')) {
        const reader = new FileReader();

        reader.onload = function(event) {
          previewImage.attr('src', event.target.result);
        } 

        reader.readAsDataURL(input.files[0]);

        $('#notImageMessage').remove()
      } else {
        $(this).val('');
        $('#inputImageBox').append('<span id="notImageMessage">input file must an image!</span>');
      }
    }
  })

})
</script>
@endsection
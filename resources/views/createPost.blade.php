<link href="{{ mix('css/app.css') }}" rel="stylesheet">
@php
  use App\Http\Controllers\PublicityController;
  
  $idUser = Session::get('id');
  $Publicidad = new PublicityController();
  $todasLasPublicidades = $Publicidad->listPublicity();
  
@endphp

<x-header></x-header>
<h1 class="text-center text-4xl font-semibold py-6">Publicar Post</h1>
<form class="flex flex-col items-center" enctype="multipart/form-data" method="post" action="/post/create">
  {{ csrf_field() }}
  <div class="form-group bg-blue-400 py-3 px-6 gap-2 flex flex-row justify-center items-center w-full">
    <label for="title">Titulo</label>
    <input type="text" placeholder="Titulo de la publicacion" id="title" name="title"
      class="form-control py-2 px-2 w-full rounded-md" required>
  </div>
  <div class="form-group bg-teal-400 py-3 px-6 gap-2 flex flex-row justify-center items-center w-full">
    <label for="cuerpo">Cuerpo</label>
    <textarea name="cuerpo" id="cuerpo" class="form-control py-2 px-2 rounded-md w-full" required></textarea>
  </div>
  <input hidden value={{ $idUser }} type="number" id="id_user" name="id_user">
  <div class="form-group bg-orange-400 py-3 px-6 gap-5 flex flex-row justify-center items-center w-full">
    <label for="countries" class="">Publicidad</label>
    <select id="countries"
      class="bg-gray-50 border w-full border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
      <option value={{ null }}>Ninguna</option>
      @foreach ($todasLasPublicidades as $publicidad)
        <option value={{ $publicidad->id }}>{{ $publicidad->nombre }}</option>
      @endforeach
    </select>
  </div>
  <div class="bg-purple-400 w-full flex justify-center items-center py-2">
    <button type="submit"
      class="text-white btn btn-primary bg-purple-800 px-6 rounded-lg py-3 text-2xl">Publicar</button>
  </div>
</form>
<section class="my-20 w-fit bg-red-500 px-6 py-2 bottom-10 flex flex-col items-center justify-center">
  <h4 class="font-semibold">Pista:</h4>
  <p class="w-fit">Los escritos tienen una extraña debilidad por los destinos turísticos exóticos. Convence al escrito
    de que se
    merece
    unas vacaciones tropicales en lugar de molestar a los estudiantes. ¡Puede que se tome un descanso y te sorprenda
    gratamente!</p>
</section>

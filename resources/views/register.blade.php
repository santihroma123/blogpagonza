<link href="{{ mix('css/app.css') }}" rel="stylesheet">

@php
  use App\Http\Controllers\UserController;
  $User = new UserController();
  
@endphp

{{-- @if ($User) --}}
<article id="modal_gonza" class="fixed w-full h-[100vh] bg-[rgb(0,0,0,.8)] backdrop-blur-sm">
  <div class="flex w-full justify-center items-center h-full">
    <section
      class="flex flex-col bg-purple-200 justify-center items-center gap-5 w-fit mt-6 p-10 rounded-xl shadow-md hover:scale-105 transition-all">
      <h2 class="font-semibold text-lg">¿Eres gonzalo?</h2>
      <p>Te recomendamos registrarte con estas credenciales:</p>
      <hr class="w-full h-1 bg-purple-950 rounded">
      <p><strong>Email: <span
            class="text-xl text-purple-600 hover:text-red-400 transition-all">mepasedepayaso</span></strong>@gmail.com
      </p>
      <p><strong>Nickname: </strong> ggpayasomartinez</p>
      <p><strong>Password: </strong> nomasescritosfueradehorario</p>
      <button id="closeModalButton" type="text" class="bg-purple-800 px-4 text-lg py-2 rounded-lg text-white">Si,
        soy yo 🤡</button>
    </section>
  </div>
</article>

<script>
  const modalGonza = document.getElementById('modal_gonza')
  const closeModalButton = document.getElementById('closeModalButton')

  closeModalButton.addEventListener("click", () => {
    modalGonza.remove()
  });
</script>
{{-- @endif --}}


<x-header></x-header>

<form class="flex flex-col items-center" enctype="multipart/form-data" method="post" action="/register/create">
  {{ csrf_field() }}
  <div class="form-group bg-blue-400 py-3 gap-2 flex flex-row justify-center items-center w-full">
    <label for="email">Email</label>
    <input type="text" id="email" name="email" class="form-control" required>
  </div>
  <div class="form-group bg-teal-400 py-3 gap-2 flex flex-row justify-center items-center w-full">
    <label for="nickname">Nickname</label>
    <textarea name="nickname" id="nickname" class="form-control" required></textarea>
  </div>
  <div class="form-group bg-orange-400 py-3 gap-2 flex flex-row justify-center items-center w-full">
    <label for="password">Password</label>
    <textarea name="password" id="password" class="form-control" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary bg-red-500 px-4 py-2 w-full">Submit</button>
</form>

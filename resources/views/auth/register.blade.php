<x-layout>
<div class="container mt-4">
    <div class="d-flex flex-column justify-content-center align-items-center">
    <a class="" href="/"><img src="./img/prestologo.png" class="shadow" alt="presto logo" width="340" height="120"></a>
    <form
    class="mt-5 border rounded shadow p-4 form-w glow-form fw-bold"
    method="post"
    action="{{route('register')}}">
    
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome Utente</label>
            <input type="text" class="form-control" id="name" name="name">
         </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
          <p><i class="fa-solid fa-info me-2"></i>Le password devono contenere almeno 8 caratteri</p>
        </div>
        <div class="mb-3">
            <label for=" password_confirmation" class="form-label">Conferma Password</label>
            <input type="password" class="form-control" id=" password_confirmation" name=" password_confirmation">
          </div>

        <button type="submit" class="mt-4 btn form-button w-100 ">Continua</button>
      </form>
      <div class="mt-5">
        <a href="{{route('login')}}">Hai un account? accedi</a>
    </div>
</div>
</div>
</x-layout>
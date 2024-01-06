<footer class="py-5 footer">
  <div class="container">
    @if (!auth()->user() || \Request::is('static-sign-up'))
      <div class="row">
        <div class="mx-auto mt-1 text-center col-8">
          <p class="mb-0 text-secondary">
            Copyright ©
            <script>
              document.write(new Date().getFullYear())
            </script>
            <a style="color: #252f40;" href="https://www.creative-tim.com" class="ml-1 font-weight-bold"
              target="_blank">Firdaus</a>
            {{-- &
            <a style="color: #252f40;" href="https://www.updivision.com" class="ml-1 font-weight-bold"
              target="_blank">UPDIVISION</a>. --}}
          </p>
        </div>
      </div>
    @endif
  </div>
</footer>

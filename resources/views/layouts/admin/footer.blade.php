  <footer class="page-footer">
      <div class="pd-t-4 pd-b-0 pd-x-20">
          <div class="tx-10 tx-uppercase tx-gray-500 tx-spacing-1 d-flex flex-wrap justify-content-between">
              <div class="pd-y-10 mb-0">
                  <span class="tx-10 tx-uppercase tx-gray-500 tx-spacing-1">Your Roles : </span>
                  @foreach(Auth::user()->getRoleNames() as $role)
                  <span class="badge badge-info"> {{ $role }}</span>
                  @endforeach
              </div>
              <p class="pd-y-10 mb-0">Copyright&copy; 2020 | Created By <a href="https://mikroapps-tech.com"
                      target="_blank">Mikroapps Technology</a></p>
          </div>
      </div>
  </footer>

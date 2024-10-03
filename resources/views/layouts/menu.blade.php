  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ '/' }}">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li><!-- End Dashboard Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#product-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-basket3-fill"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="product-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
              <li>
                  <a class="nav-link collapsed" href="{{ route('Produk') }}">
                      <i class="bi bi-bag-heart-fill"></i><span>Produk</span>
                  </a>
              </li>


              <li>
                  <a class="nav-link collapsed" href="{{ route('Bahan') }}">
                      <i class="bi bi-box-seam-fill"></i><span>Bahan</span>
                  </a>
              </li>


              <li>
                  <a class="nav-link collapsed" href="{{ route('tampilBom') }}">
                      <i class="bi bi-box2-fill""></i><span>Bill Of Material</span>
                  </a>
              </li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-box-seam-fill"></i><span>Purchasing</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                  <a class="nav-link collapsed" href="{{ route('tampilMO') }}">
                      <i class="bi bi-clipboard-fill"></i><span>Manufacturing Order</span>
                  </a>
              </li>


              <li>
                  <a class="nav-link collapsed" href="{{ route('Vendor') }}">
                      <i class="bi bi-person-badge-fill"></i><span>Vendor</span>
                  </a>
              </li>


              <li>
                  <a class="nav-link collapsed" href="{{ route('RfqTampil') }}">
                      <i class="bi bi-calendar2-check-fill"></i><span>RFQ</span>
                  </a>
              </li>
          </ul>
        </li>
          <!-- End Baptis Nav -->
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#accounting-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-credit-card-fill"></i><span>Accounting</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="accounting-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                  <a class="nav-link collapsed" href="{{ route('sqTampil') }}">
                      <i class="bi bi-journal-bookmark-fill"></i><span>Penjualan</span>
                  </a>
              </li>

              <li>
                  <a class="nav-link collapsed" href="{{ route('User') }}">
                      <i class="bi bi-person-fill"></i><span>User</span>
                  </a>
              </li>
              <li>
                  <a class="nav-link collapsed" href="{{ route('bill') }}">
                      <i class="bi bi-person-fill"></i><span>Akuntansi RFQ</span>
                  </a>
              </li>
              <li>
                  <a class="nav-link collapsed" href="{{ route('invoice') }}">
                      <i class="bi bi-person-fill"></i><span>Akuntansi SQ</span>
                  </a>
              </li>
          </ul>
        </li>
          <!-- End Renungan Nav -->

          {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-calendar2-event-fill"></i><span>Jadwal Ibadah</span>
        </a>
      </li>
      <!-- End Jadwal Ibadah Nav --> --}}

          {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-calendar2-check-fill"></i><span>Kebaktian</span>
        </a>
      </li>
      <!-- End Jadwal Ibadah Nav --> --}}




      </ul>

  </aside><!-- End Sidebar-->

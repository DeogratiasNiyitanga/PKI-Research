  <!-- Blade Template -->
  <div class="container-fluid p-0">
      <div class="row g-0">
          <!-- First tab with double chevron -->
          <div class="col position-relative" style="z-index:5;">
              <a wire:navigate href="{{ route('applicant.home') }}">
                  <div
                      class="d-flex align-items-center {{ request()->routeIs('applicant.home') ? 'bg-primary' : 'bg-light text-primary' }} p-3 h-100 double-chevron-right">
                      <div href=""
                          class="{{ request()->routeIs('applicant.home') ? 'text-white' : 'text-primary' }}"><i
                              class="fas fa-edit"></i>
                          Registration section
                      </div>
                  </div>
              </a>
          </div>
          <!-- Divider-->
          <div class="col position-relative" style="max-width:5em;margin-left:-4em;z-index:4;">
              <div class="d-flex align-items-center bg-dark text-white p-3 h-100 double-chevron-right">
              </div>
          </div>
          <!--End-->
          <div class="col position-relative" style="margin-left: -4em;z-index:3;">
              <a wire:navigate href="{{ route('applicant.aplly') }}">
                  <div
                      class="d-flex align-items-center {{ request()->routeIs('applicant.aplly') ? 'bg-primary' : 'bg-light text-primary' }} p-3 h-100 double-chevron-right">
                      <div class="{{ request()->routeIs('applicant.aplly') ? 'text-white' : 'text-primary' }}"
                          style="padding-left: 2em;"><i class="fas fa-edit"></i>
                          Apply for Digital Certificate
                      </div>
                  </div>
              </a>
          </div>
          <!-- Divider-->
          <div class="col position-relative" style="max-width:5em;margin-left:-4em;z-index:2;">
              <div class="d-flex align-items-center bg-dark text-white p-3 h-100 double-chevron-right">
              </div>
          </div>
          <!--End-->

          <!-- Second tab -->
          <div class="col" style="margin-left: -4em;">
              <a wire:navigate href="{{ route('applicant.history') }}">
                  <div
                      class="d-flex align-items-center {{ request()->routeIs('applicant.history') ? 'bg-primary' : 'bg-light text-primary' }} p-3 h-100 double-chevron-left">
                      <div class="{{ request()->routeIs('applicant.history') ? 'text-white' : 'text-primary' }}"
                          style="padding-left: 2em;"><i class="fas fa-book-open"></i>
                          Application Status</div>
                  </div>
              </a>
          </div>
      </div>
  </div>

  <!-- Add this CSS to your stylesheet -->
  <style>
      .double-chevron-right {
          position: relative;
          clip-path: polygon(0 0,
                  calc(100% - 50px) 0,
                  calc(100% - 25px) 50%,
                  calc(100% - 50px) 100%,
                  0 100%,
                  0 50%);
      }

      /*
    .double-chevron-left {
        position: relative;
        clip-path: polygon(50px 0,
                100% 0,
                100% 100%,
                50px 100%,
                25px 50%);
        background-color: #f8f9fa;
        margin-left: 50px;
        z-index: 1;
    } */

      /* Optional: Add hover effects */
      .double-chevron-right:hover {
          background-color: #003371;
      }

      .double-chevron-left:hover {
          background-color: #e9ecef;
      }
  </style>

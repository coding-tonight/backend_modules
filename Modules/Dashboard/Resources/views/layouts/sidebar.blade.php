      <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{ asset('assets/images/logo-icon.jpg')}}" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">NBU</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="{{ route('dashboard') }}" class="">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                 <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-cart'></i>
                        </div>
                        <div class="menu-title">Category</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('all.category') }}"><i class="bx bx-right-arrow-alt"></i>All Category</a>
                        </li>
                        <li> <a href="{{ route('create.category')}}"><i class="bx bx-right-arrow-alt"></i>Add New
                                Category</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                        </div>
                        <div class="menu-title">Product</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('all.product')}}"><i class="bx bx-right-arrow-alt"></i>All Products</a>
                        </li>
                        <li> <a href="{{ route('create.product') }}"><i class="bx bx-right-arrow-alt"></i>Add Product</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bx bx-repeat"></i>
                        </div>
                        <div class="menu-title">Carousel</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('all.carousel') }}"><i class="bx bx-right-arrow-alt"></i>All Carousel</a>
                        </li>
                        <li> <a href="{{ route('create.carousel') }}"><i class="bx bx-right-arrow-alt"></i>Add Carousel</a>
                        </li>
                    </ul>
                </li>
           
            <!--end navigation-->
        </div>
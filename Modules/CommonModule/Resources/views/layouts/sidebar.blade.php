<div class="br-sideleft sideleft-scrollbar">

    <ul class="br-sideleft-menu mg-t-10">
        <li class="br-menu-item">
            <a href="{{route('index')}}" class="br-menu-link active">
                <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
                <span class="menu-item-label">{{__('commonmodule::sidebar.dashboard')}}</span>
            </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->


          <li class="br-menu-item">
              <a href="#" class="br-menu-link with-sub">
                  <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                  <span class="menu-item-label">{{__('commonmodule::sidebar.management')}}</span>
              </a><!-- br-menu-link -->
              <ul class="br-menu-sub">
                  <!--<li class="sub-item"><a href="{{route('permissions.index')}}" class="sub-link">{{__('commonmodule::sidebar.permissions')}}</a></li>-->
                
                  @can('show مجموعة المستخدمين')
                  <li class="sub-item"><a href="{{route('roles.index')}}" class="sub-link">{{__('commonmodule::sidebar.roles')}}</a></li>
                  @endcan

                @can('show admins')
                  <li class="sub-item"><a href="{{route('admin.index')}}" class="sub-link">{{__('commonmodule::sidebar.managers')}}</a></li>
                @endcan

                @can('show admins')
                  <li class="sub-item"><a href="{{route('user.index')}}" class="sub-link">المستخدمين</a></li>
                @endcan
              </ul>
          </li>

          @can('show بيانات الموقع')
          <li class="br-menu-item">
              <a href="{{route('config.index')}}" class="br-menu-link ">
                  <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                  <span class="menu-item-label">بيانات الموقع</span>
              </a><!-- br-menu-link -->
              
          </li>
          @endcan

          @can('show تقييمات التطبيق')
          <li class="br-menu-item">
              <a href="{{route('review.index')}}" class="br-menu-link ">
                  <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                  <span class="menu-item-label">تقييمات التطبيق</span>
              </a><!-- br-menu-link -->
              
          </li>
         @endcan

         @can('show النص الرئيسى')
          <li class="br-menu-item">
              <a href="{{route('text.index')}}" class="br-menu-link ">
                  <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                  <span class="menu-item-label">النص الرئيسيى</span>
              </a><!-- br-menu-link -->
              
          </li>
        @endcan

          <li class="br-menu-item">
              <a href="#" class="br-menu-link with-sub">
                  <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                  <span class="menu-item-label">{{__('commonmodule::sidebar.products')}}</span>
              </a><!-- br-menu-link -->
              <ul class="br-menu-sub">

                @can('show الاقسام')
                  <li class="sub-item"><a href="{{route('category.index')}}" class="sub-link">{{__('commonmodule::sidebar.category')}}</a></li>
                  @endcan

                  
                  @can('show المنتجات')
                  <li class="sub-item"><a href="{{route('products.index')}}" class="sub-link">{{__('commonmodule::sidebar.products')}}</a></li>
                  @endcan

                  @can('show التقييمات')
                  <li class="sub-item"><a href="{{route('comments.index')}}" class="sub-link">التقييمات</a></li>
                  @endcan

                  @can('show الكوبونات')
                  <li class="sub-item"><a href="{{route('coupon.index')}}" class="sub-link">الكوبونات</a></li>
                  @endcan


              </ul>
          </li>
          @can('show العروض')
          <li class="br-menu-item">
              <a href="{{route('offers.index')}}" class="br-menu-link ">
                  <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                  <span class="menu-item-label">العروض</span>
              </a><!-- br-menu-link -->
              
          </li>
          @endcan

          <li class="br-menu-item">
              <a href="#" class="br-menu-link with-sub">
                  <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                  <span class="menu-item-label">السليدر</span>
              </a><!-- br-menu-link -->
              <ul class="br-menu-sub">
              @can('show سليدر منتجاتنا')
                  <li class="sub-item"><a href="{{route('slider.index')}}" class="sub-link">سليدر منتجاتنا</a></li>
                  @endcan
                  @can('show سليدر تمور الوطنية')
                  <li class="sub-item"><a href="{{route('sliderTmour.index')}}" class="sub-link">سليدر تمور الوطنية</a></li>

                  @endcan

              </ul>
          </li>


          <li class="br-menu-item">
              <a href="#" class="br-menu-link with-sub">
                  <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                  <span class="menu-item-label">المناطق</span>
              </a><!-- br-menu-link -->
              <ul class="br-menu-sub">
              @can('show المدن')
                  <li class="sub-item"><a href="{{route('city.index')}}" class="sub-link">المدن</a></li>
                  @endcan

              </ul>
          </li>

          
          <li class="br-menu-item">
              <a href="#" class="br-menu-link with-sub">
                  <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                  <span class="menu-item-label">الطلبات</span>
              </a><!-- br-menu-link -->
              <ul class="br-menu-sub">
                 @can('show الطلبات المفتوحة')
                  <li class="sub-item"><a href="{{route('orders.index')}}" class="sub-link">الطلبات المفتوحة</a></li>
                  @endcan
                  @can('show حالات الطلب')
                  <li class="sub-item"><a href="{{route('order_status.index')}}" class="sub-link">حالات الطلب</a></li>
                  @endcan

              </ul>
          </li>


             



    </ul><!-- br-sideleft-menu -->



    <br>
</div><!-- br-sideleft -->

<!-- JAVASCRIPT -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/form-input-spin.init.js') }}"></script>
{{-- <script src="{{ asset('assets/js/pages/ecommerce-product-checkout.init.js') }}"></script> --}}
<script src="{{asset('js/toastr.js')}}"></script>
<script src="{{asset('js/sweetalert.js')}}"></script>
<script src="{{asset('js/plugin.js')}}"></script>
<script>
    localStorage.setItem("route_cart", "{{route('web.counter_cart')}}");
</script>
<script src="{{asset('js/method.js')}}"></script>
<script src="{{asset('js/cart.js')}}"></script>
@if(Auth::guard('admin')->check())
<script src="{{ URL::asset('js/app-admin.min.js') }}"></script>
@elseif(Auth::guard('web')->check())
<script src="{{ URL::asset('js/app.min.js') }}"></script>
@endif
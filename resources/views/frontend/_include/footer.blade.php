<!-- footer content -->
@php
    $social = App\Models\Social::first();
    $footer = App\Models\Footer::first();
@endphp

<footer id="footer" class="footer">
    <div class="container">
        <h6>
          {{ $footer->description??' ' }}
        </h6>
        <ul class="scl">
            <span>
                <li>
                    <a href="{{ $social->youtube??' '}}" target="_blank">
                        <i class="fab fa-youtube"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ $social->instagram??' '}}" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ $social->facebook??' '}}" target="_blank">
                        <i class="fab fa-facebook"></i>
                    </a>
                </li>
                <li>
                    <a  href="{{ $social->twitter??' '}}" target="_blank">
                        <i class="fab fab fa-twitter"></i>
                    </a>
                </li>
            </span>
            <span>
                <li>
                    <a  href="{{ $social->telegram??' '}}" target="_blank">
                        <i class="fab fa-telegram"></i>
                    </a>
                </li>
                <li>
                    <a  href="{{ $social->reddit??' '}}" target="_blank">
                        <i class="fab fa-reddit"></i>
                    </a>
                </li>
                <li>
                    <a  href="{{ $social->medium??' '}}"target="_blank">
                        <i class="fab fa-medium"></i>
                    </a>
                </li>
                <li>
                    <a  href="{{ $social->discord ??' '}}" target="_blank">
                        <i class="fab fa-discord"></i>
                    </a>
                </li>
            </span>
        </ul>
    </div>
</footer><!-- /footer content -->

<!-- including jquery -->
<script src="{{asset('frontend') }}/src/script/vendor/lib/jquery.min.js"></script>

<!-- aos -->
<!-- <script src="{{asset('frontend') }}/src/script/vendor/plugin/aos.js"></script> -->

<!-- matrix bg -->
<script src="{{asset('frontend') }}/src/script/vendor/plugin/matrix/roadmap.js"></script>

<!-- custom js -->
<script src="{{asset('frontend') }}/src/script/main.js"></script>
</body>
</html>


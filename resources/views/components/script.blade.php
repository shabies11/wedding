

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
        <!--
    <script type=" text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
                        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
                        <script type="text/javascript" src="{{asset('asset/css/slick/slick.min.js')}}"></script>


                        <script type="text/javascript">
                            $(document).ready(function () {

                                $('#venue-list').slick({
                                    dots: true,
                                    infinite: true,
                                    speed: 300,
                                    slidesToShow: 1,
                                    adaptiveHeight: true,
                                    autoplay: true,
                                    autoplaySpeed: 2000,
                                    pauseOnHover: true,
                                    pauseOnFocus: true,
                                    pauseOnDotsHover: true,
                                    prevArrow: false,
                                    nextArrow: false
                                });



                                //  open and close nav
        $('#navbar-toggle').click(function() {

          $('nav ul').slideToggle();
        });


        // Hamburger toggle
        $('#navbar-toggle').on('click', function() {
          this.classList.toggle('active');
        });


        // If a link has a dropdown, add sub menu toggle.
        $('nav ul li a:not(:only-child)').click(function(e) {
          $(this).siblings('.navbar-dropdown').slideToggle("slow");

          // Close dropdown when select another dropdown
          $('.navbar-dropdown').not($(this).siblings()).hide("slow");
          e.stopPropagation();
        });


        // Click outside the dropdown will remove the dropdown class
        $('html').click(function() {
          $('.navbar-dropdown').hide();
        });
                            });
                        </script>



    <script>
         let menu = document.querySelector('#menu-bar');
        let head = document.querySelector('.head .navbar');

        menu.onclick = () => {
            head.classList.toggle('active');
        };

        window.onscroll = () => {
            head.classList.remove('active');
            if (window.scrollY > 60) {
                document.querySelector('#menu-bar').classList.add('active');
            } else {
                document.querySelector('#menu-bar').classList.remove('active');
            }
        };
    </script>

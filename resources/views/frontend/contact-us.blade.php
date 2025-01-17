<x-frontend>
    <!---home section--->
    <section id="Home" class="Home" Home>
        <form action="#">
            <div class="search-box">
                <h1>Make Your Dreamy Wedding With ISHKEEN </h1>
                <p>Find Us The Best Wedding Vendors With Thousands Of Trusted Reviews</p>
            </div>

        </form>
    </section>


    <div class="container-fluid text-center mycontacts">
        <span class="big-circle"></span>
        <img src="img/shape.png" class="square" alt="" />
        <div class="form">
            <div class="contact-info">
                <h3 class="tittle">Let's get in touch</h3>
                <p class="text">
                    We can't wait to meet you! Drop us a message, and we'll get back to you as soon as possible. Let’s
                    create beautiful memories together
                </p>

                <div class="info">
                    <div class="information">
                        <i class="fas fa-map-marker-alt"></i> &nbsp &nbsp

                        <p>92 Cherry Drive Uniondale, NY 11553</p>
                    </div>
                    <div class="information">
                        <i class="fas fa-envelope"></i> &nbsp &nbsp
                        <p>ishkeen_wedding_planners@gmail.com</p>
                    </div>
                    <div class="information">
                        <i class="fas fa-phone"></i>&nbsp&nbsp
                        <p>123-456-789</p>
                    </div>
                </div>

                <div class="social-media">
                    <p>Connect with us :</p>
                    <div class="social-icons">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>
                @if (session('success'))
                    <script>
                        Swal.fire({
                             
                            title: 'Success!',
                            text: '{{ session('success') }}',
                            confirmButtonText: 'OK'
                        });
                    </script>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('frontend.contact.data') }}" autocomplete="off" method="POST" id="contact-input">
                    @csrf
                    <h3 class="title">Contact us</h3>
                    <div class="input-container">
                        <input type="text" name="name" class="input" placeholder="Full Name" value="{{ old('name') }}" />


                    </div>
                    <div class="input-container">
                        <input type="email" name="email" class="input" placeholder="Email" value="{{ old('email') }}" />


                    </div>
                    <div class="input-container">
                        <input type="tel" name="phone" class="input" placeholder="Phone No." value="{{ old('phone') }}" />


                    </div>
                    <div class="input-container textarea">
                        <textarea name="message" class="input" placeholder="Message">{{ old('message') }}</textarea>


                    </div>
                    <input type="submit" value="Send" class="btn" />
                </form>
            </div>
        </div>

    </div>






</x-frontend>

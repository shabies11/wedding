<x-frontend>

	<!---home section--->
	<section id="Home" class="Home" Home>
		<form >
			<div class="search-box">
				<h1>Make Your Dreamy Wedding With ISHKEEN </h1>
				<p>Find Us The Best Wedding Vendors With Thousands Of Trusted Reviews</p>
				<select type="text" name="vendor" class="search-field">
                    <option disabled selected>Select Vendor Type</option>
                    <option value="Wedding Venues" {{ app('request')->input('vendor') == 'Wedding Venues' ? 'selected' : '' }}>Wedding Venues</option>
                    <option value="Catering" {{ app('request')->input('vendor') == 'Catering' ? 'selected' : '' }}>Catering</option>
                    <option value="Decoration" {{ app('request')->input('vendor') == 'Decoration' ? 'selected' : '' }}>Decoration</option>
                    <option value="Bridal Entry" {{ app('request')->input('vendor') == 'Bridal Entry' ? 'selected' : '' }}>Bridal Entry</option>
                    <option value="Groom Entry" {{ app('request')->input('vendor') == 'Groom Entry' ? 'selected' : '' }}>Groom Entry</option>
				</select>
				<select type="text" name="city" class="search-field">
                    <option disabled selected>Select City</option>
                    <option value="Islamabad" {{ app('request')->input('city') == 'Islamabad' ? 'selected' : '' }}>Islamabad</option>
                    <option value="Mandi Baha Uddin" {{ app('request')->input('city') == 'Mandi Baha Uddin' ? 'selected' : '' }}>Mandi Baha Uddin</option>
                    <option value="Jhelum" {{ app('request')->input('city') == 'Jhelum' ? 'selected' : '' }}>Jhelum</option>
                    <option value="Faisalabad" {{ app('request')->input('city') == 'Faisalabad' ? 'selected' : '' }}>Faisalabad</option>
                    <option value="Lahore" {{ app('request')->input('city') == 'Lahore' ? 'selected' : '' }}>Lahore</option>
                    <option value="Karachi" {{ app('request')->input('city') == 'Karachi' ? 'selected' : '' }}>Karachi</option>
				</select>
				<button class="site_btn">SEARCH</button>
			</div>

		</form>

	</section>
	<!---service--->
	<section class="Service" id="Service">
		<div class="title">
			<h1>
				<span>Ser</span>vices
			</h1>
		</div>
		<div class=" row">

			<div class="col-md-4">
				<div class="Services-col  invitation">
					<i class="fas fa-book-open"></i>
					<h2>Invitations</h2>
					<p>Making Your Special Day Unforgettable</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="Services-col  photography">
					<i class="fas fa-camera"></i>
					<h2>Photography & Video</h2>
					<p> Capturing Moments, Creating Memories</p>
					<div class="taskeen"></div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="Services-col  decoration">
					<i class="fas fa-tree"></i>
					<h2>Stage Decoration</h2>
					<p>Enchanting Stage Decorations for Your Perfect Day</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="Services-col  wedding">
					<i class="fas fa-birthday-cake"></i>
					<h2>Wedding Cake</h2>
					<p>Your Dream Cake, Our Masterpiece.</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="Services-col  music_band">
					<i class="fas fa-music"></i>
					<h2>Music & Band</h2>
					<p>Tunes That Touch Hearts</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="Services-col  waiter_service">
					<i class="fas fa-table "></i>
					<h2>Waiter Service</h2>
					<p>Serving You with Grace and Style</p>
				</div>
			</div>
		</div>
	</section>
	<!------vendor page---->
	<section class="Vendor" id="Vendor">
		<div class="title">
			<h1>
				<span>Fea</span>tured <span>Ven</span>dor
			</h1>
		</div>
		<div class="Vendor-list">
			<div class="Vendor-row">
				<img src="./asset/img/catering.jpeg" alt="">
				<h2>Catering By Star_Group</h2>
				<p>Serving Service</p>
				<h3>Rs.50,000 onward</h3>
			</div>
			<div class="Vendor-row">
				<img src="./asset/img/flinters.webp" alt="">
				<h2>Flinters Management</h2>
				<p>Wedding Planner</p>
				<h3>3_Lac to 4.5_lac</h3>
			</div>
			<div class="Vendor-row">

				<img src="./asset/img/mela-2.jpeg" alt="">
				<h2>Wedding Mela</h2>
				<p>Wedding Decorators</p>
				<h3>1.5_lac to 3_lac</h3>
			</div>
			<div class="Vendor-row">
				<img src="./asset/img/mela-1.jpeg" alt="">
				<h2>Heaven_Decoration</h2>
				<p>Rental Decoration Items</p>
				<h3>Rs.40,000 to Rs.80,000 </h3>
			</div>
			<div class="Vendor-row">
				<img src="./asset/img/yell.jpg" alt="">
				<h2>Traditional Wediing</h2>
				<p>Wedding Planners</p>
				<h3>1.5_lac to 2.5_lac</h3>
			</div>
			<div class="Vendor-row">



				<img src="./asset/img/last.jpeg" alt="">
				<h2>Wedding Mela</h2>
				<p>Wedding Decorators</p>
				<h3>1.5_lac to 3.5_lac</h3>
			</div>
		</div>
	</section>

	<!----------------------------venue Section-------------->
    @if(isset($venues) && $venues->count() > 0)
	<section class="venue" id="venue">
		<div class="title">
			<h1><span>V</span>enues</h1>
		</div>
		<div class="venue-list" id="venue-list">

            @foreach ($venues as $venue)
            <div class="venue-box">
				<img src="{{$venue->featured_image}}" alt="img">
				<div class="venue-info">
					<h2>{{$venue->city}}</h2>
					<p>{{$venue->tagline}}</p>
					<a href="{{route('frontend.more-info',$venue->id)}}" class="btn">More Info</a>
				</div>
			</div>
            @endforeach
			{{-- <div class="venue-box">
				<img src="asset/img/jhelum.jpg" alt="img">
				<div class="venue-info">
					<h2>Jhelum</h2>
					<p>Sunflower Banquet Hall</p>
					<button class="btn">More Info</button>
				</div>
			</div>
			<div class="venue-box">
				<img src="asset/img/faisalabad.jpeg" alt="img">
				<div class="venue-info">
					<h2>Faisalabad</h2>
					<p>Crown Palace. Manawala</p>
					<button class="btn">More Info</button>
				</div>
			</div>
			<div class="venue-box">
				<img src="asset/img/islamabad.jpg" alt="img">
				<div class="venue-info">
					<h2>Islamabad</h2>
					<p>Aura Grande Complex</p>
					<button class="btn">More Info</button>
				</div>
			</div>
			<div class="venue-box">
				<img src="asset/img/mandi.jpg" alt="img">
				<div class="venue-info">
					<h2>Mandi Bahauddin</h2>
					<p>Capital Banquet halls & Restaurant, Mandi Bahauddin</p>
					<button class="btn">More Info</button>
				</div>
			</div>
			<div class="venue-box">
				<img src="asset/img/karachi.jpeg" alt="img">
				<div class="venue-info">
					<h2>Karachi</h2>
					<p>Zam Zam Macca Banquet · Casamento</p>
					<button class="btn">More Info</button>
				</div>
			</div> --}}
		</div>
	</section>

    @endif
	<!------------------E-invitation------------------>
	<!-- cards starts -->
  <section class="Service" id="Service">
    <div class="title">
      <h1>
        	<span>Invi</span>tation <span>Ca</span>rds
      </h1>
    </div>
    <div class=" row">

      <div class="col-md-6 col-lg-4">
        <div class="Services-col-card  invitation-card1">

        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="Services-col-card  invitation-card2">
          <!-- <i class="fas fa-camera"></i> -->
          <div class="taskeen"></div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="Services-col-card   invitation-card3">

        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="Services-col-card   invitation-card4">

        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="Services-col-card   invitation-card5">

        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="Services-col-card   invitation-card6">

        </div>
      </div>

      <div class="col-md-6 col-lg-4">
        <div class="Services-col-card   invitation-card7">

        </div>
      </div>

      <div class="col-md-6 col-lg-4">
        <div class="Services-col-card   invitation-card8">

        </div>
      </div>

      <div class="col-md-6 col-lg-4">
        <div class="Services-col-card   invitation-card9">

        </div>
      </div>
    </div>
  </section>

  <!-- cards ends -->
</x-frontend>

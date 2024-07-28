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

	<!----------------------------venue Section-------------->
	<section class="venue" id="venue">
		<div class="title">
			<h1><span>V</span>enues</h1>
		</div>
		<div class="venue-list">
            @if($data->count() > 0)
            @foreach ($data as $item)

			<div class="venue-box">
                <img src="{{$item->featured_image}}" alt="img">
				<div class="venue-info">
                    <h2>{{$item->city}}</h2>
					<p>{{$item->tagline}}</p>
					<a class="btn" href="{{route('frontend.more-info',$item->id)}}">More Info</a>
                    </div>
                    </div>
                    @endforeach
            @else
            <div class="venue-box">

                <h1 class="text-center bold">No Record Found.</h1>

			</div>
            @endif

		</div>
	</section>

  <!-- cards ends -->
</x-frontend>

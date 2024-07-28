<x-frontend>

	<!---home section--->
	<section id="Home" class="Home" Home>

        <style>

            .detail-container {
                margin-top: 50px;
                padding: 20px;
                background: white;
                border-radius: 8px;
            }
            .detail-image {
                max-width: 100%;
                height: auto;
                border-radius: 8px;
            }
            h1.city{
                font-size: 22px;
                font-weight: 700;
                color: #000;
                letter-spacing: 1.5px
            }
            .tagline{
                font-size: 16px;
                font-weight: 600;
            }
            img{
                width:100%;
                height: 350px !important;
                object-fit: cover;
            }
        </style>
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
    <div class="container detail-container d-flex flex-column align-items-center justify-content-center">

        <h1 class="city">{{ $item->city }}</h1>
        <p class="tagline">{{ $item->tagline }}</p>
        <img src="{{ $item->featured_image }}" class="detail-image" alt="{{ $item->title }}">
        <p class="mt-4">{!! $item->description !!}</p>
    </div>
</x-frontend>

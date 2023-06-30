@extends('layouts.main')
@section('content')
    <!-- start  landing section  -->
    <div class="landing">
        <div class="intro-text">
            <h1>Hello There</h1>
            <p>let us help you to find the perfect place to live</p>
            <div class="search-bar">
                <form action="{{ route('home.search') }}" method="POST" class="location">
                    @csrf
                    <div>
                        <label for=""> min price</label>
                        <input type="text" name="min" placeholder="enter your min price">
                    </div>
                    <div>
                        <label for=""> max price</label>
                        <input type="text" name="max" placeholder="enter your max price">
                    </div>
                    <div>
                        <label for="">city</label>
                        <select name="city">
                            <option disabled selected>--city--</option>
                            @foreach ($city as $item)
                                <option value="{{ $item->city }}">{{ $item->city }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('city')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                    <div>
                        <label for="">region</label>
                        <select name="region">
                            <option disabled selected>--region--</option>
                            @foreach ($region as $item)
                                <option value="{{ $item->region }}">{{ $item->region }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('region')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                    <div class="select">
                        <label for="">type</label>
                        <select name="type">
                            <option disabled selected>--type--</option>
                            <option value="house">house</option>
                            <option value="store">store</option>
                            <option value="chalet">chalet</option>
                        </select>
                    </div>
                    <div class="select">
                        <label for="">property</label>
                        <select name="property">
                            <option disabled selected>--property--</option>
                            <option value="rent">rent</option>
                            <option value="buy">buy</option>
                        </select>
                    </div>
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
    <!-- end  landing section  -->
    <!-- start features  -->
    {{-- <div class="features">
        <div class="contener">
            <div class="feat">
                <i class="fas fa-address-book"></i>
                <h3>Tell as your Idea</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, a ut modi earum reiciendis minus
                    est iure dolores </p>
            </div>
            <div class="feat">
                <i class="fas fa-air-freshener"></i>
                <h3>We will do all the work</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, a ut modi earum reiciendis minus
                    est iure dolores </p>
            </div>
            <div class="feat">
                <i class="fas fa-air-freshener"></i>
                <h3>your product is worldwide</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti, a ut modi earum reiciendis minus
                    est iure dolores </p>
            </div>
        </div>
    </div> --}}
    <!-- end features  -->
    <!-- start servecis -->
    <div class="services" id="services">
        <div class="contener">
            <h2 class="special-headeing">services</h2>
            <p>Dont's be busy by productive</p>
            <div class="servic-contener">
                <div class="col">
                    <div class="ser">
                        <i class="fab fa-sketch"></i>
                        <div class="text">
                            <h3>Graphic Design</h3>
                            <p>Graphic design is the process of visual
                                communication and problem-solving
                                using one or more of typography,
                                photography and illustration.</p>
                        </div>
                    </div>
                    <div class="ser">
                        <i class="fab fa-slideshare"></i>
                        <div class="text">
                            <h3>UI & UX</h3>
                            <p>Process of enhancing user satisfaction
                                with a product by improving the
                                usability, accessibility, and pleasure
                                provided in the interaction.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="ser">
                        <i class="fab fa-audible"></i>
                        <div class="text">
                            <h3>Web Design</h3>
                            <p>Web design encompasses many different
                                skills and disciplines in the production
                                and maintenance of websites.</p>
                        </div>
                    </div>
                    <div class="ser">
                        <i class="fab fa-atlassian"></i>
                        <div class="text">
                            <h3>Web Development</h3>
                            <p>Web development is a broad term for
                                the work involved in developing a web site
                                for the Internet or an intranet.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="imeges imeges-col">
                        <img src="/images/NewHouse_SA_Photo_01.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end servecis -->
    <!-- start portfolio  -->
    <div class="portfolio" id="portfolio">
        <div class="contener">
            <h3 class="special-headeing">Houses</h3>
            <p>If you do it right, it will last forever.</p>
            <div class="portfolio-contener">
                @foreach ($house as $item)
                    <a href="{{ route('user.show', [$item->id]) }}">
                        <div class="card">
                            <img src="{{ asset('uploads/house/' . $item->photo->image) }}" alt="">
                            <div class="info">
                                <h3>city: {{ $item->city }}</h3>
                                <p>
                                    My creative ability is very difficult to measure because it
                                </p>
                                <div class="details">
                                    <div>
                                        <p class="one">room</p>
                                        <p><i class="fas fa-bed"></i> {{ $item->room_number }}</p>
                                    </div>
                                    <div>
                                        <p class="one">floor</p>
                                        <p><i class="fas fa-landmark"></i> {{ $item->floors_number }}</p>
                                    </div>
                                    <div>
                                        <p class="one">space</p>
                                        <p><i class="far fa-line-height"></i> {{ $item->space }}m</p>
                                    </div>
                                </div>
                                for {{ $item->show_type }}
                                <span class="price">{{ $item->price }} s.p</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    <div class="portfolio child-two" id="portfolio">
        <div class="contener">
            <h3 class="special-headeing">Stores</h3>
            <p>If you do it right, it will last forever.</p>
            <div class="portfolio-contener">
                @foreach ($store as $item)
                    <a href="{{ route('user.show', [$item->id]) }}">
                        <div class="card">
                            <img src="{{ asset('uploads/store/' . $item->photo->image) }}" alt="">
                            <div class="info">
                                <h3>{{ $item->city }}</h3>
                                <p>
                                    My creative ability is very difficult to measure because
                                </p>
                                <div class="details">
                                    <div>
                                        <p class="one">room</p>
                                        <p><i class="fas fa-bed"></i> {{ $item->room_number }}</p>
                                    </div>
                                    <div>
                                        <p class="one">floor</p>
                                        <p><i class="fas fa-landmark"></i> {{ $item->floors_number }}</p>
                                    </div>
                                    <div>
                                        <p class="one">space</p>
                                        <p><i class="fab fa-sketch"></i> {{ $item->space }}m</p>
                                    </div>
                                </div>
                                for {{ $item->show_type }}
                                <span class="price">{{ $item->price }} s.p</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    <div class="portfolio" id="portfolio">
        <div class="contener">
            <h3 class="special-headeing">Chaiet</h3>
            <p>If you do it right, it will last forever.</p>
            <div class="portfolio-contener">
                @foreach ($chalet as $item)
                    <a href="{{ route('user.show', [$item->id]) }}">
                        <div class="card">
                            <img src="{{ asset('uploads/chalet/' . $item->photo->image) }}" alt="">
                            <div class="info">
                                <h3>city: {{ $item->city }}</h3>
                                <p>
                                    My creative ability is very difficult to measure because it
                                </p>
                                <div class="details">
                                    <div>
                                        <p class="one">room</p>
                                        <p><i class="fas fa-bed"></i> {{ $item->room_number }}</p>
                                    </div>
                                    <div>
                                        <p class="one">floor</p>
                                        <p><i class="fas fa-landmark"></i> {{ $item->floors_number }}</p>
                                    </div>
                                    <div>
                                        <p class="one">space</p>
                                        <p><i class="fab fa-sketch"></i> {{ $item->space }}m</p>
                                    </div>
                                </div>
                                for {{ $item->show_type }}
                                <span class="price">{{ $item->price }} s.p</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    <!-- end portfolio  -->
    <!-- start about  -->
    <div class="about" id="aAbout">
        <div class="contener">
            <h3 class="special-headeing">About</h3>
            <p>less is more work</p>
            <div class="about-contener">
                <div class="imeges">
                    <img src="/images/f4b734868faf69b0420d52806eaf4db9d1-vase-02-.rdeep-vertical.w245.jpg" alt="">
                </div>
                <div class="text">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati inventore nesciunt minima
                        maxime similique vitae natus necessitatibus aliquam cumque aperiam voluptate quas enim provident
                        nulla sapiente, nihil sunt harum voluptas?</p>
                    <hr>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iure laudantium ea expedita velit non.
                        Consectetur nostrum sint veritatis eum ad beatae asperiores pariatur quasi minus totam?
                        Accusamus similique blanditiis sed!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end about  -->
@endsection

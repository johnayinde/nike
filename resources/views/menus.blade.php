@php
    $page = 'features';
@endphp
@extends('layouts.app')

@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner overview-bgi">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Meals &amp; Menus</h1>
                <ul class="breadcrumbs">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Features</li>
                    <li class="active">Meals &amp; Menus</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <!-- Content start -->
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"
                    style="border-radius:0px;"><span class="fa fa-coffee" aria-hidden="true"></span>
                <div class="hidden-xs">Tea &amp; Coffee Break Menu</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab" style="border-radius:0px;">
                <span class="fa fa-glass" aria-hidden="true"></span>
                <div class="hidden-xs">Cocktail Menu</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"
                    style="border-radius:0px;"><span
                    class="fa fa-cutlery" aria-hidden="true"></span>
                <div class="hidden-xs">Buffet Menu</div>
            </button>
        </div>
    </div>

    <div class="well" style="border-radius:0px;">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab1">
                <div class="main-title">
                    <h1>TEA & COFFEE BREAK MENU</h1>
                </div>
                <div class="row">
                    <em style="font-size:10px;color:#1b4b72;" class="hidden-lg hidden-md"><i class="fa
                    fa-info-circle"></i> Swipe table left or right to scroll</em>

                    <div class="col-md-12"><br><br></div>
                    <div class="col-lg-6 col-md-6">
                        <div class="pricing-1">
                            <div class="title">SAVOURY</div>
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Club toasted sandwich</li>
                                    <li class="list-group-item">Sausage roll</li>
                                    <li class="list-group-item"> meat pie</li>
                                    <li class="list-group-item">Madras spiced samosa</li>
                                    <li class="list-group-item">Mini chicken skewer</li>
                                    <li class="list-group-item">Spring roll with soy dip</li>
                                    <li class="list-group-item">Spicy Chicken wings</li>
                                    <li class="list-group-item">Fish pie</li>
                                    <li class="list-group-item">Hotdog rolls</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="pricing-1">
                            <div class="title">SWEET</div>
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Fruit cheesecake diamonds</li>
                                    <li class="list-group-item">Jammy doughnut</li>
                                    <li class="list-group-item">Fruit cake</li>
                                    <li class="list-group-item">Tropical fruit kebab</li>
                                    <li class="list-group-item">Cream cake</li>
                                    <li class="list-group-item">Pineapple fritter with rum syrup</li>
                                    <li class="list-group-item">Mini pastries</li>
                                    <li class="list-group-item">Sliced Fruits</li>
                                    <li class="list-group-item">Marble cakes</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade in" id="tab2">
                <div class="main-title">
                    <h1>COCKTAIL MENU</h1>
                </div>
                <div class="row">
                    <em style="font-size:10px;color:#1b4b72;" class="hidden-lg hidden-md"><i class="fa
                    fa-info-circle"></i> Swipe table left or right to scroll</em>
                    <div class="col-lg-12 col-md-12 table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">MENU</th>
                                <th scope="col">DESCRIPTION</th>
                                <th scope="col">PRICE</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Silver Menu</td>
                                    <td>Choose 3 hot and cold items from our selection</td>
                                    <td>&#x20A6;3,600</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Golden Menu</td>
                                    <td>Choose  4 hot and cold items from our selection</td>
                                    <td>&#x20A6;4,500</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Platinum Menu</td>
                                    <td>Choose 6 hot and cold items from our selection</td>
                                    <td>&#x20A6;6,500</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12"><br><br></div>
                    <div class="col-lg-6 col-md-6">
                        <div class="pricing-1">
                            <div class="title">COLD</div>
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Asparagus wrapped in beef</li>
                                    <li class="list-group-item">Open mini sandwiches selection</li>
                                    <li class="list-group-item">Eggs filled with tuna, coated with marie rose sauce</li>
                                    <li class="list-group-item">Ham & melon parcels</li>
                                    <li class="list-group-item">Prawn crackers with sweet chili dip</li>
                                    <li class="list-group-item">Tanguy lemon tartlets</li>
                                    <li class="list-group-item">Sliced chocolate muffin</li>
                                    <li class="list-group-item">Sticky toffee pudding</li>
                                    <li class="list-group-item">Iced buns</li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="pricing-1">
                            <div class="title">HOT</div>
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Assorted samosas</li>
                                    <li class="list-group-item">Pizza italiano</li>
                                    <li class="list-group-item">BBQ chicken wing</li>
                                    <li class="list-group-item">Ham, leek & cheese croissant</li>
                                    <li class="list-group-item">Chicken tempura with lemon & garlic glaze</li>
                                    <li class="list-group-item">Fish goujons with tartar dip</li>
                                    <li class="list-group-item">Spicy Chicken drumsticks</li>
                                    <li class="list-group-item">Meat balls in hot tomato sauce</li>
                                    <li class="list-group-item">Sausage wrapped in bacon baked with honey</li>
                                    <li class="list-group-item">Beef and chicken kebabs</li>
                                    <li class="list-group-item">Beef satay skewers</li>
                                    <li class="list-group-item">Vegetable spring rolls</li>
                                    <li class="list-group-item">Vegetables parcels</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center"><em style="color:#026690;">All prices include 75% VAT and 10% service charge</em></div>
            </div>
            <div class="tab-pane fade in" id="tab3">
                <div class="main-title">
                    <h1>BUFFET MENU</h1>
                    <div class="text-center">
                        <em>(Minimum of 20 persons)</em>
                    </div>
                </div>
                <div class="row">
                    <em style="font-size:10px;color:#1b4b72;" class="hidden-lg hidden-md"><i class="fa
                    fa-info-circle"></i> Swipe table left or right to scroll</em>
                    <div class="col-lg-12 col-md-12 table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">MENU</th>
                                <th scope="col">DESCRIPTION</th>
                                <th scope="col">PRICE</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>All Nigerian Menu</td>
                                    <td>
                                        1 pepper soup or 1 starter 2 meat dish, 2
                                        Nigerian soups (served with 1 garri & 1 type of
                                        rice), 1 dessert
                                    </td>
                                    <td>&#x20A6;4,500</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Silver Menu</td>
                                    <td>
                                        1 starter, 1 soup, 2 meat dishes 2 Nigerian
                                        soups 3 accompaniments, 1 dessert and Fruit
                                        salad
                                    </td>
                                    <td>&#x20A6;5,000</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Golden Menu</td>
                                    <td>
                                        2 starters, 1 soup, 2 meat dishes, 1 Grill and 2
                                        National soups, 3 accompaniments, 2 desserts
                                        and fruit salad
                                    </td>
                                    <td>&#x20A6;6,000</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Platinum Menu</td>
                                    <td>
                                        3 starters, 1 soup, 2 Meat dishes, 1 grill,
                                        menu 2 national soups, 1 vegetarian dish,
                                        4 accompaniments, 3 desserts and fruit salad
                                    </td>
                                    <td>&#x20A6;8,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12"><br><br></div>
                    <div class="col-lg-3 col-md-3">
                        <div class="pricing-1">
                            <div class="title">SALAD &AMP; STARTER SELECTION</div>
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Garden salad</li>
                                    <li class="list-group-item">Coleslaw salad</li>
                                    <li class="list-group-item">Greek salad</li>
                                    <li class="list-group-item">Pasta & Tuna salad</li>
                                    <li class="list-group-item">Pickled Beetroot salad</li>
                                    <li class="list-group-item">Nicoise salad</li>
                                    <li class="list-group-item">Chef compose salad</li>
                                    <li class="list-group-item">Caesar salad</li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="pricing-1">
                            <div class="title">CONTINENTAL SOUP SELECTION</div>
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Chicken & sweet corn</li>
                                    <li class="list-group-item">Cream of tomato & basil</li>
                                    <li class="list-group-item">Minestrone</li>
                                    <li class="list-group-item">Curried pumpkin soup</li>
                                    <li class="list-group-item">Chicken & Mushroom</li>
                                    <li class="list-group-item">Leek & Potato soup</li>
                                    <li class="list-group-item">Carrot & ginger</li>
                                    <li class="list-group-item">Beef and vegetable broth</li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="pricing-1">
                            <div class="title">NIGERIAN PEPPER SOUP SELECTION</div>
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Oxtail pepper soup</li>
                                    <li class="list-group-item">Fish pepper soup</li>
                                    <li class="list-group-item">Goal pepper soup</li>
                                    <li class="list-group-item">Chicken pepper soup</li>
                                    <li class="list-group-item">Mixed meal pepper soup</li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm" style="margin-bottom:-6px;"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br><br></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="pricing-1">
                            <div class="title">MAIN COURSE</div>
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Spaghetti Bolognaise</li>
                                    <li class="list-group-item">Beef Goulash</li>
                                    <li class="list-group-item">Paprika Chicken</li>
                                    <li class="list-group-item">Roast fish with peppers, onions and garlic</li>
                                    <li class="list-group-item">Chicken fricassee with mushroom</li>
                                    <li class="list-group-item">Fish peri peri</li>
                                    <li class="list-group-item">Fish curry</li>
                                    <li class="list-group-item">Chicken curry</li>
                                    <li class="list-group-item">Beef stroganoff</li>
                                    <li class="list-group-item">Beef Steak in pepper sauce</li>
                                    <li class="list-group-item">Spicy Oriental Chicken</li>
                                    <li class="list-group-item">Oven baked lamb stew</li>
                                    <li class="list-group-item">Lasagna al forno</li>
                                    <li class="list-group-item">Fish kebabs with sweet chilli sauce</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12"><br></div>
                    <div class="col-lg-3 col-md-3">
                        <div class="pricing-1">
                            <div class="title">VEGETARIAN SELECTION</div>
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Tajine of vegetables in rich spicy sauce</li>
                                    <li class="list-group-item">White rice topped with roast vegetables</li>
                                    <li class="list-group-item">Vegetables bound in hot curry sauce</li>
                                    <li class="list-group-item">Minted vegetable hot pot with cream mash</li>
                                    <li class="list-group-item">Spicy vegetable lasagne al forno served with Italian salad</li>
                                    <li class="list-group-item">Baked goats cheese with roast vegetables</li>
                                    <li class="list-group-item">Pepper pot mushrooms with fried rice</li>
                                    <li class="list-group-item">Pasta puttanesca</li>
                                    <li class="list-group-item">Caramelized onion & blue cheese tart</li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br><br></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="pricing-1">
                            <div class="title">NIGERIAN DISHES SELECTION</div>
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Bitter leap (Served with semovita or garri)</li>
                                    <li class="list-group-item">Nsala (Served with semovita or garri)</li>
                                    <li class="list-group-item">Afang (Served with semovita or garri)</li>
                                    <li class="list-group-item">Native (Served with semovita or garri)</li>
                                    <li class="list-group-item">Orah (Served with semovita or garri)</li>
                                    <li class="list-group-item">Egusi (Served with semovita or garri)</li>
                                    <li class="list-group-item">Okro (Served with semovita or garri)</li>
                                    <li class="list-group-item">Vegetable (Served with semovita or garri)</li>
                                    <li class="list-group-item">Ogbono (Served with semovita or garri)</li>
                                    <li class="list-group-item">Banga suop (Served with semovita or garri)</li>
                                    <li class="list-group-item">
                                        <b>
                                            N.B: Additional African dishes are available on request at an extra cost. Please ask for selection and details
                                        </b>
                                    </li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="pricing-1">
                            <div class="title">ACCOMPANIMENTS</div>
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">White rice</li>
                                    <li class="list-group-item">Jollof rice</li>
                                    <li class="list-group-item">Egg fried rice</li>
                                    <li class="list-group-item">Spicy fried rice</li>
                                    <li class="list-group-item">Buttered pasta</li>
                                    <li class="list-group-item">Boiled Irish potatoes</li>
                                    <li class="list-group-item">Roast potatoes</li>
                                    <li class="list-group-item">Lyonnaise Potatoes</li>
                                    <li class="list-group-item">Sautéed Potatoes</li>
                                    <li class="list-group-item">Mushed Potatoes</li>
                                    <li class="list-group-item">Local beans porridge</li>
                                    <li class="list-group-item">Fried plantain</li>
                                    <li class="list-group-item">Fried sweet potato</li>
                                    <li class="list-group-item">Fried or boiled yam</li>
                                    <li class="list-group-item">Spicy couscous</li>
                                    <li class="list-group-item">Egg noodles</li>
                                    <li class="list-group-item">Mixed garden vegetable</li>
                                    <li class="list-group-item">Peas & baton carrots</li>
                                    <li class="list-group-item">Ratatouille</li>
                                    <li class="list-group-item">Roast vegetables<br><br></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="pricing-1">
                            <div class="title">DESSERTS</div>
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Blake Forest cake</li>
                                    <li class="list-group-item">English Trifle</li>
                                    <li class="list-group-item">Fruit cake</li>
                                    <li class="list-group-item">Apple tart</li>
                                    <li class="list-group-item">Chocolate mouse</li>
                                    <li class="list-group-item">Crème caramel</li>
                                    <li class="list-group-item">Fresh fruit salad</li>
                                    <li class="list-group-item">Chocolate Eclairs</li>
                                    <li class="list-group-item">Cake of the day</li>
                                    <li class="list-group-item">Bread and butter pudding</li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br></li>
                                    <li class="list-group-item hidden-xs hidden-sm"><br><br></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content end -->

    <!-- Intro section start -->
    <div class="intro-section" style="margin-top: -19.8px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                    <div class="intro-text">
                        <h3>Your Comfort</h3>
                        <p>Is our number one priority</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                    <a href="{{url('/booking')}}" class="btn btn-md btn-theme hidden-xs hidden-sm">Book a Reservation Now</a>
                    <a href="{{url('/booking')}}" class="btn btn-sm btn-theme hidden-md hidden-lg">Book a Reservation Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- intro section end -->

@endsection

@extends('frontend.layouts.master')

@section('content')

<style>



  
.week1 .table-week-title { background:#5e50a1; } /* purple */
.week2 .table-week-title { background:#1da77a; } /* green */
.week3 .table-week-title { background:#6f3ea6; } /* purple darker */
.week4 .table-week-title { background:#f39c12; } /* orange */


/* ---------- Main content ---------- */
.content-wrap{ padding: 48px 0; }
.content h3{ font-weight:700; margin-top:18px; color:var(--deep-blue) }
.muted { color:var(--muted-text) }

/* Weekly menu cards row */
.menu-card img{ width:100%; height:140px; object-fit:cover; border-radius:6px; }
.menu-card .label-week{ font-size:13px; font-weight:700; margin-top:8px; color:#333; }

/* Tables */
.menu-table { border-collapse: collapse; width:100%; font-size:13px; }
/* .menu-table th, .menu-table td { border:1px solid rgba(0,0,0,0.08); padding:8px; text-align:left; vertical-align:top; } */
.table-week-title { font-weight:700; padding:8px; color:#fff; text-align:center; }

</style>

@php
    $bgImage = $banner && $banner->feature_image
        ? asset('images/banner/' . $banner->feature_image)
        : asset('resources/frontend/images/page-banner2.jpg');
@endphp


<section class="breadcrumb-section text-center text-white d-flex align-items-center justify-content-center"
    style="background-image: url('{{ $bgImage }}');">
  <div class="container d-none">
    <h1 class="breadcrumb-title mb-3">Food Choice</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item">
          <a href="{{ route('home') }}" class="text-white text-decoration-none">Home</a>
        </li>
        <li class="breadcrumb-item active text-white" aria-current="page">Food Choice</li>
      </ol>
    </nav>
  </div>
</section>


  <section class=" py-5 position-relative">
      <div class="container">
        <h2 class="menu-title">Weekly Food Menu</h2>
        <div class="menu-grid">
          @foreach ($features as $key => $feature)

              <div class="menu-card {{ ['bg1','bg2','bg3','bg4'][array_rand(['bg1','bg2','bg3','bg4'])] }}">
                <img src="{{asset('images/service/' .$feature->image )}}" alt="{{ $feature->title }}">
                <div class="week-title">{{ $feature->title }}</div>
              </div>

          @endforeach
        </div>
      </div>
  </section>


<section class="food-choice py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">

          {!! $foodChoice->long_description !!}

      </div>
    </div>
  </div>
</section>


<!-- Main content -->
<main class="content-wrap">
  <div class="container">


    <!-- Detailed weekly tables -->
    <div class="row mt-4">
      <div class="col-lg-12 mx-auto">
        <!-- Week 1 -->
        <div class="mb-4 week1">
          <div class="table-week-title">Week 1 Menu — Dairy-free options available for all meals</div>
          <div class="table-responsive mt-2">
            <table class="menu-table table table-striped w-100">
              <thead>
                <tr>
                  <th style="width:14%;">Day</th>
                  <th style="width:17%">Breakfast</th>
                  <th style="width:17%">Morning Snack</th>
                  <th style="width:17%">Lunch &amp; Dessert</th>
                  <th style="width:17%">Afternoon Snack</th>
                  <th style="width:18%">Tea</th>
                </tr>
              </thead>
              
              <tbody>
                  <tr>
                      <td>Mon</td>
                      <td>Porridge, Toast, Selection of Cereal</td>
                      <td>Fresh Fruits</td>
                      <td>Vegetable stir-fry noodles/Pasta, mixed veg, yogurt/fruit purée</td>
                      <td>Fresh Fruits, Carrots</td>
                      <td>Fish cake with gravy</td>
                  </tr>
                  <tr>
                      <td>Tue</td>
                      <td>Porridge, Toast, Selection of Cereal</td>
                      <td>Fresh Fruits</td>
                      <td>Lamb/Quorn &amp; veg potato hot pot, carrot, rice pudding</td>
                      <td>Fresh Fruits, Breadsticks</td>
                      <td>Tuna mayo sandwiches with salad</td>
                  </tr>
                  <tr>
                      <td>Wed</td>
                      <td>Porridge, Toast, Selection of Cereal</td>
                      <td>Fresh Fruits</td>
                      <td>Spaghetti bolognaises; jelly</td>
                      <td>Fresh Fruits, Cucumber</td>
                      <td>Beans on toast</td>
                  </tr>
                  <tr>
                      <td>Thu</td>
                      <td>Porridge, Toast, Selection of Cereal</td>
                      <td>Fresh Fruits</td>
                      <td>Sweet &amp; sour chicken with rice</td>
                      <td>Fresh Fruits, Brioche roll</td>
                      <td>Wraps with chicken/veg &amp; salad</td>
                  </tr>
                  <tr>
                      <td>Fri</td>
                      <td>Porridge, Toast, Selection of Cereal</td>
                      <td>Fresh Fruits</td>
                      <td>Couscous with roasted vegetables &amp; fruit purée</td>
                      <td>Fresh Fruits, Rice cakes</td>
                      <td>Homemade pizza slices with salad</td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Week 2 -->
        <div class="mb-4 week2">
          <div class="table-week-title">Week 2 Menu — Dairy-free options available for all meals</div>
          <div class="table-responsive mt-2">
            <table class="menu-table table table-striped w-100">
              <thead>
                <tr>
                  <th style="width:14%;">Day</th>
                  <th style="width:17%">Breakfast</th>
                  <th style="width:17%">Morning Snack</th>
                  <th style="width:17%">Lunch &amp; Dessert</th>
                  <th style="width:17%">Afternoon Snack</th>
                  <th style="width:18%">Tea</th>
                </tr>
              </thead>
              
              <tbody>
                  <tr>
                      <td>Mon</td>
                      <td>Porridge, Toast, Selection of Cereal</td>
                      <td>Fresh Fruits</td>
                      <td>Fish with mash potato, vegetables, gravy &amp; fruit yogurt</td>
                      <td>Veggie sticks &amp; hummus</td>
                      <td>Potato salad with peas &amp; coleslaw</td>
                  </tr>
                  <tr>
                      <td>Tue</td>
                      <td>Porridge, Toast, Selection of Cereal</td>
                      <td>Fresh Fruits</td>
                      <td>Spanish veg pasta with hidden veg, banana &amp; custard</td>
                      <td>Pear slices &amp; crackers</td>
                      <td>Build-your-own mini pittas</td>
                  </tr>
                  <tr>
                      <td>Wed</td>
                      <td>Porridge, Toast, Selection of Cereal</td>
                      <td>Fresh Fruits</td>
                      <td>Lentil with mixed veg stew, garlic bread/naan, boiled carrot, pancake</td>
                      <td>Banana slices &amp; rice cakes</td>
                      <td>Veggie soup &amp; wholemeal bread</td>
                  </tr>
                  <tr>
                      <td>Thu</td>
                      <td>Porridge, Toast, Selection of Cereal</td>
                      <td>Fresh Fruits</td>
                      <td>Butter chicken &amp; pilau rice, fruit salad/cocktail</td>
                      <td>Veggie sticks &amp; hummus</td>
                      <td>Sandwiches (chicken/cheese/veg)</td>
                  </tr>
                  <tr>
                      <td>Fri</td>
                      <td>Porridge, Toast, Selection of Cereal</td>
                      <td>Fresh Fruits</td>
                      <td>Southern fried chicken, gravy, potatoes, green beans &amp; baked apple</td>
                      <td>Apple slices &amp; crackers</td>
                      <td>Spaghetti hoops on toast</td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Week 3 -->
        <div class="mb-4 week3">
          <div class="table-week-title">Week 3 Menu — Dairy-free options available for all meals</div>
          <div class="table-responsive mt-2">
            <table class="menu-table table table-striped w-100">
              <thead>
                <tr>
                  <th style="width:14%;">Day</th>
                  <th style="width:17%">Breakfast</th>
                  <th style="width:17%">Morning Snack</th>
                  <th style="width:17%">Lunch &amp; Dessert</th>
                  <th style="width:17%">Afternoon Snack</th>
                  <th style="width:18%">Tea</th>
                </tr>
              </thead>
              
              <tbody>
                  <tr>
                      <td>Mon</td>
                      <td>Porridge, Toast, Selection of Cereal</td>
                      <td>Fresh Fruits</td>
                      <td>Fishcake/fish pie with gravy &amp; yogurt + peach slice</td>
                      <td>Carrot sticks &amp; dips</td>
                      <td>Spaghetti hoops on toast</td>
                  </tr>
                  <tr>
                      <td>Tue</td>
                      <td>Porridge, Toast, Selection of Cereal</td>
                      <td>Fresh Fruits</td>
                      <td>Seasonal soup with baguette &amp; pancake</td>
                      <td>Crackers &amp; apple slices</td>
                      <td>Pancakes with fruit</td>
                  </tr>
                  <tr>
                      <td>Wed</td>
                      <td>Porridge, Toast, Selection of Cereal</td>
                      <td>Fresh Fruits</td>
                      <td>Spaghetti bolognese, fresh fruit cocktail</td>
                      <td>Rice cakes &amp; pear</td>
                      <td>Sandwiches &amp; salad</td>
                  </tr>
                  <tr>
                      <td>Thu</td>
                      <td>Porridge, Toast, Selection of Cereal</td>
                      <td>Fresh Fruits</td>
                      <td>Sweet &amp; sour chicken with rice; sponge &amp; custard</td>
                      <td>Carrot sticks with hummus</td>
                      <td>Homemade pizza with salad</td>
                  </tr>
                  <tr>
                      <td>Fri</td>
                      <td>Porridge, Toast, Selection of Cereal</td>
                      <td>Fresh Fruits</td>
                      <td>Mint lamb stew with couscous &amp; veg, yogurt/fruit purée</td>
                      <td>Crackers &amp; fruit</td>
                      <td>Wraps with mixed fillings</td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Week 4 -->
        <div class="mb-4 week4">
          <div class="table-week-title">Week 4 Menu — Dairy-free options available for all meals</div>
          <div class="table-responsive mt-2">
            <table class="menu-table table table-striped w-100">
              <thead>
                <tr>
                  <th style="width:14%;">Day</th>
                  <th style="width:17%">Breakfast</th>
                  <th style="width:17%">Morning Snack</th>
                  <th style="width:17%">Lunch &amp; Dessert</th>
                  <th style="width:17%">Afternoon Snack</th>
                  <th style="width:18%">Tea</th>
                </tr>
              </thead>
              
              <tbody>
                  <tr>
                      <td>Mon</td>
                      <td>Porridge, Toast, Selection of Cereal</td>
                      <td>Fresh Fruits</td>
                      <td>Shepherd’s pie with broccoli &amp; custard slice OR custard &amp; banana</td>
                      <td>Apple slices &amp; breadsticks</td>
                      <td>Jacket potato with beans &amp; cheese</td>
                  </tr>
                  <tr>
                      <td>Tue</td>
                      <td>Porridge, Toast, Selection of Cereal</td>
                      <td>Fresh Fruits</td>
                      <td>Chicken curry &amp; rice, cauliflower, Greek yogurt &amp; fruits</td>
                      <td>Rice cakes &amp; banana</td>
                      <td>Wraps with salad</td>
                  </tr>
                  <tr>
                      <td>Wed</td>
                      <td>Porridge, Toast, Selection of Cereal</td>
                      <td>Fresh Fruits</td>
                      <td>Chicken pasta with mixed vegetables &amp; fruit jelly</td>
                      <td>Breadsticks &amp; pear</td>
                      <td>Soup with wholemeal bread</td>
                  </tr>
                  <tr>
                      <td>Thu</td>
                      <td>Porridge, Toast, Selection of Cereal</td>
                      <td>Fresh Fruits</td>
                      <td>Chicken chickpeas curry, couscous, green beans, peach slice &amp; cream</td>
                      <td>Crackers &amp; cream cheese</td>
                      <td>Sandwiches with fruit</td>
                  </tr>
                  <tr>
                      <td>Fri</td>
                      <td>Porridge, Toast, Selection of Cereal</td>
                      <td>Fresh Fruits</td>
                      <td>Mash potato &amp; carrot, sausage/fish, gravy &amp; fruit purée/yogurt</td>
                      <td>Carrot sticks with dip</td>
                      <td>Spaghetti hoops on toast</td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>

  </div>
</main>


@endsection

@section('script')

<script>
    $(document).ready(function() {
        let num1 = Math.floor(Math.random() * 10) + 1;
        let num2 = Math.floor(Math.random() * 10) + 1;
        let correctAnswer = num1 + num2;
        $('#captcha-question').text(`What is ${num1} + ${num2}? *`);

        $('.php-email-form').on('submit', function(e) {
            let userAnswer = parseInt($('#captcha-answer').val());
            if(userAnswer !== correctAnswer) {
                e.preventDefault();
                $('#captcha-error').removeClass('d-none').text('Incorrect answer');
            } else {
                $('#captcha-error').addClass('d-none');
                $('#sending-text').removeClass('d-none');
            }
        });
    });
</script>
@endsection
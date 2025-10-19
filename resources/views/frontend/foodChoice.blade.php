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
  <div class="container">
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
                  <th style="width:14%;">Day / Meal</th>
                  <th style="width:17%">Monday</th>
                  <th style="width:17%">Tuesday</th>
                  <th style="width:17%">Wednesday</th>
                  <th style="width:17%">Thursday</th>
                  <th style="width:18%">Friday</th>
                </tr>
              </thead>
              <tbody>
                <tr><td><strong>Breakfast</strong></td><td>Variety of cereals & toast, milk & water</td><td>Variety of cereals & toast, milk & water</td><td>Variety of cereals & toast, milk & water</td><td>Variety of cereals & toast, milk & water</td><td>Variety of cereals & toast, milk & water</td></tr>
                <tr><td><strong>Snack</strong></td><td>Grapes & pear, milk & water</td><td>Banana & bread, milk & water</td><td>Apricot & pear, milk & water</td><td>Cheese sticks & melon, milk & water</td><td>Orange & raisins, milk & water</td></tr>
                <tr><td><strong>Lunch</strong></td><td>Veggie chili with rice & roasted veg, water</td><td>Sauteed veg & pasta, water</td><td>Roast chicken & mash, veg, water</td><td>Chicken curry with rice & veg, water</td><td>Fishcakes and potatoes, peas, water</td></tr>
                <tr><td><strong>Tea</strong></td><td>Sandwiches & veg, water</td><td>Crackers & fruit, milk & water</td><td>Yogurt & fruit, water</td><td>Wraps with filling, water</td><td>Cheese & fruit, water</td></tr>
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
                  <th style="width:14%;">Day / Meal</th>
                  <th style="width:17%">Monday</th>
                  <th style="width:17%">Tuesday</th>
                  <th style="width:17%">Wednesday</th>
                  <th style="width:17%">Thursday</th>
                  <th style="width:18%">Friday</th>
                </tr>
              </thead>
              <tbody>
                <tr><td><strong>Breakfast</strong></td><td>Variety of cereals & toast, milk & water</td><td>Variety of cereals & toast, milk & water</td><td>Variety of cereals & toast, milk & water</td><td>Variety of cereals & toast, milk & water</td><td>Variety of cereals & toast, milk & water</td></tr>
                <tr><td><strong>Snack</strong></td><td>Banana & raisins, milk & water</td><td>Apple & cereal milk & water</td><td>Orange & grapes, milk & water</td><td>Pineapple & raisins, milk & water</td><td>Pear & peach, milk & water</td></tr>
                <tr><td><strong>Lunch</strong></td><td>Macaroni cheese with veggies</td><td>Chicken pie with veg</td><td>Pitta, falafel & salad</td><td>Beef casserole & mash</td><td>Fish & veg with jacket potato</td></tr>
                <tr><td><strong>Tea</strong></td><td>Wraps with variety of fillings</td><td>Tuna pasta bake</td><td>Cheese & chicken sandwiches</td><td>Leek, potato & carrot soup</td><td>Jacket potato with beans</td></tr>
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
                  <th style="width:14%;">Day / Meal</th>
                  <th style="width:17%">Monday</th>
                  <th style="width:17%">Tuesday</th>
                  <th style="width:17%">Wednesday</th>
                  <th style="width:17%">Thursday</th>
                  <th style="width:18%">Friday</th>
                </tr>
              </thead>
              <tbody>
                <tr><td><strong>Breakfast</strong></td><td>Variety of cereals & toast</td><td>Variety of cereals & toast</td><td>Variety of cereals & toast</td><td>Variety of cereals & toast</td><td>Variety of cereals & toast</td></tr>
                <tr><td><strong>Snack</strong></td><td>Grapes & pineapple</td><td>Pear & orange</td><td>Cheese sticks & crackers</td><td>Raisin & pear</td><td>Melon & banana</td></tr>
                <tr><td><strong>Lunch</strong></td><td>Chicken & veg curry</td><td>Beef casserole & peas</td><td>Chicken pasta with veg</td><td>Cheese & vegetable pasta</td><td>Fish fingers & chips</td></tr>
                <tr><td><strong>Tea</strong></td><td>Tuna & sweetcorn pasta salad</td><td>Jacket potato with beans</td><td>Potato salad with peas</td><td>Fish finger & bread</td><td>Sandwich with variety of fillings</td></tr>
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
                  <th style="width:14%;">Day / Meal</th>
                  <th style="width:17%">Monday</th>
                  <th style="width:17%">Tuesday</th>
                  <th style="width:17%">Wednesday</th>
                  <th style="width:17%">Thursday</th>
                  <th style="width:18%">Friday</th>
                </tr>
              </thead>
              <tbody>
                <tr><td><strong>Breakfast</strong></td><td>Variety of cereals & toast</td><td>Variety of cereals & toast</td><td>Variety of cereals & toast</td><td>Variety of cereals & toast</td><td>Variety of cereals & toast</td></tr>
                <tr><td><strong>Snack</strong></td><td>Melon & banana</td><td>Apple & cereal</td><td>Orange & grapes</td><td>Peach & melon</td><td>Raisin & pear</td></tr>
                <tr><td><strong>Lunch</strong></td><td>Meatballs & pasta with veg</td><td>Chicken & veg pasta</td><td>Vegetable stir fry with rice</td><td>Beef casserole with new potatoes</td><td>Cottage pie with peas</td></tr>
                <tr><td><strong>Tea</strong></td><td>Apple & banana</td><td>Grapes & apricot</td><td>Crackers & cheese</td><td>Rice cake & cucumber</td><td>Fish finger & bread</td></tr>
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
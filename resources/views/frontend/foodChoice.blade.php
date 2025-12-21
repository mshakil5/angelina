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


  .menu-table {
    border-collapse: collapse;
    table-layout: fixed;
    word-wrap: break-word;
    width: 100% !important;
    font-size:13px;
  }

  .table-week-title { font-weight:700; padding:8px; color:#fff; text-align:center; }

  @media print {
    .table-responsive {
        overflow: visible !important;
        display: block !important;
    }
}



/* Update this section in your <style> tag */
.week1, .week2, .week3, .week4 {
    /* Remove page-break-after: always; */
    margin-bottom: 30px; 
    padding: 10px;
    background: #fff; /* Ensures no transparency issues */
}

/* Use this only if you want to force a break manually */
.html2pdf__page-break {
    page-break-before: always;
}

/* This is the clean way to tell the PDF engine to break */
.pdf-page-break {
    page-break-after: always !important;
    display: block;
}

/* Ensure tables don't get split in the middle of a row */
.table-responsive {
    page-break-inside: avoid !important;
}


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
    <div class="row mt-4 food-choice-content">

      <div class="col-lg-12 mx-auto">
        <h1 class="text-center my-4">4-Week Healthy Meal Plan</h1>
      </div>
      
        <div class="pdf-page-break"></div>


      <div class="col-lg-12 mx-auto">
        
        <!-- Week 1 -->
        <div class="table-responsive week1">
            <h2 class="table-week-title">Week 1</h2>
            <table class="menu-table  table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Day</th>
                        <th>Breakfast</th>
                        <th>Morning Snack</th>
                        <th>Lunch</th>
                        <th>Afternoon Snack</th>
                        <th>Tea (Main + Side)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="day-col">Mon</td>
                        <td>Porridge, fresh fruits, wholemeal toast, wholegrain cereal, milk, water</td>
                        <td>Fruit<br>Apple slices<br>Pear slices<br>Banana</td>
                        <td>Fish pie<br>Steamed carrots</td>
                        <td>Vegetables<br>Vegetable sticks<br>Cucumber sticks<br>Carrot (steamed or grated)</td>
                        <td>Lentil soup with wholemeal bread and fresh fruit</td>
                    </tr>
                    <tr>
                        <td class="day-col">Tue</td>
                        <td>Porridge, fresh fruits, wholemeal toast, wholegrain cereal, milk, water</td>
                        <td>Grapes<br>Soft berries (cut safely)<br>Kiwi</td>
                        <td>Lentil stew with potatoes<br>Mixed vegetables<br>Wholemeal Pitta</td>
                        <td>Carrot (steamed or grated)<br>Pepper sticks<br>Cherry tomato<br>Starchy<br>Plain rice cakes (no salt)</td>
                        <td>Chicken pasta and natural yoghurt</td>
                    </tr>
                    <tr>
                        <td class="day-col">Wed</td>
                        <td>Porridge, fresh fruits, wholemeal toast, wholegrain cereal, milk, water</td>
                        <td>Satsuma or orange<br>Vegetables<br>Cucumber sticks<br>Carrot steamed</td>
                        <td>Minced lamb bolognese with Spaghetti<br>Green beans</td>
                        <td>Plain oatcakes (no salt, no egg)<br>Unsaltted breadsticks<br>Wholemeal pitta pieces (plain)</td>
                        <td>Jacket potato with cheese and fresh fruit</td>
                    </tr>
                    <tr>
                        <td class="day-col">Thu</td>
                        <td>Porridge, fresh fruits, wholemeal toast, wholegrain cereal, milk, water</td>
                        <td>Pepper sticks<br>Cherry tomato<br>Drinks<br>Water</td>
                        <td>Chicken curry with rice<br>Cauliflower</td>
                        <td>Wholemeal Crumpets<br>Wholemeal Bagels<br>Dip & Healthy Fats</td>
                        <td>Vegetable soup with wholemeal pitta bread</td>
                    </tr>
                    <tr>
                        <td class="day-col">Fri</td>
                        <td>Porridge, fresh fruits, wholemeal toast, wholegrain cereal, milk, water</td>
                        <td>Milk</td>
                        <td>Chickpea curry with couscous<br>Mixed vegetable</td>
                        <td>Houmous (low salt)<br>Bean Dip (low salt)<br>Mashed Avocado</td>
                        <td>Chicken sandwich with Salad</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="pdf-page-break"></div>

        <!-- Week 2 -->
        <div class="table-responsive week2 mt-2">
            <h2 class="table-week-title">Week 2</h2>
            <table class="menu-table  table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Day</th>
                        <th>Breakfast</th>
                        <th>Morning Snack</th>
                        <th>Lunch</th>
                        <th>Afternoon Snack</th>
                        <th>Tea (Main + Side)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="day-col">Mon</td>
                        <td>Porridge, fresh fruits, wholemeal toast, wholegrain cereal, milk, water</td>
                        <td>Fruit<br>Apple slices<br>Pear slices<br>Banana</td>
                        <td>Caribbean salmon curry with rice<br>Green beans</td>
                        <td>Vegetables<br>Vegetable sticks<br>Cucumber sticks<br>Carrot (steamed or grated)</td>
                        <td>Lentil soup with wholemeal bread and fresh fruit</td>
                    </tr>
                    <tr>
                        <td class="day-col">Tue</td>
                        <td>Porridge, fresh fruits, wholemeal toast, wholegrain cereal, milk, water</td>
                        <td>Grapes<br>Soft berries (cut safely)<br>Kiwi</td>
                        <td>Lentil and mixed vegetable stew<br>Wholemeal pitta bread</td>
                        <td>Pepper sticks<br>Cherry tomato<br>Starchy<br>Plain rice cakes (no salt)<br>Plain oatcakes (no salt, no egg)</td>
                        <td>Pasta with mixed vegetables and natural yoghurt</td>
                    </tr>
                    <tr>
                        <td class="day-col">Wed</td>
                        <td>Porridge, fresh fruits, wholemeal toast, wholegrain cereal, milk, water</td>
                        <td>Satsuma or orange<br>Vegetables<br>Cucumber sticks<br>Carrot steamed</td>
                        <td>Spanish chicken pasta<br>Mixed vegetables</td>
                        <td>Unsaltted breadsticks<br>Wholemeal pitta pieces (plain)</td>
                        <td>Jacket potato with cheese and salad</td>
                    </tr>
                    <tr>
                        <td class="day-col">Thu</td>
                        <td>Porridge, fresh fruits, wholemeal toast, wholegrain cereal, milk, water</td>
                        <td>Pepper sticks<br>Cherry tomato<br>Drinks<br>Water</td>
                        <td>Lamb stew with potatoes<br>Steamed carrots</td>
                        <td>Wholemeal Crumpets<br>Wholemeal Bagels<br>Dip & Healthy Fats</td>
                        <td>Vegetable soup with wholemeal bread and fresh fruit</td>
                    </tr>
                    <tr>
                        <td class="day-col">Fri</td>
                        <td>Porridge, fresh fruits, wholemeal toast, wholegrain cereal, milk, water</td>
                        <td>Milk</td>
                        <td>Chicken curry with rice<br>Cauliflower</td>
                        <td>Houmous (low salt)<br>Bean Dip (low salt)<br>Mashed Avocado</td>
                        <td>Cheese sandwich with natural yoghurt</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="pdf-page-break"></div>

        <!-- Week 3 -->
        <div class="table-responsive week3">
            <h2 class="table-week-title">Week 3</h2>
            <table class="menu-table table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Day</th>
                        <th>Breakfast</th>
                        <th>Morning Snack</th>
                        <th>Lunch (Main + Side)</th>
                        <th>Afternoon Snack</th>
                        <th>Tea (Main + Side)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="day-col">Mon</td>
                        <td>Porridge, fresh fruits, wholemeal toast, wholegrain cereal, milk, water</td>
                        <td>Fruit<br>Apple slices<br>Pear slices<br>Banana</td>
                        <td>Fish with mashed potatoes and gravy<br>Cauliflower</td>
                        <td>Vegetables<br>Vegetable sticks<br>Cucumber sticks<br>Carrot (steamed or grated)</td>
                        <td>Lentil soup with wholemeal bread and steamed carrots</td>
                    </tr>
                    <tr>
                        <td class="day-col">Tue</td>
                        <td>Porridge, fresh fruits, wholemeal toast, wholegrain cereal, milk, water</td>
                        <td>Grapes<br>Soft berries (cut safely)<br>Kiwi</td>
                        <td>Spanish garlic pasta with chicken<br>Mixed vegetable</td>
                        <td>Pepper sticks<br>Cherry tomato<br>Starchy<br>Plain rice cakes (no salt)</td>
                        <td>Pasta with mixed vegetables and natural yoghurt</td>
                    </tr>
                    <tr>
                        <td class="day-col">Wed</td>
                        <td>Porridge, fresh fruits, wholemeal toast, wholegrain cereal, milk, water</td>
                        <td>Satsuma or orange<br>Vegetables<br>Cucumber sticks<br>Carrot steamed</td>
                        <td>Chicken curry with couscous<br>Cauliflower</td>
                        <td>Plain oatcakes (no salt, no egg)<br>Unsaltted breadsticks<br>Wholemeal pitta pieces (plain)</td>
                        <td>Jacket potato with tuna and mixed vegetables</td>
                    </tr>
                    <tr>
                        <td class="day-col">Thu</td>
                        <td>Porridge, fresh fruits, wholemeal toast, wholegrain cereal, milk, water</td>
                        <td>Pepper sticks<br>Cherry tomato<br>Drinks<br>Water</td>
                        <td>Mexican chicken with rice<br>Mixed vegetable</td>
                        <td>Wholemeal Crumpets<br>Wholemeal Bagels<br>Dip & Healthy Fats</td>
                        <td>Lentil & vegetable stew with fresh fruit</td>
                    </tr>
                    <tr>
                        <td class="day-col">Fri</td>
                        <td>Porridge, fresh fruits, wholemeal toast, wholegrain cereal, milk, water</td>
                        <td>Milk</td>
                        <td>Lentil stew with boiled potatoes<br>Cabbage</td>
                        <td>Houmous (low salt)<br>Bean Dip (low salt)<br>Mashed Avocado</td>
                        <td>Chicken sandwich with natural yoghurt</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="pdf-page-break"></div>

        <!-- Week 4 -->
        <div class="table-responsive week4">
            <h2 class="table-week-title">Week 4</h2>
            <table class="menu-table table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Day</th>
                        <th>Breakfast</th>
                        <th>Morning Snack</th>
                        <th>Lunch (Main + Side)</th>
                        <th>Afternoon Snack</th>
                        <th>Tea (Main + Side)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="day-col">Mon</td>
                        <td>Porridge, fresh fruits, wholemeal toast, wholegrain cereal, milk, water</td>
                        <td>Fruit<br>Apple slices<br>Pear slices<br>Banana</td>
                        <td>Salmon bake with potatoes<br>Cauliflower</td>
                        <td>Vegetables<br>Vegetable sticks<br>Cucumber sticks<br>Carrot (steamed or grated)</td>
                        <td>Vegetable soup with wholemeal bread with fresh fruit</td>
                    </tr>
                    <tr>
                        <td class="day-col">Tue</td>
                        <td>Porridge, fresh fruits, wholemeal toast, wholegrain cereal, milk, water</td>
                        <td>Grapes<br>Soft berries (cut safely)<br>Kiwi</td>
                        <td>Lentil and vegetable stew with wholemeal pitta<br>Broccoli</td>
                        <td>Pepper sticks<br>Cherry tomato<br>Starchy<br>Plain rice cakes (no salt)</td>
                        <td>Pasta with mixed vegetables and natural yoghurt</td>
                    </tr>
                    <tr>
                        <td class="day-col">Wed</td>
                        <td>Porridge, fresh fruits, wholemeal toast, wholegrain cereal, milk, water</td>
                        <td>Satsuma or orange<br>Vegetables<br>Cucumber sticks<br>Carrot steamed</td>
                        <td>Chicken casserole with baked potatoes<br>Green beans</td>
                        <td>Plain oatcakes (no salt, no egg)<br>Unsaltted breadsticks<br>Wholemeal pitta pieces (plain)</td>
                        <td>Jacket potato with cheese and salad</td>
                    </tr>
                    <tr>
                        <td class="day-col">Thu</td>
                        <td>Porridge, fresh fruits, wholemeal toast, wholegrain cereal, milk, water</td>
                        <td>Pepper sticks<br>Cherry tomato<br>Drinks<br>Water</td>
                        <td>Lamb stew with potatoes<br>Cabbage</td>
                        <td>Wholemeal Crumpets<br>Wholemeal Bagels<br>Dip & Healthy Fats</td>
                        <td>Lentil soup with wholemeal pitta and steamed carrots</td>
                    </tr>
                    <tr>
                        <td class="day-col">Fri</td>
                        <td>Porridge, fresh fruits, wholemeal toast, wholegrain cereal, milk, water</td>
                        <td>Milk</td>
                        <td>Chilli con carne with rice<br>Broccoli</td>
                        <td>Houmous (low salt)<br>Bean Dip (low salt)<br>Mashed Avocado</td>
                        <td>Salmon wholemeal sandwich with natural yoghurt</td>
                    </tr>
                </tbody>
            </table>
        </div>




      </div>
    </div>

    

  </div>

</main>


  <div class="container text-end mt-3">
    <button id="download-pdf" class="btn btn-primary">
        <i class="fas fa-download"></i> Download Menu as PDF
    </button>
  </div>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<script>
  document.getElementById('download-pdf').addEventListener('click', function () {
      const element = document.querySelector('.food-choice-content');
      
      const opt = {
          margin:       [10, 10, 10, 10],
          filename:     'Weekly-Meal-Plan.pdf',
          image:        { type: 'jpeg', quality: 0.98 },
          html2canvas:  { 
              scale: 2, 
              useCORS: true, 
              scrollY: 0 
          },
          jsPDF:        { unit: 'mm', format: 'a4', orientation: 'landscape' },
          // This setting ensures it only breaks where you put .pdf-page-break
          pagebreak:    { mode: 'css' } 
      };

      html2pdf().set(opt).from(element).save();
  });
</script>
@endsection
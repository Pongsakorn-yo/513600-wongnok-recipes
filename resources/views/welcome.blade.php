@extends('backend.layout')

@section('styles')
<style>
    .welcome-text {
        font-size: 1.2rem;
        font-weight: 600;
        color: #555;
    }

    .card-custom {
        border-radius: 1rem;
        border: none;
        background: #fdfdfd;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .food-icon img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #ff6f61;
        background: #fff;
        padding: 5px;
    }

    .rating-stars i {
        color: #ccc;
        cursor: pointer;
        font-size: 1.2rem;
        transition: color 0.3s ease;
    }

    .rating-stars i.selected,
    .rating-stars i:hover,
    .rating-stars i:hover~i {
        color: #ffc107;
    }

    .menu-card {
        transition: all 0.3s ease;
        border-radius: 1rem;
        border: none;
    }

    .menu-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .card-title i {
        color: #28a745;
        margin-right: 8px;
    }

    .menu-card h5 {
        font-weight: 600;
        color: #333;
    }

    .menu-card a {
        color: #007bff;
        text-decoration: none;
    }

    .menu-card a:hover {
        text-decoration: underline;
    }
</style>
@endsection

@section('content')
<div class="card mb-4 shadow-sm card-custom">
    <div class="card-body text-center">
        <h4 class="card-title text-success">
            <i class="fas fa-utensils"></i> ยินดีต้อนรับสู่เว็บไซต์เมนูอาหารแสนอร่อย!
        </h4>
        <p class="welcome-text mt-2">เลือกรายการเมนูและให้คะแนนความอร่อยได้เลย</p>
    </div>
</div>



{{-- 🧾 รายการเมนู --}}
<div class="card card-custom">
    <div class="card-body">
        <div class="row">
            {{-- 🔍 ช่องค้นหา --}}
            <div class="mb-4">
                <form method="GET" action="/">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="ค้นหาเมนูอาหาร..." value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">ค้นหา</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @forelse($menus as $i => $menu)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm menu-card h-100 text-center p-3">
                    <div class="food-icon mb-3">
                        <img src="{{ asset('storage/' . $menu->image) }}" alt="menu image">
                    </div>
                    <h5 class="mt-2">{{ $menu->name }}</h5>
                    <p><a href="/foodmenu/{{ $menu->id }}">รายละเอียดของเมนูอาหาร</a></p>
                    <div class="rating-stars d-flex justify-content-center" data-menu="{{ $i }}">
                        @php
                        $avgRating = $menu->ratings()->avg('score');
                        @endphp
                        @if($avgRating)
                        <p class="mt-2"><i class="fas fa-star text-warning"></i> คะแนนเฉลี่ย: {{ number_format($avgRating, 1) }} / 5</p>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">ไม่พบเมนูอาหารที่ตรงกับคำค้นหา</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.querySelectorAll('.rating-stars').forEach(starGroup => {
        const stars = starGroup.querySelectorAll('i');
        stars.forEach(star => {
            star.addEventListener('click', () => {
                stars.forEach(s => s.classList.remove('selected'));
                star.classList.add('selected');
                let previous = star.previousElementSibling;
                while (previous) {
                    if (previous.tagName === 'I') previous.classList.add('selected');
                    previous = previous.previousElementSibling;
                }
            });
        });
    });
</script>
@endsection
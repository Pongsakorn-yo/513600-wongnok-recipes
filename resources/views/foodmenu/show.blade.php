@extends('backend.layout')

@section('styles')
<style>
    .menu-show-card {
        border-radius: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .menu-image {
        width: 100%;
        max-height: 400px;
        object-fit: cover;
        border-radius: 20px 20px 0 0;
    }

    .menu-title {
        font-size: 2rem;
        font-weight: bold;
        color: #343a40;
    }

    .menu-detail {
        font-size: 1.1rem;
        color: #6c757d;
    }

    .back-button {
        margin-top: 20px;
    }

    .section-title {
        font-weight: bold;
        font-size: 1.2rem;
        margin-top: 1rem;
    }
</style>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card menu-show-card">
            @if($menu->image)
            <img src="{{ asset('storage/' . $menu->image) }}" class="menu-image" alt="รูปเมนู">
            @endif
            <div class="card-body text-center">
                <h3 class="menu-title"><i class="fas fa-utensils text-success"></i> {{ $menu->name }}</h3>

                <div class="text-start mt-3">
                    <p><span class="section-title"><i class="fas fa-leaf text-success"></i> วัตถุดิบ:</span><br>{{ $menu->ingredients }}</p>
                    <p><span class="section-title"><i class="fas fa-list-ol text-primary"></i> ขั้นตอน:</span><br>{{ $menu->steps }}</p>
                    <p><span class="section-title"><i class="fas fa-clock text-warning"></i> ระยะเวลา:</span>
                        @switch($menu->duration)
                        @case(1) 5-10 นาที @break
                        @case(2) 11-30 นาที @break
                        @case(3) 31-60 นาที @break
                        @case(4) มากกว่า 60 นาที @break
                        @default -
                        @endswitch
                    </p>
                    <p><span class="section-title"><i class="fas fa-tachometer-alt text-danger"></i> ความยาก:</span>
                        @switch($menu->difficulty)
                        @case(1) ง่าย @break
                        @case(2) ปานกลาง @break
                        @case(3) ยาก @break
                        @default -
                        @endswitch
                    </p>
                </div>

                <a href="{{ route('foodmenu.index') }}" class="btn btn-secondary back-button">
                    <i class="fas fa-arrow-left"></i> กลับไปยังรายการเมนู
                </a>
                @if($menu->user->id != auth()->user()->id)
                <button class="btn btn-primary back-button" data-bs-toggle="modal" data-bs-target="#rateMenuModal">
                    <i class="fas fa-star"></i> ให้คะแนนเมนูนี้
                </button>
                @endif
                @php
                $avgRating = $menu->ratings()->avg('score');
                @endphp

                @if($avgRating)
                <p class="mt-2"><i class="fas fa-star text-warning"></i> คะแนนเฉลี่ย: {{ number_format($avgRating, 1) }} / 5</p>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal: ให้คะแนนเมนู -->
<div class="modal fade" id="rateMenuModal" tabindex="-1" aria-labelledby="rateMenuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('menus.rate', $menu->id) }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rateMenuLabel"><i class="fas fa-star text-warning"></i> ให้คะแนนเมนู: {{ $menu->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="ปิด"></button>
                </div>
                <div class="modal-body text-center">
                    <label class="form-label">คะแนนของคุณ (1 - 5 ดาว)</label>
                    <div class="form-group mb-3">
                        <select name="score" class="form-select text-center" required>
                            <option value="">-- เลือกคะแนน --</option>
                            @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">@for($j = 1; $j <= $i; $j++) ⭐ @endfor</option>
                                    @endfor
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-success">ส่งคะแนน</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
@include('sweetalert::alert')
@endsection
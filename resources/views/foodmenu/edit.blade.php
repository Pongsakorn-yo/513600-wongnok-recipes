@extends('backend.layout')

@section('styles')
<style>
    .form-container {
        background: #ffffff;
        padding: 2rem;
        border-radius: 20px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .form-title {
        font-size: 1.8rem;
        font-weight: bold;
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-weight: bold;
    }

    .btn-save {
        margin-top: 1rem;
    }

    .preview-img {
        max-height: 200px;
        margin-bottom: 1rem;
        border-radius: 10px;
    }
</style>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="form-container">
            <h2 class="form-title"><i class="fas fa-edit text-warning"></i> แก้ไขเมนู: {{ $menu->name }}</h2>

            <form method="POST" action="{{ route('foodmenu.update', $menu->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">ชื่อเมนู</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $menu->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">วัตถุดิบ</label>
                    <textarea name="ingredients" class="form-control" rows="3">{{ old('ingredients', $menu->ingredients) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">ขั้นตอนการทำ</label>
                    <textarea name="steps" class="form-control" rows="4">{{ old('steps', $menu->steps) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">ระยะเวลาในการทำ</label>
                    <select name="duration" class="form-select">
                        <option value="">-- เลือกระยะเวลา --</option>
                        <option value="1" {{ $menu->duration == 1 ? 'selected' : '' }}>5-10 นาที</option>
                        <option value="2" {{ $menu->duration == 2 ? 'selected' : '' }}>11-30 นาที</option>
                        <option value="3" {{ $menu->duration == 3 ? 'selected' : '' }}>31-60 นาที</option>
                        <option value="4" {{ $menu->duration == 4 ? 'selected' : '' }}>มากกว่า 60 นาที</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">ความยาก</label>
                    <select name="difficulty" class="form-select">
                        <option value="">-- เลือกความยาก --</option>
                        <option value="1" {{ $menu->difficulty == 1 ? 'selected' : '' }}>ง่าย</option>
                        <option value="2" {{ $menu->difficulty == 2 ? 'selected' : '' }}>ปานกลาง</option>
                        <option value="3" {{ $menu->difficulty == 3 ? 'selected' : '' }}>ยาก</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">รูปเมนู (อัปโหลดใหม่เพื่อแทนที่รูปเดิม)</label><br>
                    @if($menu->image)
                        <img src="{{ asset('storage/' . $menu->image) }}" class="preview-img" alt="รูปเมนู">
                    @endif
                    <input type="file" name="file" class="form-control mt-2" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary btn-save">
                    <i class="fas fa-save"></i> บันทึกการเปลี่ยนแปลง
                </button>
                <a href="{{ route('foodmenu.index') }}" class="btn btn-secondary btn-save">
                    <i class="fas fa-arrow-left"></i> กลับ
                </a>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('sweetalert::alert')
@endsection

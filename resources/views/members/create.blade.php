@extends('members.layout')

@section('title', 'Add Member')

@section('content')

<div class="card">
    <h2>Add New Member</h2>

    @if ($errors->any())
        <div class="error-message">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('members.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>First Name</label>
            <input
                type="text"
                name="first_name"
                value="{{ old('first_name') }}"
                required
            >
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input
                type="text"
                name="last_name"
                value="{{ old('last_name') }}"
                required
            >
        </div>

        <div class="form-group">
            <label>Email</label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
            >
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input
                type="text"
                name="phone"
                value="{{ old('phone') }}"
            >
        </div>

        <div class="form-group">
            <label>Address</label>
            <textarea name="address">{{ old('address') }}</textarea>
        </div>

        <div class="form-group">
            <label>Category</label>

            <select name="category" required>
                <option value="">Select Category</option>
                <option value="Student">Student</option>
                <option value="Regular">Regular</option>
                <option value="Senior Citizen">Senior Citizen</option>
                <option value="Corporate">Corporate</option>
            </select>
        </div>

        <div class="form-group">
            <label>Membership Level</label>

            <select name="membership_level_id" required>
                <option value="">Select Level</option>

                @foreach ($levels as $level)
                    <option value="{{ $level->id }}">
                        {{ $level->level_name }} -
                        ₱{{ number_format($level->fee, 2) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-actions">
            <button type="submit" class="button">
                Save Member
            </button>

            <a
                href="{{ route('members.index') }}"
                class="button button-secondary"
            >
                Cancel
            </a>
        </div>
    </form>
</div>

@endsection
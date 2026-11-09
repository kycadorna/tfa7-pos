@extends('members.layout')

@section('title', 'Edit Member')

@section('content')

<div class="card">
    <h2>Edit Member</h2>

    @if ($errors->any())
        <div class="error-message">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('members.update', $member) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>First Name</label>
            <input
                type="text"
                name="first_name"
                value="{{ old('first_name', $member->first_name) }}"
                required
            >
        </div>

        <div class="form-group">
            <label>Last Name</label>
            <input
                type="text"
                name="last_name"
                value="{{ old('last_name', $member->last_name) }}"
                required
            >
        </div>

        <div class="form-group">
            <label>Email</label>
            <input
                type="email"
                name="email"
                value="{{ old('email', $member->email) }}"
                required
            >
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input
                type="text"
                name="phone"
                value="{{ old('phone', $member->phone) }}"
            >
        </div>

        <div class="form-group">
            <label>Address</label>
            <textarea name="address">{{ old('address', $member->address) }}</textarea>
        </div>

        <div class="form-group">
            <label>Category</label>

            <select name="category" required>
                <option value="Student" {{ $member->category === 'Student' ? 'selected' : '' }}>
                    Student
                </option>

                <option value="Regular" {{ $member->category === 'Regular' ? 'selected' : '' }}>
                    Regular
                </option>

                <option value="Senior Citizen" {{ $member->category === 'Senior Citizen' ? 'selected' : '' }}>
                    Senior Citizen
                </option>

                <option value="Corporate" {{ $member->category === 'Corporate' ? 'selected' : '' }}>
                    Corporate
                </option>
            </select>
        </div>

        <div class="form-group">
            <label>Membership Level</label>

            <select name="membership_level_id" required>
                @foreach ($levels as $level)
                    <option
                        value="{{ $level->id }}"
                        {{ $member->membership_level_id == $level->id ? 'selected' : '' }}
                    >
                        {{ $level->level_name }} -
                        ₱{{ number_format($level->fee, 2) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-actions">
                <button type="submit" class="button">
                Update Member
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
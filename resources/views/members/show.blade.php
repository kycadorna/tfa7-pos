@extends('members.layout')

@section('title', 'Member Profile')

@section('content')

<div class="card">
    <h2>Member Profile</h2>
    <div class="profile-row">
        <span class="profile-label">Member Number</span>
        <span>{{ $member->member_number }}</span>
    </div>
    <div class="profile-row">
        <span class="profile-label">Full Name</span>
        <span>
            {{ $member->first_name }}
            {{ $member->last_name }}
        </span>
    </div>

    <div class="profile-row">
        <span class="profile-label">Email</span>
        <span>{{ $member->email }}</span>
    </div>

    <div class="profile-row">
        <span class="profile-label">Phone</span>
        <span>{{ $member->phone ?: 'No phone provided' }}</span>
    </div>

    <div class="profile-row">
        <span class="profile-label">Address</span>
        <span>{{ $member->address ?: 'No address provided' }}</span>
    </div>

    <div class="profile-row">
        <span class="profile-label">Category</span>
        <span>{{ $member->category }}</span>
    </div>

    <div class="profile-row">
        <span class="profile-label">Membership Level</span>
        <span>{{ $member->membershipLevel->level_name }}</span>
    </div>

    <div class="profile-row">
        <span class="profile-label">Fee</span>
        <span>₱{{ number_format($member->membershipLevel->fee, 2) }}</span>
    </div>

    <div class="profile-row">
        <span class="profile-label">Validity Period</span>
        <span>{{ $member->membershipLevel->validity_period }} month(s)</span>
    </div>

    <div class="profile-row">
        <span class="profile-label">Benefits</span>
        <span>{{ $member->membershipLevel->benefits }}</span>
    </div>

    <div class="profile-row">
        <span class="profile-label">Status</span>
        <span>{{ ucfirst($member->status) }}</span>
    </div>

    <br>

    <a
        href="{{ route('members.edit', $member) }}"
        class="button button-warning"
    >
        Edit Member
    </a>

    <a
        href="{{ route('members.index') }}"
        class="button button-secondary"
    >
        Back to Dashboard
    </a>
</div>

@endsection
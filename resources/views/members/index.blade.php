@extends('members.layout')

@section('title', 'Members')

@section('content')

@if (session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <h2>Member Dashboard</h2>

    <form action="{{ route('members.index') }}" method="GET" class="search-form">
        <input
            type="text"
            name="search"
            placeholder="Search by name or email"
            value="{{ request('search') }}"
        >

        <select name="category">
            <option value="">All Categories</option>
            <option value="Student">Student</option>
            <option value="Regular">Regular</option>
            <option value="Senior Citizen">Senior Citizen</option>
            <option value="Corporate">Corporate</option>
        </select>

        <select name="membership_level_id">
            <option value="">All Levels</option>

            @foreach ($levels as $level)
                <option
                    value="{{ $level->id }}"
                    {{ request('membership_level_id') == $level->id ? 'selected' : '' }}
                >
                    {{ $level->level_name }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="button">
            Search
        </button>
    </form>

    <a href="{{ route('members.create') }}" class="button">
        Add New Member
    </a>
</div>

<div class="card">
    <h2>Member List</h2>

    <table>
        <thead>
            <tr>
                <th>Member Number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Category</th>
                <th>Level</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($members as $member)
                <tr>
                    <td>{{ $member->member_number }}</td>
                    <td>
                        {{ $member->first_name }}
                        {{ $member->last_name }}
                    </td>

                    <td>{{ $member->email }}</td>
                    <td>{{ $member->category }}</td>
                    <td>{{ $member->membershipLevel->level_name }}</td>

                    <td>
                        <span class="status status-{{ $member->status }}">
                            {{ ucfirst($member->status) }}
                        </span>
                    </td>

                    <td>
                        <div class="actions">
                            <a
                                href="{{ route('members.show', $member) }}"
                                class="button"
                            >
                                View
                            </a>

                            <a
                                href="{{ route('members.edit', $member) }}"
                                class="button button-warning"
                            >
                                Edit
                            </a>
    
                            @if ($member->status === 'active')
    <form
        action="{{ route('members.destroy', $member) }}"
        method="POST"
    >
        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="button button-danger"
            onclick="return confirm('Deactivate this member?')"
        >
            Deactivate
        </button>
    </form>
@else
    <form
        action="{{ route('members.reactivate', $member) }}"
        method="POST"
    >
        @csrf
        @method('PATCH')

        <button type="submit" class="button">
            Reactivate
        </button>
    </form>
@endif
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">
                        No members found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br>

    {{ $members->links() }}
</div>

@endsection
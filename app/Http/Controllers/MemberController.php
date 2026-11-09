<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\MembershipLevel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $query = Member::with('membershipLevel');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($query) use ($search) {
                $query->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('membership_level_id')) {
            $query->where(
                'membership_level_id',
                $request->membership_level_id
            );
        }

        $members = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $levels = MembershipLevel::orderBy('level_name')->get();

        return view('members.index', compact('members', 'levels'));
    }

    public function create()
    {
        $levels = MembershipLevel::orderBy('level_name')->get();

        return view('members.create', compact('levels'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'unique:members,email'],
            'phone' => ['nullable', 'string', 'max:30'],
            'address' => ['nullable', 'string'],
            'category' => [
                'required',
                Rule::in([
                    'Student',
                    'Regular',
                    'Senior Citizen',
                    'Corporate',
                ]),
            ],
            'membership_level_id' => [
                'required',
                'exists:membership_levels,id',
            ],
        ]);

        $member = Member::create($validated);

        $member->update([
            'member_number' => 'MEM-' . str_pad($member->id, 6, '0', STR_PAD_LEFT),
        ]);

        return redirect()
            ->route('members.index')
            ->with('success', 'Member added successfully.');
    }

    public function show(Member $member)
    {
        $member->load('membershipLevel');

        return view('members.show', compact('member'));
    }

    public function edit(Member $member)
    {
        $levels = MembershipLevel::orderBy('level_name')->get();

        return view('members.edit', compact('member', 'levels'));
    }

    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => [
                'required',
                'email',
                Rule::unique('members', 'email')
                    ->ignore($member->id),
            ],
            'phone' => ['nullable', 'string', 'max:30'],
            'address' => ['nullable', 'string'],
            'category' => [
                'required',
                Rule::in([
                    'Student',
                    'Regular',
                    'Senior Citizen',
                    'Corporate',
                ]),
            ],
            'membership_level_id' => [
                'required',
                'exists:membership_levels,id',
            ],
        ]);

        $member->update($validated);

        return redirect()
            ->route('members.index')
            ->with('success', 'Member updated successfully.');
    }

    public function destroy(Member $member)
    {
        $member->update([
            'status' => 'inactive',
        ]);

        return redirect()
            ->route('members.index')
            ->with('success', 'Member deactivated successfully.');
    }
    public function reactivate(Member $member)
{
    $member->update([
        'status' => 'active',
    ]);

    return redirect()
        ->route('members.index')
        ->with('success', 'Member reactivated successfully.');
}
}
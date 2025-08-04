<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Models\User;
use App\Models\UserRule;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $rules = Rule::all();

        return view('website/admin/admin-dashboard', compact('rules'));
    }

    public function createRule(Request $request)
    {
        $rule = $request->validate([
            'name' => 'required|string|max:25',
            'description' => 'max:25',
        ]);

        Rule::create($rule);

        return redirect()->route('admin-dashboard.index')->with('create-rule-success', 'The rule has been created');
    }

    public function deleteRule(Request $request)
    {
        $data = $request->validate([
            'rule' => 'required',
        ]);

        $rule = Rule::where('name', $data['rule'])->first();

        if(!$rule) {
            return redirect()->back()->with('error', 'Rule not found');
        }

        $rule->delete();

        return redirect()->route('admin-dashboard.index')->with('delete-rule-success', 'The rule has been deleted');
    }

    public function assignUserRule(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:100',
            'rule' => 'required',
        ]);

        $user = User::where('email', $data['email'])->first();

        if(!$user) {
            return redirect()->back()->with('assign-rule-error', 'This user email does not exist!');
        }

        if($user->hasRule($data['rule'])) {
            return redirect()->back()->with('assign-rule-error', 'This user already have this rule!');
        }

        $user->assignUserRule($data['rule']);

        return redirect()->route('admin-dashboard.index')->with('assign-rule-success', 'The rule has been assigned');
    }

    public function removeUserRule(Request $request)
    {
        $data = $request->validate([
            'remove-user-rule-email' => 'required|email|max:100',
            'remove-user-rule-rule' => 'required',
        ], [
            'remove-user-rule-email' => 'The email field is required.',
            'remove-user-rule-rule' => 'The rule field is required.',
        ]);

        $user = User::where('email', $data['remove-user-rule-email'])->first();

        if(!$user) {
            return redirect()->back()->with('remove-rule-error', 'This user email does not exist!');
        }

        if(!$user->hasRule($data['remove-user-rule-rule'])) {
            return redirect()->back()->with('remove-rule-error', 'This user does not have this rule!');
        }

        $user->removeUserRule($data['remove-user-rule-rule']);

        return redirect()->route('admin-dashboard.index')->with('remove-user-rule-success', 'The rule has been removed');
    }
}

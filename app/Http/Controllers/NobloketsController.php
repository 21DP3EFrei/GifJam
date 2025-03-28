<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noblokets;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class NobloketsController extends Controller
{
    // Display all blocked records
    public function index()
    {
        $block = Noblokets::paginate(10); // Paginate results
        return view('block.index', compact('block'));
    }

    // Display the form for creating a new blocked record
    public function create()
    {
        // Get the IDs of all blocked users
        $blockUserID = Noblokets::pluck('L_ID')->toArray();
        $user = User::whereNotIn('id', $blockUserID)->where('id', '!=', Auth::id())->get();
    
        return view('block.create', compact('user'));
    }

    // Store a newly created blocked record
    public function store(Request $request)
    {
        $request->validate([
            'L_ID' => 'required|exists:users,id', // Validate the selected user ID
            'Iemesls' => 'nullable|string',      // Validate the reason
        ]);
    
        Noblokets::create([
            'L_ID' => $request->L_ID,            
            'Blokets' => 1,            
            'Iemesls' => $request->Iemesls,    
        ]);
    
        return redirect()->route('block.index')->with('success', 'User status updated successfully.');
    }

    // Display the form for editing a blocked record
    public function edit(Noblokets $block)
    {
        return view('block.edit', compact('block'));
    }

    public function update(Request $request, Noblokets $block)
    {
    $request->validate([
    'Blokets' => 'required|string|in:Block,Unblock',
    'Iemesls' => 'nullable|string',
    ]);
    
    $block->update([
    'Blokets' => $request->Blokets == 'Block' ? 1 : 0,
    'Iemesls' => $request->Iemesls,
    ]);
    
    
    return redirect()->route('block.index')->with('success', 'User status updated successfully.');
    }

    // Delete the specified blocked record
    public function destroy(Noblokets $block)
    {
        $block->delete();

        return redirect()->route('block.index')->with('success', 'User status deleted successfully.');
    }

    public function specific(Request $request, User $user)
    {
        $request->validate([
            'Iemesls' => 'required|string|max:255', 
        ]);
    
        // Create a new entry in the Noblokets table
        Noblokets::create([
            'L_ID' => $user->id,
            'Blokets' => 1,
            'Iemesls' => $request->Iemesls,
        ]);
    
        return redirect()->route('block.index')->with('success', 'User status updated successfully.');
    }

public function __construct()
{
    $this->middleware('auth');
}
}
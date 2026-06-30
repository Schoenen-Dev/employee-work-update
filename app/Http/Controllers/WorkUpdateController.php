<?php
namespace App\Http\Controllers;
use App\Models\WorkUpdate;
use Illuminate\Http\Request;

class WorkUpdateController extends Controller {
    public function dashboard() {
        $today = now()->format('Y-m-d');
        if (auth()->user()->role === 'admin') {
            $updates = WorkUpdate::with('user')->orderBy('date','desc')->get();
            return view('admin_dashboard', compact('updates'));
        }
        $submitted = session('done') ? true : false;
        $update = $submitted ? WorkUpdate::where('user_id', auth()->id())->where('date', $today)->first() : null;
        return view('dashboard', compact('update','today','submitted'));
    }

    public function store(Request $request) {
        $today = now()->format('Y-m-d');
        if (WorkUpdate::where('user_id', auth()->id())->where('date', $today)->exists()) {
            return redirect()->route('dashboard')->with('done', true);
        }
        $request->validate([
            'morning_work' => 'required|string',
            'evening_work' => 'required|string',
            'files.*' => 'nullable|file|max:10240',
            'files' => 'max:5',
        ]);
        $filePaths = []; $fileNames = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileNames[] = $file->getClientOriginalName();
                $filePaths[] = $file->store('work_files', 'public');
            }
        }
        WorkUpdate::create([
            'user_id' => auth()->id(),
            'date' => $today,
            'morning_work' => $request->morning_work,
            'evening_work' => $request->evening_work,
            'file_paths' => $filePaths,
            'file_names' => $fileNames,
        ]);
        return redirect()->route('dashboard')->with('done', true);
    }

    public function edit($id) {
        $update = WorkUpdate::findOrFail($id);
        return view('edit_update', compact('update'));
    }

    public function update(Request $request, $id) {
        $update = WorkUpdate::findOrFail($id);
        $request->validate([
            'morning_work' => 'required|string',
            'evening_work' => 'required|string',
        ]);
        $update->update([
            'morning_work' => $request->morning_work,
            'evening_work' => $request->evening_work,
        ]);
        return redirect()->route('dashboard')->with('success', 'Updated successfully!');
    }

    public function destroy($id) {
        WorkUpdate::findOrFail($id)->delete();
        return back()->with('success', 'Deleted successfully!');
    }
}
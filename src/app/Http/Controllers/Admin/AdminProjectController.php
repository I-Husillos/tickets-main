<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProjectController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();

        if ($admin->superadmin) {
            $projects = Project::with('admin')->get();
        } else {
            $projects = Project::where('admin_id', $admin->id)->with('admin')->get();
        }

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'color'       => 'nullable|string|max:7',
        ]);

        $locale = app()->getLocale();
        $admin  = Auth::guard('admin')->user();

        Project::create([
            'name'        => $validated['name'],
            'description' => $validated['description'] ?? null,
            'color'       => $validated['color'] ?? '#6c757d',
            'admin_id'    => $admin->id,
        ]);

        return redirect()->route('admin.projects.index', ['locale' => $locale])
            ->with('success', __('general.admin_projects.created'));
    }

    public function edit(string $locale, Project $project)
    {
        $this->authorizeProject($project);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(string $locale, Request $request, Project $project)
    {
        $this->authorizeProject($project);

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'color'       => 'nullable|string|max:7',
        ]);

        $project->update($validated);

        return redirect()->route('admin.projects.index', ['locale' => $locale])
            ->with('success', __('general.admin_projects.updated'));
    }

    public function confirmDelete(string $locale, Project $project)
    {
        $this->authorizeProject($project);
        return view('admin.projects.confirm-delete', compact('project'));
    }

    public function destroy(string $locale, Project $project)
    {
        $this->authorizeProject($project);
        $project->delete();

        return redirect()->route('admin.projects.index', ['locale' => $locale])
            ->with('success', __('general.admin_projects.deleted'));
    }

    /** Only allow the owner or superadmin to manage a project. */
    private function authorizeProject(Project $project): void
    {
        $admin = Auth::guard('admin')->user();
        if (!$admin->superadmin && $project->admin_id !== $admin->id) {
            abort(403);
        }
    }
}

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
        $projectRelations = [
            'admin',
            'tickets' => fn ($query) => $query
                ->with(['user', 'createdByAdmin'])
                ->latest(),
        ];

        if ($admin->superadmin) {
            $projects = Project::with($projectRelations)->get();
        } else {
            $projects = Project::where('admin_id', $admin->id)
                ->with($projectRelations)
                ->get();
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
        ]);

        $locale = app()->getLocale();
        $admin  = Auth::guard('admin')->user();

        Project::create([
            'name'        => $validated['name'],
            'description' => $validated['description'] ?? null,
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

    /** Permitir solo al propietario o superadministrador gestionar un proyecto. */
    private function authorizeProject(Project $project): void
    {
        $admin = Auth::guard('admin')->user();
        if (!$admin->superadmin && $project->admin_id !== $admin->id) {
            abort(403);
        }
    }
}

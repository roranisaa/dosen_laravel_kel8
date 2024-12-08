<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lecturer;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    
    // Get all lecturers
    public function getLecturers()
    {
        $lecturers = Lecturer::all();
        return response()->json([
            'success' => true,
            'data' => $lecturers,
        ]);
    }

    // Create a new lecturer
    public function createLecturer(Request $request)
    {
        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique',
            'email' => 'required|email|unique:lecturers,email',
            'phone' => 'required|string|unique:lecturers,phone',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Create the lecturer
        $lecturer = Lecturer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return response()->json([
            'success' => true,
            'data' => $lecturer,
        ], 201);
    }

    // Get a single lecturer by ID
    public function getLecturerById($id)
    {
        $lecturer = Lecturer::find($id);

        if (!$lecturer) {
            return response()->json([
                'success' => false,
                'message' => 'Lecturer not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $lecturer,
        ]);
    }

    // Update a lecturer by ID
    public function updateLecturer(Request $request, $id)
    {
        $lecturer = Lecturer::find($id);

        if (!$lecturer) {
            return response()->json([
                'success' => false,
                'message' => 'Lecturer not found',
            ], 404);
        }

        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|unique:lecturers,email,' . $id,
            'phone' => 'sometimes|required|string|unique:lecturers,phone,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Update lecturer data
        $lecturer->update($request->only(['name', 'email', 'phone']));

        return response()->json([
            'success' => true,
            'data' => $lecturer,
        ]);
    }

    // Delete a lecturer by ID
    public function deleteLecturer($id)
    {
        $lecturer = Lecturer::find($id);

        if (!$lecturer) {
            return response()->json([
                'success' => false,
                'message' => 'Lecturer not found',
            ], 404);
        }

        // Delete the lecturer
        $lecturer->delete();

        return response()->json([
            'success' => true,
            'message' => 'Lecturer deleted successfully',
        ]);
    }
}
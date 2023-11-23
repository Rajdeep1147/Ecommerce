<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $students = Student::all();
        return view('student.index',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
           'name' => 'required',
           'email' => 'required|unique:students|email',
           'phone' => 'required|unique:students',
           'address' => 'required',
           'image' => 'required'
        ],[
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
        ]);
       
            if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $originalFilename = $uploadedFile->getClientOriginalName();
                

            // Store the file with a new name (if needed) or use the original filename
            $newFilename = time() . '_' . $originalFilename;
            $imagePath = $uploadedFile->storeAs('images', $newFilename, 'public');
          }else{
             $imagePath = null;
          }
        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $imagePath,
            'address' => $request->address,
        ]);
        return response()->json(['message' => 'Student created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Student::find($id);

       return view('student.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);
        
         $validate = $request->validate([
           'name' => 'required',
           'email' => ['required','email','max:255',Rule::unique('students')->ignore($id)],
           'phone' => ['required',Rule::unique('students')->ignore($id)],
           'address' => 'required',
        
        ],[
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
        ]);
      
         $student->name = $request->input('name');
         $student->email = $request->input('email');
         $student->phone = $request->input('phone');
         $student->address = $request->input('address');


        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $originalFilename = $uploadedFile->getClientOriginalName();
                

            // Store the file with a new name (if needed) or use the original filename
            $newFilename = time() . '_' . $originalFilename;
            $imagePath = $uploadedFile->storeAs('images', $newFilename, 'public');
            $student->image = $imagePath;
            // Use query builder to insert values into the 'students' table
        }
     $student->save();
        return response()->json(['message' => 'Student updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Student::find($id)->delete();
        
        return response()->json(['success' => true, 'message' => 'Item deleted', 'deletedItemId' => $id]);
    }
}

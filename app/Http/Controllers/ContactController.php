<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        if($search){
            $contacts = Contact::where('client_id', $search)->get();
        }else{
            $contacts = Contact::all();
        }
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        $clients = Client::select('id' ,'name')->get();
        return view('contacts.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "client_id" => "required",
            "phone" => [
                "required",
                "regex:/^(\+?20|0)?1[0125][0-9]{8}$/"
            ],
            "email" => "required|email|unique:contacts,email",
            "cv" => "required|file|max:2048",
            "linkedin" => "nullable|url|regex:/^(https?:\/\/)?(www\.)?linkedin\.com\/.*$/",
            "github" => "nullable|url|regex:/^(https?:\/\/)?(www\.)?github\.com\/.*$/",
            "facebook" => "nullable|url|regex:/^(https?:\/\/)?(www\.)?facebook\.com\/.*$/",
            "instagram" => "nullable|url|regex:/^(https?:\/\/)?(www\.)?instagram\.com\/.*$/",
        ]);

       $path = null;
        if ($request->hasFile('cv')) {
            $path = $request->file('cv')->storeAs(
                'clients_cv',
                time() . '_' . $request->file('cv')->getClientOriginalName(),
                'public'
            );
        }

        // dd($path);

        Contact::create([
            "client_id" => $request->client_id,
            "phone" => $request->phone,
            "email" => $request->email,
            "cv" => $path,
            "linkedin" => $request->linkedin,
            "github" => $request->github,
            "facebook" => $request->facebook,
            "instagram" => $request->instagram,
        ]);

        return redirect()->back()->with('success', 'The New Contacts have been added successfully.');
    }

    public function show(string $id)
    {
        $contact = Contact::find($id);
        $clients = Client::select('id')->get();
        return view('contacts.show', compact('clients', 'contact'));
    }

    public function edit(string $id)
    {
        $contacts = Contact::find($id);
        $clients = Client::select('id' ,'name')->get();
        return view('contacts.edit', compact('clients', 'contacts'));
    }

    public function update(Request $request, string $id)
    {
        $contacts = Contact::findOrFail($id);

        $request->validate([
            "client_id" => "required",
            "phone" => [
                "required",
                "regex:/^(\+?20|0)?1[0125][0-9]{8}$/"
            ],
            "email" => "required|email|unique:contacts,email,$id",
            "cv" => "nullable|file|max:2048",
            "linkedin" => "nullable|url|regex:/^(https?:\/\/)?(www\.)?linkedin\.com\/.*$/",
            "github" => "nullable|url|regex:/^(https?:\/\/)?(www\.)?github\.com\/.*$/",
            "facebook" => "nullable|url|regex:/^(https?:\/\/)?(www\.)?facebook\.com\/.*$/",
            "instagram" => "nullable|url|regex:/^(https?:\/\/)?(www\.)?instagram\.com\/.*$/",
        ]);

        $path = $contacts->cv;
        if($request->hasFile('cv')){
            Storage::disk('public')->delete($path);
            $path = $request->file('cv')->storeAs(
                'clients_cv',
                time() . "_" . $request->file('cv')->getClientOriginalName(),
                'public'
            );
        }

        $contacts->cv = $path;

        Contact::where("id", "=", $id)->update([
            "client_id" => $request->client_id,
            "phone" => $request->phone,
            "email" => $request->email,
            "cv" => $contacts->cv,
            "linkedin" => $request->linkedin,
            "github" => $request->github,
            "facebook" => $request->facebook,
            "instagram" => $request->instagram,
        ]);

        return redirect()->back()->with('success', 'The Contacts have been Updated successfully.');
    }

    public function destroy(string $id)
    {
        $contacts = Contact::findOrFail($id);
        $contacts->delete();

        return redirect()->back()->with('success', 'The Contacts have been deleted successfully.');
    }
}

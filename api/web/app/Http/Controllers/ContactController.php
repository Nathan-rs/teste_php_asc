<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request) {
        if ($request->hasFile('csv_file')) {
            $file = $request->file('csv_file');
            $campaign = $request->input('campaign');

            $csvData = array_map('str_getcsv', file($file));

            foreach ($csvData as $data) {

                $name = $data[0] . ' ' . $data[1];
                $email = $data[2];
                $phoneNumber = preg_replace('/\D/', '', $data[3]);
                $address = $data[4];
                $city = $data[5];
                $cep = $data[6];
                $birthDate = $data[7];

                Contact::create([
                    'name' => $name,
                    'email' => $email,
                    'phone_number' => $phoneNumber,
                    'address' => $address,
                    'city' => $city,
                    'cep' => $cep,
                    'birth_date' => $birthDate,
                    'campaign' => $campaign,
                ]);
            }

            return response()->json(['message' => 'Contatos salvos com sucesso.']);
        }

        return response()->json(['error' => 'Arquivo CSV não encontrado.'], 400);
    }

    public function index(Request $request) {
        $contacts = Contact::query();

        if ($request->has('campaign')) {
            $contacts->where('campaign', $request->campaign);
        }

        return response()->json($contacts->get());
    }
}

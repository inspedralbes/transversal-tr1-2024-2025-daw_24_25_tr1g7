<?php

namespace App\Http\Controllers;

use App\Models\BillingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DireccionesFacturacionController extends Controller
{
    // Añadir una dirección
    public function store(Request $request) {
        $data = $request->validate([
            'idUser' => 'required',
            'zip_code' => 'required',
            'population' => 'required',
            'city' => 'required',
            'street' => 'required',
            'number' => 'required'
        ],
        [
            'idUser.required' => 'The idUser field is required',
            'zip_code.required' => 'The zip_code field is required',
            'population.required' => 'The population field is required',
            'city.required' => 'The city field is required',
            'street.required' => 'The street field is required',
            'number.required' => 'The number field is required'
        ]);

        $checkShippingAddressess = BillingAddress::where('idUser', $data['idUser'])->get();
        $direccion = new BillingAddress();
        if($checkShippingAddressess->isEmpty()) $direccion->default = true;

        $direccion->idUser = $data['idUser'];
        $direccion->name = $request->name ?? null;
        $direccion->last_name = $request->lastName ?? null;
        $direccion->company = $request->companyName ?? null;
        $direccion->phone_number = $request->phoneNumber ?? null;
        $direccion->dni_nie = $request->dniNie ?? null;
        $direccion->cif = $request->cif ?? null;
        $direccion->zip_code = $data['zip_code'];
        $direccion->population = $data['population'];
        $direccion->city = $data['city'];
        $direccion->street = $data['street'];
        $direccion->number = $data['number'];
        $direccion->floor = $request->floor ?? null;
        $direccion->door = $request->door ?? null;
        $direccion->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Address created successfully',
            'action' => 'Added a new shipping address for the user',
            'data' => $direccion  // Devuelve el objeto creado en JSON
        ]);
    }

    // Eliminar dirección
    public function delete($id) {
        try {
            $direccion = BillingAddress::findOrFail($id);
            $direccion->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Address deleted successfully',
                'action' => 'Deleted the specified shipping address',
                'data' => $direccion  // Devuelve el objeto eliminado en JSON
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Address not found',
                'action' => 'Attempted to delete a non-existent shipping address',
                'data' => null
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'action' => 'Failed to delete the shipping address due to an unexpected error',
                'data' => null
            ], 500);
        }
    }

    // Modificar dirección
    public function update($id, Request $request) {
        $data = $request->validate([
            'idUser' => 'required',
            'phoneNumber' => 'required',
            'zip_code' => 'required',
            'population' => 'required',
            'city' => 'required',
            'street' => 'required',
            'number' => 'required'
        ],
        [
            'idUser.required' => 'The idUser field is required',
            'phoneNumber.required' => 'The idUser field is required',
            'zip_code.required' => 'The zip_code field is required',
            'population.required' => 'The population field is required',
            'city.required' => 'The city field is required',
            'street.required' => 'The street field is required',
            'number.required' => 'The number field is required'
        ]);

        $direccion = BillingAddress::findOrFail($id);
        $direccion->idUser = $data['idUser'];
        $direccion->name = $request->name ?? null;
        $direccion->last_name = $request->last_name ?? null;
        $direccion->company = $request->company ?? null;
        $direccion->phone_number = $data['phoneNumber'];
        $direccion->dni_nie = $request->dni_nie ?? null;
        $direccion->cif = $request->cif ?? null;
        $direccion->zip_code = $data['zip_code'];
        $direccion->population = $data['population'];
        $direccion->city = $data['city'];
        $direccion->street = $data['street'];
        $direccion->number = $data['number'];
        $direccion->floor = $request->floor ?? null;
        $direccion->door = $request->door ?? null;
        $direccion->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Address updated successfully',
            'action' => 'Updated the details of an existing shipping address',
            'data' => $direccion  // Devuelve el objeto actualizado en JSON
        ]);
    }

    public function updateDefault(Request $request)
    {
        try {
            $data = $request->validate([
                'idUser' => 'required',
                'id' => 'required'
            ], [
                'idUser.required' => 'The idUser field is required',
                'id.required' => 'The id field is required'
            ]);

            // Buscar la dirección de envío actual por defecto y actualizarla
            $oldDefaultBillingAddresses = BillingAddress::where('idUser', $data['idUser'])
                ->where('default', true)
                ->first();

            if ($oldDefaultBillingAddresses) {
                $oldDefaultBillingAddresses->default = false;
                $oldDefaultBillingAddresses->save();
            }

            // Establecer la nueva dirección como predeterminada
            $billingAddresses = BillingAddress::findOrFail($data['id']);
            $billingAddresses->default = true;
            $billingAddresses->save();

            $billingAddresses = BillingAddress::all();

            return response()->json([
                'status' => 'success',
                'message' => 'Address default updated successfully',
                'action' => 'Updated the default shipping address',
                'billingAddresses' => $billingAddresses
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update default address',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Listar direcciones
    public function list() {
        $direcciones = BillingAddress::all();

        return response()->json([
            'status' => 'successful',
            'message' => 'Addresses listed successfully',
            'action' => 'Listed all available shipping addresses',
            'data' => $direcciones  // Devuelve todas las direcciones en JSON
        ]);
    }

    public function getAddresses()
    {
        $billingAddresses = BillingAddress::where('idUser', Auth::user()->id)->get();

        return $billingAddresses;
    }
}
